<link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=DM+Sans:wght@300;400;500;600&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
    :root {
        --c1: #769FCD;
        --c2: #B9D7EA;
        --c3: #D6E6F2;
        --c4: #F7FBFC;

        --primary: #769FCD;
        --secondary: #B9D7EA;
        --accent: #D6E6F2;
        --light: #F7FBFC;

        --text: #4E719A;
        --text-light: #6485AC;

        --border: rgba(118, 159, 205, .18);

        --r-pill: 999px;
        --r-card: 22px;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: #F7FBFC;
        color: var(--text);
        font-family: 'DM Sans', sans-serif;
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
        font-size: clamp(45px, 7vw, 67px);
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
                               SECTION
                            ========================= */
    .kh-section {
        background: #F7FBFC;
        padding: 20px 0 100px;
    }

    .kh-container {
        max-width: 1180px;
        margin: auto;
        padding: 0 24px;
    }

    .kh-head {
        text-align: center;
        margin-bottom: 50px;
    }

    .kh-label {
        display: block;
        color: #769FCD;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .25em;
        text-transform: uppercase;
        margin-bottom: 14px;
    }

    .kh-title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(28px, 4vw, 42px);
        margin-bottom: 18px;
        color: #4E719A;
    }

    .kh-line {
        width: 55px;
        height: 3px;
        border-radius: 999px;
        margin: auto;
        background: linear-gradient(90deg,
                #769FCD,
                #B9D7EA);
    }

    /* =========================
                               SEARCH
                    ========================= */
    .kh-search-wrap {
        max-width: 500px;
        margin: 0 auto 55px;
        position: relative;
    }

    .kh-search-icon {
        position: absolute;
        left: 18px;
        top: 50%;
        transform: translateY(-50%);
        color: #769FCD;
    }

    .kh-search {
        width: 100%;
        padding: 15px 20px 15px 48px;
        border-radius: 999px;
        border: 1px solid rgba(118, 159, 205, .18);
        background: white;
        color: var(--text);
        outline: none;
        transition: .3s;
    }

    .kh-search:focus {
        border-color: #769FCD;
        box-shadow: 0 0 0 4px rgba(118, 159, 205, .15);
    }

    .kh-search::placeholder {
        color: #999;
    }

    /* =========================
                               CARD
                            ========================= */
    .kh-card {
        background: rgba(247, 251, 252, .85);
        border: 1px solid #e3ebf5;
        border-radius: 24px;
        overflow: hidden;
        transition: .35s;
        display: flex;
        flex-direction: column;
        position: relative;
        height: 100%;
    }

    .kh-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: linear-gradient(90deg,
                #769FCD,
                #B9D7EA);
        opacity: 0;
        transition: .3s;
    }

    .kh-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(118, 159, 205, .20);
    }

    .kh-card:hover::before {
        opacity: 1;
    }

    .kh-thumb {
        height: 260px;
        overflow: hidden;
    }

    .kh-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: .5s;
    }

    .kh-card:hover .kh-thumb img {
        transform: scale(1.05);
    }

    .kh-body {
        padding: 24px;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .kh-date {
        color: #769FCD;
        font-size: 11px;
        letter-spacing: .12em;
        text-transform: uppercase;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .kh-card-title {
        font-family: 'Playfair Display', serif;
        font-size: 32px;
        line-height: 1.5;
        margin-bottom: 12px;
        color: #4E719A;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .kh-desc {
        display: -webkit-box;
        font-size: 14px;
        line-height: 1.8;
        color: #6485AC;
        margin-bottom: 22px;
        flex: 1;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* =========================
                               BUTTON
                            ========================= */
    .kh-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 10px 18px;
        border-radius: 999px;
        background: #D6E6F2;
        border: 1px solid rgba(118, 159, 205, .18);
        color: #5D87B7;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        transition: .3s;
    }

    .kh-btn:hover {
        background: #769FCD;
        color: white;
    }

    .kh-play {
        width: 22px;
        height: 22px;
        border-radius: 50%;
        background: #769FCD;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 9px;
    }

    /* =========================
                               EMPTY
                            ========================= */
    .kh-empty h4 {
        color: var(--text);
    }

    .kh-empty p {
        color: var(--text-light);
    }

    .kh-empty-icon {
        border: 1px solid var(--border);
        color: var(--gold);
    }

    /* =========================
                               PAGINATION
                            ========================= */
    .pagination .page-link {
        background: white;
        border: 1px solid rgba(118, 159, 205, .18) !important;
        color: #6485AC;
        margin: 0 4px;
        border-radius: 999px !important;
    }

    .pagination .page-item.active .page-link {
        background: #769FCD !important;
        color: white;
        border-color: #769FCD !important;
    }

    .pagination .page-link:hover {
        background: #D6E6F2 !important;
    }

    /* =========================
                               MOBILE
                            ========================= */
    @media(max-width:768px) {

        .kh-hero {
            padding: 100px 0 110px;
        }

        .kh-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .kh-hero h1 {
            font-size: 44px;
        }
    }

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
</style>