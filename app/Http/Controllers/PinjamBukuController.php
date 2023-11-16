<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\PinjamBuku;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class PinjamBukuController extends Controller
{
    /**
     * index
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $pinjaman = Buku::where('status', 'Tersedia')->where('id_penerbit', '!=', auth()->id())->paginate(5);

        return view('pinjam', compact('pinjaman'));
    }

    /**
     * pinjam
     *
     * @param  int  $id_buku
     * @return \Illuminate\Http\RedirectResponse
     */
    public function ambil($id_buku)
    {
        try {
            $buku = Buku::find($id_buku);

            PinjamBuku::create([
                'id_buku' => $buku->id_buku,
                'id_peminjam' => auth()->id(),
                'tanggal_pinjam' => Carbon::now(),
                'tanggal_kembali' => Carbon::now()->addDays(10),
            ]);
            $buku->update(['status' => 'Dipinjam']);

            return redirect()->route('pinjam')->with('success', 'Buku berhasil dipinjam!');
        } catch (Exception $e) {
            return redirect()->route('pinjam');
        }
    }
}
