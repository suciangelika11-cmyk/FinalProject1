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
        --light: #B9D7EA;
        --lighter: #D6E6F2;
        --lightest: #F7FBFC;

        /* Warna yang masih digunakan */
        --text-primary: #769FCD;
        --text-light: #B9D7EA;
        --text-muted: rgba(118, 159, 205, 0.65);

        --bg-dark: #F7FBFC;
        --bg-light: #D6E6F2;
        --bg-card: #F7FBFC;
        --bg-surface: rgba(214, 230, 242, 0.3);

        --border: rgba(118, 159, 205, 0.15);
        --border-strong: rgba(118, 159, 205, 0.3);

        --radius: 20px;
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
    }

    body {
        font-family: 'Outfit', sans-serif;
        background: var(--bg-dark);
        color: var(--text-primary);
    }

    /* ================= HERO ================= */
    .hero {
        position: relative;
        min-height: 420px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        overflow: hidden;
        padding: 120px 24px 110px;
        background: linear-gradient(135deg, var(--lighter) 0%, var(--bg-dark) 100%);
    }

    .hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background:
            radial-gradient(ellipse 70% 100% at 50% 0%,
                rgba(118, 159, 205, 0.1),
                transparent 65%);
    }

    .hero::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 80px;
        background: var(--bg-dark);
        clip-path: ellipse(55% 100% at 50% 100%);
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
        background: rgba(118, 159, 205, 0.12);
        border: 1.5px solid var(--border-strong);
        border-radius: 40px;
        padding: 10px 22px;
        font-size: 11px;
        font-weight: 500;
        color: var(--text-primary);
        letter-spacing: .20em;
        text-transform: uppercase;
        margin-bottom: 24px;
        transition: all 0.3s ease;
    }

    .hero-eyebrow:hover {
        background: rgba(118, 159, 205, 0.18);
        border-color: var(--text-primary);
    }

    .hero h1 {
        font-family: 'Libre Baskerville', serif;
        font-size: clamp(45px, 7vw, 75px);
        line-height: 1.1;
        margin-bottom: 18px;
        color: var(--text-primary);
        font-weight: 700;
    }

    .hero h1 em {
        color: var(--light);
        font-style: italic;
        font-weight: 400;
    }

    .hero-sub {
        color: var(--text-muted);
        font-size: 15px;
        line-height: 1.9;
        font-weight: 300;
        max-width: 620px;
        margin: auto;
    }

    /* ================= PAGE ================= */
    .page-wrap {
        width: min(92%, 1180px);
        margin: auto;
        padding: 70px 0 100px;
    }

    /* ================= SECTION ================= */
    .section-eyebrow {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 50px;
    }

    .section-eyebrow::before,
    .section-eyebrow::after {
        content: '';
        flex: 1;
        height: 1.5px;
        background: var(--border-strong);
    }

    .section-eyebrow span {
        color: var(--text-primary);
        font-size: 11px;
        font-weight: 600;
        letter-spacing: .18em;
        text-transform: uppercase;
        white-space: nowrap;
    }

    /* ================= CARD ================= */
    .kegiatan-card {
        display: grid;
        grid-template-columns: 160px 1fr 340px;
        background: var(--bg-card);
        border: 1.5px solid var(--border);
        border-radius: var(--radius);
        overflow: hidden;
        margin-bottom: 28px;
        transition: all 0.35s ease;
        box-shadow: 0 2px 8px rgba(118, 159, 205, 0.08);
    }

    .kegiatan-card:hover {
        border-color: var(--border-strong);
        transform: translateY(-6px);
        box-shadow: 0 16px 32px rgba(118, 159, 205, 0.15);
    }

    /* ================= DATE ================= */
    .card-date {
        background: linear-gradient(135deg, var(--lighter) 0%, var(--bg-light) 100%);
        border-right: 1.5px solid var(--border);

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

        text-align: center;
        padding: 40px 20px;
    }

    .date-weekday {
        font-size: 10px;
        font-weight: 600;
        letter-spacing: .18em;
        text-transform: uppercase;
        color: var(--text-primary);
        margin-bottom: 10px;
    }

    .date-num {
        font-family: 'Libre Baskerville', serif;
        font-size: 56px;
        line-height: 1;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 8px;
    }

    .date-month {
        font-size: 11px;
        letter-spacing: .15em;
        text-transform: uppercase;
        color: var(--text-muted);
        font-weight: 500;
    }

    /* ================= INFO ================= */
    .card-info {
        padding: 38px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .card-tag {
        font-size: 10px;
        font-weight: 600;
        letter-spacing: .18em;
        text-transform: uppercase;
        color: var(--text-primary);
        margin-bottom: 12px;
        opacity: 0.8;
    }

    .card-preacher {
        font-family: 'Libre Baskerville', serif;
        font-size: 32px;
        line-height: 1.2;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 18px;
        word-break: break-word;
    }

    .card-divider {
        width: 45px;
        height: 2.5px;
        background: var(--primary);
        opacity: 0.5;
        margin-bottom: 18px;
        border-radius: 2px;
    }

    .card-tema {
        font-family: 'Libre Baskerville', serif;
        font-style: italic;
        font-size: 15px;
        color: var(--text-muted);
        line-height: 1.8;
        margin-bottom: 22px;
        font-weight: 400;
    }

    .card-verse {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        background: rgba(118, 159, 205, 0.1);
        border: 1px solid var(--border-strong);
        border-radius: 40px;
        padding: 10px 18px;
        font-size: 12px;
        color: var(--text-primary);
        width: fit-content;
        flex-wrap: wrap;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .card-verse:hover {
        background: rgba(118, 159, 205, 0.15);
        border-color: var(--primary);
    }

    /* ================= TEAM ================= */
    .card-team {
        background: var(--bg-surface);
        border-left: 1.5px solid var(--border);

        padding: 28px 24px;

        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .team-heading {
        font-size: 10px;
        font-weight: 600;
        letter-spacing: .18em;
        text-transform: uppercase;
        color: var(--text-primary);
        margin-bottom: 4px;
    }

    /* ================= SUB TEAM ================= */
    .sub-team {
        background: rgba(255, 255, 255, 0.5);
        border: 1px solid rgba(118, 159, 205, 0.2);
        border-radius: 14px;
        padding: 16px;
        transition: all 0.3s ease;
    }

    .sub-team:hover {
        background: rgba(255, 255, 255, 0.7);
        border-color: rgba(118, 159, 205, 0.35);
    }

    .sub-team-head {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 12px;
    }

    .sub-team-icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        flex-shrink: 0;
        font-weight: 600;
    }

    .sub-team-icon.worship {
        background: rgba(118, 159, 205, 0.18);
        color: var(--text-primary);
    }

    .sub-team-icon.media {
        background: rgba(185, 215, 234, 0.18);
        color: #5B8AC5;
    }

    .sub-team-icon.liturgi {
        background: rgba(214, 230, 242, 0.3);
        color: #769FCD;
    }

    .sub-team-name {
        font-size: 13px;
        font-weight: 600;
        color: var(--text-primary);
    }

    .sub-team-desc {
        font-size: 11px;
        color: var(--text-muted);
        font-weight: 400;
    }

    .member-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;

        padding: 10px 0;
        border-top: 1px solid rgba(118, 159, 205, 0.12);
    }

    .member-row:first-of-type {
        border-top: none;
        padding-top: 0;
    }

    .member-name {
        font-size: 12px;
        color: var(--text-primary);
        word-break: break-word;
        font-weight: 500;
    }

    .member-badge {
        font-size: 10px;
        font-weight: 600;
        border-radius: 40px;
        padding: 5px 14px;
        white-space: nowrap;
        text-transform: capitalize;
        letter-spacing: .05em;
    }

    .member-badge.worship {
        background: rgba(118, 159, 205, 0.15);
        color: var(--text-primary);
    }

    .member-badge.media {
        background: rgba(185, 215, 234, 0.15);
        color: #5B8AC5;
    }

    .member-badge.liturgi {
        background: rgba(214, 230, 242, 0.25);
        color: #769FCD;
    }

    /* ================= FOOTER ================= */
    .page-footer {
        margin-top: 80px;
        border-top: 1.5px solid var(--border);
        padding-top: 45px;
        text-align: center;
    }

    .footer-icon {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        border: 2px solid var(--border-strong);

        display: flex;
        align-items: center;
        justify-content: center;

        margin: 0 auto 18px;

        font-size: 22px;
        color: var(--text-primary);
        transition: all 0.3s ease;
    }

    .footer-icon:hover {
        border-color: var(--text-primary);
        transform: scale(1.1);
    }

    .footer-quote {
        font-family: 'Libre Baskerville', serif;
        font-style: italic;
        font-size: 17px;
        color: var(--text-muted);
        line-height: 1.8;
        font-weight: 400;
    }

    /* ================= RESPONSIVE ================= */

    @media(max-width:1200px) {
        .kegiatan-card {
            grid-template-columns: 140px 1fr 300px;
        }

        .card-preacher {
            font-size: 28px;
        }

        .card-info {
            padding: 32px;
        }
    }

    @media(max-width:992px) {
        .kegiatan-card {
            grid-template-columns: 1fr;
        }

        .card-date {
            border-right: none;
            border-bottom: 1.5px solid var(--border);

            flex-direction: row;
            justify-content: center;
            gap: 20px;

            padding: 28px;
        }

        .date-num {
            font-size: 48px;
            margin-bottom: 0;
        }

        .card-team {
            border-left: none;
            border-top: 1.5px solid var(--border);
        }

        .card-info {
            padding: 32px;
        }
    }

    @media(max-width:768px) {
        .hero {
            min-height: 360px;
            padding: 100px 20px 90px;
        }

        .hero h1 {
            font-size: clamp(30px, 10vw, 48px);
        }

        .hero-sub {
            font-size: 14px;
            line-height: 1.8;
        }

        .page-wrap {
            width: 94%;
            padding: 55px 0 80px;
        }

        .section-eyebrow {
            margin-bottom: 36px;
        }

        .card-info {
            padding: 24px 20px;
        }

        .card-preacher {
            font-size: 24px;
        }

        .card-tema {
            font-size: 14px;
            line-height: 1.7;
        }

        .card-team {
            padding: 20px;
        }

        .sub-team {
            padding: 14px;
        }
    }

    @media(max-width:576px) {
        .hero {
            min-height: 320px;
            padding: 90px 20px 80px;
        }

        .hero-eyebrow {
            font-size: 9px;
            padding: 8px 14px;
            letter-spacing: .16em;
        }

        .hero-sub {
            font-size: 13px;
        }

        .card-date {
            flex-direction: column;
            gap: 8px;
            padding: 24px 18px;
        }

        .date-weekday {
            font-size: 9px;
        }

        .date-num {
            font-size: 42px;
        }

        .date-month {
            font-size: 10px;
        }

        .card-info {
            padding: 20px;
        }

        .card-preacher {
            font-size: 20px;
        }

        .card-tema {
            font-size: 13px;
        }

        .card-team {
            padding: 16px;
            gap: 12px;
        }

        .sub-team {
            padding: 12px;
        }

        .sub-team-head {
            align-items: flex-start;
        }

        .member-row {
            flex-direction: column;
            align-items: flex-start;
        }

        .member-badge {
            margin-top: 6px;
            padding: 4px 12px;
            font-size: 9px;
        }

        .card-verse {
            width: 100%;
            justify-content: center;
            text-align: center;
        }

        .footer-quote {
            font-size: 15px;
        }
    }
</style>