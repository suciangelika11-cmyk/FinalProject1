<style>

.content-wrapper{
    padding:20px;
}

.content-header{
    margin-bottom:25px;
}

.content-header h1{
    font-size:36px;
    font-weight:700;
    color:#1e293b;
    margin-bottom:5px;
}

.content-header p{
    color:#64748b;
    margin:0;
}

/* HERO */

.hero-box{
    background:linear-gradient(
        135deg,
        #0f7db8,
        #38bdf8
    );
    border-radius:25px;
    padding:45px;
    color:#fff;
    position:relative;
    overflow:hidden;
    margin-bottom:30px;
}

.hero-box::after{
    content:"🙏";
    position:absolute;
    right:50px;
    top:50%;
    transform:translateY(-50%);
    font-size:120px;
    opacity:.15;
}

.hero-badge{
    display:inline-block;
    padding:8px 18px;
    border-radius:30px;
    background:rgba(255,255,255,.2);
    font-weight:600;
    margin-bottom:20px;
}

.hero-box h2{
    font-size:42px;
    font-weight:700;
    margin-bottom:15px;
}

.hero-box p{
    max-width:650px;
    font-size:16px;
    line-height:1.8;
}

/* STAT CARD */

.info-card{
    background:#fff;
    border-radius:20px;
    padding:22px;
    display:flex;
    align-items:center;
    gap:15px;
    box-shadow:0 8px 25px rgba(0,0,0,.05);
    transition:.3s;
    height:100%;
}

.info-card:hover{
    transform:translateY(-5px);
}

.info-icon{
    width:60px;
    height:60px;
    border-radius:18px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:26px;
}

.info-card h3{
    margin:0;
    font-size:32px;
    font-weight:700;
    color:#1e293b;
}

.info-card p{
    margin:0;
    color:#64748b;
    font-size:14px;
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

/* TABLE */

.card{
    border:none !important;
    border-radius:22px !important;
    overflow:hidden;
    box-shadow:0 8px 25px rgba(0,0,0,.05);
}

.card-header{
    background:#fff !important;
    padding:20px 25px !important;
    border-bottom:1px solid #e5e7eb !important;
}

.card-title{
    font-weight:700;
    color:#1e293b;
    margin:0;
}

.form-control{
    border-radius:12px;
    border:1px solid #e2e8f0;
}

.table{
    margin-bottom:0;
}

.table thead{
    background:#f8fafc;
}

.table thead th{
    border:none;
    padding:16px;
    font-size:14px;
    color:#64748b;
    font-weight:600;
}

.table tbody td{
    padding:18px 16px;
    vertical-align:middle;
    border-top:1px solid #eef2f7;
}

.table-hover tbody tr:hover{
    background:#f8fbff;
}

/* EMPTY STATE */

.empty-box{
    text-align:center;
    padding:90px 20px;
}

.empty-icon{
    font-size:70px;
    margin-bottom:20px;
}

.empty-box h5{
    font-size:22px;
    font-weight:700;
    color:#1e293b;
    margin-bottom:10px;
}

.empty-box p{
    color:#64748b;
    max-width:500px;
    margin:auto;
}

/* RESPONSIVE */

@media(max-width:768px){

    .hero-box{
        padding:30px;
    }

    .hero-box h2{
        font-size:30px;
    }

    .hero-box::after{
        display:none;
    }

    .card-tools{
        margin-top:10px;
        width:100%;
    }

    .card-tools .form-control{
        width:100%;
    }

}

.hero-box{
    background:
    linear-gradient(
        135deg,
        #0f4c81,
        #1d9bf0
    );
    border-radius:30px;
    padding:50px;
    color:white;
    position:relative;
    overflow:hidden;
}

.hero-box::before{
    content:"✝";
    position:absolute;
    right:-20px;
    top:-30px;
    font-size:220px;
    opacity:.08;
}

.quick-stats{
    display:flex;
    gap:20px;
    margin-top:30px;
}

.quick-card{
    flex:1;
    background:rgba(255,255,255,.15);
    backdrop-filter:blur(10px);
    border-radius:18px;
    padding:20px;
}

</style>