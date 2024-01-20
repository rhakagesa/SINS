<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $siswa = Siswa::get(['namaSiswa']);

        foreach($siswa as $siswaItem){
            $nilai = $siswaItem->relationNilai()->get(['mataPelajaran','avgScore']);
            $siswaItem->nilaiMataPelajaran = $nilai;
        }

        return response()->json(['siswa'=>$siswa]);
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
        $siswa = new Siswa;
        $siswa->namaSiswa = $request->input('namaSiswa');
        $siswa->kelas_id = $request->input('kelas_id');

        $siswa->save();

        return response()->json(['message'=>'berhasil menambahkan siswa', 'siswa'=>$siswa]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $siswa = Siswa::find($id);

        return response()->json(['siswa'=>$siswa]);
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
        $siswa = Siswa::find($id);
        $siswa->namaSiswa = $request->input('namaSiswa');

        $siswa->save();

        return response()->json(['message'=>'berhasil memperbarui siswa', 'siswa'=>$siswa]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
