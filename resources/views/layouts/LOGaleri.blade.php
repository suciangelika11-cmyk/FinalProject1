<style>
    /* =====================================
           HERO
        ===================================== */

    .g-hero {
        position: relative;
        padding: clamp(70px, 10vw, 110px) 16px clamp(60px, 8vw, 90px);
        text-align: center;
        overflow: hidden;

        background: linear-gradient(135deg,
                #F7FBFC 0%,
                #D6E6F2 55%,
                #B9D7EA 100%);
    }

    .g-hero-grid {
        position: absolute;
        inset: 0;

        background-image:
            linear-gradient(rgba(118, 159, 205, .12) 1px, transparent 1px),
            linear-gradient(90deg, rgba(118, 159, 205, .12) 1px, transparent 1px);

        background-size: 60px 60px;

        mask-image: radial-gradient(ellipse 80% 70% at 50% 50%,
                black 0%,
                transparent 100%);

        pointer-events: none;
    }

    .g-hero-orb {
        position: absolute;
        border-radius: 50%;
        pointer-events: none;
        filter: blur(70px);
    }

    .g-hero-orb-1 {
        width: 500px;
        height: 500px;

        background:
            radial-gradient(circle,
                rgba(118, 159, 205, .35) 0%,
                transparent 70%);

        top: -150px;
        left: -100px;
    }

    .g-hero-orb-2 {
        width: 350px;
        height: 350px;

        background:
            radial-gradient(circle,
                rgba(185, 215, 234, .55) 0%,
                transparent 70%);

        bottom: -60px;
        right: -50px;
    }

    .g-hero-inner {
        position: relative;
        z-index: 2;
        max-width: 650px;
        margin: auto;
    }

    .eyebrow {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;

        color: #769FCD;
        font-size: 12px;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 20px;
        font-weight: 700;
    }

    .eyebrow-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #769FCD;
    }

    .g-hero-title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(45px, 8vw, 72px);
        font-weight: 800;
        color: #4B6584;
        line-height: 1.1;
        margin-bottom: 18px;
        animation: fadeUp .8s ease .25s both;
    }

    .g-hero-title span {
        background: linear-gradient(135deg,
                #769FCD 0%,
                #5E87B8 50%,
                #769FCD 100%);

        background-size: 200% auto;

        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .g-hero-sub {
        font-size: clamp(14px, 2vw, 16px);
        color: #5F738B;
        line-height: 1.8;
        max-width: 520px;
        margin: auto;
    }

    .g-hero-line {
        width: 1px;
        height: 50px;
        background: linear-gradient(to bottom,
                transparent,
                #769FCD,
                transparent);

        margin: 34px auto 0;
    }

    /* =====================================
           SECTION
        ===================================== */

    .g-section {
        background: #F7FBFC;
        padding: 70px 0 90px;
        position: relative;
    }

    .g-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;

        background: linear-gradient(90deg,
                transparent,
                rgba(118, 159, 205, .3),
                transparent);
    }

    .global-container {
        max-width: 1200px;
        margin: auto;
        padding: 0 24px;
    }

    .section-head {
        text-align: center;
        margin-bottom: 60px;
    }

    .section-label {
        display: block;
        color: #769FCD;
        font-size: 11px;
        letter-spacing: 3px;
        text-transform: uppercase;
        margin-bottom: 12px;
        font-weight: 700;
    }

    .section-title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(30px, 5vw, 42px);
        color: #4B6584;
        margin-bottom: 16px;
    }

    .section-rule {
        width: 70px;
        height: 3px;
        border-radius: 999px;

        background: linear-gradient(90deg,
                #769FCD,
                #B9D7EA);

        margin: auto;
    }

    /* =====================================
           GRID
        ===================================== */

    .g-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
        gap: 24px;
    }

    /* =====================================
           CARD
        ===================================== */

    .g-card {
        background: #FFFFFF;
        border: 1px solid #D6E6F2;
        border-radius: 20px;
        overflow: hidden;
        cursor: pointer;

        transition: .4s;

        box-shadow:
            0 10px 30px rgba(118, 159, 205, .10);
    }

    .g-card:hover {
        transform: translateY(-10px);

        border-color: #769FCD;

        box-shadow:
            0 25px 50px rgba(118, 159, 205, .25);
    }

    .g-card-img {
        position: relative;
        height: 210px;
        overflow: hidden;
        background: #D6E6F2;
    }

    .g-card-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .6s ease;
    }

    .g-card:hover .g-card-img img {
        transform: scale(1.08);
    }

    .g-card-overlay {
        position: absolute;
        inset: 0;

        background:
            linear-gradient(to bottom,
                transparent 40%,
                rgba(118, 159, 205, .95));

        opacity: 0;
        transition: .3s;

        display: flex;
        align-items: flex-end;
        padding: 18px;
    }

    .g-card:hover .g-card-overlay {
        opacity: 1;
    }

    .g-overlay-hint {
        color: white;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 1px;
    }

    .g-card-body {
        padding: 18px;
    }

    .g-card-title {
        font-family: 'Playfair Display', serif;
        color: #4B6584;
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .g-card-desc {
        color: #6E7E91;
        font-size: 13px;
        line-height: 1.7;
        margin-bottom: 16px;

        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;

        overflow: hidden;
    }

    .g-card-date {
        display: flex;
        align-items: center;
        gap: 8px;

        color: #769FCD;
        font-size: 12px;
        font-weight: 600;
    }

    .g-card-date svg {
        width: 13px;
        height: 13px;
        stroke: #769FCD;
        fill: none;
        stroke-width: 2;
    }

    /* =====================================
           PAGINATION
        ===================================== */

    .g-pagi {
        margin-top: 50px;
        display: flex;
        justify-content: center;
    }

    .g-pagi .pagination {
        gap: 8px;
    }

    .g-pagi .page-link {
        width: 42px;
        height: 42px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 12px;

        background: #FFFFFF;
        border: 1px solid #D6E6F2;

        color: #4B6584;
        transition: .3s;
    }

    .g-pagi .page-item.active .page-link,
    .g-pagi .page-link:hover {
        background: linear-gradient(135deg,
                #769FCD,
                #B9D7EA);

        color: white;
        border-color: transparent;
    }

    /* =====================================
           EMPTY
        ===================================== */

    .g-empty {
        text-align: center;
        padding: 80px 20px;
    }

    .g-empty-icon {
        width: 90px;
        height: 90px;

        border-radius: 24px;

        background: #D6E6F2;
        border: 1px solid #B9D7EA;

        display: flex;
        align-items: center;
        justify-content: center;

        margin: auto auto 24px;
    }

    .g-empty-icon svg {
        width: 42px;
        height: 42px;

        stroke: #769FCD;
        fill: none;
    }

    .g-empty h4 {
        color: #4B6584;
        font-size: 24px;
        margin-bottom: 10px;
    }

    .g-empty p {
        color: #6E7E91;
    }

    /* =====================================
           LIGHTBOX
        ===================================== */

    .g-lightbox {
        display: none;
        position: fixed;
        inset: 0;

        background: rgba(30, 40, 60, .85);

        z-index: 9999;

        align-items: center;
        justify-content: center;
        padding: 20px;

        backdrop-filter: blur(10px);
    }

    .g-lightbox.open {
        display: flex;
    }

    .g-lb-inner {
        max-width: 900px;
        width: 100%;
        background: white;
        border-radius: 24px;
        overflow: hidden;
        padding: 25px;
        box-shadow:
            0 25px 80px rgba(0, 0, 0, .35);
    }

    .g-lb-inner img {
        width: 100%;
        max-height: 65vh;
        object-fit: contain;
        display: block;

        border-radius: 20px;
        background: white;
    }

    .g-lb-close {
        position: absolute;
        top: -48px;
        right: 0;

        width: 40px;
        height: 40px;

        border: none;
        border-radius: 50%;

        background: white;
        color: #4B6584;

        cursor: pointer;
    }

    /* =====================================
           FOOTER
        ===================================== */

    .g-footer-strip {
        background: #D6E6F2;
        border-top: 1px solid #B9D7EA;
        text-align: center;
        padding: 30px 20px;
    }

    .g-footer-strip p {
        color: #4B6584;
        margin: 0;
        font-size: 13px;
    }

    /* =====================================
           ANIMATION
        ===================================== */

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* =====================================
           MOBILE
        ===================================== */

    @media(max-width:480px) {

        .g-grid {
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .g-card-img {
            height: 140px;
        }

        .g-card-body {
            padding: 12px;
        }

        .g-card-title {
            font-size: 14px;
        }

        .g-card-desc {
            font-size: 12px;
        }
    }

    .g-lb-caption {
        background: white;
        padding: 20px 24px;
        border-radius: 0 0 20px 20px;
    }

    .lb-title {
        font-size: 22px;
        font-weight: 700;
        color: #2E4A62;
        margin-bottom: 8px;
    }

    .lb-desc {
        font-size: 15px;
        line-height: 1.8;
        color: #5F738B;
    }

    .g-back-btn {
        margin-top: 20px;

        padding: 12px 24px;

        border: none;
        border-radius: 12px;

        background: linear-gradient(135deg,
                #6b7280,
                #374151);

        color: white;
        font-weight: 600;
        font-size: 14px;

        cursor: pointer;

        transition: .3s;
    }

    .g-back-btn:hover {
        transform: translateY(-2px);

        background: linear-gradient(135deg,
                #374151,
                #111827);
    }
</style>