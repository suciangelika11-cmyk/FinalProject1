<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index(Request $request)     // membuat fungsi index untuk menampilkan data galeri
    {
        $galeri = Galeri::latest()->get() ;                      // Galeri:: fungsinya memanggil model yaitu Galeri;     latest() untuk mengurutkan berdasarkan created_at DESC;     get() untuk mengambil semua data dari tabel galeri          get() untuk ambil seluruh data
        return view('admin.Galeris.index', compact('galeri'));          // membuka file view dan mengirim $galeri ke view
    }

    public function create()        // fungsi form tambah
    {
        return view('admin.Galeris.create');        // membuka file vieww
    }

    public function store(Request $request)     //menerima data dari form tambah dan menyimpan ke database
    {
        $request->validate([            // cek semua input
            'judul' => 'required',
            'deksripsi' => 'required',
            'foto' => 'required|image',
            'tanggal' => 'required|date',
        ]);

        // Validasi custom: jika tanggal diisi, pastikan hari (tanggal) antara 1-31
        if ($request->filled('tanggal')) {
            $tanggal = date_parse($request->tanggal);
            if ($tanggal['day'] < 1 || $tanggal['day'] > 31) {
                return back()->withErrors(['tanggal' => 'Tanggal kegiatan harus antara 1 sampai 31'])->withInput();
            }   // return back() artinya kembali ke halaman sebelumnya dengan pesan error jika validasi gagal, denganInput() untuk mempertahankan input yang sudah diisi pengguna
        }

        $data = $request->all(); // mengambil semua data dari request

        if ($request->hasFile('foto')) {        // cek apakah user upload file foto
            $data['foto'] = $request->file('foto')->store('Galeri', 'public');    // mengambil file dan menyimpan ke folder storage/app/public/Galeri, lalu menyimpan pathnya ke database
        }

        Galeri::create($data); // buat data baru

        return redirect()->route('galeri.index')        // setelah berhasil maka kembali ke halaman index dengan pesan sukses
            ->with('success', 'Galeri berhasil ditambahkan');
    }

    public function show(Galeri $Galeri)  // fungsi untuk menampilkan detail data galeri berdasarkan {galeri} atau id di route; hasilnya masuk ke $Galeri
    {
        return view('admin.Galeris.show', compact('Galeri'));  // membuka file view dan mengirim $Galeri ke view untuk ditampilkan detailnya
    }

    public function edit(Galeri $Galeri)    // mencari data berdasarkan id
    {
        return view('admin.Galeris.edit', compact('Galeri'));   // membuka file view dan mengirim $Galeri ke view untuk ditampilkan di form edit
    }

    public function update(Request $request, Galeri $Galeri)  // menerima data dari form edit dan menyimpan perubahan ke database berdasarkan id yang dipilih
    {
        $request->validate([        // cek semua input
            'judul' => 'required',
            'deksripsi' => 'required',
            'foto' => 'nullable|image',     // foto boleh kosong tetapi jika diisi harus gambar
            'tanggal' => 'required|date'
        ]);

        $data = $request->all();        // mengambil semua data dari input

        if ($request->hasFile('foto')) {    // jika user upload foto baru, maka hapus foto lama dari storage
            if ($Galeri->foto) {
                Storage::disk('public')->delete($Galeri->foto);
            }

            $data['foto'] = $request->file('foto')->store('Galeri', 'public'); // upload foto baru, maka hapus foto lama dari storage
        }

        $Galeri->update($data);

        return redirect()->route('galeri.index')
            ->with('success', 'Galeri berhasil diperbarui');
    }

    public function destroy(Galeri $Galeri)     // menghapus data
    {
        if ($Galeri->foto) {        // jika foto ada
            Storage::disk('public')->delete($Galeri->foto);  // maka file foto dihapus
        }

        $Galeri->delete();  // menghapus berdasarkan id yang dipilih

        return redirect()->route('galeri.index')   // kembali ke halaman admin/galeri dengan pesan sukses
            ->with('success', 'Galeri berhasil dihapus');
    }   
}