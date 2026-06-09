<style>
    .jemaat-page {
        padding: 32px;
        background: #f5f7fb;
        min-height: 100vh;
    }

    .jemaat-header {
        margin-bottom: 28px;
    }

    .jemaat-label {
        font-size: 13px;
        font-weight: 800;
        color: #1da8e0;
        text-transform: uppercase;
        letter-spacing: .18em;
        margin-bottom: 8px;
    }

    .jemaat-title {
        font-size: 30px;
        font-weight: 800;
        color: #172033;
        margin: 0;
    }

    .jemaat-desc {
        margin-top: 8px;
        color: #64748b;
        max-width: 720px;
        line-height: 1.6;
        font-size: 15px;
    }

    .alert-success {
        margin-bottom: 20px;
        padding: 14px 18px;
        background: #e8f7ef;
        border: 1px solid #c8e8d3;
        color: #1f6238;
        border-radius: 12px;
        font-weight: 600;
    }

    .jemaat-card {
        background: #fff;
        border: 1px solid #e5eaf3;
        border-radius: 20px;
        box-shadow: 0 10px 350px rgba(15, 23, 42, .06);
        overflow: hidden;
    }

    .table-scroll {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .jemaat-table {
        width: 100%;
        min-width: 950px;
        border-collapse: collapse;
    }

    .jemaat-table th:nth-child(1),
    .jemaat-table td:nth-child(1) {
        width: 60px;
    }

    .jemaat-table th:nth-child(2),
    .jemaat-table td:nth-child(2) {
        width: 180px;
    }

    .jemaat-table th:nth-child(3),
    .jemaat-table td:nth-child(3) {
        width: 220px;
    }

    .jemaat-table th:nth-child(4),
    .jemaat-table td:nth-child(4) {
        width: auto;
    }

    .jemaat-table th:nth-child(5),
    .jemaat-table td:nth-child(5) {
        width: 130px;
    }

    .jemaat-table th:nth-child(6),
    .jemaat-table td:nth-child(6) {
        width: 160px;
    }

    .jemaat-table th {
        background: #f4f8fc;
        padding: 18px 20px;
        font-size: 14px;
        font-weight: 700;
        color: #334155;
        text-align: left;
        white-space: nowrap;
        border-bottom: 1px solid #e8edf5;
    }

    .jemaat-table td {
        padding: 18px 20px;
        border-top: 1px solid #eef2f7;
        color: #475569;
        font-size: 14px;
        vertical-align: middle;
        white-space: normal;
        word-wrap: break-word;
    }

    .jemaat-table tbody tr:hover {
        background: #f8fafc;
    }

    .text-long {
        min-width: 260px;
        max-width: 320px;
        white-space: normal !important;
        line-height: 1.6;
    }

    .badge-pending {
        display: inline-block;
        padding: 8px 14px;
        border-radius: 999px;
        background: #fff4e6;
        color: #c4710d;
        font-size: 13px;
        font-weight: 700;
        white-space: nowrap;
        align-items: center;
        min-width: 120px;
    }

    .badge-ok {
        display: inline-block;
        padding: 8px 14px;
        border-radius: 999px;
        background: #e8f7ef;
        color: #1f6238;
        font-size: 13px;
        font-weight: 700;
        white-space: nowrap;
        align-items: center;
        min-width: 120px;
    }

    .btn-confirm {
        border: none;
        background: #1da8e0;
        color: #fff;
        padding: 9px 16px;
        border-radius: 10px;
        font-weight: 600;
        cursor: pointer;
        white-space: nowrap;
        transition: .2s;
    }

    .btn-confirm:hover {
        background: #1289bb;
    }

    .no-action {
        color: #64748b;
        font-size: 13px;
        white-space: nowrap;
    }

    .empty {
        padding: 36px 16px;
        color: #64748b;
        text-align: center;
    }

    .btn-detail {
        border: none;
        background: #64748b;
        color: white;
        padding: 9px 16px;
        border-radius: 10px;
        cursor: pointer;
        margin-right: 6px;
        font-weight: 600;
        text-decoration: none;
    }

    .btn-detail:hover {
        background: #475569;
    }

    .detail-modal {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, .45);
        z-index: 9999;
        justify-content: center;
        align-items: center;
    }

    .detail-content {
        width: 90%;
        max-width: 850px;
        background: white;
        border-radius: 20px;
        overflow: hidden;
    }

    .detail-header {
        padding: 20px 24px;
        background: #1da8e0;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .detail-header h3 {
        margin: 0;
    }

    .detail-header button {
        border: none;
        background: none;
        color: white;
        font-size: 28px;
        cursor: pointer;
    }

    .detail-card {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 20px;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 12px;
    }

    .detail-grid {
        padding: 24px;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .detail-grid label {
        display: block;
        font-size: 12px;
        color: #64748b;
        margin-bottom: 4px;
        font-weight: 700;
    }

    .detail-grid p {
        margin: 0;
        color: #172033;
        font-weight: 600;
    }

    .action-buttons {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    @media (max-width: 768px) {

        .jemaat-page {
            padding: 16px;
        }

        .table-scroll {
            overflow-x: auto;
        }

        .jemaat-table {
            min-width: 950px;
        }

        .jemaat-table th,
        .jemaat-table td {
            padding: 12px;
            font-size: 13px;
        }

        .action-buttons {
            flex-direction: column;
            align-items: stretch;
        }

        .btn-detail,
        .btn-confirm {
            width: 100%;
            text-align: center;
            margin-right: 0;
        }

        .detail-grid {
            grid-template-columns: 1fr;
        }

        .detail-content {
            width: 95%;
            max-height: 90vh;
            overflow-y: auto;
        }
    }

    .btn-delete {
        display: inline-flex;
        align-items: center;
        gap: 8px;

        padding: 12px 18px;

        border: none;
        border-radius: 12px;

        background: linear-gradient(135deg,
                #ef4444,
                #dc2626);

        color: white;
        font-weight: 600;
        font-size: 14px;

        cursor: pointer;

        transition: all .25s ease;
    }

    .btn-delete:hover {
        transform: translateY(-2px);
        background: linear-gradient(135deg,
                #dc2626,
                #b91c1c);

        box-shadow:
            0 8px 18px rgba(220, 38, 38, .25);
    }

    .btn-delete:active {
        transform: translateY(0);
    }

    .btn-delete i {
        font-size: 15px;
    }
</style>