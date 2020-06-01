<div class="row">
    <div class="col-md-6 .col-sm-12">
        <div class="form-group">
            <label>Nomor Induk Karyawan : </label>
            <p>{{$ss->karyawan->nik}}</p>
        </div>
    </div>
    <div class="col-md-6 .col-sm-12">
        <div class="form-group">
            <label for="nama">Nama Lengkap :</label>
            <p>{{$ss->karyawan->nama}}</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 .col-sm-12">
        <div class="form-group">
            <label for="bagian">Bagian :</label>
            <p>{{$ss->karyawan->bagian}}</p>
        </div>
    </div>
    <div class="col-md-6 .col-sm-12">
        <div class="form-group">
            <label for="ext">Ext :</label>
            <p>{{$ss->karyawan->ext}}</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 .col-sm-12">
        <div class="form-group">
            <label for="judul">Judul Sumbang Saran :</label>
            <p>{{$ss->judul}}</p>
        </div>
    </div>
    <div class="col-md-6 .col-sm-12">
        <div class="form-group">
            <label for="foto">Foto :</label><br>
            <div class="col-md-6 col-lg-4 item zoom-on-hover"><a href="{{url('assets/images',$ss->foto)}}" data-lightbox="image-1">
                <img style="width:auto; height:200px; margin-bottom:10px;" src="{{url('assets/images',$ss->foto)}}" /></a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 .col-sm-12">
        <div class="form-group">
            <label for="kondisi-awal">Gambarkan Kondisi Awal :</label>
            <p class="text-justify">{{$ss->kondisi_awal}}</p>
        </div>   
    </div>
    <div class="col-md-6 .col-sm-12">
        <div class="form-group">
            <label for="kondisi-akhir">Gambarkan Kondisi Yang Diinginkan :</label>
            <p class="text-justify">{{$ss->kondisi_akhir}}</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 .col-sm-12">

        <div class="form-group">
            <label for="manfaat">Manfaat Bagi Perusahaan :</label>
            <p class="text-justify">{{$ss->manfaat}}</p>
        </div>
    </div>
</div>
