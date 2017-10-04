<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Join AMCC</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="sha384-2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <header class="header col-md-3">
        <div class="header-inner">
          <h1>
            {{-- <span class="join">Registrasi</span><br>
            <span class="amcc">AMCC</span> --}}
            <img src="img/logo.png" alt="" class="img-fluid">
          </h1>

          <ul class="socials hidden-sm-down">
            <li><a href="http://amcc.or.id/"><i class="ion-ios-world-outline"></i> amcc.or.id</a></li>
            <li><a href="https://www.facebook.com/AmikomComputerClub/"><i class="ion-social-facebook"></i> AmikomComputerClub</a></li>
            <li><a href="https://instagram.com/amccamikom/"><i class="ion-social-instagram-outline"></i> @amccamikom</a></li>
          </ul>
        </div>
      </header>

      <main class="content col-md-9">
        <div class="row">
          <form action="" method="post" id="register-form" class="col-md-8 offset-md-2">
            <input type="hidden" name="csrf_name" value="{{ $csrf['name'] }}">
            <input type="hidden" name="csrf_value" value="{{ $csrf['value'] }}">
            {{-- <div class="form-group row">
              <label for="registration-no" class="col-sm-3 col-form-label">No. Registrasi</label>
              <div class="col-sm-9">
                <input class="form-control" type="number" id="registration-no" name="registration-no" placeholder="No. Registrasi">
              </div>
            </div> --}}

            @if ($helper->getSettings()['announcement'])
              <div class="alert alert-info" role="alert">
                {!! $helper->getSettings()['announcement'] !!}
              </div>
            @endif

            @include('partials.notifs')

            <div class="form-group">
              <div class="user-image">
                <i class="icon ion-android-person"></i>
              </div>
            </div>
            <div class="form-group row">
              <label for="nim" class="col-sm-3 col-form-label">NIM</label>
              <div class="col-sm-9">
                <input class="form-control" type="text" id="nim" name="nim" placeholder="Contoh: 14.11.9999" required data-parsley-remote="http://amikom-dispatch.rizqy.me/mahasiswa/{value}" data-parsley-group="nim">
              </div>
            </div>
            <div class="form-group row">
              <label for="fullname" class="col-sm-3 col-form-label">Nama Lengkap</label>
              <div class="col-sm-9">
                <input class="form-control" type="text" id="fullname" name="fullname" placeholder="Nama lengkap" required data-parsley-group="nim">
              </div>
            </div>
            <div class="form-group row">
              <label for="addres" class="col-sm-3 col-form-label">Alamat Asal</label>
              <div class="col-sm-9">
                <textarea class="form-control" name="address" id="address" rows="2" placeholder="Alamat asal" required></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="phone" class="col-sm-3 col-form-label">No. Handphone</label>
              <div class="col-sm-9">
                <input class="form-control" type="text" id="phone" name="phone" placeholder="Contoh: 085234567890" required data-parsley-type="number">
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-sm-3 col-form-label">E-mail</label>
              <div class="col-sm-9">
                <input class="form-control" type="email" id="email" name="email" placeholder="E-mail kamu">
              </div>
            </div>
            <div class="form-group row">
              <label for="school" class="col-sm-3 col-form-label">Asal Sekolah</label>
              <div class="col-sm-9">
                <input class="form-control" type="text" id="school" name="school" placeholder="Nama sekolah dan jurusan" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="division" class="col-sm-3 col-form-label">Pilihan Divisi</label>
              <div class="col-sm-9">
                <select name="division" id="division" class="form-control" required>
                  <option value="">- Pilih Divisi -</option>
                  <option value="web">Web Programming</option>
                  <option value="desktop">Desktop Programming</option>
                  <option value="mobile">Mobile Programming</option>
                  <option value="hardware">Hardware Software</option>
                  <option value="network">Computer Network</option>
                </select>
              </div>
            </div>
            {{-- <div class="form-group row">
              <legend class="col-sm-3 col-form-legend">Status Pembayaran</legend>
              <div class="col-sm-9">
                <label class="form-check-inline">
                  <input class="form-check-input" type="radio" name="status" id="status-paid" value="1"> Lunas
                </label>
                <label class="form-check-inline">
                  <input class="form-check-input" type="radio" name="status" id="status-unpaid" value="0"> Belum membayar
                </label>
              </div>
            </div> --}}
            <div class="form-group row">
              <div class="col-sm-6 offset-sm-3 text-xs-center">
                <button type="submit" class="btn btn-success btn-block"><i class="ion-paper-airplane"></i> Daftar</button><br>
                <button type="reset" class="btn btn-outline-danger btn-sm">Reset</button>
              </div>
            </div>
          </form>
        </div>
      </main>

      <div class="footer-sm col-xs-12 hidden-md-up">
        <ul class="socials">
          <li><a href="http://amcc.or.id/"><i class="ion-ios-world-outline"></i> amcc.or.id</a></li>
          <li><a href="https://www.facebook.com/AmikomComputerClub/"><i class="ion-social-facebook"></i> AmikomComputerClub</a></li>
          <li><a href="https://instagram.com/amccamikom/"><i class="ion-social-instagram-outline"></i> @amccamikom</a></li>
        </ul>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="sha384-VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script>
  <script src="assets/js/all.js"></script>
  <script src="assets/js/app.js"></script>
</body>
</html>

