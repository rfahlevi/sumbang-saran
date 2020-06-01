<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="icon" href="{{url('assets/img/favicon.ico')}}" type="image/x-icon" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <title>Sumbang Saran</title>
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
          <div class="col-12 float-right"> 
            <ul class="nav float-right">
              <li class="nav-item">
                <a href="{{url('/login')}}" class="btn btn-danger mt-2 font-weight-bold"><i class="fas fa-unlock-alt"></i> Login</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="row justify-content-center no-gutters persetujuan">
            <div class="col-md-4 offset-md-1 col-sm-12 persetujuan-kiri">
              <h2 class="text-center">Sumbang Saran Karyawan</h2>
              <img src="{{url('assets/img/banner-persetujuan.png')}}" alt=" Responsive Image" class="img-fluid mx-auto d-block">

                <div class="hitungmundur mx-auto d-block">
                  <h5 class="periode">Periode Sumbang Saran : </h5>
                  @if(!empty($jadwal))
                  <h5 class="font-italic font-weight-bold tanggal">{{$jadwal->created_at->format('d M Y')}} - {{date('d M Y', strtotime($jadwal->selesai))}}</h5>
                  @else
                  <h5 class="font-italic font-weight-bold tanggal">Sudah Selesai</h5>
                  @endif
                  @if(!empty($jadwal))
                  <input type="hidden" id="end" value="{{$jadwal->selesai}}">
                  <p class="waktu-tersisa">Waktu tersisa :</p>

                  <div class="box">
                    <p id="days" class="satuan-angka"></p>
                    <p class="satuan-teks">Hari</p>
                  </div>
                  <div class="box">
                    <p id="hours" class="satuan-angka"></p>
                    <p class="satuan-teks">Jam</p>
                  </div>
                  <div class="box">
                    <p id="minutes" class="satuan-angka"></p>
                    <p class="satuan-teks">Menit</p>
                  </div>
                  <div class="box">
                    <p id="seconds" class="satuan-angka"></p>
                    <p class="satuan-teks">Detik</p>
                  </div>
                  @endif
                </div>

            </div>

              <div class="col-md-6 col-sm-12 text-center persetujuan-kanan">
                <h4 class="text-center">Syarat & Ketentuan</h4>
                <div class="row justify-content-center">
                  <div class="ketentuan text-left">
                          <li>Sebelum menggunakan fitur ini kita awali dengan basmallah</li>
                          <li>Peserta yang mengisi Fitur ini harus mengikuti aturan yang berlaku</li>
                          <li>Peserta harus menggunakan bahasa yang baik dan benar</li>
                          <li>Peserta yang menggunakan Fitur ini harus menggunakan data yang valid dan tidak mengada-ada</li>
                          <li>Pasal 27 ayat 3 UU ITE : Melarang setiap orang dengan sengaja dan tanpa hak mendistribusikan dan/atau mentransmisikan dan/atau membuat dapat di aksesnya informasi Elektronik dan/atau Dokumen Elektronik yang memiliki muatan penghinaan dan/atau pencemaran nama baik</li>
                  </div>
                </div>
                @if(!empty($jadwal))
                <div class="form-check my-2">
                    <input type="checkbox" class="form-check-input mt-2" id="yourBox">
                    <label class="form-check-label" for="yourBox"> <small class="text-muted">Saya telah membaca dan memahami syarat & ketentuan diatas</small></label>
                </div>
                <button onclick="window.location.href='/input'" id="yourbutton" disabled class="btn btn-primary d-block mx-auto font-weight-bold setuju" style="width: 100px;">Setuju</button>
                @endif
              </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
       document.getElementById('yourBox').onchange = function() {
       document.getElementById('yourbutton').disabled = !this.checked;
       };
    </script>

  
    {{-- Jam Digital --}}
    <script>
    
    var dt = document.getElementById("end").value;
    var now = new Date(dt);
    var dateNow = now.toLocaleDateString('en-us', {timeZone: 'Asia/Jakarta'});
    dateNow = dateNow.split('/');
    var dateString = dateNow[2] + '/' + dateNow[0] + '/' + dateNow[1] + ' ' + dt.split(' ')[1];
    var countDownDate = new Date(dateString);
    countDownDate.setMinutes(countDownDate.getMinutes() + 1);
    //console.log(countDownDate);
    // Update the count down every 1 second
    var x = setInterval(function() {
        // Get todays date and time
        var now = new Date().getTime();
        //console.log(now);
        // Find the distance between now an the count down date
        var distance = countDownDate.getTime() - now;
        //console.log(distance);

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        if (days < 0)  {
            days = 0;
        }

        if (hours < 0) {
            hours = 0;
        }

        if (minutes < 0) {
            minutes = 0;
        }

        if (seconds < 0) {
            seconds = 0;
        }

        $('#days').html(days);
        $('#hours').html(hours);
        $('#minutes').html(minutes);
        $('#seconds').html(seconds);
        $('#finish').html(now);

        if (distance <= 0) {
            clearInterval(x);
            $('.countdown').css("display", "none");
        }
    }, 1000);
    </script>

    {{-- Parallax effect --}}
    <script>  
      $(window).on('load', function() {
          $('.persetujuan-kiri').addClass('showpersetujuan');
          $('.persetujuan-kanan').addClass('showpersetujuan');
      })
    </script>

    {{-- Tooltip --}}



  </body>
</html>