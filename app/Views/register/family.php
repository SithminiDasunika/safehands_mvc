<?php

$step = $step ?? 1;

$errors = $errors ?? [];

$old = $old ?? [];

$registration = $registration ?? [];

$payment = $payment ?? [];

$registrationFee = $registrationFee ?? 1000;

?>

<div class="family-registration-page">

    <!-- =====================================================
         HEADER
    ====================================================== -->

    <header class="registration-header">

        <div class="registration-header-inner">

        <a
    href="/safehands_mvc/"
    class="brand"
>
    <span class="brand-name">
        SafeHands
    </span>
</a>


            <a
                href="/safehands_mvc/login"
                class="login-link"
            >

                Already have an account?

                <strong>
                    Sign in
                </strong>

            </a>

        </div>

    </header>


    <!-- =====================================================
         MAIN
    ====================================================== -->

    <main class="registration-main">

        <div class="registration-wrapper">


            <!-- INTRO -->

            <div class="registration-intro">

                <span class="eyebrow">
                    FAMILY MEMBER REGISTRATION
                </span>

                <h1>
                    Create your SafeHands account
                </h1>

                <p>
                    Register as a Family Member to manage your
                    caregiving needs and connect with trusted
                    caregivers.
                </p>

            </div>


            <!-- =================================================
                 STEPPER
            ================================================== -->

            <div class="stepper">


                <!-- STEP 1 -->

                <div
                    class="step <?= $step >= 1 ? 'active' : '' ?> <?= $step > 1 ? 'completed' : '' ?>"
                >

                    <div class="step-circle">

                        <?php if ($step > 1): ?>

                            ✓

                        <?php else: ?>

                            1

                        <?php endif; ?>

                    </div>

                    <div class="step-info">

                        <span class="step-number">
                            STEP 01
                        </span>

                        <span class="step-title">
                            Personal Details
                        </span>

                    </div>

                </div>


                <div
                    class="step-line <?= $step > 1 ? 'completed' : '' ?>"
                ></div>


                <!-- STEP 2 -->

                <div
                    class="step <?= $step >= 2 ? 'active' : '' ?> <?= $step > 2 ? 'completed' : '' ?>"
                >

                    <div class="step-circle">

                        <?php if ($step > 2): ?>

                            ✓

                        <?php else: ?>

                            2

                        <?php endif; ?>

                    </div>

                    <div class="step-info">

                        <span class="step-number">
                            STEP 02
                        </span>

                        <span class="step-title">
                            Payment
                        </span>

                    </div>

                </div>


                <div
                    class="step-line <?= $step > 2 ? 'completed' : '' ?>"
                ></div>


                <!-- STEP 3 -->

                <div
                    class="step <?= $step >= 3 ? 'active' : '' ?>"
                >

                    <div class="step-circle">

                        <?php if ($step >= 3): ?>

                            ✓

                        <?php else: ?>

                            3

                        <?php endif; ?>

                    </div>

                    <div class="step-info">

                        <span class="step-number">
                            STEP 03
                        </span>

                        <span class="step-title">
                            Complete
                        </span>

                    </div>

                </div>

            </div>


            <!-- =================================================
                 ERRORS
            ================================================== -->

            <?php if (!empty($errors)): ?>

                <div class="error-container">

                    <div class="error-icon">
                        !
                    </div>

                    <div class="error-content">

                        <strong>
                            Please check the following:
                        </strong>

                        <ul>

                            <?php foreach ($errors as $error): ?>

                                <li>
                                    <?= htmlspecialchars($error) ?>
                                </li>

                            <?php endforeach; ?>

                        </ul>

                    </div>

                </div>

            <?php endif; ?>


            <!-- =================================================
                 STEP 1
            ================================================== -->

            <?php if ($step === 1): ?>

                <section class="registration-card">

                    <div class="card-heading">

                        <span class="section-label">
                            STEP 01
                        </span>

                        <h2>
                            Personal Details
                        </h2>

                        <p>
                            Enter your personal information to create
                            your Family Member account.
                        </p>

                    </div>


                    <form
                        method="POST"
                        action="/safehands_mvc/register/family"
                    >

                        <input
                            type="hidden"
                            name="action"
                            value="continue_payment"
                        >


                        <div class="form-grid">


                            <!-- FULL NAME -->

                            <div class="form-group full-width">

                                <label for="full_name">
                                    Full Name
                                    <span>*</span>
                                </label>

                                <input
                                    type="text"
                                    id="full_name"
                                    name="full_name"
                                    placeholder="Enter your full name"
                                    value="<?= htmlspecialchars(
                                        $old['full_name'] ?? ''
                                    ) ?>"
                                    required
                                >

                            </div>


                            <!-- NIC -->

                            <div class="form-group">

                                <label for="nic">
                                    National Identity Card (NIC)
                                    <span>*</span>
                                </label>

                                <input
                                    type="text"
                                    id="nic"
                                    name="nic"
                                    placeholder="Enter your NIC number"
                                    value="<?= htmlspecialchars(
                                        $old['nic'] ?? ''
                                    ) ?>"
                                    required
                                >

                            </div>


                            <!-- PHONE -->

                            <div class="form-group">

                                <label for="phone">
                                    Phone Number
                                    <span>*</span>
                                </label>

                                <input
                                    type="tel"
                                    id="phone"
                                    name="phone"
                                    placeholder="Enter your phone number"
                                    value="<?= htmlspecialchars(
                                        $old['phone'] ?? ''
                                    ) ?>"
                                    required
                                >

                            </div>


                            <!-- EMAIL -->

                            <div class="form-group full-width">

                                <label for="email">
                                    Email Address
                                    <span>*</span>
                                </label>

                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    placeholder="Enter your email address"
                                    value="<?= htmlspecialchars(
                                        $old['email'] ?? ''
                                    ) ?>"
                                    required
                                >

                            </div>


                            <!-- ADDRESS -->

                            <div class="form-group full-width">

                                <label for="address">
                                    Home Address
                                    <span>*</span>
                                </label>

                                <textarea
                                    id="address"
                                    name="address"
                                    rows="3"
                                    placeholder="Enter your complete home address"
                                    required
                                ><?= htmlspecialchars(
                                    $old['address'] ?? ''
                                ) ?></textarea>

                            </div>


                            <!-- PASSWORD -->

                            <div class="form-group">

                                <label for="password">
                                    Password
                                    <span>*</span>
                                </label>

                                <div class="password-wrapper">

                                    <input
                                        type="password"
                                        id="password"
                                        name="password"
                                        placeholder="Create a password"
                                        required
                                    >

                                    <button
                                        type="button"
                                        class="password-toggle"
                                        data-target="password"
                                    >
                                        Show
                                    </button>

                                </div>

                                <small>
                                    Minimum 8 characters
                                </small>

                            </div>


                            <!-- CONFIRM PASSWORD -->

                            <div class="form-group">

                                <label for="confirm_password">
                                    Confirm Password
                                    <span>*</span>
                                </label>

                                <div class="password-wrapper">

                                    <input
                                        type="password"
                                        id="confirm_password"
                                        name="confirm_password"
                                        placeholder="Confirm your password"
                                        required
                                    >

                                    <button
                                        type="button"
                                        class="password-toggle"
                                        data-target="confirm_password"
                                    >
                                        Show
                                    </button>

                                </div>

                            </div>

                        </div>


                        <!-- TERMS -->

                        <div class="terms-section">

                            <label class="checkbox-label">

                                <input
                                    type="checkbox"
                                    name="terms"
                                    value="1"
                                    <?= isset($old['terms']) ? 'checked' : '' ?>
                                    required
                                >

                                <span class="custom-checkbox"></span>

                                <span class="checkbox-text">

                                    I agree to the
                                    <a href="#">
                                        Terms & Conditions
                                    </a>
                                    and
                                    <a href="#">
                                        Privacy Policy
                                    </a>.

                                </span>

                            </label>

                        </div>


                        <!-- FEE -->

                        <div class="fee-card">

                            <div class="fee-card-left">

                                <div class="fee-icon">
                                    LKR
                                </div>

                                <div>

                                    <strong>
                                        One-time registration fee
                                    </strong>

                                    <p>
                                        Required to activate your
                                        Family Member account.
                                    </p>

                                </div>

                            </div>

                            <div class="fee-amount">

                                LKR
                                <?= number_format(
                                    $registrationFee,
                                    2
                                ) ?>

                            </div>

                        </div>


                        <!-- BUTTON -->

                        <div class="form-actions">

                            <button
                                type="submit"
                                class="primary-button"
                            >

                                Continue to Payment

                                <span class="button-arrow">
                                    →
                                </span>

                            </button>

                        </div>

                    </form>

                </section>


            <!-- =================================================
                 STEP 2
            ================================================== -->

            <?php elseif ($step === 2): ?>

                <section class="payment-section">


                    <!-- PAYMENT CARD -->

                    <div class="payment-card-main">

                        <div class="card-heading">

                            <span class="section-label">
                                STEP 02
                            </span>

                            <h2>
                                Complete Payment
                            </h2>

                            <p>
                                Enter your card details to complete
                                your one-time registration payment.
                            </p>

                        </div>


                        <form
                            method="POST"
                            action="/safehands_mvc/register/family"
                        >

                            <input
                                type="hidden"
                                name="action"
                                value="process_payment"
                            >


                            <!-- CARD NAME -->

                            <div class="form-group">

                                <label for="card_name">
                                    Cardholder Name
                                    <span>*</span>
                                </label>

                                <input
                                    type="text"
                                    id="card_name"
                                    name="card_name"
                                    placeholder="Name as shown on card"
                                    value="<?= htmlspecialchars(
                                        $old['card_name'] ?? ''
                                    ) ?>"
                                    required
                                >

                            </div>


                            <!-- CARD NUMBER -->

                            <div class="form-group">

                                <label for="card_number">
                                    Card Number
                                    <span>*</span>
                                </label>

                                <div class="card-input-wrapper">

                                    <input
                                        type="text"
                                        id="card_number"
                                        name="card_number"
                                        placeholder="1234 5678 9012 3456"
                                        maxlength="19"
                                        inputmode="numeric"
                                        value="<?= htmlspecialchars(
                                            $old['card_number'] ?? ''
                                        ) ?>"
                                        required
                                    >

                                    <span class="card-type">
                                        CARD
                                    </span>

                                </div>

                            </div>


                            <!-- EXPIRY + CVV -->

                            <div class="payment-fields-row">

                                <div class="form-group">

                                    <label for="expiry">
                                        Expiry Date
                                        <span>*</span>
                                    </label>

                                    <input
                                        type="text"
                                        id="expiry"
                                        name="expiry"
                                        placeholder="MM/YY"
                                        maxlength="5"
                                        inputmode="numeric"
                                        value="<?= htmlspecialchars(
                                            $old['expiry'] ?? ''
                                        ) ?>"
                                        required
                                    >

                                </div>


                                <div class="form-group">

                                    <label for="cvv">
                                        CVV
                                        <span>*</span>
                                    </label>

                                    <input
                                        type="password"
                                        id="cvv"
                                        name="cvv"
                                        placeholder="123"
                                        maxlength="4"
                                        inputmode="numeric"
                                        required
                                    >

                                </div>

                            </div>


                            <!-- SECURITY -->

                            <div class="secure-payment">

                                <div class="secure-icon">
                                    ✓
                                </div>

                                <div>

                                    <strong>
                                        Secure Payment
                                    </strong>

                                    <p>
                                        Your card details are used only
                                        to process this payment and are
                                        not stored by SafeHands.
                                    </p>

                                </div>

                            </div>


                            <!-- BUTTONS -->

                            <div class="payment-actions">

                                <button
                                    type="button"
                                    class="secondary-button"
                                    onclick="history.back()"
                                >
                                    ← Back
                                </button>

                                <button
                                    type="submit"
                                    class="primary-button"
                                >

                                    Pay LKR
                                    <?= number_format(
                                        $registrationFee,
                                        2
                                    ) ?>

                                    <span class="button-arrow">
                                        →
                                    </span>

                                </button>

                            </div>

                        </form>

                    </div>


                    <!-- SUMMARY -->

                    <aside class="payment-summary">

                        <div class="summary-card">

                            <div class="summary-heading">

                                <span class="section-label">
                                    ORDER SUMMARY
                                </span>

                                <h3>
                                    Registration
                                </h3>

                            </div>


                            <div class="summary-account">

                                <div class="account-icon">
                                    F
                                </div>

                                <div>

                                    <strong>
                                        Family Member
                                    </strong>

                                    <span>
                                        SafeHands Account
                                    </span>

                                </div>

                            </div>


                            <div class="summary-divider"></div>


                            <div class="summary-row">

                                <span>
                                    Registration Fee
                                </span>

                                <strong>
                                    LKR
                                    <?= number_format(
                                        $registrationFee,
                                        2
                                    ) ?>
                                </strong>

                            </div>


                            <div class="summary-row">

                                <span>
                                    Processing Fee
                                </span>

                                <strong>
                                    LKR 0.00
                                </strong>

                            </div>


                            <div class="summary-divider"></div>


                            <div class="summary-total">

                                <span>
                                    Total
                                </span>

                                <strong>
                                    LKR
                                    <?= number_format(
                                        $registrationFee,
                                        2
                                    ) ?>
                                </strong>

                            </div>

                        </div>


                        <div class="activation-info">

                            <div class="activation-icon">
                                ✓
                            </div>

                            <div>

                                <strong>
                                    Account Activation
                                </strong>

                                <p>
                                    Your account will be activated
                                    after the payment is successfully
                                    completed.
                                </p>

                            </div>

                        </div>

                    </aside>

                </section>


            <!-- =================================================
                 STEP 3
            ================================================== -->

            <?php elseif ($step === 3): ?>

                <section class="success-section">

                    <div class="success-card">

                        <div class="success-icon">
                            ✓
                        </div>

                        <span class="success-label">
                            REGISTRATION COMPLETE
                        </span>

                        <h2>
                            Welcome to SafeHands
                        </h2>

                        <p class="success-description">
                            Your Family Member registration has been
                            completed successfully.
                        </p>


                        <div class="success-details">

                            <div class="success-detail-row">

                                <span>
                                    Account Type
                                </span>

                                <strong>
                                    Family Member
                                </strong>

                            </div>


                            <div class="success-detail-row">

                                <span>
                                    Full Name
                                </span>

                                <strong>
                                    <?= htmlspecialchars(
                                        $registration['full_name'] ?? 'N/A'
                                    ) ?>
                                </strong>

                            </div>


                            <div class="success-detail-row">

                                <span>
                                    Email
                                </span>

                                <strong>
                                    <?= htmlspecialchars(
                                        $registration['email'] ?? 'N/A'
                                    ) ?>
                                </strong>

                            </div>


                            <div class="success-detail-row">

                                <span>
                                    Amount Paid
                                </span>

                                <strong>
                                    LKR
                                    <?= number_format(
                                        $payment['amount'] ??
                                        $registrationFee,
                                        2
                                    ) ?>
                                </strong>

                            </div>


                            <div class="success-detail-row">

                                <span>
                                    Payment Status
                                </span>

                                <strong class="paid-status">
                                    Paid
                                </strong>

                            </div>


                            <div class="success-detail-row">

                                <span>
                                    Transaction ID
                                </span>

                                <strong>
                                    <?= htmlspecialchars(
                                        $payment['transaction_id'] ?? 'N/A'
                                    ) ?>
                                </strong>

                            </div>

                        </div>


                        <div class="success-notice">

                            <div class="success-notice-icon">
                                ✓
                            </div>

                            <div>

                                <strong>
                                    Account Activated
                                </strong>

                                <p>
                                    Your Family Member account has
                                    been successfully activated.
                                    You can now sign in to SafeHands.
                                </p>

                            </div>

                        </div>


                        <a
                            href="/safehands_mvc/login"
                            class="primary-button success-button"
                        >

                            Continue to Login

                            <span>
                                →
                            </span>

                        </a>

                    </div>

                </section>

            <?php endif; ?>


            <!-- FOOTER -->

            <footer class="registration-footer">

                <p>
                    SafeHands Caregiver Service Management System
                </p>

                <span>
                    Secure Registration
                </span>

            </footer>

        </div>

    </main>

</div>


<script>

/* =========================================================
   PASSWORD SHOW / HIDE
   ========================================================= */

document
    .querySelectorAll('.password-toggle')
    .forEach(function (button) {

        button.addEventListener('click', function () {

            const target =
                document.getElementById(
                    button.dataset.target
                );

            if (!target) {
                return;
            }

            if (target.type === 'password') {

                target.type = 'text';

                button.textContent = 'Hide';

            } else {

                target.type = 'password';

                button.textContent = 'Show';
            }

        });

    });


/* =========================================================
   CARD NUMBER FORMAT
   ========================================================= */

const cardNumber =
    document.getElementById('card_number');

if (cardNumber) {

    cardNumber.addEventListener(
        'input',
        function () {

            let value =
                this.value.replace(/\D/g, '');

            value =
                value.substring(0, 16);

            let formatted = '';

            for (
                let i = 0;
                i < value.length;
                i++
            ) {

                if (
                    i > 0 &&
                    i % 4 === 0
                ) {
                    formatted += ' ';
                }

                formatted += value[i];
            }

            this.value = formatted;
        }
    );
}


/* =========================================================
   EXPIRY FORMAT
   ========================================================= */

const expiry =
    document.getElementById('expiry');

if (expiry) {

    expiry.addEventListener(
        'input',
        function () {

            let value =
                this.value.replace(/\D/g, '');

            value =
                value.substring(0, 4);

            if (value.length > 2) {

                value =
                    value.substring(0, 2) +
                    '/' +
                    value.substring(2);
            }

            this.value = value;
        }
    );
}


/* =========================================================
   CVV
   ========================================================= */

const cvv =
    document.getElementById('cvv');

if (cvv) {

    cvv.addEventListener(
        'input',
        function () {

            this.value =
                this.value
                    .replace(/\D/g, '')
                    .substring(0, 4);

        }
    );
}

</script>