@extends('layouts.app')
@section('content')
<!-- <button class="btn btn-primary mb-2">Tambah Pengaduan</button> -->
<!-- @if(Session::has('success'))
<div class="alert alert-success" role="alert">
  {{Session::get('success')}}
</div>
@endif -->
<div class="card">
  <div class="card-header">{{ __('Data Pengaduan') }}</div>
    <table class="table table-bordered" id="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Tanggal</th>
          <th>NIK</th>
          <th>Laporan</th>
          <th>Foto</th>
          <th>Status</th>
          <th>Option</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
      @foreach ($pengaduan as $pd)
        <tr>
          <td>{{ $i++ }}</td>
          <td>{{ $pd->tgl_pengaduan}}</td>
          <td>{{ $pd->nik}}</td>
          <td>{{ $pd->isi_laporan}}</td>
          <td><img src="{{ asset('images') }}/{{ $pd->foto }}" width="50px" height="50px"></td>
          <td>@if($pd->status == 0 )Tanggapi @else {{ $pd->status}} @endif</td>
          <td> 
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal{{$pd->id}}">
              <i class="fas fa-message"></i>
            </button>
          </td>
  <div class="modal fade" id="exampleModal{{$pd->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tanggapan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        
        </div>
      <div class="modal-body">
        <form method="GET" action="{{ route('Tanggapan.stores', $pd->id) }}">
        @csrf 
          <input type="hidden" name="id" value="{{ $pd->id }}">
            <div class="mb-3">
               <label for="exampletanggapan" class="form-label">Menanggapi</label>
               <input type="text" name="tanggapan" class="form-control" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button onsubmit="return confirm('apakah anda sudah yakin?{{$pd->name}}?');" type="submit" class="btn btn-primary" id="add">Tambah</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  </div>
</div>
    @endforeach
  </tbody>
</table>
<!-- Button trigger modal -->
<!-- Modal -->
@endsection

@section('script')
    <script>
        var data = document.getElementById('table');
        new DataTable(data);
    </script>
@endsection