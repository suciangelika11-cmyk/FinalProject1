<style>
    body {
        background: #f4f9ff;
    }

    .hero {
        background: linear-gradient(135deg, #005bea, #00c6fb);
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
                rgba(255, 255, 255, 0.03) 40px,
                rgba(255, 255, 255, 0.03) 41px);
        pointer-events: none;
    }

    .hero h1 {
        font-weight: 800;
        font-size: 38px;
        position: relative;
    }

    .hero p {
        opacity: 0.9;
        font-size: 14px;
        position: relative;
    }

    .section-container {
        padding: 60px 0;
    }

    .detail-card {
        background: white;
        border-radius: 20px;
        padding: 50px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        max-width: 900px;
        margin: 0 auto;
    }

    .detail-header {
        margin-bottom: 30px;
        padding-bottom: 30px;
        border-bottom: 2px solid #f1f5f9;
    }

    .detail-title {
        font-size: 32px;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 15px;
        line-height: 1.3;
    }

    .detail-meta {
        font-size: 13.5px;
        font-weight: 600;
        color: #005bea;
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .detail-image {
        width: 100%;
        border-radius: 16px;
        margin: 30px 0;
        display: block;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .detail-content {
        font-size: 15.5px;
        line-height: 1.9;
        color: #3f4959;
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
        gap: 8px;
        background: linear-gradient(135deg, #005bea, #00c6fb);
        color: white;
        border-radius: 50px;
        padding: 11px 26px;
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
        border: none;
        transition: all 0.25s ease;
        box-shadow: 0 4px 14px rgba(0, 91, 234, 0.25);
    }

    .btn-kembali:hover {
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 8px 22px rgba(0, 91, 234, 0.35);
    }

    /* ── RESPONSIVE ── */
    @media (max-width: 768px) {
        .detail-card {
            padding: 30px;
        }

        .detail-title {
            font-size: 24px;
        }

        .hero h1 {
            font-size: 28px;
        }
    }
</style>