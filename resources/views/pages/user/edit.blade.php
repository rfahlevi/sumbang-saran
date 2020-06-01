<form action="{{url('user',$item->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    {{ method_field('PUT') }}
            <div class="text-center mb-5">
                <img id="blah" src="{{url('assets/img/user',$item->foto)}}" class=" img-thumbnail responsive-img img-circle mb-2 " style="width:150px; height:150px;" alt="..."><br>
                <input type='file' name="foto" class="form-control mx-auto col-6" onchange="readURL(this);" />
                <input type="hidden" value="{{$item->foto}}" name="foto_old">
                @error('foto') <div class="text-muted">{{$message}}</div> @enderror
            </div>
            <div class="form-group text-left">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$item->name}}" required>
                @error('name') <div class="text-muted">{{$message}}</div> @enderror
            </div>
            <div class="form-group text-left">
                <label class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$item->email}}" required>
                @error('email') <div class="text-muted">{{$message}}</div> @enderror
            </div>
            <div class="form-group text-left">
                <label class="form-label">Status</label>
                <select name="role" class="form-control form-control-inverse fill col-6 @error('role') is-invalid @enderror" required>
                    <option value="">- Pilih -</option>
                    @if($item->role == 0)
                    <option value="0" selected>Admin</option>
                    <option value="1">Penilai</option>
                    @else
                    <option value="0">Admin</option>
                    <option value="1" selected>Penilai</option>
                    @endif
                </select>
            </div>
            <div class="mb-3 mt-5  text-left">
                <h6>Ubah Password</h6>
                <hr>
            </div>
            <div class="alert alert-danger">
                Isi Form Di Bawah Ini, Jika Ingin Mengubah Password Anda
            </div>
            <div class="form-group text-left">
                <label class="form-label">Password Baru</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                @error('password') <div class="text-muted">{{$message}}</div> @enderror
            </div>
            <div class="form-group text-left">
                <label class="form-label">Konfirmasi Password Baru</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="new-password">
                @error('password_confirmation') <div class="text-muted">{{$message}}</div> @enderror
            </div>

            <div class="d-flex justify-content-end mt-5">
                <button type="button" class="btn btn-default waves-effect mr-2" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-info waves-effect">Simpan</button>
            </div>
</form>

<!-- Ubah Foto -->
<script>
    function readURL(input) {
           if (input.files && input.files[0]) {
               var reader = new FileReader();

               reader.onload = function (e) {
                   $('#blah')
                       .attr('src', e.target.result);
               };

               reader.readAsDataURL(input.files[0]);
           }
       }
</script>