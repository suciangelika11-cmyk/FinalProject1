# Relasi Antar Model/Entitas

## Overview
Dokumentasi lengkap relasi antar model dalam aplikasi GBI Tambunan.

---

## 1. USER
**Role:** Admin/User Management
- `HasMany` Khotbah
- `HasMany` Pengumuman
- `HasMany` Jadwal
- `HasMany` Galeri
- `HasMany` Kontak (opsional)
- `HasMany` Tentang (opsional)

**Foreign Keys dalam tabel:**
- user_id (dalam: khotbah, pengumuman, jadwal, galeri, kontak, tentang)

```php
$user->khotbahs();      // Ambil semua khotbah dari user
$user->pengumumans();   // Ambil semua pengumuman dari user
$user->jadwals();       // Ambil semua jadwal dari user
$user->galeris();       // Ambil semua galeri dari user
```

---

## 2. PELAYANAN (Layanan/Departemen)
**Role:** Manajemen Layanan Gereja
- `HasMany` PelayananAnggota
- `HasMany` Jadwal

**Foreign Keys dalam tabel:**
- pelayanan_id (dalam: pelayanan_anggotas, jadwal)

```php
$pelayanan->anggotas();   // Ambil semua anggota pelayanan
$pelayanan->jadwals();    // Ambil semua jadwal pelayanan
```

---

## 3. PELAYANAN_ANGGOTA (Anggota Pelayanan)
**Role:** Data Anggota dalam Pelayanan
- `BelongsTo` Pelayanan

**Foreign Keys:**
- pelayanan_id

```php
$anggota->pelayanan;  // Ambil pelayanan dari anggota
```

---

## 4. JEMAAT (Data Jemaat)
**Role:** Data Keanggotaan Jemaat
- `HasMany` PelayananAnggota (opsional, jika diasosiasikan)
- `BelongsTo` User (opsional, jika ada user account)

**Foreign Keys (opsional):**
- user_id (jika jemaat memiliki akun user)

```php
$jemaat->pelayanan_anggotas();  // Ambil relasi dengan pelayanan
$jemaat->user();                // Ambil akun user jemaat
```

---

## 5. KHOTBAH (Sermon/Khotbah)
**Role:** Manajemen Video Khotbah
- `BelongsTo` User (pemberi khotbah/uploader)

**Foreign Keys:**
- user_id

```php
$khotbah->user;  // Ambil user yang membuat khotbah
```

---

## 6. PENGUMUMAN (Announcement)
**Role:** Manajemen Pengumuman
- `BelongsTo` User (pembuat pengumuman)

**Foreign Keys:**
- user_id

```php
$pengumuman->user;  // Ambil user yang membuat pengumuman
```

---

## 7. JADWAL (Schedule)
**Role:** Manajemen Jadwal Ibadah
- `BelongsTo` User (pembuat jadwal)
- `BelongsTo` Pelayanan (jadwal untuk pelayanan tertentu)

**Foreign Keys:**
- user_id
- pelayanan_id

```php
$jadwal->user;       // Ambil user yang membuat jadwal
$jadwal->pelayanan;  // Ambil pelayanan terkait
```

---

## 8. GALERI (Gallery)
**Role:** Manajemen Galeri Foto
- `BelongsTo` User (uploader foto)

**Foreign Keys:**
- user_id

```php
$galeri->user;  // Ambil user yang upload foto
```

---

## 9. KONTAK (Contact Information)
**Role:** Informasi Kontak Gereja
- `BelongsTo` User (opsional, admin yang manage)

**Foreign Keys (opsional):**
- user_id

```php
$kontak->user;  // Ambil user yang manage kontak
```

---

## 10. TENTANG (About Us)
**Role:** Informasi Tentang Gereja
- `BelongsTo` User (opsional, admin yang manage)

**Foreign Keys (opsional):**
- user_id

```php
$tentang->user;  // Ambil user yang manage tentang
```

---

## 11. PROFIL (Profile)
**Role:** Profil Tambahan
- `BelongsTo` User

**Foreign Keys (opsional):**
- user_id

```php
$profil->user;  // Ambil user terkait
```

---

## Diagram Relasi Entities

```
┌─────────────┐
│    USER     │ (Super Admin, Admin, etc)
├─────────────┤
│ id          │
│ name        │
│ email       │
│ role        │
│ phone       │
│ foto        │
└─────────────┘
      ▲
      │ 1:Many
      ├──────────┬──────────┬──────────┬──────────┐
      │          │          │          │          │
   ┌──┴──┐  ┌───┴───┐  ┌───┴───┐  ┌───┴───┐  ┌──┴───┐
   │     │  │       │  │       │  │       │  │      │
┌──▼─────┴─┬┴───────┴──┴───────┴──┴───────┴──┴──────┴─┐
│ KHOTBAH  │  PENGUMUMAN  │  JADWAL  │  GALERI  │  KONTAK  │
└─────────┬─┘  ┌─────────┐  │TENTANG │ │PROFIL  │  │JEMAAT  │
          │    │         │  │        │ │        │  └────────┘
          │    │user_id  │  │user_id │ │user_id │
          │    │         │  └────────┘ └────────┘
          │    │         │
          │    │    ┌────┴─────┐
          │    │    │           │
          │    │    │ pelayanan_id
          │    │    │  ┌────────┘
          │    │    │  │
          │    └────┼──┼────────────┐
          │         │  │            │
          └─────────┼──┘  ┌─────────┴────────┐
                    │     │                  │
              ┌─────▼─────┴──────────┐  ┌────▼─────────────┐
              │    PELAYANAN         │  │ PELAYANAN_ANGGOTA│
              ├──────────────────────┤  ├───────────────────┤
              │ id                   │  │ id                │
              │ title                │  │ pelayanan_id      │
              │ category             │◄─┤ nama              │
              │ leader               │  │ bagian            │
              │ description          │  └───────────────────┘
              │ icon                 │
              │ photo                │
              └──────────────────────┘
```

---

## Catatan Penting

### Foreign Keys yang Perlu Ditambahkan ke Database
Jika belum ada, tambahkan foreign keys berikut dengan migration baru:

```php
// Untuk tabel khotbah
$table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');

// Untuk tabel pengumuman
$table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');

// Untuk tabel jadwal
$table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
$table->foreignId('pelayanan_id')->nullable()->constrained('pelayanan')->onDelete('set null');

// Untuk tabel galeri
$table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');

// Untuk tabel kontak (opsional)
$table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');

// Untuk tabel tentang (opsional)
$table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');

// Untuk tabel jemaat (opsional)
$table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');

// Untuk tabel profil (opsional)
$table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
```

### Penggunaan Relasi dalam Code

```php
// Eager Loading (untuk performa)
$khotbahs = Khotbah::with('user')->get();

// Lazy Loading
$khotbah = Khotbah::find(1);
$userName = $khotbah->user->name;

// Insert dengan relasi
$user = User::find(1);
$user->khotbahs()->create([
    'title' => 'Khotbah Minggu',
    'description' => 'Deskripsi',
    'video' => 'video-url',
]);
```

---

**Last Updated:** May 4, 2026
