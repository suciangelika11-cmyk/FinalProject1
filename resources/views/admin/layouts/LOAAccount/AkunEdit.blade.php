<style>
    .account-page {
        padding: 24px 28px 50px;
    }

    .account-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 22px;
        flex-wrap: wrap;
    }

    .account-header h1 {
        font-size: 26px;
        font-weight: 800;
        color: #1a2233;
        margin: 0;
    }

    .account-header p {
        margin: 6px 0 0;
        color: #7a8499;
        font-size: 14px;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        background: #f4f6f9;
        color: #1a2233;
        border: 1px solid #dbe2ea;
        padding: 10px 16px;
        border-radius: 10px;
        font-weight: 700;
        transition: .2s ease;
    }

    .btn-back:hover {
        background: #e9eef5;
        color: #1a2233;
    }

    .account-card {
        background: #fff;
        border: 1px solid #e4e8ef;
        border-radius: 18px;
        box-shadow: 0 8px 24px rgba(15, 23, 42, 0.06);
        overflow: hidden;
    }

    .account-card-top {
        padding: 22px 24px;
        background: linear-gradient(135deg, #1da8e0, #0d85b5);
        color: #fff;
    }

    .account-card-top h2 {
        margin: 0;
        font-size: 20px;
        font-weight: 800;
    }

    .account-card-top p {
        margin: 8px 0 0;
        font-size: 13px;
        color: rgba(255, 255, 255, .88);
    }

    .account-card-body {
        padding: 24px;
    }

    .alert-danger-custom {
        background: #fff3f3;
        border: 1px solid #f3c7c7;
        color: #b42318;
        border-radius: 12px;
        padding: 14px 16px;
        margin-bottom: 20px;
    }

    .alert-danger-custom strong {
        display: block;
        margin-bottom: 6px;
    }

    .alert-danger-custom ul {
        margin: 0;
        padding-left: 18px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-bottom: 18px;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

    .form-group label {
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .4px;
        color: #526076;
        text-transform: uppercase;
    }

    .form-control-custom,
    .form-select-custom {
        width: 100%;
        border: 1px solid #dbe2ea;
        background: #f8fafc;
        border-radius: 12px;
        padding: 12px 14px;
        font-size: 14px;
        color: #1a2233;
        outline: none;
        transition: .2s ease;
    }

    .form-control-custom:focus,
    .form-select-custom:focus {
        background: #fff;
        border-color: #1da8e0;
        box-shadow: 0 0 0 4px rgba(29, 168, 224, 0.12);
    }

    .form-help {
        font-size: 12px;
        color: #7a8499;
        margin-top: -2px;
    }

    .section-title {
        font-size: 15px;
        font-weight: 800;
        color: #1a2233;
        margin: 6px 0 16px;
        padding-bottom: 10px;
        border-bottom: 1px solid #edf1f5;
    }

    .action-row {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
        margin-top: 12px;
        flex-wrap: wrap;
    }

    .btn-cancel {
        background: #f4f6f9;
        color: #1a2233;
        border: 1px solid #dbe2ea;
        text-decoration: none;
        padding: 11px 18px;
        border-radius: 10px;
        font-weight: 700;
        transition: .2s ease;
    }

    .btn-cancel:hover {
        background: #e9eef5;
        color: #1a2233;
    }

    .btn-save {
        border: none;
        background: linear-gradient(135deg, #1da8e0, #0d85b5);
        color: #fff;
        padding: 11px 20px;
        border-radius: 10px;
        font-weight: 800;
        transition: .2s ease;
        box-shadow: 0 8px 18px rgba(29, 168, 224, 0.22);
    }

    .btn-save:hover {
        transform: translateY(-1px);
        box-shadow: 0 12px 22px rgba(29, 168, 224, 0.28);
    }

    @media (max-width: 768px) {
        .account-page {
            padding: 18px 14px 40px;
        }

        .account-card-top,
        .account-card-body {
            padding: 18px;
        }

        .form-grid {
            grid-template-columns: 1fr;
            gap: 0;
        }

        .action-row {
            flex-direction: column;
        }

        .btn-cancel,
        .btn-save {
            width: 100%;
            text-align: center;
        }
    }

    .password-wrapper {
        position: relative;
    }

    .password-wrapper input {
        padding-right: 50px;
    }

    .password-toggle {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        border: none;
        background: transparent;
        cursor: pointer;
        color: #6b7280;
        font-size: 18px;
    }

    .password-toggle:hover {
        color: #2563eb;
    }
</style>