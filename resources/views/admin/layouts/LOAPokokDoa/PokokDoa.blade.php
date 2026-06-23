<style>
.content-header{
    margin-bottom:25px;
}

.content-header h1{
    font-size:32px;
    color:#1e293b;
    margin-bottom:5px;
}

.content-header p{
    color:#64748b;
}

.card-pokokdoa{
    background:#fff;
    border-radius:20px;
    padding:25px;
    box-shadow:0 10px 30px rgba(0,0,0,.05);
}

.card-top{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.card-top h3{
    margin:0;
}

.card-top span{
    background:#dbeafe;
    color:#2563eb;
    padding:8px 14px;
    border-radius:30px;
    font-weight:600;
}

.table-responsive{
    overflow-x:auto;
}

.pokokdoa-table{
    width:100%;
    border-collapse:collapse;
}

.pokokdoa-table thead{
    background:#f8fafc;
}

.pokokdoa-table th{
    padding:16px;
    text-align:left;
    font-size:14px;
    color:#475569;
}

.pokokdoa-table td{
    padding:16px;
    border-top:1px solid #e2e8f0;
    vertical-align:top;
}

.pokokdoa-table tbody tr:hover{
    background:#f8fbff;
}

.nama-user{
    font-weight:600;
    color:#1e293b;
}

.empty-state{
    text-align:center;
    padding:40px !important;
    color:#94a3b8;
    font-style:italic;
}

.doa-page{
    padding:25px;
}

.page-header h1{
    font-size:36px;
    margin-bottom:8px;
    color:#1e293b;
}

.page-header p{
    color:#64748b;
}

.stats-grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:20px;
    margin:25px 0;
}

.stat-card{
    background:#fff;
    border-radius:20px;
    padding:20px;
    display:flex;
    gap:16px;
    align-items:center;
    box-shadow:0 8px 20px rgba(0,0,0,.05);
}

.stat-card h4{
    margin:0;
    font-size:14px;
    color:#64748b;
}

.stat-card h2{
    margin:6px 0;
    font-size:32px;
}

.stat-card span{
    color:#94a3b8;
    font-size:13px;
}

.icon{
    width:60px;
    height:60px;
    border-radius:18px;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:28px;
}

.blue{
    background:#dbeafe;
}

.green{
    background:#dcfce7;
}

.yellow{
    background:#fef3c7;
}

.purple{
    background:#ede9fe;
}

.table-card{
    background:#fff;
    border-radius:20px;
    padding:25px;
    box-shadow:0 8px 20px rgba(0,0,0,.05);
}

.table-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.search-box{
    width:320px;
    padding:12px 16px;
    border:1px solid #e2e8f0;
    border-radius:12px;
}

.doa-table{
    width:100%;
    border-collapse:collapse;
}

.doa-table thead{
    background:#f8fafc;
}

.doa-table th{
    padding:15px;
    text-align:left;
}

.doa-table td{
    padding:15px;
    border-top:1px solid #e2e8f0;
}

.empty-state{
    text-align:center;
    padding:60px 20px;
}

.empty-icon{
    font-size:60px;
    margin-bottom:15px;
}

.empty-state h4{
    margin-bottom:10px;
}

.empty-state p{
    color:#64748b;
}

@media(max-width:992px){

    .stats-grid{
        grid-template-columns:1fr 1fr;
    }

}

@media(max-width:768px){

    .stats-grid{
        grid-template-columns:1fr;
    }

    .table-header{
        flex-direction:column;
        gap:15px;
    }

    .search-box{
        width:100%;
    }

}

.hero-box{
    background: linear-gradient(
        135deg,
        #0f7db8,
        #37c0e8
    );
    color:white;
    border-radius:25px;
    padding:40px;
}

.hero-badge{
    display:inline-block;
    padding:8px 18px;
    border-radius:30px;
    background:rgba(255,255,255,.2);
    margin-bottom:20px;
    font-weight:600;
}

.hero-box h2{
    font-size:38px;
    font-weight:700;
    margin-bottom:15px;
}

.hero-box p{
    max-width:600px;
    font-size:16px;
}

.info-card{
    background:white;
    border-radius:18px;
    padding:20px;
    display:flex;
    align-items:center;
    gap:15px;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
}

.info-card h3{
    margin:0;
    font-weight:700;
}

.info-card p{
    margin:0;
    color:#6b7280;
}

.info-icon{
    width:55px;
    height:55px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:15px;
    font-size:24px;
}

.blue{
    background:#dbeafe;
}

.green{
    background:#dcfce7;
}

.yellow{
    background:#fef3c7;
}

.purple{
    background:#ede9fe;
}

.empty-box{
    text-align:center;
    padding:70px 20px;
}

.empty-icon{
    font-size:50px;
    margin-bottom:15px;
}
</style>