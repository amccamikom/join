<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Join AMCC</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="sha384-2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header class="header">
    <div class="container">
      <h1>
        {{-- <span class="join">Registrasi</span><br>
        <span class="amcc">AMCC</span> --}}
        <img src="img/logo.png" alt="">
      </h1>
    </div>
  </header>

  <main class="container">
    <div class="row">
      <form action="" method="post" class="col-xs-8 offset-xs-2">
        {{-- <div class="form-group row">
          <label for="registration-no" class="col-xs-3 col-form-label">No. Registrasi</label>
          <div class="col-xs-9">
            <input class="form-control" type="number" id="registration-no" name="registration-no" placeholder="No. Registrasi">
          </div>
        </div> --}}
        <div class="form-group row">
          <label for="nim" class="col-xs-3 col-form-label">NIM</label>
          <div class="col-xs-9">
            <input class="form-control" type="text" id="nim" name="nim" placeholder="Contoh: 14.11.9999">
          </div>
        </div>
        <div class="form-group row">
          <label for="fullname" class="col-xs-3 col-form-label">Nama Lengkap</label>
          <div class="col-xs-9">
            <input class="form-control" type="text" id="fullname" name="fullname" placeholder="Nama lengkap">
          </div>
        </div>
        <div class="form-group row">
          <label for="addres" class="col-xs-3 col-form-label">Alamat Asal</label>
          <div class="col-xs-9">
            <textarea class="form-control" name="address" id="address" rows="2" placeholder="Alamat asal"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="phone" class="col-xs-3 col-form-label">No. Handphone</label>
          <div class="col-xs-9">
            <input class="form-control" type="text" id="phone" name="phone" placeholder="Contoh: 085234567890">
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-xs-3 col-form-label">E-mail</label>
          <div class="col-xs-9">
            <input class="form-control" type="email" id="email" name="email" placeholder="E-mail kamu">
          </div>
        </div>
        <div class="form-group row">
          <label for="school" class="col-xs-3 col-form-label">Asal Sekolah</label>
          <div class="col-xs-9">
            <input class="form-control" type="text" id="school" name="school" placeholder="Nama sekolah dan jurusan">
          </div>
        </div>
        <div class="form-group row">
          <label for="division" class="col-xs-3 col-form-label">Pilihan Divisi</label>
          <div class="col-xs-9">
            <select name="division" id="division" class="form-control">
              <option value="">- Pilih Divisi -</option>
              <option value="desktop">Desktop Programming</option>
              <option value="web">Web Programming</option>
              <option value="hardware">Hardware</option>
              <option value="jaringan">Jaringan</option>
            </select>
          </div>
        </div>
        {{-- <div class="form-group row">
          <legend class="col-xs-3 col-form-legend">Status Pembayaran</legend>
          <div class="col-xs-9">
            <label class="form-check-inline">
              <input class="form-check-input" type="radio" name="status" id="status-paid" value="1"> Lunas
            </label>
            <label class="form-check-inline">
              <input class="form-check-input" type="radio" name="status" id="status-unpaid" value="0"> Belum membayar
            </label>
          </div>
        </div> --}}
        <div class="form-group row">
          <div class="col-xs-9 offset-xs-3">
            <button type="submit" class="btn btn-primary">Daftar</button>
            {{-- <button type="reset" class="btn btn-danger">Reset</button> --}}
          </div>
        </div>
      </form>
    </div>
  </main>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="sha384-VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script>
</body>
</html>

