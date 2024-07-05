<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Models\Bank;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengeluaran = Pengeluaran::all();
        return view('pengeluaran.index', compact('pengeluaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bank = Bank::all();
        $pengeluaran = Pengeluaran::all();
        return view('pengeluaran.create', compact('pengeluaran', 'bank'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pengeluaran = new Pengeluaran;
        $pengeluaran->saldo_pengeluaran = $request->saldo_pengeluaran;
        $pengeluaran->id_bank = $request->id_bank;
        $pengeluaran->keterangan = $request->keterangan;


        $bank = Bank::findOrFail($pengeluaran->id_bank);
        $bank->total_saldo -= $request->saldo_pengeluaran-0;

        // periksa apakah stok cukup
        if ($bank->total_saldo < $request->saldo_pengeluaran) {
            return redirect()->route('pengeluaran.index')->with('error', 'Stok tidak mencukupi!');
        }
    $bank->save();

    $pengeluaran->save();
    return redirect()->route('pengeluaran.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pengeluaran $pengeluaran)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        return view('pengeluaran.show', compact('pengeluaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengeluaran $pengeluaran)
    {
        $bank = Bank::all();
        $pengeluaran = Pengeluaran::all();
        return view('pengeluaran.edit', compact('pengeluaran', 'bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $pengeluaran = new Pengeluaran;
            $pengeluaran->saldo_pengeluaran = $request->saldo_pengeluaran;
            $pengeluaran->id_bank = $request->id_bank;
            $pengeluaran->keterangan = $request->keterangan;


            $bank = Bank::findOrFail($pengeluaran->id_bank);
            $bank->total_saldo -= $request->saldo_pengeluaran-0;
        $bank->save();

        $pengeluaran->save();
        return redirect()->route('pengeluaran.index')->with('success', 'Data berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $pengeluaran->delete();
        return redirect()->route('pengeluaran.index')->with('success', 'Data Berhasil Dihapus');
    }
}
