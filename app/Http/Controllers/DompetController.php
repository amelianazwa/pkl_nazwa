<?php

namespace App\Http\Controllers;

use App\Models\Dompet;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\Bank;
use Illuminate\Http\Request;

class DompetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dompet = Dompet::all();
        return view('dompet.index', compact('dompet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $pemasukan = Pemasukan::all();
        $pengeluaran = Pengeluaran::all();
        $bank = Bank::all();
        $dompet = Dompet::all();
        return view('dompet.create', compact('dompet', 'pemasukan', 'pengeluaran', 'bank'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dompet = new Dompet;
            $dompet->id_pemasukan = $request->id_pemasukan;
            $dompet->id_pengeluaran = $request->id_pengeluaran;
            $dompet->id_bank = $request->id_bank;

            $pemasukan = Pemasukan::findOrFail($dompet->id_pemasukan);
            $pengeluaran = Pengeluran::findOrFail($dompet->id_pengeluaran);
            $bank = Bank::findOrFail($dompet->id_bank);

            $pemasukan->save();
            $pengeluaran->save();
            $bank->save();
        $dompet->save();
        return redirect()->route('dompet.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dompet  $dompet
     * @return \Illuminate\Http\Response
     */
    public function show(Dompet $dompet)
    {
        $dompet = Dompet::findOrFail($id);
        return view('dompet.show', compact('dompet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dompet  $dompet
     * @return \Illuminate\Http\Response
     */
    public function edit(Dompet $dompet)
    {
        $pemasukan = Pemasukan::all();
        $pengeluaran = Pengeluaran::all();
        $bank = Bank::all();
        $dompet = Dompet::findOrFail($id);
        return view('dompet.edit', compact('dompet', 'pemasukan', 'pengeluaran', 'bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dompet  $dompet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dompet $dompet)
    {
        $dompet = Dompet::FindOrFail($id);
        $dompet->id_pemasukan = $request->id_pemasukan;
        $dompet->id_pengeluaran = $request->id_pengeluaran;
        $dompet->id_bank = $request->id_bank;


        $pemasukan = Pemasukan::findOrFail($dompet->id_pemasukan);
        $pengeluaran = Pengeluran::findOrFail($dompet->id_pengeluaran);
        $bank = Bank::findOrFail($dompet->id_bank);

    $pemasukan->save();
    $pengeluaran->save();
    $bank->save();
    $dompet->save();
    return redirect()->route('dompet.index')->with('success', 'Data berhasil dirubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dompet  $dompet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dompet = Dompet::findOrFail($id);
        $dompet->delete();
        return redirect()->route('dompet.index')->with('success', 'Data Berhasil Dihapus');
    }
}
