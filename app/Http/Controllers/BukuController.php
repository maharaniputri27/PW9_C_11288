<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Exception;

class BukuController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        
        $buku = Buku::where('id_penerbit', auth()->id())->latest()->paginate(5);

        return view('buku.index', compact('buku'));
    }
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('buku.create');
    }
    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //Validasi Formulir
        $this->validate($request, [
            'judul' => 'required',
            'penulis' => 'required',
        ]);


        //Fungsi Simpan Data ke dalam Database

        Buku::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'id_penerbit' => auth()->id(),
            'status' => "Tersedia",
        ]);
        try {
            return redirect()->route('buku.index');
        } catch (Exception $e) {
            return redirect()->route('buku.index');
        }
    }
    /**
     * edit
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        $buku = Buku::find($id);
        return view('buku.edit', compact('buku'));
    }
    /**
     * update
     *
     * @param mixed $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $buku = Buku::find($id);

        $this->validate($request, [
            'judul' => 'required',
            'penulis' => 'required',

        ]);

        $input = $request->all();
        $buku->update($input);

        return redirect()->route('buku.index')->with(['success' => 'Data Berhasil Diuah!']);
    }

    /**
     * destroy
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect()->route('buku.index')->with(['success' => 'Data 
    Berhasil Dihapus!']);
    }
}
