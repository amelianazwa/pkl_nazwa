@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambahkan Data Bank</div>
                <div class="card-body">
                    <form action="{{ route('bank.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Jenis Bank</label>
                            <input type="text" class="form-control" name="jenis_bank">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No Rekening</label>
                            <input type="text" class="form-control" name="no_rekening">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Total Saldo</label>
                            <input type="text" class="form-control" name="total_saldo">
                        </div>

                        <a href="{{ url('bank') }}" class="btn btn-outline-primaary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>

                        </form>

                </div>
        </div>
    </div>
</div>
</div>
@endsection