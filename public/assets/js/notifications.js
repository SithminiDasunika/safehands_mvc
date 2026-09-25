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

                    card.classList.remove("unread");

                    card.classList.add("read");

                    const indicator =
                        card.querySelector(
                            ".unread-indicator"
                        );

                    if (indicator) {
                        indicator.remove();
                    }

                });


                /* Update badge */

                if (unreadBadge) {
                    unreadBadge.textContent = "0 Unread";
                }

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

                /*
                 * Do not interfere with the actual
                 * notification link.
                 */

                if (
                    event.target.closest(
                        ".notification-link"
                    )
                ) {
                    return;
                }


                /*
                 * Mark the notification as read
                 * when the card itself is clicked.
                 */

                if (card.classList.contains("unread")) {

                    card.classList.remove("unread");

                    card.classList.add("read");

                    const indicator =
                        card.querySelector(
                            ".unread-indicator"
                        );

                    if (indicator) {
                        indicator.remove();
                    }

                    updateUnreadCount();
                }

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