<style>
    .pengumuman-page {
        padding: 24px 28px 50px;
    }

    .pengumuman-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 22px;
        flex-wrap: wrap;
    }

    .pengumuman-header h1 {
        font-size: 26px;
        font-weight: 800;
        color: #1a2233;
        margin: 0;
    }

    .pengumuman-header p {
        margin: 6px 0 0;
        color: #7a8499;
        font-size: 14px;
    }

    .btn-add {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        background: linear-gradient(135deg, #1da8e0, #0d85b5);
        color: #fff;
        border: none;
        padding: 11px 18px;
        border-radius: 10px;
        font-weight: 800;
        box-shadow: 0 8px 18px rgba(29, 168, 224, 0.22);
        transition: .2s ease;
    }

    .btn-add:hover {
        color: #fff;
        transform: translateY(-1px);
        box-shadow: 0 12px 22px rgba(29, 168, 224, 0.28);
    }

    .alert-success-custom {
        background: #edfdf3;
        border: 1px solid #b7ebc6;
        color: #0f7a36;
        border-radius: 12px;
        padding: 14px 16px;
        margin-bottom: 18px;
    }

    .pengumuman-card {
        background: #fff;
        border: 1px solid #e4e8ef;
        border-radius: 18px;
        box-shadow: 0 8px 24px rgba(15, 23, 42, 0.06);
        overflow: hidden;
    }

    .pengumuman-card-top {
        padding: 18px 22px;
        border-bottom: 1px solid #edf1f5;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        flex-wrap: wrap;
    }

    .pengumuman-card-top h2 {
        margin: 0;
        font-size: 18px;
        font-weight: 800;
        color: #1a2233;
    }

    .pengumuman-card-top span {
        font-size: 13px;
        color: #7a8499;
    }

    .table-wrap {
        overflow-x: auto;
    }

    .pengumuman-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 760px;
    }

    .pengumuman-table thead th {
        background: #f8fafc;
        color: #526076;
        font-size: 12px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .4px;
        padding: 14px 16px;
        border-bottom: 1px solid #e8edf3;
        text-align: left;
    }

    .pengumuman-table tbody td {
        padding: 16px;
        border-bottom: 1px solid #eef2f6;
        color: #1a2233;
        font-size: 14px;
        vertical-align: middle;
    }

    .pengumuman-table tbody tr:hover {
        background: #fafcff;
    }

    .title-wrap {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .thumb {
        width: 54px;
        height: 54px;
        border-radius: 10px;
        object-fit: cover;
        border: 1px solid #e6ebf1;
        background: #f4f6f9;
        flex-shrink: 0;
    }

    .thumb-placeholder {
        width: 54px;
        height: 54px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eef8fd;
        color: #0d85b5;
        font-size: 20px;
        border: 1px solid #d7edf8;
        flex-shrink: 0;
    }

    .title-main {
        font-weight: 800;
        color: #1a2233;
        margin-bottom: 4px;
    }

    .title-sub {
        font-size: 12px;
        color: #7a8499;
    }

    .badge-status {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 6px 12px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 800;
    }

    .badge-status.active {
        background: #edfdf3;
        color: #0f7a36;
    }

    .badge-status.inactive {
        background: #fff3f3;
        color: #b42318;
    }

    .action-group {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .btn-edit,
    .btn-delete {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 8px 12px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 800;
        text-decoration: none;
        border: 1px solid transparent;
        transition: .2s ease;
    }

    .btn-edit {
        background: #eef8fd;
        color: #0d85b5;
        border-color: #cdeaf7;
    }

    .btn-edit:hover {
        background: #dff2fb;
        color: #0a6d94;
    }

    .btn-delete {
        background: #fff3f3;
        color: #d92d20;
        border-color: #f7d4d1;
    }

    .btn-delete:hover {
        background: #ffe5e3;
        color: #b42318;
    }

    .empty-state {
        padding: 40px 24px;
        text-align: center;
        color: #7a8499;
    }

    .empty-state h3 {
        font-size: 18px;
        color: #1a2233;
        margin-bottom: 8px;
    }

    .page-hero {
        position: relative;
        overflow: hidden;
        border-radius: 16px;
        margin-bottom: 24px;
        background: linear-gradient(135deg, var(--cyan-dk), var(--cyan), #29c4f0);
        padding: 40px 45px;
        box-shadow: 0 12px 40px rgba(29, 168, 224, .2), inset 0 1px 0 rgba(255, 255, 255, .2);
        animation: slideUp .6s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .page-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(ellipse 50% 80% at 95% 50%, rgba(255, 255, 255, .12) 0%, transparent 65%), radial-gradient(ellipse 35% 60% at 5% 90%, rgba(200, 155, 60, .18) 0%, transparent 55%);
        pointer-events: none;
        animation: float 6s ease-in-out infinite;
    }

    .page-hero::after {
        content: '';
        position: absolute;
        inset: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        pointer-events: none;
    }

    .hero-tag {
        display: inline-block;
        background: rgba(255, 255, 255, .15);
        border: 1px solid rgba(255, 255, 255, .4);
        color: #fff;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        padding: 6px 14px;
        border-radius: 20px;
        margin-bottom: 12px;
        animation: fadeIn .6s ease-out .2s both;
        backdrop-filter: blur(4px);
    }

    .page-hero h2 {
        font-family: 'Rajdhani', sans-serif;
        font-size: 32px;
        font-weight: 700;
        color: #fff;
        margin-bottom: 8px;
        animation: slideInLeft .6s ease-out .3s both;
        letter-spacing: -0.5px;
    }

    .page-hero p {
        color: rgba(255, 255, 255, .9);
        font-size: 14.5px;
        max-width: 580px;
        line-height: 1.7;
        animation: fadeIn .6s ease-out .4s both;
    }

    .hero-actions {
        margin-top: 20px;
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        animation: fadeUp .6s ease-out .5s both;
    }

    .btn-hero-primary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        background: #fff;
        color: var(--cyan);
        border: none;
        text-decoration: none;
        font-family: 'Nunito', sans-serif;
        font-size: 13.5px;
        font-weight: 700;
        padding: 11px 24px;
        border-radius: 9px;
        cursor: pointer;
        transition: all .3s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow: 0 4px 14px rgba(0, 0, 0, .12);
        position: relative;
        overflow: hidden;
    }

    .btn-hero-primary::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(13, 133, 181, .1), transparent);
        opacity: 0;
        transition: opacity .3s;
    }

    .btn-hero-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, .18);
        color: var(--cyan-dk);
    }

    .btn-hero-primary:active {
        transform: translateY(-1px);
    }

    .btn-hero-outline {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: rgba(255, 255, 255, .1);
        color: #fff;
        border: 1.5px solid rgba(255, 255, 255, .4);
        font-family: 'Nunito', sans-serif;
        font-size: 13.5px;
        font-weight: 700;
        padding: 10px 24px;
        border-radius: 9px;
        cursor: pointer;
        transition: all .3s cubic-bezier(0.34, 1.56, 0.64, 1);
        backdrop-filter: blur(4px);
    }

    .btn-hero-outline:hover {
        background: rgba(255, 255, 255, .2);
        border-color: rgba(255, 255, 255, .6);
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, .15);
    }

    @media (max-width: 768px) {
        .pengumuman-page {
            padding: 18px 14px 40px;
        }

        .pengumuman-card-top {
            padding: 16px;
        }
    }
</style>