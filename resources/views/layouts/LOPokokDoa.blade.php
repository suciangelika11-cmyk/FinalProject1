<style>

:root{
    --primary:#2563eb;
    --primary-dark:#1d4ed8;
    --text:#1e3a5f;
    --text-light:#64748b;
    --bg:#f8fbff;
    --white:#ffffff;
}

/* =======================
   SECTION
======================= */

.prayer-section{
    padding:120px 20px 80px;
    background:
        radial-gradient(circle at top left,#dbeafe 0%,transparent 35%),
        radial-gradient(circle at bottom right,#bfdbfe 0%,transparent 30%),
        #f8fbff;
}

.prayer-wrapper{
    max-width:1200px;
    margin:auto;

    display:grid;
    grid-template-columns:1fr 1fr;
    gap:60px;
    align-items:center;
}

/* =======================
   INFO KIRI
======================= */

.prayer-badge{
    display:inline-flex;
    align-items:center;
    gap:8px;

    padding:10px 18px;

    border-radius:50px;

    background:#dbeafe;

    color:var(--primary);

    font-weight:700;
    font-size:14px;

    margin-bottom:25px;
}

.prayer-info h1{
    font-size:60px;
    line-height:1.1;
    margin-bottom:20px;
    color:var(--text);
}

.prayer-info p{
    font-size:17px;
    line-height:1.9;
    color:var(--text-light);
}

.verse-card{
    margin-top:35px;

    background:rgba(255,255,255,.85);

    backdrop-filter:blur(10px);

    padding:25px;

    border-radius:24px;

    border:1px solid rgba(255,255,255,.8);

    box-shadow:0 15px 40px rgba(0,0,0,.05);
}

.verse-card p{
    margin:0;
    font-size:18px;
    line-height:1.8;
    font-style:italic;
    color:var(--text);
}

.verse-card strong{
    display:block;
    margin-top:15px;
    color:var(--primary);
}

/* =======================
   CARD FORM
======================= */

.prayer-form-card{
    background:var(--white);

    padding:45px;

    border-radius:32px;

    box-shadow:
        0 20px 50px rgba(37,99,235,.08);
}

.form-header{
    text-align:center;
    margin-bottom:35px;
}

.icon-circle{
    width:90px;
    height:90px;

    margin:auto auto 20px;

    border-radius:50%;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:40px;

    background:#dbeafe;
}

.form-header h2{
    font-size:38px;
    color:var(--text);
    margin-bottom:10px;
}

.form-header p{
    color:var(--text-light);
    line-height:1.7;
}

/* =======================
   FORM
======================= */

.form-group{
    margin-bottom:22px;
}

.form-group label{
    display:block;

    margin-bottom:8px;

    font-weight:600;

    color:var(--text);
}

.form-group input,
.form-group textarea{
    width:100%;

    padding:16px 18px;

    border:1px solid #dbe2ea;

    border-radius:16px;

    font-size:15px;

    transition:.3s;
}

.form-group input:focus,
.form-group textarea:focus{
    outline:none;

    border-color:var(--primary);

    box-shadow:0 0 0 5px rgba(37,99,235,.12);
}

.form-group textarea{
    resize:vertical;
    min-height:180px;
}

/* =======================
   NOTE
======================= */

.privacy-note{
    padding:15px 18px;

    margin-bottom:20px;

    border-left:4px solid var(--primary);

    background:#f8fafc;

    border-radius:12px;

    color:var(--text-light);

    font-size:14px;

    line-height:1.7;
}

/* =======================
   BUTTON
======================= */

.btn-kirim{
    width:100%;

    border:none;

    padding:18px;

    border-radius:16px;

    font-size:16px;

    font-weight:700;

    color:white;

    background:linear-gradient(
        135deg,
        #3b82f6,
        #2563eb
    );

    cursor:pointer;

    transition:.3s;
}

.btn-kirim:hover{
    transform:translateY(-3px);

    box-shadow:
        0 15px 25px rgba(37,99,235,.25);
}

/* =======================
   ALERT
======================= */

.success-alert{
    background:#dcfce7;

    color:#166534;

    padding:16px;

    border-radius:14px;

    margin-bottom:25px;

    font-weight:600;
}

/* =======================
   MOBILE
======================= */

@media(max-width:992px){

    .prayer-wrapper{
        grid-template-columns:1fr;
        gap:50px;
    }

}

@media(max-width:768px){

    .prayer-section{
        padding:90px 15px 50px;
    }

    .prayer-info{
        text-align:center;
    }

    .prayer-info h1{
        font-size:42px;
    }

    .prayer-info p{
        font-size:15px;
    }

    .prayer-form-card{
        padding:25px;
        border-radius:24px;
    }

    .form-header h2{
        font-size:30px;
    }

    .icon-circle{
        width:70px;
        height:70px;
        font-size:32px;
    }

}

.error-alert{
    background:#fee2e2;
    color:#991b1b;
    padding:15px;
    border-radius:12px;
    margin-bottom:20px;
}

</style>