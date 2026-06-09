<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&display=swap');

    *,
    *::before,
    *::after {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    :root {
        --primary: #769FCD;
        --secondary: #B9D7EA;
        --accent: #D6E6F2;
        --light: #F7FBFC;

        --bg-main: #F7FBFC;
        --bg-soft: #D6E6F2;

        --text-dark: #4B6584;
        --text: #5F738B;
        --text-light: #769FCD;

        --card-bg: rgba(255, 255, 255, .75);
        --card-border: rgba(118, 159, 205, .18);

        --green: #22c55e;
        --orange: #f59e0b;
        --purple: #a855f7;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        background: linear-gradient(180deg, #769FCD 0%, #6a93c3 50%, #5d87b7 100%);
        font-family: 'DM Sans', sans-serif;
        color: var(--text);
        -webkit-font-smoothing: antialiased;
    }

    /* ── ANIMATIONS ── */
    @keyframes heroReveal {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes shimmer {
        0% {
            background-position: -200% center;
        }

        100% {
            background-position: 200% center;
        }
    }

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(28px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes orbFloat {

        0%,
        100% {
            transform: translateY(0) scale(1);
        }

        50% {
            transform: translateY(-18px) scale(1.04);
        }
    }

    @keyframes pulse-ring {
        0% {
            box-shadow: 0 0 0 0 rgba(201, 168, 76, 0.25);
        }

        70% {
            box-shadow: 0 0 0 14px rgba(201, 168, 76, 0);
        }

        100% {
            box-shadow: 0 0 0 0 rgba(201, 168, 76, 0);
        }
    }

    @keyframes lineDraw {
        from {
            width: 0;
        }

        to {
            width: 60px;
        }
    }

    @keyframes slideLeft {
        from {
            opacity: 0;
            transform: translateX(-36px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideRight {
        from {
            opacity: 0;
            transform: translateX(36px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* ── HERO ── */
    .hero {
        position: relative;
        min-height: 380px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background: radial-gradient(circle at top, rgba(214, 230, 242, .35), transparent 55%),
            linear-gradient(135deg, #F7FBFC 0%, #D6E6F2 55%, #B9D7EA 100%);
        text-align: center;
        padding: 90px 24px 70px;
    }

    .hero-bg-grid {
        position: absolute;
        inset: 0;
        background-image:
            linear-gradient(rgba(118, 159, 205, .10) 1px, transparent 1px),
            linear-gradient(90deg, rgba(118, 159, 205, .10) 1px, transparent 1px);
        background-size: 60px 60px;
        mask-image: radial-gradient(ellipse 80% 60% at 50% 50%, black 0%, transparent 100%);
        pointer-events: none;
    }

    .hero-orb {
        position: absolute;
        border-radius: 50%;
        pointer-events: none;
        filter: blur(60px);
        animation: orbFloat 7s ease-in-out infinite;
    }

    .hero-orb-1 {
        width: 460px;
        height: 460px;
        background: radial-gradient(circle, rgba(118, 159, 205, .35), transparent 70%);
        top: -100px;
        left: -80px;
        animation-delay: 0s;
    }

    .hero-orb-2 {
        width: 360px;
        height: 360px;
        background: radial-gradient(circle, rgba(185, 215, 234, .55), transparent 70%);
        bottom: -60px;
        right: -40px;
        animation-delay: 3.5s;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(255, 255, 255, .55);
        border: 1px solid rgba(118, 159, 205, .18);
        color: #769FCD;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        padding: 8px 20px;
        border-radius: 100px;
        margin-bottom: 24px;
        animation: heroReveal 0.8s ease 0.1s both;
        position: relative;
        z-index: 2;
    }

    .hero-badge::before {
        content: '';
        width: 6px;
        height: 6px;
        background: #769FCD;
        border-radius: 50%;
        animation: pulse-ring 2.5s ease-out infinite;
    }

    .hero-title {
        font-family: 'Playfair Display', Georgia, serif;
        font-size: clamp(50px, 7vw, 74px);
        font-weight: 800;
        color: #4B6584;
        line-height: 1.1;
        position: relative;
        z-index: 2;
        animation: heroReveal 0.9s ease 0.3s both;
    }

    .hero-title span {
        background: linear-gradient(135deg, #769FCD, #5E87B8, #769FCD);
        background-size: 200% auto;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: shimmer 3.5s linear infinite;
    }

    .hero-sub {
        font-size: 16px;
        font-weight: 300;
        color: #5F738B;
        max-width: 480px;
        margin: 18px auto 0;
        line-height: 1.7;
        position: relative;
        z-index: 2;
        animation: heroReveal 0.9s ease 0.5s both;
    }

    .hero-divider {
        width: 1px;
        height: 55px;
        background: linear-gradient(to bottom, transparent, #769FCD, transparent);
        margin: 32px auto 0;
        position: relative;
        z-index: 2;
        animation: heroReveal 1s ease 0.7s both;
    }

    /* ── VERSE BANNER ── */
    .verse-section {
        padding: 50px 20px;
        position: relative;
    }

    .verse-card {
        max-width: 900px;
        margin: 0 auto;
        background: rgba(255, 255, 255, .75);
        border: 1px solid rgba(118, 159, 205, .15);
        backdrop-filter: blur(10px);
        border-radius: 28px;
        padding: 35px 45px;
        text-align: center;
        position: relative;
        overflow: hidden;
        animation: fadeUp 0.8s ease 0.2s both;
    }

    .verse-card::before {
        content: '\201C';
        position: absolute;
        top: -20px;
        left: 20px;
        font-family: 'Playfair Display', serif;
        font-size: 140px;
        color: rgba(118, 159, 205, .08);
        line-height: 1;
        pointer-events: none;
    }

    .verse-icon {
        width: 48px;
        height: 48px;
        background: rgba(118, 159, 205, .10);
        border: 1px solid rgba(118, 159, 205, .15);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
    }

    .verse-icon svg {
        width: 22px;
        height: 22px;
        stroke: #769FCD;
        fill: none;
        stroke-width: 1.8;
        stroke-linecap: round;
    }

    .verse-text {
        font-size: 15.5px;
        font-style: italic;
        font-weight: 300;
        color: #5F738B;
        line-height: 1.8;
        margin-bottom: 14px;
    }

    .verse-ref {
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        color: #769FCD;
    }

    /* ── MAIN SECTION ── */
    .contact-section {
        padding: 70px 0 100px;
        background: #F7FBFC;
    }

    .contact-section::before {
        content: '';
        display: block;
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(118, 159, 205, .3), transparent);
        margin-bottom: 70px;
    }

    .kontak-container {
        max-width: 1160px;
        margin: 0 auto;
        padding: 0 28px;
    }

    .section-label {
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: #769FCD;
        margin-bottom: 10px;
        display: block;
    }

    .section-title {
        font-family: 'Playfair Display', Georgia, serif;
        font-size: clamp(26px, 3.5vw, 36px);
        font-weight: 700;
        color: #4B6584;
        line-height: 1.2;
        margin-bottom: 10px;
    }

    .section-rule {
        width: 50px;
        height: 2px;
        background: linear-gradient(90deg, #769FCD, #B9D7EA);
        border-radius: 2px;
        animation: lineDraw 0.8s ease 0.3s both;
    }

    /* ── CONTACT GRID ── */
    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 36px;
        align-items: stretch;
    }

    @media (max-width: 768px) {
        .contact-grid {
            grid-template-columns: 1fr;
            gap: 28px;
        }
    }

    /* ── INFO COLUMN ── */
    .info-col {
        animation: slideLeft 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) 0.15s both;
        background: rgba(255, 255, 255, .85);
        border: 1px solid rgba(118, 159, 205, .15);
        backdrop-filter: blur(14px);
        border-radius: 20px;
        padding: 32px;
        height: 100%;
    }

    .info-header {
        margin-bottom: 28px;
    }

    .info-card {
        background: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 16px;
        padding: 18px 20px;
        display: flex;
        align-items: flex-start;
        gap: 16px;
        margin-bottom: 14px;
        transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1),
            box-shadow 0.35s ease,
            border-color 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .info-card::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 3px;
        border-radius: 3px 0 0 3px;
        transition: opacity 0.3s ease;
        opacity: 0;
    }

    .info-card.ic-blue::before {
        background: #3b82f6;
    }

    .info-card.ic-green::before {
        background: #22c55e;
        ;
    }

    .info-card.ic-orange::before {
        background: var(--orange);
    }

    .info-card.ic-purple::before {
        background: #a855f7;
        ;
    }

    .info-card:hover {
        transform: translateX(6px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.3), 0 0 0 1px rgba(201, 168, 76, 0.2);
        border-color: rgba(201, 168, 76, 0.3);
    }

    .info-card:hover::before {
        opacity: 1;
    }

    .info-icon {
        width: 42px;
        height: 42px;
        border-radius: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .info-icon svg {
        width: 18px;
        height: 18px;
        fill: none;
        stroke-width: 1.8;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    .ic-blue .info-icon {
        background: rgba(59, 130, 246, .12);
    }

    .ic-blue .info-icon svg {
        stroke: #3b82f6;
    }

    .ic-green .info-icon {
        background: rgba(34, 197, 94, .12);
    }

    .ic-green .info-icon svg {
        stroke: #22c55e;
    }

    .ic-orange .info-icon {
        background: rgba(245, 154, 69, 0.12);
    }

    .ic-orange .info-icon svg {
        stroke: var(--orange);
    }

    .ic-purple .info-icon {
        background: rgba(168, 85, 247, .12);
    }

    .ic-purple .info-icon svg {
        stroke: #a855f7;
    }

    .info-label {
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 5px;
    }

    .ic-blue .info-label {
        color: #60a5fa;
    }

    .ic-green .info-label {
        color: #4ade80;
    }

    .ic-orange .info-label {
        color: var(--orange);
    }

    .ic-purple .info-label {
        color: #c084fc;
    }

    .info-value {
        font-size: 14.5px;
        font-weight: 400;
        color: var(--silver-lt);
        line-height: 1.65;
    }

    /* ── FORM COLUMN ── */
    .form-col {
        animation: slideRight 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) 0.25s both;
        height: 100%;
    }

    .form-card {
        background: rgba(255, 255, 255, .85);
        border: 1px solid rgba(118, 159, 205, .15);
        backdrop-filter: blur(14px);
        border-radius: 20px;
        padding: 36px;
        position: relative;
        overflow: hidden;
        height: 100%;
    }

    .form-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 10%;
        right: 10%;
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--gold), transparent);
    }

    .info-card:last-child {
        margin-bottom: 0;
    }

    .form-title {
        font-family: 'Playfair Display', Georgia, serif;
        font-size: 22px;
        font-weight: 700;
        color: #4B6584;
        margin-bottom: 6px;
    }

    .form-subtitle {
        font-size: 13.5px;
        font-weight: 300;
        color: #5F738B;
        margin-bottom: 28px;
        line-height: 1.6;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #769FCD;
        margin-bottom: 10px;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        background: #F7FBFC;
        border: 1px solid #D6E6F2;
        border-radius: 12px;
        padding: 13px 16px;
        font-family: 'DM Sans', sans-serif;
        font-size: 14.5px;
        font-weight: 300;
        color: #4B6584;
        outline: none;
        transition: border-color 0.3s ease, background 0.3s ease, box-shadow 0.3s ease;
        resize: none;
        -webkit-appearance: none;
    }

    .form-group input::placeholder,
    .form-group textarea::placeholder {
        color: rgba(168, 184, 204, 0.4);
    }

    .form-group input:focus,
    .form-group textarea:focus {
        border-color: #769FCD;
        box-shadow: 0 0 0 4px rgba(118, 159, 205, .15);
    }

    .form-group textarea {
        rows: 4;
        min-height: 120px;
    }

    .form-group select {
        width: 100%;
        height: 58px;

        padding: 0 18px;

        background: #f7fbfc;
        border: 1px solid #d6e6f2;
        border-radius: 16px;

        color: #4b6584;
        font-size: 15px;
        font-family: inherit;

        outline: none;
        cursor: pointer;

        transition: all .3s ease;

        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;

        background-image:
            url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill='none' stroke='%23769FCD' stroke-width='2' viewBox='0 0 24 24'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 16px center;
    }

    .form-group select:focus {
        border-color: #769FCD;
        box-shadow: 0 0 0 4px rgba(118, 159, 205, .15);
    }

    .btn-wa {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 15px 24px;
        border-radius: 14px;
        border: none;
        cursor: pointer;
        background: linear-gradient(135deg, #769FCD, #5E87B8);
        color: white;
        font-family: 'DM Sans', sans-serif;
        font-size: 15px;
        font-weight: 700;
        letter-spacing: 0.3px;
        transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1),
            box-shadow 0.35s ease;
        position: relative;
        overflow: hidden;
    }

    .btn-wa::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.12), transparent);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .btn-wa:hover {
        transform: translateY(-3px);
        box-shadow: 0 18px 40px rgba(118, 159, 205, .35);
    }

    .btn-wa:hover::before {
        opacity: 1;
    }

    .btn-wa:active {
        transform: translateY(0) scale(0.98);
    }

    .btn-wa svg {
        width: 20px;
        height: 20px;
        fill: white;
        flex-shrink: 0;
    }

    /* ── FOOTER STRIP ── */
    .footer-strip {
        background: #D6E6F2;
        border-top: 1px solid #B9D7EA;
        padding: 28px;
        text-align: center;
    }

    .footer-strip p {
        font-size: 13px;
        color: #4B6584;
    }

    /* ── MAPS ── */
    .map-section {
        margin-top: 40px;
        width: 100%;
        animation: fadeUp 0.8s ease 0.35s both;
    }

    .map-card {
        background: rgba(255, 255, 255, .85);
        border: 1px solid rgba(118, 159, 205, .15);
        backdrop-filter: blur(14px);
        border-radius: 20px;
        padding: 16px;
        overflow: hidden;
        width: 100%;
    }

    .map-card iframe {
        width: 100%;
        height: 420px;
        border: 0;
        border-radius: 14px;
        display: block;
    }

    /* ── RESPONSIVE ── */
    @media (max-width: 600px) {
        .form-card {
            padding: 26px 22px;
        }

        .verse-card {
            padding: 28px 24px;
        }
    }
</style>