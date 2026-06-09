<style>
    html,
    body {
        background: #F7FBFC;
    }

    /* ===============================
           DETAIL PAGE
        ================================= */
    .jd-detail {
        padding: 60px 0;
        background:
            radial-gradient(circle at top,
                rgba(118, 159, 205, .18),
                transparent 45%),
            #F7FBFC;
    }

    .jd-detail-container {
        max-width: 790px;
        margin: auto;
        padding: 0 20px;
    }

    /* TITLE */
    .jd-detail-title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(32px, 4vw, 48px);
        font-weight: 700;
        color: #2c3e50;
        line-height: 1.15;
        margin-bottom: 15px;
    }

    /* META */
    .jd-detail-meta {
        display: inline-flex;
        align-items: center;
        gap: 10px;

        background: rgba(118, 159, 205, .12);
        border: 1px solid rgba(118, 159, 205, .25);

        padding: 10px 18px;
        border-radius: 999px;

        color: #5c7695;
        font-size: 14px;
        font-weight: 500;
    }

    /* DESCRIPTION */
    .jd-detail-desc {
        margin-top: 40px;

        background: white;
        border-radius: 24px;
        padding: 35px;

        border: 1px solid rgba(118, 159, 205, .15);

        box-shadow:
            0 15px 40px rgba(118, 159, 205, .08);

        color: #4a5f75;
        line-height: 2;
        font-size: 17px;
    }

    /* BACK BUTTON */
    .jd-back {
        margin-top: 25px;

        display: inline-flex;
        align-items: center;
        gap: 10px;

        padding: 13px 26px;

        border-radius: 999px;

        background: #769FCD;
        color: white;

        text-decoration: none;
        font-weight: 600;

        transition: all .3s ease;
    }

    .jd-back:hover {
        background: #5f89b8;
        color: white;

        transform: translateY(-3px);

        box-shadow:
            0 12px 25px rgba(118, 159, 205, .25);
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {

        .jd-detail {
            padding: 80px 0;
        }

        .jd-detail-desc {
            padding: 25px;
            font-size: 15px;
        }

        .jd-back {
            width: 100%;
            justify-content: center;
        }
    }

    .jd-info-card {
        background: white;
        border: 1px solid rgba(118, 159, 205, .15);
        border-radius: 24px;
        padding: 35px;
        margin-top: 30px;
        box-shadow:
            0 15px 40px rgba(118, 159, 205, .08);
        position: relative;
        overflow: hidden;
    }

    .jd-info-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;

        width: 100%;
        height: 5px;

        background: linear-gradient(90deg,
                #769FCD,
                #B9D7EA);
    }

    .jd-info-item {
        display: grid;
        gap: 15px;
        margin-bottom: 18px;
        grid-template-columns: 120px 1fr;
        color: #4a5f75;
        padding: 12px 0;
    }

    .jd-info-label {
        min-width: 90px;
        font-weight: 700;
        color: #769FCD;
    }

    .jd-info-desc {
        margin-top: 25px;
        padding-top: 25px;
        border-top: 1px solid rgba(118, 159, 205, .15);
        padding: 20px;
        color: #4a5f75;
        line-height: 1.9;
        border-radius: 16px;
    }
</style>