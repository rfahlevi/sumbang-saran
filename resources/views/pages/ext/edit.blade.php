<form action="{{url('extension',$ext->id)}}" method="POST">
    @csrf
    @method('PUT')
        <div class="form-group">
            <label>Bagian</label>
            <select name="bagian_id" class="form-control" required>
                <option value="">- Pilih -</option>
                @foreach($bagian as $bg)
                <option value="{{$bg->id}}" {{$bg->id == $ext->id ? 'selected':''}}>{{$bg->nama}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Ext</label>
            <input type="text" name="nama" class="form-control" value="{{$ext->nama}}" required>
        </div>
        <hr>
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-secondary waves-effect mr-2" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-info waves-effect">Simpan</button>
    </div>
</form>
    