<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>Pendaftaran Jemaat Dikonfirmasi</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif; line-height: 1.8; color: #333333; max-width: 700px; margin: auto;">

```
<div style="text-align: center; margin-bottom: 30px;">
    <img src="{{ asset('gambar/gbi.jpeg') }}" alt="GBI Tambunan" width="120">
    <h2 style="color:#1e4f8a; margin-top:15px;">
        Pendaftaran Jemaat Berhasil Dikonfirmasi
    </h2>
</div>

<p>
    <strong>Shalom, {{ $jemaat->nama_lengkap }} 🙏</strong>
</p>

<p>
    Salam sejahtera dalam kasih Tuhan Yesus Kristus.
</p>

<p>
    Dengan penuh sukacita, kami mengucapkan selamat datang kepada Anda sebagai bagian dari keluarga besar
    <strong>GBI Tambunan</strong>.
</p>

<p>
    Kami ingin memberitahukan bahwa data pendaftaran jemaat yang telah Anda kirimkan sebelumnya
    telah kami periksa dan <strong>berhasil dikonfirmasi</strong>.
</p>

<p>
    Kami bersyukur atas kerinduan Anda untuk bertumbuh bersama dalam persekutuan, penyembahan,
    pelayanan, dan kehidupan rohani di tengah keluarga besar gereja ini.
</p>

<div style="background:#f5f8fc; border-left:4px solid #1e4f8a; padding:15px 20px; margin:25px 0;">
    <h3 style="margin-top:0;">Informasi Konfirmasi</h3>

    <p style="margin:5px 0;">
        <strong>Nama Jemaat:</strong> {{ $jemaat->nama_lengkap }}
    </p>

    <p style="margin:5px 0;">
        <strong>Status:</strong> Terkonfirmasi ✅
    </p>

    <p style="margin:5px 0;">
        <strong>Tanggal Konfirmasi:</strong> {{ now()->format('d F Y') }}
    </p>
</div>

<p>
    Kami berharap kehadiran Anda menjadi berkat, dan melalui kebersamaan dalam Tuhan,
    kita dapat saling menguatkan serta bertumbuh semakin dewasa dalam iman.
</p>

<p>
    Apabila Anda membutuhkan informasi mengenai jadwal ibadah, pelayanan,
    komunitas, atau kegiatan gereja lainnya, jangan ragu untuk menghubungi kami.
</p>

<div style="text-align:center; margin:35px 0;">
    <a href="{{ route('home') }}"
       style="background:#1e4f8a; color:#ffffff; padding:12px 24px; text-decoration:none; border-radius:6px;">
        Kunjungi Website Gereja
    </a>
</div>

<p>
    Kiranya kasih karunia, damai sejahtera, dan penyertaan Tuhan senantiasa menyertai kehidupan Anda dan keluarga.
</p>

<p>
    Tuhan Yesus memberkati. 🙏
</p>

<br>

<p>
    Salam kasih dalam Kristus,<br>
    <strong>Majelis dan Pelayan GBI Tambunan</strong><br>
    Gereja Bethel Indonesia
</p>

<hr style="margin-top:40px;">

<p style="font-size:12px; color:#777777; text-align:center;">
    Email ini dikirim secara otomatis oleh sistem GBI Tambunan.
    Mohon tidak membalas email ini.
</p>
```

</body>
</html>
