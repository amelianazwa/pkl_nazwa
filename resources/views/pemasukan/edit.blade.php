@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data Pemasukan</div>
                <div class="card-body">
                    <form action="{{ route('pemasukan.update', $pemasukan->id )}} " method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Saldo Pemasukan</label>
                            <input type="text" class="form-control" name="saldo_pemasukan" value="{{ $pemasukan->saldo_pemasukan}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1">Jenis Bank</label>
                            <select class="form-control" name="id_bank">
                                @foreach( $bank as $data )
                                    <option value="{{$data->id}}">{{$data->jenis_bank}}</option>
                                @endforeach
                            </select>
                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" value="{{ $pemasukan->keterangan}}">
                        </div>

                            <button type="submit" class="btn btn-primary">Edit</button>
                            <a href="{{url('pemasukan')}}" class="btn btn-primary ms-4">Kembali</a>

                        </form>

                </div>
        </div>
    </div>
</div>
</div>
@endsection
