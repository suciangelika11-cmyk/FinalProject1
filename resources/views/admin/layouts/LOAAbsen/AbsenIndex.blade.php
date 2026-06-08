<style>
    .table-wrap {
        overflow-x: auto;
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, .05);
    }

    .table {
        border-collapse: collapse;
        width: 100%;
    }

    .table th {
        background: #f8f9fa;
        padding: 16px 14px;
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .5px;
        color: #6b7280;
        border: 1px solid #e5e7eb;
    }

    .table td {
        padding: 14px;
        border-bottom: 1px solid #e5e7eb;
        color: #374151;
        font-size: 14px;
    }

    .table tbody tr:hover {
        background: #fafbfc;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        border: none;
        cursor: pointer;
        transition: all .2s;
    }

    .btn-primary {
        background: #1da8e0;
        color: #fff;
    }

    .btn-primary:hover {
        background: #0d85b5;
    }

    .btn-warning {
        background: #f59e0b;
        color: #fff;
    }

    .btn-warning:hover {
        background: #d97706;
    }

    .btn-danger {
        background: #ef4444;
        color: #fff;
    }

    .btn-danger:hover {
        background: #dc2626;
    }

    .btn-secondary {
        background: #e5e7eb;
        color: #374151;
    }

    .btn-secondary:hover {
        background: #d1d5db;
    }

    .page-hero {
        background: linear-gradient(135deg, #1da8e0 0%, #0d85b5 100%);
        border-radius: 14px;
        padding: 28px 32px;
        color: #fff;
        margin-bottom: 28px;
    }

    .hero-tag {
        font-size: 12px;
        letter-spacing: .8px;
        text-transform: uppercase;
        opacity: .8;
        margin-bottom: 8px;
    }

    .page-hero h2 {
        font-size: 24px;
        font-weight: 700;
        margin: 0 0 8px;
    }

    .page-hero p {
        margin: 0;
        font-size: 14px;
        opacity: .9;
    }

    .hero-actions {
        margin-top: 20px;
        display: flex;
        gap: 12px;
    }

    .btn-hero-primary {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #fff;
        border: none;
        color: #1da8e0;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 700;
        cursor: pointer;
        transition: all .2s;
    }

    .btn-hero-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, .15);
    }

    .breadcrumb-bar {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        color: var(--muted);
        animation: fadeIn .5s ease-out .1s both;
    }

    .breadcrumb-bar a {
        color: var(--cyan);
        text-decoration: none;
        transition: all .2s;
        position: relative;
    }

    .breadcrumb-bar a::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 1.5px;
        background: var(--cyan);
        transition: width .3s;
    }

    .breadcrumb-bar a:hover::after {
        width: 100%;
    }

    .content-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px 28px 0;
    }

    .content-header h1 {
        font-family: 'Rajdhani', sans-serif;
        font-size: 28px;
        font-weight: 700;
        color: var(--text);
        animation: slideInLeft .5s ease-out;
        letter-spacing: -0.5px;
    }
</style>