@extends('layouts.app')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="row">

                    <div class="card-body m-2">
                        <div class="row">
                        <div class="m-2 card" style="width: 18rem;">
                                <!-- <img src="..." class="card-img-top" alt="..."> -->
                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Pengaduan</h5>
                                    <h3>{{$pengaduan}}</h3>
                                    <a href="{{ route('Masyarakat.index') }}" class="btn btn-primary">Cek</a>
                                </div>
                            </div>
                            <div class="m-2 card" style="width: 18rem;">
                                <!-- <img src="..." class="card-img-top" alt="..."> -->
                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Akun</h5>
                                    <h3>{{$user}}</h3>
                                    <p class="card-text"></p>
                                    <!-- <a href="" class="btn btn-primary">Go somewhere</a> -->
                                </div>
                            </div>
                            
                            <div class="m-2 card" style="width: 18rem;">
                            <!-- <img src="..." class="card-img-top" alt="..."> -->
                            <div class="card-body">
                                <h5 class="card-title">Sudah Tanggapi</h5>
                                <h3>{{$tanggapan}}</h3>
                                <p class="card-text"></p>
                                <a href="{{ url('/tanggapanview') }}" class="btn btn-primary">Cek</a>
                            </div>
                        </div>
                            <div class="m-2 card" style="width: 18rem;">
                            <!-- <img src="..." class="card-img-top" alt="..."> -->
                            <div class="card-body">
                                <h5 class="card-title">Belum di Tanggapi</h5>
                                <h3>{{$belum_ditanggapi}}</h3>
                                <p class="card-text"></p>
                                <a href="{{ url('/tanggapanview') }}" class="btn btn-primary">Cek</a>
                            </div>
                        </div>
                        </div>
                    </div>
    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
