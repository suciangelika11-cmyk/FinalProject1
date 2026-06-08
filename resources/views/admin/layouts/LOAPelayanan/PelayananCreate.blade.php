<style>
    :root {
        --bg: #f4f6f9;
        --white: #ffffff;
        --border: #e4e8ef;
        --border2: #d0d7e3;
        --text: #1a2233;
        --muted: #7a8499;
        --cyan: #1da8e0;
        --cyan-dk: #0d85b5;
        --cyan-lt: #e8f6fd;
        --gold: #c89b3c;
        --gold-lt: #fdf6e3;
        --danger: #e05555;
        --danger-lt: #fdf0f0;
        --success: #2ea86a;
        --success-lt: #e8f7ef;
        --purple: #8b5cf6;
        --purple-lt: #f3f0ff;
        --orange: #f97316;
        --orange-lt: #fff4ed;
        --pink: #ec4899;
        --pink-lt: #fdf2f8;
    }

    .content-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px 28px 0;
    }

    .content-header h1 {
        font-family: 'Rajdhani', sans-serif;
        font-size: 22px;
        font-weight: 700;
    }

    .breadcrumb-bar {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        color: var(--muted);
    }

    .breadcrumb-bar a {
        color: var(--cyan);
        text-decoration: none;
    }

    .content {
        padding: 22px 28px 60px;
    }

    .page-hero {
        position: relative;
        overflow: hidden;
        border-radius: 16px;
        margin-bottom: 28px;
        background: linear-gradient(135deg, var(--cyan-dk), var(--cyan), #29c4f0);
        padding: 24px 28px;
        box-shadow: 0 6px 24px rgba(29, 168, 224, .25);
    }

    .page-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background:
            radial-gradient(ellipse 50% 80% at 95% 50%, rgba(255, 255, 255, .12) 0%, transparent 65%),
            radial-gradient(ellipse 35% 60% at 5% 90%, rgba(200, 155, 60, .18) 0%, transparent 55%);
        pointer-events: none;
    }

    .hero-tag {
        display: inline-block;
        background: rgba(255, 255, 255, .2);
        border: 1px solid rgba(255, 255, 255, .35);
        color: #fff;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        padding: 4px 12px;
        border-radius: 20px;
        margin-bottom: 12px;
    }

    .page-hero h2 {
        font-family: 'Rajdhani', sans-serif;
        font-size: 22px;
        font-weight: 700;
        color: #fff;
        margin-bottom: 8px;
    }

    .page-hero p {
        color: rgba(255, 255, 255, .8);
        font-size: 14px;
        max-width: 520px;
        line-height: 1.65;
    }

    .hero-actions {
        margin-top: 20px;
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .btn-hero-primary {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: #fff;
        color: var(--cyan);
        text-decoration: none;
        border: none;
        font-family: 'Nunito', sans-serif;
        font-size: 13px;
        font-weight: 700;
        padding: 9px 20px;
        border-radius: 8px;
        transition: all .18s;
        box-shadow: 0 3px 10px rgba(0, 0, 0, .1);
    }

    .btn-hero-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, .15);
        color: var(--cyan);
    }

    .section-panel {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 18px;
        padding: 24px;
        margin-bottom: 32px;
        box-shadow: 0 14px 42px rgba(4, 21, 54, .06);
    }

    .section-panel .section-label {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: var(--muted);
        font-size: 13px;
        margin-bottom: 18px;
    }

    .section-panel .section-label span {
        display: inline-flex;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: var(--cyan);
    }

    .form-card {
        background: var(--white);
        border: 1px solid rgba(29, 168, 224, .08);
        border-radius: 18px;
        padding: 24px;
        box-shadow: 0 12px 28px rgba(4, 21, 54, .06);
    }

    .form-header {
        display: flex;
        flex-direction: column;
        gap: 6px;
        margin-bottom: 24px;
    }

    .form-header h2 {
        font-family: 'Rajdhani', sans-serif;
        font-size: 24px;
        font-weight: 700;
        color: var(--text);
        margin: 0;
    }

    .form-header p {
        color: var(--muted);
        font-size: 14px;
        line-height: 1.75;
        margin: 0;
    }

    .fg {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-bottom: 18px;
    }

    .fg label {
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .8px;
        text-transform: uppercase;
        color: var(--muted);
    }

    .fg input,
    .fg textarea,
    .fg select {
        background: #f8fbff;
        border: 1px solid #e3edf7;
        color: var(--text);
        font-family: inherit;
        font-size: 14px;
        padding: 14px 16px;
        border-radius: 14px;
        outline: none;
        transition: all .18s;
        resize: vertical;
        width: 100%;
    }

    .fg input[type=file] {
        padding: 10px 14px;
    }

    .fg input:focus,
    .fg textarea:focus,
    .fg select:focus {
        border-color: var(--cyan);
        background: #fff;
        box-shadow: 0 0 0 4px rgba(29, 168, 224, .12);
    }

    .fg input::placeholder,
    .fg textarea::placeholder {
        color: #a9b5c7;
    }

    .form-row-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
    }

    .btn-row {
        display: flex;
        gap: 14px;
        align-items: center;
        flex-wrap: wrap;
        margin-top: 6px;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #f4f8fb;
        border: 1px solid #dfe9f5;
        color: #44607d;
        font-size: 13px;
        font-weight: 700;
        padding: 11px 18px;
        border-radius: 14px;
        text-decoration: none;
        transition: all .18s;
    }

    .btn-back:hover {
        background: #e8f2fb;
        color: #163d5d;
    }

    .btn-submit {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, var(--cyan), var(--cyan-dk));
        border: none;
        color: #fff;
        font-size: 13px;
        font-weight: 700;
        padding: 12px 24px;
        border-radius: 14px;
        cursor: pointer;
        transition: all .18s;
        box-shadow: 0 12px 32px rgba(4, 21, 54, .16);
    }

    .btn-submit:hover {
        transform: translateY(-1px);
        box-shadow: 0 18px 36px rgba(4, 21, 54, .18);
    }

    .anggota-item input {
        border-radius: 12px;
    }

    .icon-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(70px, 1fr));
        gap: 12px;
        margin-top: 12px;
    }

    .icon-option {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 14px 10px;
        border: 2px solid #e3edf7;
        border-radius: 14px;
        cursor: pointer;
        transition: all 0.2s ease;
        background: #f8fbff;
    }

    .icon-option:hover {
        border-color: var(--cyan);
        background: #e8f6fd;
    }

    .icon-option.active {
        border-color: var(--cyan);
        background: rgba(29, 168, 224, .12);
        box-shadow: 0 0 0 4px rgba(29, 168, 224, .08);
    }

    .icon-option-emoji {
        font-size: 28px;
        margin-bottom: 6px;
    }

    .icon-option-label {
        font-size: 10px;
        color: var(--muted);
        text-align: center;
        line-height: 1.3;
    }

    .form-dinamis {
        display: none;
    }

    @media(max-width:900px) {

        .content {
            padding: 22px 20px 40px;
        }

        .form-card {
            padding: 20px;
        }
    }

    @media(max-width:700px) {

        .form-card {
            padding: 18px;
        }

        .form-row-2 {
            grid-template-columns: 1fr;
            gap: 16px;
        }

        .btn-submit {
            width: 100%;
            justify-content: center;
        }

        .btn-row {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .btn-back {
            justify-content: center;
        }
    }
</style>