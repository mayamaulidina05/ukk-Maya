@if(Session::has('success'))
<div class="alert alert-success" role="alert">
  {{Session::get('success')}}
</div>
@endif
<table class="table table-bordered" id="table">
    <thead>
      <th>Tanggal</th>
      <th>NIK</th>
      <th>Laporan</th>
      <th>Foto</th>
      <th>Status</th>
      <th>Option</th>
    </thead>
    <tbody>
        @foreach ($pengaduan as $pd)
        <tr>
           <td>{{ $pd->tgl_pengaduan}}</td>
           <td>{{ $pd->nik}}</td>
           <td>{{ $pd->isi_laporan}}</td>
           <td><img src="{{ asset('images') }}/{{ $pd->foto }}" width="50px" height="50px"></td>
           <td>@if($pd->status == 0 )Proses @else {{ $pd->status}} @endif</td>
           <td>
           <form action="{{ route('pengaduan.destroy', $pd->id) }}" onsubmit="return confirm('Ingin menghapus {{ $pd->nik }} ? ');" method="post">
                @csrf
                @method('DELETE')                
                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal{{$pd->id}}">
                <i class="fas fa-pen"></i>
                </button>
                
                <button class="btn btn-danger" type="submit"  ><i class="fas fa-trash"></i></button>
           </form>
        <!-- <from action="{{ route('pengaduan.destroy', $pd->id) }}" onsubmit="return confirm('yakin ingin hapus')" method="POST">
            @csrf
            @method('delete')

            <button type="submit" class="btn btn-danger mb-2">
            Hapus
            </button>
        </form> -->
        
      </td>
      <div class="modal fade" id="exampleModal{{$pd->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ada Yang Salah?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ route('pengaduan.update', $pd->id) }}" enctype="multipart/form-data">

        @csrf 
        @method('PUT')

            <input type="hidden" name="id" value="{{ $pd->id }}">
            <div class="mb-3">
               <label for="exampletanggapan" class="form-label">Laporan</label>
               <input type="text" value="{{ $pd->isi_laporan }}" name="isi_laporan" class="form-control">
            </div>
            <div class="mb-3">
               <label for="exampleInputfoto" class="form-label">Foto</label>
               <input type="file" name="image" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <input type="submit" class="btn btn-primary" value="EDIT">
        </div>
    </form>
    </div>
  </div>
</div>
        @endforeach
    </tbody>


    
</table>