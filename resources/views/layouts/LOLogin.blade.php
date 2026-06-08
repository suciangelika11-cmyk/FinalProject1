<style>
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        font-family: 'Poppins', sans-serif;
        overflow: hidden;
        background:
            radial-gradient(circle at top left, rgba(91, 47, 211, .35), transparent 28%),
            radial-gradient(circle at bottom right, rgba(0, 191, 255, .25), transparent 28%),
            linear-gradient(135deg, #081120 0%, #10204b 45%, #25145c 100%);
    }

    /* WRAPPER */
    .login-wrapper {
        height: calc(100vh - 40px);
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        margin-top: 40px;
        box-sizing: border-box;
    }

    /* CARD */
    .login-card {
        width: 100%;
        max-width: 460px;
        padding: 38px 34px;
        border-radius: 28px;
        background: rgba(255, 255, 255, .08);
        border: 1px solid rgba(255, 255, 255, .12);
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
        box-shadow:
            0 20px 45px rgba(0, 0, 0, .35),
            0 0 25px rgba(91, 47, 211, .18);
        color: #fff;
        position: relative;
        overflow: hidden;
    }

    .login-card::before {
        content: '';
        position: absolute;

        width: 180px;
        height: 180px;

        background: rgba(255, 255, 255, .05);

        border-radius: 50%;

        top: -70px;
        right: -70px;
    }

    /* LOGO */
    .logo-wrapper {
        width: 100px;
        height: 100px;

        margin: 0 auto 22px;

        border-radius: 50%;
        overflow: hidden;

        border: 3px solid rgba(255, 255, 255, .2);

        background: rgba(255, 255, 255, .08);

        display: flex;
        justify-content: center;
        align-items: center;

        box-shadow: 0 10px 30px rgba(0, 0, 0, .25);
    }

    .logo-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .logo-placeholder {
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, .08);
    }

    /* TITLE */
    .login-title {
        text-align: center;
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .login-subtitle {
        text-align: center;
        color: rgba(255, 255, 255, .82);
        margin-bottom: 28px;
        line-height: 1.6;
    }

    /* FORM */
    .form-label {
        color: #fff;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .form-control {
        height: 54px;

        border-radius: 15px;

        border: 1px solid rgba(255, 255, 255, .14);

        background: rgba(255, 255, 255, .08);

        color: #fff;

        padding: 0 18px;

        transition: .25s ease;
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, .52);
    }

    .form-control:focus {
        background: rgba(255, 255, 255, .12);
        border-color: rgba(255, 255, 255, .35);
        color: #fff;
        box-shadow: none;
    }

    /* CHECKBOX */
    .form-check-label {
        color: rgba(255, 255, 255, .9);
    }

    .form-check-input {
        border-radius: 5px;
    }

    /* BUTTON */
    .login-btn {
        width: 100%;
        height: 54px;

        border: none;
        border-radius: 16px;

        font-size: 1rem;
        font-weight: 600;

        color: #fff;

        background:
            linear-gradient(90deg,
                #1fb6ff 0%,
                #6d4cff 55%,
                #a855f7 100%);

        box-shadow:
            0 12px 25px rgba(109, 76, 255, .35);

        transition: .28s ease;
    }

    .login-btn:hover {
        transform: translateY(-2px);

        box-shadow:
            0 15px 30px rgba(109, 76, 255, .45);
    }

    /* ALERT */
    .alert {
        border: none;
        border-radius: 14px;
    }

    /* VERSE */
    .verse-box {
        margin-top: 22px;

        padding: 18px;

        border-radius: 18px;

        background: rgba(255, 255, 255, .07);

        border: 1px solid rgba(255, 255, 255, .08);

        text-align: center;
    }

    .verse-title {
        font-weight: 700;
        margin-bottom: 8px;
    }

    .verse-text {
        margin: 0;
        line-height: 1.7;
        color: rgba(255, 255, 255, .88);
        font-size: .95rem;
    }

    /* FOOTER */
    .footer-text {
        text-align: center;
        margin-top: 24px;
        font-size: .9rem;
        color: rgba(255, 255, 255, .72);
    }

    /* BACK BUTTON */
    .back-btn {
        position: fixed;
        top: 20px;
        left: 20px;
        padding: 12px 18px;
        border-radius: 14px;
        background: rgba(255, 255, 255, .10);
        border: 1px solid rgba(255, 255, 255, .18);
        color: #fff;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: .95rem;
        font-weight: 600;
        backdrop-filter: blur(12px);
        z-index: 9999;
        transition: .25s ease;
    }

    .back-btn i {
        font-size: 1.1rem;
    }

    .back-btn:hover {
        background: rgba(255, 255, 255, .18);
        color: #fff;

        transform: translateY(-2px);
    }

    /* MOBILE */
    @media(max-width:576px) {

        .login-wrapper {
            padding: 100px 15px 30px;
        }

        .login-card {
            padding: 30px 22px;
        }

        .login-title {
            font-size: 1.7rem;
        }

        .logo-wrapper {
            width: 85px;
            height: 85px;
        }
    }
</style>