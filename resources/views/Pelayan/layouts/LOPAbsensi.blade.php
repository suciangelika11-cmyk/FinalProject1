<link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700;800&family=Poppins:wght@300;400;500;600&display=swap"
    rel="stylesheet">

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background: #fff;
    }

    /* HERO */

    .hero-absensi {
        position: relative;
        min-height: 320px;
        padding:80px 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        overflow: hidden;

        background: linear-gradient(180deg,
                #eef5fb 0%,
                #f8fbff 100%);
    }

    .hero-absensi::before {
        content: '';
        position: absolute;
        width: 600px;
        height: 600px;
        border-radius: 50%;
        background: #d8e8f9;
        top: -250px;
        left: -180px;
        opacity: .6;
    }

    .hero-absensi::after {
        content: '';
        position: absolute;
        width: 700px;
        height: 700px;
        border-radius: 50%;
        background: #e8f2fc;
        right: -250px;
        bottom: -320px;
    }

    .hero-content {
        position: relative;
        z-index: 10;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;

        padding: 12px 28px;

        border: 1px solid #bfd4ea;
        border-radius: 999px;

        color: #6f97c6;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: .18em;
        text-transform: uppercase;

        margin-bottom: 30px;
    }

    .hero-title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(60px, 8vw, 100px);
        line-height: 1;
        color: #6f96c7;
        margin-bottom: 20px;
    }

    .hero-title span {
        color: #bdd8ef;
        font-style: italic;
    }

    .hero-desc {
        font-size: 18px;
        color: #8ca8c5;
        max-width: 700px;
        margin: auto;
    }

    .hero-wave {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
    }

    .hero-wave svg {
        display: block;
        width: 100%;
        height: 160px;
    }

    /* CONTENT */

    .absensi-section {
        padding: 50px 0 80px;
        background: #fff;
    }

    .container-absensi {
        width: 90%;
        max-width: 1400px;
        margin: auto;
    }

    .section-divider {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 70px;
    }

    .section-divider::before,
    .section-divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background: #d6e4f3;
    }

    .section-divider span {
        color: #7fa5cf;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: .2em;
        text-transform: uppercase;
    }

    /* GRID */

    .absensi-grid {
        display: grid;
        grid-template-columns:
            repeat(auto-fit,minmax(280px,1fr));
        gap: 30px;
    }

    /* CARD */

    .absensi-card {
        position: relative;
        background: #fff;
        border-radius: 30px;
        padding: 24px;
        border: 1px solid #e7eef7;
        transition: .4s ease;
        overflow: hidden;
        box-shadow:
        0 4px 12px rgba(118,159,205,.08);
    }

    .absensi-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 6px;
        background: linear-gradient(90deg,
                #7ea9dd,
                #b7d5f1);
    }

    .absensi-card:hover {
        transform: translateY(-4px);

        box-shadow:
            0 20px 50px rgba(93, 134, 189, .12);
    }

    .card-date {
        color: #8aa7c7;
        font-size: 14px;
        margin-bottom: 15px;
    }

    .card-session {
        font-family: 'Playfair Display', serif;
        font-size: 32px;
        color: #5f84b7;
        margin-bottom: 25px;
    }

    .info-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        margin-bottom: 18px;
    }

    .info-icon {
        width: 42px;
        height: 42px;

        border-radius: 12px;

        background: #eef5fd;

        display: flex;
        align-items: center;
        justify-content: center;

        color: #7ea8da;

        flex-shrink: 0;
    }

    .info-content h5 {
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: .1em;
        color: #9bb3cd;
        margin-bottom: 4px;
    }

    .info-content p {
        color: #4b5563;
        font-size: 15px;
        font-weight: 500;
    }

    .card-footer {
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px solid #eef3f9;
    }

    .saved-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;

        background: #effcf4;

        color: #22a35a;

        padding: 10px 18px;

        border-radius: 999px;

        font-size: 13px;
        font-weight: 700;
    }

    .empty-state {
        text-align: center;
        padding: 80px 20px;
        color: #94a3b8;
    }

    .empty-state h3 {
        margin-bottom: 10px;
        color: #6b7280;
    }

    @media(max-width:768px) {

        .hero-absensi {
            min-height: 500px;
        }

        .hero-title {
            font-size: 55px;
        }

        .hero-desc {
            font-size: 15px;
            padding: 0 20px;
        }

        .absensi-grid {
            grid-template-columns: 1fr;
        }
    }
</style>