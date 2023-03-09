@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Selamat Mengadu hhahahha') }}</div>

                <div class="card-body">
                <div class="form-group">
                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Aku mau ngadu dulu ke pemerintah
                </button>
                </div>
                @include('create')
                @include('Masyarakat.edit')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        var data = document.getElementById('table');
        new DataTable(data);
    </script>
@endsection
