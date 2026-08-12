<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;

class PesertaController extends Controller
{
    public function index()
    {
        // GET
        $pesertas = Peserta::get('*');
        $title = "Data Peserta";
        return view('peserta.index', compact('pesertas', 'title'));
    }
    public function create()
    {
        // GET
        $title = "Tambah Peserta";
        return view('peserta.create', compact('title'));
    }
    public function store(Request $request)
    {

        Peserta::create([
            'name' => $request->nama,
            'email' => $request->email,
            'age' => $request->umur,
            'address' => $request->address,
        ]);

        return redirect()->to('peserta');
    }


}
