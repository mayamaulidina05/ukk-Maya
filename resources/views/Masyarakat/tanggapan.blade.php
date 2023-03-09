@extends('layouts.app')
@section('content')
<!-- <button class="btn btn-primary mb-2">Tambah Pengaduan</button> -->
<div class="card">
  <div class="card-header">Tanggapan</div>
  <div class="card-body">
  <table class="table table-bordered" style="100%">
  <thead>
    <tr>
      <th>No</th>
      <th>Tanggal</th>
      <th>NIK</th>
      <th>Laporan</th>
      <th>Foto</th>
      <th>Tanggapan</th>
    </tr>
  </thead>
  <tbody>   
    @for ($i = 0; $i < $a; $i++) 
      <tr>
        <td>{{ 1+$i++ }}</td>
        <td>{{ $data[$i-1]['tanggal'] }}</td> 
        <td>{{ $data[$i-1]['nik'] }}</td> 
        <td>{{ $data[$i-1]['laporan'] }}</td> 
        <td><img src="{{ asset('images')}}/{{$data[$i-1]['foto']}}" height="50px" width="50px" alt=""></td> 
        <td>{{ $data[$i-1]['tanggapan'] }}</td> 
      </tr>
    @endfor
  </tbody>
</table>
  </div>
</div>

@endsection

@section('script')
    <script>
        var data = document.getElementById('table');
        new DataTable(data);
    </script>
@endsection