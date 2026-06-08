<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

<style>
    :root {
        --primary: #1e40af;
        --primary-light: #3b82f6;
        --primary-dark: #1e3a8a;
        --accent: #f59e0b;
        --accent-light: #fbbf24;

        --background: #ffffff;
        --surface-light: #f9fafb;
        --surface-mid: #f3f4f6;
        --surface-dark: #e5e7eb;

        --text-primary: #111827;
        --text-secondary: #6b7280;
        --text-muted: #9ca3af;

        --border-light: #e5e7eb;
        --border-mid: #d1d5db;

        --success: #10b981;
        --warning: #f59e0b;
        --error: #ef4444;

        --shadow-sm: 0 1px 2px rgba(0, 0, 0, 0.05);
        --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.07);
        --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.1);
        --shadow-xl: 0 20px 40px rgba(0, 0, 0, 0.15);

        --radius: 16px;
        --radius-lg: 24px;
        --radius-xl: 32px;
    }

    *,
    *::before,
    *::after {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background: var(--background);
        color: var(--text-primary);
        overflow-x: hidden;
        line-height: 1.6;
    }

    /* GRADIENT DECORATIVE ELEMENTS */
    body::before {
        content: '';
        position: fixed;
        inset: 0;
        background: radial-gradient(circle at 20% 50%, rgba(30, 64, 175, 0.03) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(245, 158, 11, 0.02) 0%, transparent 50%);
        pointer-events: none;
        z-index: 0;
    }

    /* HERO SECTION */
    .hero {
        position: relative;
        width: 100%;
        height: 100vh;
        min-height: 500px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .hero::before {
        content: '';
        position: absolute;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.06) 0%, transparent 70%);
        border-radius: 50%;
        top: -180px;
        right: -120px;
        z-index: 1;
    }

    .hero::after {
        content: '';
        position: absolute;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(7, 24, 48, 0.5) 0%, transparent 75%);
        border-radius: 50%;
        bottom: -150px;
        left: -100px;
        z-index: 1;
    }

    .hero-video {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: brightness(.7);
    }

    .hero-vignette {
        position: absolute;
        inset: 0;
        background:
            radial-gradient(ellipse 85% 75% at 50% 50%, rgba(3, 7, 16, 0.9) 0%, rgba(3, 7, 16, 0.75) 100%),
            linear-gradient(180deg, rgba(3, 7, 16, 0.2) 0%, rgba(3, 7, 16, 0.7) 100%);
        z-index: 2;
    }

    .hero-content {
        position: relative;
        z-index: 3;
        text-align: center;
        padding: 0 32px;
        max-width: 900px;
        animation: slideUp 1s cubic-bezier(0.34, 1.56, 0.64, 1) both;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        background: rgba(255, 255, 255, 0.06);
        border: 1px solid rgba(255, 255, 255, 0.14);
        border-radius: 50px;
        padding: 10px 28px;
        font-size: 12px;
        font-weight: 600;
        color: rgba(255, 255, 255, 0.85);
        letter-spacing: 0.05em;
        text-transform: uppercase;
        margin-bottom: 40px;
        backdrop-filter: blur(12px);
        animation: slideUp 1s cubic-bezier(0.34, 1.56, 0.64, 1) both;
        animation-delay: 0.1s;
    }

    .hero-badge .dot {
        width: 6px;
        height: 6px;
        background: #4b7bd6;
        border-radius: 50%;
        animation: pulse 2s ease-in-out infinite;
    }

    .hero h1 {
        font-family: 'Playfair Display', serif;
        font-size: clamp(48px, 8vw, 92px);
        line-height: 1.05;
        color: #f8fafc;
        margin-bottom: 24px;
        letter-spacing: -0.02em;
        font-weight: 700;
        animation: slideUp 1s cubic-bezier(0.34, 1.56, 0.64, 1) both;
        animation-delay: 0.2s;
    }

    .hero h1 em {
        font-style: italic;
        background: linear-gradient(135deg, #4b7bd6 0%, #728ee9 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hero-sub {
        color: rgba(241, 245, 249, 0.78);
        font-size: 18px;
        font-weight: 400;
        line-height: 1.8;
        margin-bottom: 56px;
        animation: slideUp 1s cubic-bezier(0.34, 1.56, 0.64, 1) both;
        animation-delay: 0.3s;
    }

    .hero-cta {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        background: rgba(75, 123, 214, 0.95);
        color: white;
        padding: 16px 42px;
        border-radius: 50px;
        font-size: 15px;
        font-weight: 600;
        text-decoration: none;
        letter-spacing: 0.04em;
        transition: all 0.3s ease;
        box-shadow: 0 12px 28px rgba(28, 67, 139, 0.35);
        border: none;
        cursor: pointer;
        animation: slideUp 1s cubic-bezier(0.34, 1.56, 0.64, 1) both;
        animation-delay: 0.4s;
    }

    .hero-cta:hover {
        transform: translateY(-3px);
        box-shadow: 0 16px 40px rgba(28, 67, 139, 0.45);
    }

    .hero-cta:active {
        transform: translateY(-1px);
    }

    .hero-scroll {
        position: absolute;
        bottom: 48px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 3;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        color: rgba(241, 245, 249, 0.9);
        font-size: 12px;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        animation: float 3s ease-in-out infinite;
    }

    .hero-scroll-line {
        width: 2px;
        height: 32px;
        background: linear-gradient(to bottom, rgba(241, 245, 249, 0.9), transparent);
        animation: slideDown 1.5s ease-in-out infinite;
    }

    /* SECTIONS */
    .sessions-section,
    .donasi-section {
        position: relative;
        z-index: 1;
        padding: 120px 0;
        background: var(--background);
        border-top: 1px solid var(--border-light);
    }

    .about-section {
        padding: 120px 0;
        background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
        border-top: 1px solid var(--border-light);
    }

    .beranda-container {
        width: 92%;
        max-width: 1200px;
        margin: 0 auto;
    }

    .section-eyebrow {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 32px;
        justify-content: center;
    }

    .section-eyebrow::before,
    .section-eyebrow::after {
        content: '';
        flex: 1;
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--border-light), transparent);
    }

    .section-eyebrow span {
        color: var(--primary);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        white-space: nowrap;
    }

    .section-title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(36px, 5vw, 54px);
        text-align: center;
        margin-bottom: 72px;
        color: var(--text-primary);
        font-weight: 700;
    }

    .sessions-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 32px;
        margin-bottom: 60px;
    }

    .session-card,
    .about-stat,
    .donasi-card {
        background: var(--background);
        border: 1px solid var(--border-light);
        border-radius: var(--radius-lg);
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        overflow: hidden;
    }

    .session-card {
        padding: 56px 36px;
        text-align: center;
        position: relative;
        background: linear-gradient(135deg, #ffffff 0%, #f9fafb 100%);
        box-shadow: var(--shadow-sm);
    }

    .session-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(30, 64, 175, 0.05) 0%, rgba(245, 158, 11, 0.03) 100%);
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .session-card:hover {
        background: linear-gradient(135deg, #ffffff 0%, #f3f4f6 100%);
        border-color: var(--primary-light);
        transform: translateY(-12px);
        box-shadow: var(--shadow-lg);
    }

    .session-card:hover::before {
        opacity: 1;
    }

    .session-number {
        font-size: 11px;
        color: var(--accent);
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        margin-bottom: 20px;
    }

    .session-time {
        font-family: 'Playfair Display', serif;
        font-size: 56px;
        color: var(--text-primary);
        margin-bottom: 8px;
        font-weight: 700;
    }

    .session-wib {
        font-size: 14px;
        color: var(--text-muted);
        font-weight: 500;
    }

    /* ABOUT SECTION */
    .about-inner {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 80px;
        align-items: center;
    }

    .about-label {
        color: var(--primary);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        margin-bottom: 16px;
    }

    .about-heading {
        font-family: 'Playfair Display', serif;
        font-size: clamp(32px, 4vw, 48px);
        line-height: 1.25;
        margin-bottom: 28px;
        color: var(--text-primary);
        font-weight: 700;
    }

    .about-text {
        color: var(--text-secondary);
        font-size: 16px;
        line-height: 1.8;
        margin-bottom: 40px;
    }

    .about-stat-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-top: 36px;
    }

    .about-stat {
        padding: 32px;
        background: var(--background);
        box-shadow: var(--shadow-sm);
        border-color: var(--border-light);
    }

    .about-stat:hover {
        box-shadow: var(--shadow-md);
        border-color: var(--primary-light);
        transform: translateY(-4px);
        transition: all 0.3s ease;
    }

    .about-stat-num {
        font-family: 'Playfair Display', serif;
        font-size: 44px;
        color: var(--primary);
        margin-bottom: 8px;
        font-weight: 700;
    }

    .about-stat-label {
        font-size: 13px;
        color: var(--text-muted);
        font-weight: 500;
    }

    .about-visual {
        position: relative;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        border-radius: var(--radius-xl);
        padding: 60px 48px;
        text-align: center;
        overflow: hidden;
        box-shadow: var(--shadow-xl);
        min-height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .about-visual::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cdefs%3E%3Cpattern id='p' x='0' y='0' width='64' height='64' patternUnits='userSpaceOnUse'%3E%3Ccircle cx='32' cy='32' r='2' fill='white' opacity='0.1'/%3E%3C/pattern%3E%3C/defs%3E%3Crect width='100%25' height='100%25' fill='url(%23p)'/%3E%3C/svg%3E");
        opacity: 0.1;
    }

    .about-box {
        position: relative;
        z-index: 2;
    }

    .about-cross {
        font-size: 72px;
        color: white;
        margin-bottom: 28px;
        filter: drop-shadow(0 8px 16px rgba(0, 0, 0, 0.2));
    }

    .about-quote {
        font-family: 'Playfair Display', serif;
        font-size: 22px;
        font-style: italic;
        line-height: 1.7;
        color: white;
        margin-bottom: 24px;
        font-weight: 600;
    }

    .about-quote-ref {
        font-size: 12px;
        color: rgba(255, 255, 255, 0.8);
        letter-spacing: 0.05em;
    }

    /* DONASI SECTION */
    .donasi-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 32px;
        max-width: 700px;
        margin: 0 auto;
    }

    .donasi-card {
        padding: 52px 48px;
        background: linear-gradient(135deg, #ffffff 0%, #f9fafb 100%);
        box-shadow: var(--shadow-md);
        position: relative;
        overflow: hidden;
    }

    .donasi-card::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(30, 64, 175, 0.05) 0%, transparent 70%);
        border-radius: 50%;
    }

    .donasi-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-lg);
        border-color: var(--primary-light);
    }

    .donasi-card-icon {
        width: 64px;
        height: 64px;
        border-radius: var(--radius);
        background: linear-gradient(135deg, rgba(30, 64, 175, 0.1) 0%, rgba(245, 158, 11, 0.05) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        color: var(--primary);
        margin-bottom: 28px;
        border: 2px solid rgba(30, 64, 175, 0.1);
    }

    .donasi-card h3 {
        font-family: 'Playfair Display', serif;
        font-size: 26px;
        margin-bottom: 12px;
        color: var(--text-primary);
        font-weight: 700;
    }

    .donasi-card-sub {
        color: var(--text-secondary);
        font-size: 15px;
        margin-bottom: 32px;
        line-height: 1.6;
    }

    .donasi-placeholder {
        background: linear-gradient(135deg, rgba(30, 64, 175, 0.05) 0%, rgba(245, 158, 11, 0.02) 100%);
        border: 2px dashed var(--border-light);
        border-radius: var(--radius);
        height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-muted);
        font-size: 14px;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        margin-bottom: 36px;
        position: relative;
        overflow: hidden;
    }

    .qris-img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .rek-number {
        font-family: 'Playfair Display', serif;
        font-size: 32px;
        letter-spacing: 0.06em;
        margin-bottom: 24px;
        color: var(--text-primary);
        font-weight: 700;
    }

    .btn-copy,
    .btn-outline {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: linear-gradient(135deg, rgba(30, 64, 175, 0.08) 0%, rgba(245, 158, 11, 0.04) 100%);
        border: 2px solid var(--primary);
        color: var(--primary);
        padding: 12px 32px;
        border-radius: 50px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        letter-spacing: 0.03em;
    }

    .btn-copy:hover,
    .btn-outline:hover {
        background: var(--primary);
        color: white;
        border-color: var(--primary);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(30, 64, 175, 0.25);
    }

    .btn-copy:active,
    .btn-outline:active {
        transform: translateY(0);
    }

    .steps {
        margin-top: 32px;
        list-style: none;
        counter-reset: steps;
    }

    .steps li {
        counter-increment: steps;
        display: flex;
        align-items: center;
        gap: 16px;
        font-size: 14px;
        color: var(--text-secondary);
        padding: 12px 0;
        border-bottom: 1px solid var(--border-light);
        font-weight: 500;
    }

    .steps li:last-child {
        border-bottom: none;
    }

    .steps li::before {
        content: counter(steps);
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        font-weight: 700;
        flex-shrink: 0;
    }

    .page-end {
        padding: 80px 0;
        background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
        text-align: center;
        border-top: 1px solid rgba(30, 64, 175, 0.2);
        position: relative;
        overflow: hidden;
    }

    .page-end::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cdefs%3E%3Cpattern id='p' x='0' y='0' width='64' height='64' patternUnits='userSpaceOnUse'%3E%3Ccircle cx='32' cy='32' r='1.5' fill='white' opacity='0.1'/%3E%3C/pattern%3E%3C/defs%3E%3Crect width='100%25' height='100%25' fill='url(%23p)'/%3E%3C/svg%3E");
        opacity: 0.15;
    }

    .page-end-icon {
        font-size: 36px;
        color: white;
        margin-bottom: 20px;
        position: relative;
        z-index: 2;
        filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.2));
    }

    .page-end-text {
        color: rgba(255, 255, 255, 0.95);
        font-size: 18px;
        font-weight: 500;
        letter-spacing: 0.03em;
        position: relative;
        z-index: 2;
    }

    /* ANIMATIONS */
    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideDown {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(8px);
        }
    }

    @keyframes float {

        0%,
        100% {
            transform: translateX(-50%) translateY(0);
        }

        50% {
            transform: translateX(-50%) translateY(12px);
        }
    }

    @keyframes pulse {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.5;
        }
    }

    .reveal {
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 0.8s cubic-bezier(0.34, 1.56, 0.64, 1),
            transform 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .reveal.visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* RESPONSIVE */
    @media(max-width: 1024px) {

        .sessions-grid,
        .about-inner {
            grid-template-columns: 1fr;
        }

        .about-inner {
            gap: 60px;
        }
    }

    @media(max-width: 768px) {

        .sessions-section,
        .donasi-section {
            padding: 80px 0;
        }

        .about-section {
            padding: 80px 0;
        }

        .section-title {
            margin-bottom: 48px;
        }

        .about-stat-grid {
            grid-template-columns: 1fr 1fr;
        }

        .hero-cta {
            padding: 14px 36px;
            font-size: 14px;
        }

        .donasi-card {
            padding: 40px 32px;
        }

        .about-visual {
            padding: 48px 32px;
            min-height: 350px;
        }
    }

    @media(max-width: 640px) {
        .hero-content {
            padding: 0 20px;
        }

        .hero h1 {
            font-size: 42px;
            margin-bottom: 16px;
        }

        .hero-sub {
            font-size: 16px;
            margin-bottom: 32px;
        }

        .sessions-grid {
            gap: 20px;
        }

        .session-card {
            padding: 40px 24px;
        }

        .beranda-container {
            width: 95%;
        }

        .about-stat-grid {
            grid-template-columns: 1fr;
        }

        .section-eyebrow {
            flex-wrap: wrap;
        }

        .section-eyebrow::before,
        .section-eyebrow::after {
            flex: 0 1 30%;
        }
    }

    .qris-section {
        padding: 100px 20px;
        background: #ffffff;
    }

    .qris-container {
        max-width: 700px;
        margin: 0 auto;
        text-align: center;
    }

    .qris-header {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 25px;
        margin-bottom: 40px;
    }

    .qris-header span {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: #9bb8dd;
        box-shadow:
            20px 0 #9bb8dd,
            -20px 0 #9bb8dd;
    }

    .qris-header h2 {
        font-family: 'Playfair Display', serif;
        font-size: 42px;
        font-weight: 500;
        color: #2b4567;
        margin: 0;
    }

    .qris-card {
        max-width: 420px;
        margin: 0 auto 40px;
    }

    .qris-card img {
        width: 100%;
        border-radius: 18px;
        border: 1px solid #d8e2ef;
        box-shadow: 0 8px 20px rgba(0, 0, 0, .05);
    }

    .qris-info p {
        font-size: 20px;
        color: #5e7aa0;
        margin-bottom: 18px;
        line-height: 1.8;
    }

    .qris-info h4 {
        margin-top: 30px;
        font-size: 24px;
        font-weight: 700;
        color: #2c6bed;
    }

    @media (max-width: 768px) {
        .qris-header h2 {
            font-size: 34px;
        }

        .qris-info p {
            font-size: 16px;
        }

        .qris-info h4 {
            font-size: 18px;
        }
    }
</style>