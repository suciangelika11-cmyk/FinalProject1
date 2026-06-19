<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Outfit:wght@300;400;500;600&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

<style>
    :root {
        /* Palet Warna Baru */
        --primary: #769FCD;
        --secondary: #B9D7EA;
        --tertiary: #D6E6F2;
        --light: #F7FBFC;

        /* Background */
        --bg-dark: #FFFFFF;
        --bg-light: #F9FBFD;
        --bg-card: #FFFFFF;

        /* Text */
        --text-primary: #2C3E50;
        --text-secondary: #5A6B7D;
        --text-muted: #8FA3B8;

        /* Border & Accent */
        --border: #E8EEF5;
        --border-strong: #D6E6F2;
        --accent: #769FCD;

        /* Radius */
        --radius: 16px;
        --radius-sm: 8px;
    }

    *,
    *::before,
    *::after {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    html,
    body {
        overflow-x: hidden;
        background: var(--bg-light);
    }

    body {
        font-family: 'Outfit', sans-serif;
        color: var(--text-primary);
        line-height: 1.6;
    }

    /* ================= WRAPPER CONTAINER ================= */
    .jadwal-container {
        width: min(95%, 1400px);
        margin: 0 auto;
        padding: 0;
    }

    /* ================= HERO SECTION ================= */
    .hero {
        position: relative;
        min-height: 320px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        overflow: hidden;
        padding: 80px 24px;
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        margin-bottom: 60px;
        border-radius: 0 0 30px 30px;
    }

    .hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(ellipse 80% 100% at 50% 0%,
                rgba(255, 255, 255, 0.2),
                transparent 70%);
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 720px;
        width: 100%;
    }

    .hero-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: rgba(255, 255, 255, 0.25);
        border: 1px solid rgba(255, 255, 255, 0.4);
        border-radius: 50px;
        padding: 10px 24px;
        font-size: 11px;
        font-weight: 600;
        color: #FFFFFF;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        margin-bottom: 28px;
        backdrop-filter: blur(10px);
    }

    .hero h1 {
        font-family: 'Libre Baskerville', serif;
        font-size: clamp(42px, 6vw, 72px);
        line-height: 1.2;
        margin-bottom: 20px;
        color: #FFFFFF;
        font-weight: 700;
    }

    .hero h1 em {
        color: rgba(255, 255, 255, 0.95);
        font-style: italic;
        font-weight: 400;
    }

    .hero-sub {
        color: rgba(255, 255, 255, 0.9);
        font-size: 16px;
        line-height: 1.8;
        font-weight: 300;
        max-width: 620px;
        margin: auto;
    }

    /* ================= SECTION HEADERS ================= */
    .weekly,
    .special {
        padding: 60px 0;
    }

    .section-header {
        margin-bottom: 45px;
    }

    .section-label {
        color: var(--accent);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        margin-bottom: 12px;
        display: block;
    }

    .section-title {
        font-family: 'Libre Baskerville', serif;
        font-size: 36px;
        color: var(--text-primary);
        margin-bottom: 16px;
        font-weight: 700;
    }

    .section-rule {
        width: 50px;
        height: 4px;
        background: var(--accent);
        border-radius: 2px;
    }

    /* ================= DAY DIVIDER ================= */
    .day-divider {
        display: flex;
        align-items: center;
        gap: 16px;
        margin: 50px 0 28px;
    }

    .day-divider::after {
        content: '';
        flex: 1;
        height: 2px;
        background: linear-gradient(90deg, var(--border-strong), transparent);
    }

    .day-name {
        font-family: 'Libre Baskerville', serif;
        color: #4B6584;
        font-weight: 700;
        font-size: 22px;
        letter-spacing: 0.05em;
        text-transform: capitalize;
    }

    /* ================= GRID & CARDS ================= */
    .schedule-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(400px, 1fr));
        justify-content: center;
        gap: 30px;
        margin-bottom: 40px;
    }

    .schedule-card,
    .special-card {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 30px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 2px 8px rgba(118, 159, 205, 0.08);
        position: relative;
        overflow: hidden;
    }

    .schedule-card::after {
        content: '';
        position: absolute;
        width: 180px;
        height: 180px;
        border-radius: 50%;
        background: rgba(118, 159, 205, .04);
        top: -90px;
        right: -90px;
        z-index: 0;
    }

    .schedule-card:hover,
    .special-card:hover {
        border-color: var(--accent);
        transform: translateY(-6px);
        box-shadow: 0 12px 28px rgba(118, 159, 205, 0.15);
    }

    .schedule-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg,
                #769FCD,
                #B9D7EA);
    }

    .card-icon {
        width: 72px;
        height: 72px;
        background: linear-gradient(135deg, var(--tertiary), var(--secondary));
        color: var(--accent);
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        margin-bottom: 20px;
        flex-shrink: 0;
        box-shadow: 0 10px 25px rgba(118, 159, 205, .15);
    }

    .card-title {
        font-family: 'Libre Baskerville', serif;
        font-size: 22px;
        line-height: 1.4;
        color: var(--text-primary);
        margin-bottom: 12px;
        font-weight: 700;
    }

    .card-meta {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 13px;
        color: var(--text-muted);
        margin-bottom: 10px;
    }

    .card-meta i {
        color: var(--accent);
        width: 16px;
        text-align: center;
        flex-shrink: 0;
    }

    .card-desc {
        font-size: 14px;
        color: var(--text-secondary);
        line-height: 1.6;
        margin-top: 10px;
        margin-bottom: 0px;
    }

    .btn-detail {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--accent);
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        margin-top: auto;
        transition: all 0.2s ease;
        width: fit-content;
    }

    .btn-detail:hover {
        color: var(--primary);
        gap: 12px;
    }

    .btn-detail i {
        font-size: 10px;
        transition: transform 0.2s ease;
    }

    .btn-detail:hover i {
        transform: translateX(3px);
    }

    .badge-day {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--tertiary);
        border: 1px solid var(--border-strong);
        border-radius: 50px;
        padding: 8px 16px;
        font-size: 12px;
        color: var(--accent);
        font-weight: 600;
        width: fit-content;
        margin-top: 16px;
    }

    /* ================= EMPTY STATE ================= */
    .empty-state {
        text-align: center;
        padding: 60px 40px;
        background: linear-gradient(135deg, var(--light), var(--tertiary));
        border: 2px dashed var(--border-strong);
        border-radius: var(--radius);
        color: var(--text-muted);
        grid-column: 1 / -1;
    }

    .empty-icon {
        font-size: 48px;
        color: var(--accent);
        margin-bottom: 16px;
    }

    .empty-state p {
        font-size: 15px;
        margin: 0;
    }

    /* ================= RESPONSIVE ================= */
    @media(max-width: 768px) {
        .hero {
            min-height: 380px;
            padding: 80px 20px;
            margin-bottom: 40px;
        }

        .hero h1 {
            font-size: clamp(32px, 10vw, 48px);
        }

        .jadwal-container {
            width: 90%;
        }

        .weekly,
        .special {
            padding: 40px 0;
        }

        .section-title {
            font-size: 28px;
        }

        .section-header {
            margin-bottom: 32px;
        }

        .schedule-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .day-divider {
            margin: 35px 0 24px;
        }

        .schedule-card,
        .special-card {
            padding: 24px;
        }
    }

    @media(max-width: 480px) {
        .hero {
            padding: 60px 16px;
        }

        .hero h1 {
            font-size: clamp(28px, 8vw, 36px);
        }

        .hero-sub {
            font-size: 14px;
        }

        .section-title {
            font-size: 24px;
        }

        .card-title {
            font-size: 18px;
        }

        .day-name {
            font-size: 16px;
        }
    }

    @media(max-width:992px) {
        .schedule-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
</style>