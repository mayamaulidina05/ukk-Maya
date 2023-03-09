@extends('layout')

@section('title', ' Daftar Pengaduan | Sistem Pengaduan Masyarakat')
@section('content')
<div class="container mt-5">
    <div class="row mt-5 justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header text-center">
                    <strong>Cetak Laporan</strong>
                </div>
                <div class="card-body">
                  <a href="{{url('generate_report')}}" class="btn btn-primary my-2">Cetak</a>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Pengaduan</th>
                                    <th>Nama Pelapor</th>
                                    <th>Tanggal Pengaduan</th>
                                    <th>Foto</th>
                                    <th>Nama Petugas</th>
                                    <th>Tanggal Pengaduan</th>
                                    <th>isi Tanggapan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @forelse ($tanggapan as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$item->pengaduan->isi_laporan}}</td>
                                    <td>{{$item->auth()->user()->type == '0'}</td>
                                    <td>{{$item->pengaduan->tgl_pengaduan}}</td>
                                    <img src="{{ asset('images')}}/{{$item->pengaduan->['foto']}}" height="50px" width="50px" alt=""></td>
                                    <td>{{$item->auth()->user()->type == '2'}}</td>
                                    <td>{{$item->tgl_tanggapan}}</td>
                                    <td>{{$item->tanggapan}}</td>
                                    <td>@if($item->status == 0 )Tanggapi @else {{ $item->status}} @endif</td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="6">Data Pengaduan Tidak tersedia</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection