<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Bank;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemasukan = Pemasukan::all();
        return view('pemasukan.index', compact('pemasukan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $bank = Bank::all();
        $pemasukan = Pemasukan::all();
        return view('pemasukan.create', compact('pemasukan', 'bank'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pemasukan = new Pemasukan;
            $pemasukan->saldo_pemasukan = $request->saldo_pemasukan;
            $pemasukan->id_bank = $request->id_bank;
            $pemasukan->keterangan = $request->keterangan;


            $bank = Bank::findOrFail($pemasukan->id_bank);
            $bank->total_saldo += $request->saldo_pemasukan+0;

        $bank->save();

        $pemasukan->save();
        return redirect()->route('pemasukan.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemasukan $pemasukan)
    {
        $pemasukan = Pemasukan::findOrFail($id);
        return view('pemasukan.show', compact('pemasukan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bank = Bank::all();
        $pemasukan = Pemasukan::findOrFail($id);
        return view('pemasukan.edit', compact('pemasukan', 'bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pemasukan = Pemasukan::FindOrFail($id);
        $pemasukan->saldo_pemasukan = $request->saldo_pemasukan;
        $pemasukan->id_bank = $request->id_bank;
        $pemasukan->keterangan = $request->keterangan;


        $bank = Bank::findOrFail($pemasukan->id_bank);
    $bank->save();

    $pemasukan->save();
    return redirect()->route('pemasukan.index')->with('success', 'Data berhasil dirubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pemasukan = Pemasukan::findOrFail($id);
        $pemasukan->delete();
        return redirect()->route('pemasukan.index')->with('success', 'Data Berhasil Dihapus');
    }
}
