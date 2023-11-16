<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\PinjamBuku;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MengembalikanController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {


        $buku = PinjamBuku::where('id_peminjam', Auth::id())->select('id_buku')->distinct()->paginate(5);
        $kembalikanBuku = Buku::whereIn('id_buku', $buku->pluck('id_buku'))->paginate(5);

        return view('kembalikan', compact('kembalikanBuku'));
    }



    public function mengembalikan($id_buku)
    {
        try {
            $pinjam = Buku::find($id_buku);
            $pinjam->update(['status' => 'Tersedia']);
            return redirect()->route('kembalikan')->with('success', 'Buku berhasil Dikembalikan!');
        } catch (Exception $e) {
            return redirect()->route('kembalikan');
        }
    }
}
