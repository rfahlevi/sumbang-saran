<!doctype html>
<html lang="en">
  <head>
    <!--  meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="icon" href="{{url('assets/img/favicon.ico')}}" type="image/x-icon" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
    <title>Sumbang Saran</title>
  </head>
  <body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-10 form-page">
                <img src="{{url('assets/img/banner-sumbangsaran.png')}}" alt="Responsive Image" class="img-fluid mx-auto d-block mt-3 animate">

                <div class="alert alert-primary text-center mt-4 animate" role="alert">
                    Sampaikan Informasi, Saran, Keluhan anda demi kemajuan perusahaan. Kami menjamin <b>kerahasiaan</b> data Anda
                </div>
                <form action="{{url('input')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(!empty($jadwal))
                    <input type="hidden" name="periode" value="{{$jadwal->created_at->format('d M Y')}} - {{date('d M Y', strtotime($jadwal->selesai))}}">
                    @else
                    <input type="hidden" name="periode" value="Periode Sudah Habis">
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group animate">
                                <label>Nomor Induk Karyawan : </label>
                                <input type="number" name="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}" >
                                @error('nik') <span class="error invalid-feedback">{{$message}}</span> @enderror 
                            </div>
                            <div class="form-group animate">
                                <label for="nama">Nama Lengkap :</label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama')}}" >
                                @error('nama') <span class="error invalid-feedback">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group animate">
                                <label for="bagian">Bagian :</label>
                                <select name="bagian" id="bagian" class="form-control @error('bagian') is-invalid @enderror" >
                                    <option value="">- Pilih -</option>
                                    @foreach($bagian as $bg)
                                    <option value="{{$bg->id}}">{{$bg->nama}}</option>
                                    @endforeach
                                </select>
                                @error('bagian') <span class="error invalid-feedback">{{$message}}</span> @enderror
                            </div>
                             <div class="form-group animate">
                                <label for="ext">Ext :</label>
                                <select name="ext" id="subbagian" class="form-control @error('ext') is-invalid @enderror" >
                                    <option value="">- Pilih -</option>

                                    </select>
                                @error('ext') <span class="error invalid-feedback">{{$message}}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group animate">
                        <label for="judul">Judul Sumbang Saran :</label>
                        <input name="judul" type="text" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{old('judul')}}" >
                        @error('judul') <span class="error invalid-feedback">{{$message}}</span> @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 animate">
                            <div class="form-group">
                                <label for="kondisi-awal">Gambarkan Kondisi Awal :</label>
                                <textarea name="kondisi_awal" class="form-control @error('kondisi_awal') is-invalid @enderror" rows="5" >{{old('kondisi_awal')}}</textarea>
                                @error('kondisi_awal') <span class="error invalid-feedback">{{$message}}</span> @enderror
                            </div>        
                        </div>
                        <div class="col-md-6 col-sm-12 animate">
                            <div class="form-group">
                                <label for="foto">Foto : (Boleh dikosongkan)</label><br>
                                <img id="blah" style="height:100px; margin-bottom:10px;" src="{{url('assets/img/dummy.jpg')}}" alt="your image" />
                                <input id="imgInp" accept="images/*" name="foto" type="file" id="foto" class="form-control-file @error('foto') is-invalid @enderror" >
                                @error('foto') <span class="error invalid-feedback">{{$message}}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group animate">
                        <label for="kondisi-akhir">Gambarkan Kondisi Yang Diinginkan :</label>
                        <textarea name="kondisi_akhir" class="form-control @error('kondisi_akhir') is-invalid @enderror" rows="5" >{{old('kondisi_akhir')}}</textarea>
                        @error('kondisi_akhir') <span class="error invalid-feedback">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group animate">
                        <label for="manfaat">Manfaat Bagi Perusahaan :</label>
                        <textarea name="manfaat" class="form-control @error('manfaat') is-invalid @enderror" rows="3" >{{old('manfaat')}}</textarea>
                        @error('manfaat') <span class="error invalid-feedback">{{$message}}</span> @enderror
                    </div>

                    <button  type="submit" class="btn btn-success btn-lg float-right my-3 animate"> Kirim</button>
                </form>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{url('assets/plugins/jquery/jquery.min.js')}}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script>
        $('#bagian').on('change',function(e){
            console.log(e);

            var bagian_id = e.target.value;

            // Ajax
            $.get('ajax-sub?bagian=' + bagian_id, function(data){
                // console.log(data);
                $('#subbagian').html('<option value="">- Pilih -</option>');
                $.each(data,function(index, subbagObj){
                    $('#subbagian').append('<option value="'+subbagObj.id+'">'+subbagObj.nama+'</option>')
                })  
            });
        });
    </script>

    <script>
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
        }

        $("#imgInp").change(function() {
        readURL(this);
        });
    </script>

    {{-- Parallax effect --}}
    {{-- <script>
        $(window).on('load', function() {
            $('.form-page').addClass('show-form');
        });
    </script> --}}
 
    <script>
        $(window).on('load', function() {
            $('.animate').each(function(i) {
                setTimeout(function() {
                    $('.animate').eq(i).addClass('show-form');
                }, 100 * i)
            })
        })
    </script>

</body>
</html>