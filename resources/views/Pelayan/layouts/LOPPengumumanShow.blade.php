<style>
    body {
        background: #F7FBFC;
    }

    .hero {
        background: linear-gradient(135deg, #769FCD, #B9D7EA);
        padding: 90px 0;
        color: white;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: repeating-linear-gradient(45deg,
                transparent,
                transparent 40px,
                rgba(255, 255, 255, .08) 40px,
                rgba(255, 255, 255, .08) 41px);
        pointer-events: none;
    }

    .hero h1 {
        font-weight: 800;
        font-size: 40px;
        position: relative;
        margin-bottom: 15px;
        z-index: 2;
    }

    .hero p {
        opacity: 0.95;
        font-size: 15px;
        position: relative;
        z-index: 2;
    }

    .section-container {
        padding: 70px 0;
    }

    .detail-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        padding: 50px;
        box-shadow: 0 15px 40px rgba(118, 159, 205, .15);
        max-width: 900px;
        margin: -100px auto 0;
        margin: 0 auto;
        position: relative;
        z-index: 10;
    }

    .detail-header {
        margin-bottom: 30px;
        padding : 40px 50px 25px;
        border-bottom: 2px solid #D6E6F2;
    }

    .detail-title {
        font-size: 32px;
        font-weight: 800;
        color: #3d5a80;
        margin-bottom: 15px;
        line-height: 1.4;
    }

    .detail-meta {
        font-size: 13.5px;
        font-weight: 700;
        color: #5479a8;
        background: #D6E6F2;
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        border-radius: 50px;
    }

    .detail-image {
        width: 100%;
        height: 500px;
        border-radius: 16px;
        margin: 30px 0;
        display: block;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        object-fit: cover;
    }

    .detail-content {
        padding: 50px;
        font-size: 15.5px;
        line-height: 1.9;
        color: #4f5d73;
    }

    .detail-content p {
        margin-bottom: 20px;
    }

    .detail-footer {
        padding-top: 30px;
        margin-top: 30px;
        border-top: 2px solid #f1f5f9;
    }

    .btn-kembali {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: #769FCD;
        color: white;
        border-radius: 12px;
        padding: 13px 26px;
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
        border: none;
        transition: .3s;
        box-shadow: 0 8px 20px rgba(118, 159, 205, .25);
    }

    .btn-kembali:hover {
        background: #5d89bc;
        color: white;
        transform: translateY(-2px);
    }

    .detail-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 6px;
        background: linear-gradient(90deg,
                #769FCD,
                #B9D7EA,
                #D6E6F2);
    }

    /* ── RESPONSIVE ── */
    @media (max-width: 768px) {
        .hero h1 {
            font-size: 28px;
        }

        .detail-card {
            padding: 30px;
            margin-top: -60px;
        }

        .detail-title {
            font-size: 24px;
        }

        .detail-image {
            height: 300px;
        }

        .hero h1 {
            font-size: 28px;
        }

        .detail-header,
        .detail-content,
        .detail-footer {
            padding-left: 25px;
            padding-right: 25px;
        }
    }
</style>