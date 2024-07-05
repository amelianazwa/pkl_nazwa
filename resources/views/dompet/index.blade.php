@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header">Data dompet</div>

                <div class="card-body">
                    <a href="{{ route('dompet.create')}}" class="btn btn-primary">Data dompet</a>
                    @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
            @endif
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Saldo Pemasukan</th>
                            <th scope="col">Saldo Pengeluaran</th>
                            <th scope="col">Jenis Bank</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp

                            @foreach ($dompet as $data)

                          <tr>
                            <th scope="row">{{$no++}}</th>
                            <td>{{$data->saldo_dompet}}</td>
                            <td>{{$data->bank->jenis_bank}}</td>
                            <td>{{$data->keterangan}}</td>
                            <td>
                            <form action="{{route('dompet.destroy', $data->id)}}" method="POST">
                            </td>
                              @csrf
                              @method('DELETE')
                            <td>
                              <a href="{{route('dompet.edit', $data->id)}}" class="btn btn-success">Edit</a>


                                <button class="btn btn-sm btn-danger" type="submit"
                                onclick="return confirm('apakah anda yakin akan menghapus data ini?')">Hapus</button>
                            </td>
                            </form>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection
