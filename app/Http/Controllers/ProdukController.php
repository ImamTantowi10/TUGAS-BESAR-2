<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Http\Requests\StoreprodukRequest;
use App\Http\Requests\UpdateprodukRequest;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function ViewProduk()
    {
        //$produk = Produk::all(); //mengambil semua data di tabel produk
        $isAdmin = Auth::user()->role == 'admin';
        //jika user adalah admin, maka tampilkan semua data, jika bukan admin, maka tampilkan data dengan user_id yang sama dengan user yang login
        $produk = $isAdmin ? Produk::all() : Produk::where('user_id', Auth::user()->id)->get();

        return view('produk', ['produk' => $produk]);
    }

    public function CreateProduk(Request $request)
    {
        //menambahkan variabel $filePath untuk mendefinisikan penyimpanan file
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageName = time() . '_' . $imageFile->getClientOriginalName();
            $imageFile->storeAs('public/images', $imageName); // Store the image in the 'storage/app/public/images' directory
        }
        Produk::create([
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'jumlah_produk' => $request->jumlah_produk,
            'image' => $imageName,
            'user_id' => Auth::user()->id
        ]);

        return redirect(Auth::user()->role.'/produk');
    }
}
