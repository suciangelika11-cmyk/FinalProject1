<style>
    :root {
        --c1: #769FCD;
        --c2: #B9D7EA;
        --c3: #D6E6F2;
        --c4: #F7FBFC;

        --text: #4B6584;
        --text-soft: #6E7E91;
    }

    /* =========================
       HERO
    ========================= */

    .pg-hero {
        position: relative;
        padding: 110px 0 90px;
        text-align: center;
        overflow: hidden;

        background: linear-gradient(135deg,
                #F7FBFC 0%,
                #D6E6F2 55%,
                #B9D7EA 100%);

        border-bottom: 1px solid rgba(118, 159, 205, .15);
    }

    .pg-hero::before {
        content: '';
        position: absolute;
        inset: 0;

        background-image:
            linear-gradient(rgba(118, 159, 205, .08) 1px, transparent 1px),
            linear-gradient(90deg, rgba(118, 159, 205, .08) 1px, transparent 1px);

        background-size: 60px 60px;

        mask-image: radial-gradient(ellipse 80% 70% at 50% 50%,
                black 0%,
                transparent 100%);
    }

    .pg-hero::after {
        content: '';
        position: absolute;
        top: -120px;
        left: 50%;
        transform: translateX(-50%);
        width: 550px;
        height: 550px;
        border-radius: 50%;

        background: radial-gradient(circle,
                rgba(118, 159, 205, .22),
                transparent 70%);
    }

    .pg-hero .wrap {
        position: relative;
        z-index: 2;
    }

    .pg-hero h1 {
        font-family: 'Playfair Display', serif;
        font-size: clamp(48px, 7vw, 69px);
        font-weight: 800;
        color: #4B6584;
        margin-bottom: 14px;
    }

    .pg-hero h1 span {
        background: linear-gradient(135deg,
                #769FCD,
                #5E87B8,
                #769FCD);

        background-size: 200% auto;

        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .pg-hero p {
        font-size: 16px;
        color: #5F738B;
        max-width: 520px;
        margin: auto;
        line-height: 1.8;
    }

    /* =========================
       COUNT BADGE
    ========================= */

    .pg-count {
        display: inline-flex;
        align-items: center;
        gap: 8px;

        margin-top: 24px;

        background: rgba(255, 255, 255, .75);
        border: 1px solid #D6E6F2;

        color: #5F738B;

        padding: 10px 18px;
        border-radius: 999px;

        font-size: 13px;
        font-weight: 600;

        backdrop-filter: blur(10px);
    }

    .pg-count span {
        color: #769FCD;
        font-weight: 700;
    }

    /* =========================
       SECTION
    ========================= */

    .pg-section {
        background: #F7FBFC;
        padding: 72px 0 96px;
    }

    /* =========================
       GRID
    ========================= */

    .pg-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(310px, 1fr));
        gap: 24px;
    }

    /* =========================
       CARD
    ========================= */

    .pg-card {
        background: #FFFFFF;

        border: 1px solid #D6E6F2;
        border-radius: 20px;

        overflow: hidden;

        display: flex;
        flex-direction: column;

        transition: .4s;

        box-shadow:
            0 10px 30px rgba(118, 159, 205, .10);
    }

    .pg-card:hover {
        transform: translateY(-10px);

        border-color: #769FCD;

        box-shadow:
            0 25px 50px rgba(118, 159, 205, .22);
    }

    /* =========================
       IMAGE
    ========================= */

    .pg-card-img-wrap {
        position: relative;
        height: 220px;
        overflow: hidden;
        background: #D6E6F2;
    }

    .pg-card-img-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: .6s;
    }

    .pg-card:hover .pg-card-img-wrap img {
        transform: scale(1.08);
    }

    .pg-placeholder {
        width: 100%;
        height: 100%;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #D6E6F2;

        color: #769FCD;
        font-size: 40px;
    }

    /* =========================
       DATE BADGE
    ========================= */

    .pg-date-badge {
        position: absolute;
        top: 14px;
        left: 14px;

        background: rgba(255, 255, 255, .95);

        border: 1px solid #D6E6F2;

        color: #4B6584;

        padding: 6px 12px;

        border-radius: 10px;

        font-size: 11px;
        font-weight: 700;

        backdrop-filter: blur(10px);
    }

    /* =========================
       BODY
    ========================= */

    .pg-card-body {
        padding: 22px;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .pg-tag {
        display: inline-flex;
        align-items: center;

        width: fit-content;

        padding: 5px 14px;

        border-radius: 999px;

        background: #D6E6F2;
        color: #769FCD;

        font-size: 11px;
        font-weight: 700;

        margin-bottom: 14px;
    }

    .pg-card-title {
        font-family: 'Playfair Display', serif;
        font-size: 20px;
        font-weight: 700;

        color: #4B6584;

        margin-bottom: 12px;

        line-height: 1.45;

        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .pg-card:hover .pg-card-title {
        color: #769FCD;
    }

    .pg-card-excerpt {
        color: #6E7E91;
        font-size: 14px;
        line-height: 1.8;

        flex-grow: 1;
        margin-bottom: 20px;

        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* =========================
       BUTTON
    ========================= */

    .pg-btn-read {
        display: inline-flex;
        align-items: center;
        gap: 8px;

        text-decoration: none;

        padding: 10px 18px;

        border-radius: 12px;

        background: linear-gradient(135deg,
                #769FCD,
                #B9D7EA);

        color: white;

        font-size: 13px;
        font-weight: 700;

        transition: .3s;
    }

    .pg-btn-read:hover {
        color: white;

        transform: translateY(-2px);

        box-shadow:
            0 10px 25px rgba(118, 159, 205, .35);
    }

    /* =========================
       EMPTY
    ========================= */

    .pg-empty {
        text-align: center;
        padding: 90px 20px;
    }

    .pg-empty i {
        font-size: 48px;
        color: #769FCD;
        display: block;
        margin-bottom: 14px;
    }

    .pg-empty p {
        color: #6E7E91;
        font-size: 15px;
    }

    /* =========================
       RESPONSIVE
    ========================= */

    @media(max-width:768px) {

        .pg-hero {
            padding: 80px 0 64px;
        }

        .pg-section {
            padding: 52px 0 72px;
        }

        .pg-grid {
            grid-template-columns: 1fr;
        }
    }

    @media(min-width:481px) and (max-width:768px) {

        .pg-grid {
            grid-template-columns: 1fr 1fr;
        }
    }
</style>