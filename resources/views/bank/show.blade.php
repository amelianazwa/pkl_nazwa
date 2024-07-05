@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Data Bank</div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Jenis Bank</label>
                            <input type="text" class="form-control" name="jenis_bank" value="{{ $bank->jenis_bank}}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No Rekening</label>
                            <input type="text" class="form-control" name="no_rekening" value="{{ $bank->no_rekening}}" disabled>
                        </div>
                        
                            <a href="{{url('kasir')}}" class="btn btn-primary">Kembali</a>

                        </form>

                </div>
        </div>
    </div>
</div>
</div>
@endsection
