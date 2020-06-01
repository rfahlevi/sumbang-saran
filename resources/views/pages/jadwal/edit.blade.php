<form action="{{url('jadwal',$jadwal->id)}}" method="POST">
    @csrf
    @method('PUT')
        <div class="form-group">
            <label>Pemenang</label>
            <select name="pemenang" class="form-control" required>
                <option value="">- Pilih -</option>
                @foreach($pemenang as $pg)
                <option value="{{$pg->karyawan->nama}}">{{$pg->karyawan->nama}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="">- Pilih -</option>
                @if($jadwal->status == 0)
                <option value="0" selected>Aktif</option>
                <option value="1">Tidak Aktif</option>
                @else
                <option value="0">Aktif</option>
                <option value="1" selected>Tidak Aktif</option>
                @endif
            </select>
        </div>
        <hr>
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-secondary waves-effect mr-2" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary waves-effect waves-light ">Simpan</button>
    </div>
</form>
    