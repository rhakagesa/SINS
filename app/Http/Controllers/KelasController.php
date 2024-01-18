<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kelas = Kelas::get();
        
        return response()->json(['kelas'=>$kelas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $kelas = new Kelas;
        $kelas->namaKelas = $request->input('namaKelas');
        $kelas->listSiswa = $request->input('listSiswa');

        $kelas->save();

        return response()->json(['message'=>'berhasil menambahkan kelas', 'kelas'=>$kelas]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $kelas = Kelas::find($id);
        
        return response()->json(['kelas'=>$kelas]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $kelas = Kelas::find($id);
        $kelas->namaKelas = $request->input('namaKelas');
        $kelas->listSiswa = $request->input('listSiswa');
        $kelas->save();

        return response()->json(['message' => 'berhasil memperbarui kelas', 'kelas' => $kelas]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
