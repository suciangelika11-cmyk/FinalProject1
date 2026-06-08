<style>
    /* ==================================
               WRAPPER
            ================================== */
    .jm-outer {
        min-height: 100vh;
        padding: 80px 20px 100px;
        background:
            radial-gradient(circle at top,
                rgba(118, 159, 205, .15),
                transparent 40%),
            #F7FBFC;
    }

    .jm-wrap {
        max-width: 760px;
        margin: auto;
    }

    /* ==================================
               HEADER
            ================================== */
    .jm-head {
        text-align: center;
        margin-bottom: 50px;
    }

    .jm-head h1 {
        font-family: 'Playfair Display', serif;
        font-size: clamp(34px, 5vw, 48px);
        font-weight: 700;
        color: #2C3E50;
        margin-bottom: 14px;
        animation: fadeUp .8s ease .25s both;
    }

    .jm-head p {
        color: #6B7C93;
        font-size: 15px;
        line-height: 1.8;
        max-width: 600px;
        margin: auto;
        animation: fadeUp .8s ease .4s both;
    }

    /* ==================================
               ALERT
            ================================== */
    .jm-alert {
        border-radius: 14px;
        padding: 14px 20px;
        margin-bottom: 20px;
        font-size: 14px;
        font-weight: 500;
    }

    .jm-alert-ok {
        background: #e8faf1;
        border: 1px solid #b7ebd2;
        color: #228b5a;
    }

    .jm-alert-err {
        background: #fff0f1;
        border: 1px solid #f3c8ce;
        color: #c0394b;
    }

    /* ==================================
               CARD
            ================================== */
    .jm-card {
        background: #ffffff;
        border-radius: 28px;
        padding: 40px;
        border: 1px solid rgba(118, 159, 205, .15);

        box-shadow:
            0 20px 45px rgba(118, 159, 205, .08);

        animation: fadeUp .8s ease .3s both;
    }

    /* ==================================
               SECTION TITLE
            ================================== */
    .jm-section-title {
        font-family: 'Playfair Display', serif;
        font-size: 20px;
        font-weight: 700;
        color: #769FCD;
        margin-bottom: 22px;

        display: flex;
        align-items: center;
        gap: 10px;
    }

    .jm-section-title::before {
        content: '';
        width: 4px;
        height: 20px;
        border-radius: 999px;
        background: linear-gradient(to bottom,
                #769FCD,
                #B9D7EA);
    }

    /* ==================================
               FORM
            ================================== */
    .jm-group {
        margin-bottom: 20px;
    }

    .jm-label {
        display: block;
        margin-bottom: 8px;

        font-size: 14px;
        font-weight: 600;
        color: #44556B;
    }

    .jm-input,
    .jm-textarea,
    .jm-select {
        width: 100%;
        padding: 13px 16px;

        border-radius: 12px;

        border: 1px solid #D6E6F2;
        background: #F7FBFC;

        color: #2C3E50;

        font-size: 14px;
        font-family: 'DM Sans', sans-serif;

        transition: .25s ease;
    }

    .jm-input:focus,
    .jm-textarea:focus,
    .jm-select:focus {
        border-color: #769FCD;
        background: #fff;

        outline: none;

        box-shadow:
            0 0 0 4px rgba(118, 159, 205, .12);
    }

    .jm-input::placeholder,
    .jm-textarea::placeholder {
        color: #9BAFC4;
    }

    .jm-select option {
        background: #fff;
        color: #2C3E50;
    }

    .jm-textarea {
        min-height: 100px;
        resize: vertical;
    }

    /* ==================================
               ERROR
            ================================== */
    .jm-invalid {
        border-color: #dc3545 !important;
    }

    .jm-feedback {
        margin-top: 6px;
        font-size: 12px;
        color: #dc3545;
    }

    /* ==================================
               GRID
            ================================== */
    .jm-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
    }

    /* ==================================
               RADIO
            ================================== */
    .jm-radio-group {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }

    .jm-radio-label {
        display: flex;
        align-items: center;
        gap: 8px;

        color: #5E7187;
        font-size: 14px;
        cursor: pointer;
    }

    .jm-radio-label input[type="radio"] {
        accent-color: #769FCD;
        width: 16px;
        height: 16px;
    }

    /* ==================================
               DIVIDER
            ================================== */
    .jm-divider {
        margin: 32px 0;

        height: 1px;

        background: linear-gradient(to right,
                transparent,
                #D6E6F2,
                transparent);
    }

    /* ==================================
               BUTTON
            ================================== */
    .jm-submit {
        width: 100%;

        padding: 15px;

        border: none;
        border-radius: 14px;

        background: linear-gradient(135deg,
                #769FCD,
                #5F89B8);

        color: white;

        font-size: 15px;
        font-weight: 600;

        cursor: pointer;

        transition: .3s ease;
    }

    .jm-submit:hover {
        transform: translateY(-3px);

        box-shadow:
            0 15px 30px rgba(118, 159, 205, .25);
    }

    /* ==================================
               ANIMATION
            ================================== */
    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(24px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ==================================
               MOBILE
            ================================== */
    @media (max-width: 560px) {

        .jm-row {
            grid-template-columns: 1fr;
        }

        .jm-card {
            padding: 26px 20px;
        }
    }
</style>