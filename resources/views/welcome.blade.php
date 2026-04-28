@extends('layouts.app')

@section('content')

<style>
    /* ===== SCROLL ANIMATION STYLES ===== */
    .scroll-reveal {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.7s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .scroll-reveal.active {
        animation: revealUp 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
        opacity: 1;
        transform: translateY(0);
    }

    .scroll-reveal-left {
        opacity: 0;
        transform: translateX(-60px);
        transition: all 0.7s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .scroll-reveal-left.active {
        animation: revealLeft 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
        opacity: 1;
        transform: translateX(0);
    }

    .scroll-reveal-right {
        opacity: 0;
        transform: translateX(60px);
        transition: all 0.7s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .scroll-reveal-right.active {
        animation: revealRight 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
        opacity: 1;
        transform: translateX(0);
    }

    .scroll-reveal-scale {
        opacity: 0;
        transform: scale(0.9);
        transition: all 0.7s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .scroll-reveal-scale.active {
        animation: revealScale 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
        opacity: 1;
        transform: scale(1);
    }

    .scroll-reveal-rotate {
        opacity: 0;
        transform: rotate(-10deg) scale(0.8);
        transition: all 0.7s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .scroll-reveal-rotate.active {
        animation: revealRotate 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
        opacity: 1;
        transform: rotate(0) scale(1);
    }

    @keyframes revealUp {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes revealLeft {
        0% {
            opacity: 0;
            transform: translateX(-60px);
        }
        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes revealRight {
        0% {
            opacity: 0;
            transform: translateX(60px);
        }
        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes revealScale {
        0% {
            opacity: 0;
            transform: scale(0.9);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }

    @keyframes revealRotate {
        0% {
            opacity: 0;
            transform: rotate(-10deg) scale(0.8);
        }
        100% {
            opacity: 1;
            transform: rotate(0) scale(1);
        }
    }

    /* Scroll direction animation - fade dan slide ke atas saat scroll down */
    @keyframes scrollDown {
        0% { opacity: 1; transform: translateY(0); }
        100% { opacity: 0; transform: translateY(-20px); }
    }

    /* Scroll direction animation - slide ke bawah saat scroll up */
    @keyframes scrollUp {
        0% { opacity: 0; transform: translateY(-20px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    /* Stagger animation untuk multiple items */
    .scroll-reveal:nth-child(1) { animation-delay: 0s; }
    .scroll-reveal:nth-child(2) { animation-delay: 0.15s; }
    .scroll-reveal:nth-child(3) { animation-delay: 0.3s; }
    .scroll-reveal:nth-child(4) { animation-delay: 0.45s; }
    .scroll-reveal:nth-child(5) { animation-delay: 0.6s; }
    .scroll-reveal:nth-child(6) { animation-delay: 0.75s; }

    .scroll-reveal-left:nth-child(1).active { animation-delay: 0s; }
    .scroll-reveal-left:nth-child(2).active { animation-delay: 0.15s; }
    .scroll-reveal-left:nth-child(3).active { animation-delay: 0.3s; }

    .scroll-reveal-right:nth-child(1).active { animation-delay: 0s; }
    .scroll-reveal-right:nth-child(2).active { animation-delay: 0.15s; }
    .scroll-reveal-right:nth-child(3).active { animation-delay: 0.3s; }

    body {
        background: linear-gradient(180deg, #061b4f 0%, #0e378d 35%, #2d6ccb 70%, #63a4ff 100%);
        color: #f8fbff;
    }

    /* ===== HERO SECTION ===== */
    .hero-home {
        position: relative;
        height: 900px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #061b4f 0%, #0e378d 35%, #2d6ccb 70%, #63a4ff 100%);
    }

    .video-bg {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 0;
    }

    .hero-video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0.6;
    }

    .hero-home::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.15) 0%, transparent 70%);
        border-radius: 50%;
        z-index: 1;
        animation: float 6s ease-in-out infinite;
    }

    .hero-home::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.5) 100%);
        z-index: 1;
    }

    .hero-welcome-img {
        position: absolute;
        top: 50%;
        left: 50%;
        z-index: 2;
        max-width: 55%;
        max-height: 75%;
        width: auto;
        height: auto;
        animation: floatCenter 4s ease-in-out infinite;
        filter: drop-shadow(0 20px 40px rgba(0, 0, 0, 0.4));
        object-fit: contain;
    }

    @keyframes floatCenter {
        0%, 100% { transform: translate(-50%, -50%); }
        50% { transform: translate(-50%, calc(-50% - 25px)); }
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-30px); }
    }

    /* ===== TENTANG SECTION ===== */
    .tentang-section {
        background: linear-gradient(to bottom, #061b4f 0%, #0e378d 35%, #2d6ccb 70%, #63a4ff 100%);
        padding: 100px 0;
        position: relative;
        overflow: hidden;
    }

    .tentang-section::before {
        content: '';
        position: absolute;
        top: -5%;
        right: -8%;
        width: 400px;
        height: 400px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 50%;
        opacity: 0.08;
    }

    .tentang-section::after {
        content: '';
        position: absolute;
        bottom: -5%;
        left: -5%;
        width: 350px;
        height: 350px;
        background: linear-gradient(135deg, #f093fb, #f5576c);
        border-radius: 50%;
        opacity: 0.08;
    }

    .tentang-content {
        position: relative;
        z-index: 2;
    }

    /* two-column layout */
    .about-grid {
        display: grid;
        grid-template-columns: 1fr 560px;
        gap: 70px;
        align-items: center;
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .about-left { padding-right: 20px; text-align: left; }
    .about-right { text-align: center; }

    .tentang-title {
        font-size: 2.8rem;
        font-weight: 900;
        margin-bottom: 15px;
        color: #f8fbff;
        background: linear-gradient(135deg, #eef2ff 0%, #c7d2fe 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-shadow: 0 4px 16px rgba(0, 0, 0, 0.25);
    }

    .tentang-description {
        font-size: 1.05rem;
        color: #e2e8f0;
        line-height: 1.9;
        margin-bottom: 30px;
        max-width: 100%;
    }

    .vision-heading {
        font-size: 1.2rem;
        font-weight: 800;
        margin-bottom: 25px;
        color: #0f172a;
    }

    .vision-list { display: grid; gap: 20px; }

    .vision-item {
        display: flex;
        gap: 18px;
        align-items: flex-start;
        padding: 20px;
        background: rgba(255, 255, 255, 0.7);
        border-radius: 12px;
        border: 1px solid rgba(102, 126, 234, 0.1);
        transition: all 0.3s ease;
    }

    .vision-item:hover {
        background: white;
        border-color: rgba(102, 126, 234, 0.2);
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.1);
        transform: translateY(-3px);
    }

    .vision-icon {
        width: 52px;
        height: 52px;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        font-size: 1.5rem;
        flex-shrink: 0;
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
    }

    .vision-icon.yellow { 
        background: linear-gradient(135deg, #f093fb, #f5576c);
        box-shadow: 0 8px 20px rgba(245, 87, 108, 0.3);
    }

    .vision-title { font-weight:800; margin-bottom:6px; color:#0f172a; font-size:1.05rem; }
    .vision-desc { color:#64748b; font-size:0.95rem; line-height:1.7; }

    .about-image {
        width: 100%;
        aspect-ratio: 16 / 9;
        object-fit: contain;
        background: #f8fbff;
        border-radius: 16px;
        box-shadow: 0 20px 50px rgba(102, 126, 234, 0.25);
        border: 1px solid rgba(255, 255, 255, 0.5);
        transition: all 0.4s ease;
    }

    .about-image:hover {
        transform: scale(1.02);
        box-shadow: 0 30px 70px rgba(102, 126, 234, 0.35);
    }

    @media (max-width: 992px) {
        .about-grid { grid-template-columns: 1fr 480px; gap:40px; }
        .about-image { height:360px; }
        .tentang-title { font-size: 2.2rem; }
    }

    @media (max-width: 768px) {
        .about-grid { grid-template-columns: 1fr; }
        .about-right { order: -1; margin-bottom: 25px; }
        .tentang-title { font-size: 2rem; text-align: center; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .tentang-description { font-size: 1rem; text-align: center; }
        .vision-heading { text-align: center; }
        .about-image { height: 320px; }
    }

    /* ===== BERSAMA SECTION ===== */
    .bersama-section {
        background: linear-gradient(135deg, #061b4f 0%, #0e378d 35%, #2d6ccb 70%, #63a4ff 100%);
        padding: 100px 0;
        position: relative;
        color: white;
        overflow: hidden;
    }

    .bersama-section::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
        border-radius: 50%;
        animation: float 8s ease-in-out infinite;
    }

    .bersama-section::after {
        content: '';
        position: absolute;
        bottom: -30%;
        left: -5%;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.08) 0%, transparent 70%);
        border-radius: 50%;
        animation: float 10s ease-in-out infinite reverse;
    }

    .bersama-title {
        font-size: 2.8rem;
        font-weight: 900;
        margin-bottom: 15px;
        color: white;
        text-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .bersama-subtitle {
        font-size: 1.15rem;
        margin-bottom: 35px;
        color: rgba(255, 255, 255, 0.95);
        line-height: 1.7;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .verse-box {
        background: rgba(255, 255, 255, 0.15);
        border-left: 5px solid white;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        padding: 30px;
        margin: 35px auto;
        border-radius: 12px;
        font-style: italic;
        color: rgba(255, 255, 255, 0.98);
        max-width: 650px;
        text-align: center;
        font-size: 1.1rem;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .verse-reference {
        margin-top: 15px;
        font-size: 0.95rem;
        color: rgba(255, 255, 255, 0.85);
        font-style: normal;
        font-weight: 600;
    }

    .bersama-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        gap: 25px;
        margin: 45px 0;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    .bersama-card {
        background: rgba(255, 255, 255, 0.12);
        padding: 30px 20px;
        border-radius: 14px;
        text-align: center;
        border: 1px solid rgba(255, 255, 255, 0.25);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .bersama-card:hover {
        background: rgba(255, 255, 255, 0.18);
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
        border-color: rgba(255, 255, 255, 0.4);
    }

    .bersama-card-icon {
        font-size: 2.8rem;
        margin-bottom: 12px;
        display: inline-block;
        animation: float 3s ease-in-out infinite;
    }

    .bersama-card-text {
        font-size: 0.95rem;
        color: rgba(255, 255, 255, 0.93);
        line-height: 1.6;
    }

    /* ===== SESI CARDS (custom) ===== */
    .sesi-cards {
        display: grid;
        grid-template-columns: repeat(3, minmax(230px, 1fr));
        gap: 28px;
        max-width: 1200px;
        margin: 40px auto 0;
        align-items: stretch;
    }

    .sesi-card {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1.5px solid rgba(255, 255, 255, 0.18);
        border-radius: 16px;
        padding: 35px 25px;
        text-align: center;
        color: rgba(255, 255, 255, 0.98);
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.25);
        transition: all .35s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        min-width: 220px;
    }

    .sesi-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.35);
        background: rgba(255, 255, 255, 0.12);
        border-color: rgba(255, 255, 255, 0.3);
    }

    .sesi-icon {
        font-size: 2.2rem;
        margin-bottom: 15px;
        display: inline-flex;
        width: 56px;
        height: 56px;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: rgba(255,255,255,0.12);
        border: 1.5px solid rgba(255,255,255,0.2);
        animation: float 3s ease-in-out infinite;
    }

    .sesi-title {
        font-size: 1.15rem;
        font-weight: 900;
        margin: 12px 0 8px;
        letter-spacing: 2px;
    }

    .sesi-time {
        font-size: 1rem;
        opacity: 0.95;
        margin-bottom: 5px;
        font-weight: 700;
    }

    .sesi-place {
        font-size: 0.9rem;
        opacity: 0.8;
        font-weight: 500;
    }

    .bersama-buttons {
        display: flex;
        gap: 18px;
        justify-content: center;
        flex-wrap: wrap;
        margin-top: 45px;
    }

    .btn-bersama-primary {
        background: white;
        color: #667eea;
        border: none;
        padding: 14px 45px;
        font-size: 1.05rem;
        font-weight: 800;
        border-radius: 50px;
        transition: all 0.35s ease;
        box-shadow: 0 12px 30px rgba(255, 255, 255, 0.3);
        cursor: pointer;
    }

    .btn-bersama-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 18px 45px rgba(0, 0, 0, 0.3);
        background: rgba(255, 255, 255, 0.95);
    }

    .btn-bersama-secondary {
        background: transparent;
        color: white;
        border: 2.5px solid white;
        padding: 12px 45px;
        font-size: 1.05rem;
        font-weight: 800;
        border-radius: 50px;
        transition: all 0.35s ease;
        cursor: pointer;
    }

    .btn-bersama-secondary:hover {
        background: rgba(255, 255, 255, 0.15);
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        border-color: rgba(255, 255, 255, 0.8);
    }

    /* ===== CONNECT GROUP SECTION ===== */
    .connect-section {
        background: linear-gradient(135deg, #f0f4ff 0%, #faf5ff 50%, #fff5f7 100%);
        padding: 100px 20px;
        position: relative;
        overflow: hidden;
    }

    .connect-section::before {
        content: '';
        position: absolute;
        top: -10%;
        left: -5%;
        width: 500px;
        height: 500px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 50%;
        opacity: 0.08;
        animation: float 8s ease-in-out infinite;
    }

    .connect-section::after {
        content: '';
        position: absolute;
        bottom: -10%;
        right: -5%;
        width: 450px;
        height: 450px;
        background: linear-gradient(135deg, #f093fb, #f5576c);
        border-radius: 50%;
        opacity: 0.08;
        animation: float 10s ease-in-out infinite reverse;
    }

    .connect-card {
        background: white;
        border-radius: 20px;
        padding: 60px 45px;
        text-align: center;
        box-shadow: 0 20px 60px rgba(102, 126, 234, 0.12);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        z-index: 2;
        max-width: 600px;
        margin: 0 auto;
        border: 1px solid rgba(102, 126, 234, 0.1);
    }

    .connect-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 30px 80px rgba(102, 126, 234, 0.2);
        border-color: rgba(102, 126, 234, 0.2);
    }

    .connect-icon {
        font-size: 4rem;
        margin-bottom: 25px;
        display: inline-block;
        animation: float 3s ease-in-out infinite;
    }

    .connect-title {
        font-size: 2.2rem;
        font-weight: 900;
        margin-bottom: 18px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .connect-description {
        font-size: 1.05rem;
        color: #64748b;
        margin-bottom: 30px;
        line-height: 1.8;
    }

    .btn-connect {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: white;
        padding: 15px 45px;
        font-size: 1.05rem;
        font-weight: 800;
        border-radius: 50px;
        transition: all 0.3s ease;
        box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
        cursor: pointer;
    }

    .btn-connect:hover {
        transform: translateY(-3px);
        box-shadow: 0 18px 50px rgba(102, 126, 234, 0.5);
        color: white;
        text-decoration: none;
    }

    /* ===== DONATION SECTION ===== */
    .donation-section {
        background: linear-gradient(135deg, #061b4f 0%, #0e378d 35%, #2d6ccb 70%, #63a4ff 100%);
        padding: 100px 20px;
        position: relative;
        overflow: hidden;
    }

    .donation-section::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -10%;
        width: 600px;
        height: 600px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 50%;
        opacity: 0.08;
        animation: float 8s ease-in-out infinite;
    }

    .donation-section::after {
        content: '';
        position: absolute;
        bottom: -30%;
        right: -5%;
        width: 500px;
        height: 500px;
        background: linear-gradient(135deg, #f093fb, #f5576c);
        border-radius: 50%;
        opacity: 0.08;
        animation: float 10s ease-in-out infinite reverse;
    }

    .donation-container {
        width: 100%;
        max-width: 1600px;
        padding: 0 36px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }

    .donation-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .donation-header h1 {
        font-size: 2.8rem;
        font-weight: 900;
        margin-bottom: 15px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .donation-header p {
        font-size: 1.15rem;
        color: #64748b;
        margin-bottom: 10px;
        font-weight: 500;
    }

    .donation-subtext {
        font-size: 1rem;
        color: #94a3b8;
    }

    .donation-methods {
        display: grid;
        grid-template-columns: repeat(2, minmax(500px, 1fr));
        gap: 50px;
        margin-bottom: 50px;
        justify-items: stretch;
    }

    .method-card {
        width: 100%;
        max-width: 100%;
        min-width: 0;
        background: white;
        border-radius: 18px;
        padding: 55px 50px;
        box-shadow: 0 15px 50px rgba(102, 126, 234, 0.12);
        border: 1.5px solid rgba(102, 126, 234, 0.1);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .barcode-placeholder {
        width: 100%;
        max-width: 560px;
        margin: 0 auto;
        background: linear-gradient(135deg, #f8faff 0%, #f0f4ff 100%);
        border: 2px dashed #cbd5e1;
        border-radius: 14px;
        padding: 55px 45px;
        text-align: center;
        min-height: 320px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .method-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 70px rgba(102, 126, 234, 0.2);
        border-color: rgba(102, 126, 234, 0.2);
    }

    .method-header {
        margin-bottom: 30px;
        border-bottom: 3px solid #f0f4ff;
        padding-bottom: 20px;
    }

    .method-header h2 {
        font-size: 1.6rem;
        font-weight: 900;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin: 0;
    }

    .method-content {
        position: relative;
    }

    .barcode-container {
        margin: 50px 0;
    }

    .barcode-placeholder {
        background: linear-gradient(135deg, #f8faff 0%, #f0f4ff 100%);
        border: 2px dashed #cbd5e1;
        border-radius: 14px;
        padding: 55px 45px;
        text-align: center;
        min-height: 320px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .barcode-placeholder:hover {
        border-color: #667eea;
        background: linear-gradient(135deg, #fafbff 0%, #f3f5ff 100%);
    }

    .barcode-placeholder .icon {
        font-size: 3.5rem;
        margin-bottom: 15px;
    }

    .barcode-placeholder p {
        color: #64748b;
        margin: 8px 0;
        font-weight: 500;
    }

    .bank-details {
        margin: 35px 0;
    }

    .info-box {
        background: linear-gradient(135deg, #f8faff 0%, #f0f4ff 100%);
        border-left: 5px solid #667eea;
        padding: 18px 24px;
        border-radius: 10px;
        margin-bottom: 18px;
        transition: all 0.3s ease;
    }

    .info-box:hover {
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.15);
        transform: translateX(5px);
    }

    .info-box label {
        display: block;
        font-size: 0.85rem;
        color: #64748b;
        font-weight: 700;
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 0.8px;
    }

    .info-box .value {
        font-size: 1.15rem;
        color: #0f172a;
        font-weight: 800;
        font-family: 'Courier New', monospace;
    }

    .bank-name {
        font-size: 1.05rem;
        font-weight: 800;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin: 0;
    }

    .copy-button {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 0.95rem;
        font-weight: 700;
        margin-top: 12px;
        transition: all 0.3s ease;
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
    }

    .copy-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 30px rgba(102, 126, 234, 0.4);
    }

    .instruction {
        background: linear-gradient(135deg, #f0f9ff 0%, #e0f2ff 100%);
        border-left: 5px solid #3b82f6;
        padding: 24px 28px;
        border-radius: 10px;
        margin-top: 28px;
    }

    .instruction strong {
        display: block;
        margin-bottom: 12px;
        color: #1e40af;
        font-size: 1.05rem;
        font-weight: 800;
    }

    .instruction ol {
        margin: 12px 0;
        padding-left: 22px;
    }

    .instruction li {
        margin: 10px 0;
        color: #1e40af;
        line-height: 1.7;
        font-weight: 500;
    }

    .footer-note {
        text-align: center;
        background: white;
        border-radius: 18px;
        padding: 45px 40px;
        border: 1.5px solid rgba(102, 126, 234, 0.1);
        box-shadow: 0 15px 50px rgba(102, 126, 234, 0.12);
        transition: all 0.4s ease;
    }

    .footer-note:hover {
        transform: translateY(-5px);
        box-shadow: 0 25px 70px rgba(102, 126, 234, 0.2);
    }

    .footer-note strong {
        display: block;
        font-size: 1.35rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 12px;
        font-weight: 900;
    }

    .footer-note p {
        color: #64748b;
        margin: 0;
        line-height: 1.8;
        font-size: 1.05rem;
        font-weight: 500;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .hero-home {
            height: 500px;
        }

        .hero-welcome-img {
            max-width: 85%;
            max-height: 75%;
        }

        .tentang-title {
            font-size: 2rem;
        }

        .tentang-description {
            font-size: 1rem;
        }

        .bersama-title {
            font-size: 2rem;
        }

        .bersama-subtitle {
            font-size: 1rem;
        }

        .verse-box {
            padding: 24px;
            font-size: 1rem;
        }

        .bersama-cards {
            grid-template-columns: 1fr;
            gap: 18px;
        }

        /* responsive for sesi cards */
        .sesi-cards {
            grid-template-columns: 1fr;
            gap: 18px;
            padding: 0 10px;
        }

        .sesi-card {
            padding: 25px 20px;
        }

        .bersama-buttons {
            flex-direction: column;
        }

        .btn-bersama-primary,
        .btn-bersama-secondary {
            width: 100%;
        }

        .connect-card {
            padding: 40px 30px;
        }

        .connect-title {
            font-size: 1.6rem;
        }

        .connect-description {
            font-size: 1rem;
        }

        /* Donation responsive */
        .donation-header h1 {
            font-size: 2rem;
        }

        .donation-header p {
            font-size: 1rem;
        }

        .donation-methods {
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .method-card {
            padding: 35px 25px;
        }

        .method-header h2 {
            font-size: 1.4rem;
        }

        .barcode-placeholder {
            min-height: 220px;
            padding: 35px 25px;
        }

        .footer-note {
            padding: 35px 25px;
        }

        .footer-note strong {
            font-size: 1.2rem;
        }

        .about-grid {
            gap: 30px;
            grid-template-columns: 1fr;
        }

        .about-image {
            height: 300px;
        }

        .info-box {
            padding: 16px 20px;
        }
    }

    @media (max-width: 480px) {
        .hero-home {
            height: 400px;
        }

        .hero-welcome-img {
            max-width: 90%;
        }

        .tentang-title {
            font-size: 1.6rem;
        }

        .bersama-title {
            font-size: 1.6rem;
        }

        .sesi-cards {
            gap: 15px;
        }

        .sesi-card {
            padding: 20px 15px;
        }

        .sesi-title {
            font-size: 1rem;
        }

        .connect-title {
            font-size: 1.4rem;
        }

        .donation-header h1 {
            font-size: 1.6rem;
        }

        .donation-header p {
            font-size: 0.95rem;
        }

        .method-card {
            padding: 30px 20px;
        }

        .method-header h2 {
            font-size: 1.2rem;
        }

        .btn-bersama-primary,
        .btn-bersama-secondary {
            padding: 12px 25px;
            font-size: 0.95rem;
        }

        .footer-note strong {
            font-size: 1.1rem;
        }

        .footer-note p {
            font-size: 0.95rem;
        }
    }

</style>


</script>


<section class="hero-home">
    <div class="video-bg">
        <video autoplay muted loop playsinline class="hero-video">
            <source src="{{ asset('vidio/gbi.mp4') }}" type="video/mp4">
        </video>
    </div>
    
    <!-- Welcome Image -->
    <img src="{{ asset('gambar/welcome-home.svg') }}" alt="Welcome Home" class="hero-welcome-img">
</section>

<!-- Bersama di GBI Tambunan -->
<section class="bersama-section">
    <div class="container" style="position: relative; z-index: 2;">
        <div class="text-center">
            <h2 class="bersama-title scroll-reveal">Bersama di GBI Tambunan</h2>
            <p class="bersama-subtitle scroll-reveal">Kita membangun tahun Kristus dalam kesaksian, ibadah, dan pelayanan</p>

            <div class="verse-box scroll-reveal">
                "Karena itu amatilah kiranya Kristus dengan seksama menurut ajaran agama kami."
                <div class="verse-reference">1 Korintus 10:31</div>
            </div>

            <!-- Sesi cards -->
            <div class="sesi-cards">
                <div class="sesi-card scroll-reveal">
                    <div class="sesi-icon">🕘</div>
                    <h3 class="sesi-title">SESI 1</h3>
                    <p class="sesi-time">09:00 WIB</p>
                    <p class="sesi-place">+ Sekolah Minggu</p>
                </div>

                <div class="sesi-card scroll-reveal">
                    <div class="sesi-icon">🕚</div>
                    <h3 class="sesi-title">SESI 2</h3>
                    <p class="sesi-time">11:00 WIB</p>
                    <p class="sesi-place">GBI Tambunan</p>
                </div>

                <div class="sesi-card scroll-reveal">
                    <div class="sesi-icon">🕓</div>
                    <h3 class="sesi-title">SESI 3</h3>
                    <p class="sesi-time">16:00 WIB</p>
                    <p class="sesi-place">Post PI Sibarani</p>
                </div>
            </div>

        </div>

            <div class="bersama-buttons scroll-reveal">
                <a href="{{ route('user.jemaat') }}" class="btn btn-bersama-primary">Jadi Jemaat</a>
                <a href="{{ route('user.jadwal') }}" class="btn btn-bersama-secondary">Lihat Jadwal</a>
            </div>
        </div>
    </div>
</section>
<section class="tentang-section">
    <div class="container">
        <div class="tentang-content scroll-reveal">
            <div class="about-grid">
                <div class="about-left">
                    <h2 class="tentang-title">Tentang GBI Tambunan</h2>
                    <p class="tentang-description">GBI Tambunan adalah gereja sel dengan misi menjadikan murid Kristus di seluruh bangsa. Kami berkomitmen untuk membangun komunitas yang kuat dan fokus pada pertumbuhan rohani.</p>

                    <h3 class="vision-heading">Visi &amp; Misi Kami</h3>
                    <div class="vision-list">
                        <div class="vision-item scroll-reveal-left">
                            <div class="vision-icon">❤️</div>
                            <div>
                                <div class="vision-title">Kasih kepada Tuhan</div>
                                <div class="vision-desc">"Kasihilah Tuhan, Allahmu, dengan segenap hatimu dan dengan segenap jiwamu dan dengan segenap akal budimu."</div>
                            </div>
                        </div>

                        <div class="vision-item scroll-reveal-left">
                            <div class="vision-icon yellow">👥</div>
                            <div>
                                <div class="vision-title">Kasih kepada Sesama</div>
                                <div class="vision-desc">"Kasihilah sesamamu manusia seperti dirimu sendiri."</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="about-right scroll-reveal-right">
                    <img src="{{ asset('gambar/pelayanan-orang-miskin.jpeg') }}" alt="GBI Tambunan" class="about-image">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="donation-section">
    <div class="donation-container">
        <!-- Header -->
        <div class="donation-header scroll-reveal">
            <h1>💝 Dukung Kami Dengan Donasi 💝</h1>
            <p>Bantu kami membangun gereja yang lebih kuat dan melayani dengan lebih baik</p>
            <p class="donation-subtext">Setiap donasi Anda adalah berkah bagi pertumbuhan pelayanan kami</p>
        </div>

        <!-- Donation Methods -->
        <div class="donation-methods">
            <!-- QRIS Card -->
            <div class="method-card scroll-reveal">
                <div class="method-header">
                    <h2>📱 QRIS</h2>
                </div>
                <div class="method-content">
                    <p style="text-align: center; color: #666; margin-bottom: 25px;">
                        Scan kode QR di bawah dengan aplikasi pembayaran Anda
                    </p>

                    <div class="barcode-container">
                        <div id="qris-image-container" class="barcode-placeholder">
                            <div class="icon">📲</div>
                            <p><strong>Barcode QRIS</strong></p>
                            <p style="margin-top: 10px; font-size: 12px;">
                                [Tempat untuk barcode QRIS - masukkan gambar Anda]
                            </p>
                        </div>
                    </div>

                    <div class="instruction">
                        <strong>Cara Pembayaran:</strong>
                        <ol>
                            <li>Buka aplikasi pembayaran (GCash, GoPay, OVO, Dana, etc.)</li>
                            <li>Pilih "Scan QRIS"</li>
                            <li>Arahkan ke kode QR di atas</li>
                            <li>Masukkan nominal dan konfirmasi pembayaran</li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Bank Transfer Card -->
            <div class="method-card scroll-reveal">
                <div class="method-header">
                    <h2>🏦 Transfer Bank</h2>
                </div>
                <div class="method-content">
                    <p style="text-align: center; color: #666; margin-bottom: 25px;">
                        Transfer langsung ke rekening gereja
                    </p>

                    <div class="barcode-container">
                        <div id="bank-image-container" class="barcode-placeholder">
                            <div class="icon">💳</div>
                            <p><strong>Logo / QR Bank</strong></p>
                            <p style="margin-top: 10px; font-size: 12px;">
                                [Tempat untuk logo bank atau barcode - masukkan gambar Anda]
                            </p>
                        </div>
                    </div>

                    <div class="bank-details">
                        <div class="info-box">
                            <label>Nama Bank</label>
                            <div class="value">BCA / Mandiri / BNI</div>
                        </div>

                        <div class="info-box">
                            <label>Nomor Rekening</label>
                            <div class="value" id="bank-account">123456789XXX</div>
                            <button class="copy-button" onclick="copyToClipboard('bank-account')">
                                📋 Salin Nomor Rekening
                            </button>
                        </div>

                        <div class="bank-details">
                            <p><strong>Atas Nama (A.N):</strong></p>
                            <p class="bank-name">GBI Tambunan</p>
                        </div>
                    </div>

                    <div class="instruction">
                        <strong>Cara Transfer:</strong>
                        <ol>
                            <li>Buka aplikasi perbankan atau ATM Anda</li>
                            <li>Pilih "Transfer ke Bank Lain" atau "Transfer Antar Rekening"</li>
                            <li>Masukkan nomor rekening di atas</li>
                            <li>Masukkan nominal yang ingin Anda donasikan</li>
                            <li>Konfirmasi transfer Anda</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Note -->
        <div class="footer-note scroll-reveal">
            <strong>Terima Kasih Atas Kepedulian Anda! 🙏</strong>
            <p>Doa kami menemani setiap langkah kebaikan Anda. Semoga Tuhan memberkati Anda dan keluarga dengan berlipat ganda.</p>
        </div>
    </div>
</section>

<script>
    function copyToClipboard(elementId) {
        const element = document.getElementById(elementId);
        const text = element.innerText;
        
        navigator.clipboard.writeText(text).then(() => {
            alert('Nomor rekening berhasil disalin!');
        }).catch(() => {
            const textarea = document.createElement('textarea');
            textarea.value = text;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand('copy');
            document.body.removeChild(textarea);
            alert('Nomor rekening berhasil disalin!');
        });
    }

    // ===== SCROLL REVEAL ANIMATION =====
    document.addEventListener('DOMContentLoaded', function() {
        // Intersection Observer options dengan timing yang lebih baik
        const observerOptions = {
            threshold: [0, 0.1, 0.5],
            rootMargin: '0px 0px -100px 0px'
        };

        // Intersection Observer callback
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Trigger animasi dengan delay minimal untuk smooth effect
                    requestAnimationFrame(() => {
                        entry.target.classList.add('active');
                    });
                }
            });
        }, observerOptions);

        // Observe all scroll-reveal elements
        const revealElements = document.querySelectorAll('.scroll-reveal, .scroll-reveal-left, .scroll-reveal-right, .scroll-reveal-scale, .scroll-reveal-rotate');
        revealElements.forEach(element => {
            observer.observe(element);
        });
    });

    // ===== SCROLL DIRECTION ANIMATION =====
    let lastScrollTop = 0;
    let scrollDirection = 'up';
    const scrollElements = document.querySelectorAll('.scroll-reveal, .scroll-reveal-left, .scroll-reveal-right');

    window.addEventListener('scroll', function() {
        const scrollTop = window.scrollY;

        // Deteksi scroll direction
        if (scrollTop > lastScrollTop) {
            // Scrolling DOWN
            scrollDirection = 'down';
        } else {
            // Scrolling UP
            scrollDirection = 'up';
        }

        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    }, { passive: true });

    // Smooth scroll helper function
    window.smoothScroll = function(target) {
        const element = document.querySelector(target);
        if (element) {
            element.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    };
</script>

@endsection