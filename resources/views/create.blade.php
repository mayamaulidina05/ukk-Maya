<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ route('pengaduan.store') }}" enctype="multipart/form-data">
        @csrf 
            <div class="mb-3">
               <label for="exampleInputisi_laporan" class="form-label">Laporan</label>
               <input type="text" name="isi_laporan" class="form-control" required>
            </div>
            <div class="mb-3">
               <label for="exampleInputfoto" class="form-label">Foto</label>
               <input type="file" name="foto" class="form-control" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>
    </div>
  </div>
</div>