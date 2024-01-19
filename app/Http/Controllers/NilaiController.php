<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $nilai = Nilai::get();

        return response()->json(['nilai'=>$nilai]);
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
        $nilai = new Nilai;
        $nilai->mataPelajaran = $request->input('mataPelajaran');
        $nilai->latihanSoal = $request->has('latihanSoal') ? $request->input('latihanSoal') : ([random_int(70, 100), random_int(70, 100), random_int(70, 100), random_int(70, 100)]);
        $nilai->ulanganHarian = $request->has('ulanganHarian') ? $request->input('ulanganHarian') : ([random_int(70, 100), random_int(70, 100)]);
        $nilai->UTS = $request->has('UTS') ? $request->input('UTS') : (random_int(70, 100));
        $nilai->UAS = $request->has('UAS') ? $request->input('UAS') : (random_int(70, 100));
        $nilai->avgScore = $nilai->calculateScore($nilai->latihanSoal, $nilai->ulanganHarian);

        $nilai->save();

        return response()->json(['message'=>'berhasil menambahkan nilai', 'nilai'=>$nilai]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $nilai = Nilai::find($id);
        $nilai->mataPelajaran = $request->input('mataPelajaran');
        $nilai->latihanSoal = $request->input('latihanSoal');
        $nilai->ulanganHarian = $request->input('ulanganHarian');
        $nilai->UTS = $request->input('UTS');
        $nilai->UAS = $request->input('UAS');
        $nilai->avgScore = $nilai->calculateScore($nilai->latihanSoal, $nilai->ulanganHarian);

        $nilai->save();

        return response()->json(['message'=>'berhasil memperbarui nilai', 'nilai'=>$nilai]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
