<form action="{{url('bagian')}}" method="POST">
@csrf
    <div class="form-group mb-4">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
<hr>
<div class="d-flex justify-content-end">
    <button type="button" class="btn btn-secondary waves-effect mr-2" data-dismiss="modal">Batal</button>
    <button type="submit" class="btn btn-info waves-effect">Simpan</button>
</div>
</form>
