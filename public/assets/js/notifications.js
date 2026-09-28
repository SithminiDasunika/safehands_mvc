document.addEventListener("DOMContentLoaded", function () {

    const filterTabs = document.querySelectorAll(".filter-tab");
    const notificationCards =
        document.querySelectorAll(".notification-card");

    const notificationGroups =
        document.querySelectorAll(".notification-group");

    const markAllButton =
        document.getElementById("markAllRead");

    const unreadBadge =
        document.querySelector(".unread-badge");
    const readStorageKey = "safehands.family.notifications.read";
    let readNotificationIds = new Set();

    try {
        readNotificationIds = new Set(
            JSON.parse(localStorage.getItem(readStorageKey) || "[]")
        );
    } catch (error) {
        readNotificationIds = new Set();
    }

    notificationCards.forEach(function (card) {
        if (readNotificationIds.has(card.dataset.id)) {
            markAsRead(card);
        }
    });
    updateUnreadCount();

    function saveReadState() {
        try {
            localStorage.setItem(readStorageKey, JSON.stringify([...readNotificationIds]));
        } catch (error) {
            // The read state still updates for this page view if storage is unavailable.
        }
    }

    function markAsRead(card) {
        if (!card || !card.classList.contains("unread")) return;
        card.classList.remove("unread");
        card.classList.add("read");
        const indicator = card.querySelector(".unread-indicator");
        if (indicator) indicator.remove();
        if (card.dataset.id) readNotificationIds.add(card.dataset.id);
        saveReadState();
    }


    /* =========================================
       FILTER NOTIFICATIONS
       ========================================= */

    filterTabs.forEach(function (tab) {

        tab.addEventListener("click", function () {

            const selectedFilter =
                this.dataset.filter;

            filterTabs.forEach(function (item) {
                item.classList.remove("active");
            });

            this.classList.add("active");


            notificationCards.forEach(function (card) {

                const type =
                    card.dataset.type;

                if (
                    selectedFilter === "all" ||
                    type === selectedFilter
                ) {
                    card.classList.remove("hidden");
                } else {
                    card.classList.add("hidden");
                }

            });


            /* Hide groups that have no visible cards */

            notificationGroups.forEach(function (group) {

                const visibleCards =
                    group.querySelectorAll(
                        ".notification-card:not(.hidden)"
                    );

                if (visibleCards.length === 0) {
                    group.classList.add("hidden");
                } else {
                    group.classList.remove("hidden");
                }

            });

        });

    });


    /* =========================================
       MARK ALL AS READ
       ========================================= */

    if (markAllButton) {

        markAllButton.addEventListener(
            "click",
            function () {

                const unreadCards =
                    document.querySelectorAll(
                        ".notification-card.unread"
                    );

                unreadCards.forEach(function (card) {
                    markAsRead(card);
                });

                updateUnreadCount();

            }
        );

    }


    /* =========================================
       CLICK NOTIFICATION
       ========================================= */

    notificationCards.forEach(function (card) {

        card.addEventListener(
            "click",
            function (event) {

                markAsRead(card);
                updateUnreadCount();

            }
        );

    });


    /* =========================================
       UPDATE UNREAD COUNT
       ========================================= */

    function updateUnreadCount() {

        const unreadCards =
            document.querySelectorAll(
                ".notification-card.unread"
            );

        if (unreadBadge) {

            unreadBadge.textContent =
                unreadCards.length + " Unread";

        }

    }

});
