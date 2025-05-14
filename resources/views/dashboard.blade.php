<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <title>Dashboard</title>
    <style>
        body {
      background: url('{{ asset('img/unsada.jpeg') }}') no-repeat center center fixed;
      background-size: cover;
    }
    .overlay-box {
      background: rgba(255, 255, 255, 0.65);
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.2);
      padding: 30px;
      margin-top: 50px;
    }
    .header {
      background-color: #003366;
      color: white;
      padding: 15px;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }
    .module-box {
      border: 1px solid #ddd;
      border-radius: 10px;
      padding: 20px;
      text-align: center;
      transition: 0.3s;
      cursor: pointer;
    }
    .module-box:hover {
      background-color: #f0f8ff;
    }
    .btn-link {
      color: white;
      text-decoration: none;
      margin-left: 20px;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-10 overlay-box">
            <div class="header d-flex justify-content-between align-items-center">
              <div class="d-flex flex-row justify-content-start align-items-center" >
                <img src="{{ asset('img/logo.jpg') }}" alt="Logo" width="70" class="me-2">
                <div>
                    <strong>Sistem Informasi Akademik</strong><br>
                    <strong>UNIVERSITAS DARMA PERSADA</strong>
                </div>
              </div>
              <div class="d-flex flex-row">
                @auth

                {{-- <a href="#" class="btn-link">🚪 Keluar</a> --}}
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">🚪 Keluar</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
                @endauth
              </div>
            </div>
            <div class="mt-4">
              <h5>Daftar Modul</h5>
              <div class="row mt-3">
                <div class="col-md-3">
                  <div onclick="goTo('{{ route('dashboard') }}',false)" class="module-box">
                    <img src="https://cdn-icons-png.flaticon.com/512/565/565547.png" alt="SIM Akademik" width="50">
                    <p class="mt-2">Kurikulum Prodi SI</p>
                  </div>
                </div>
                <div class="col-md-3">
                  <div onclick="goTo('{{ route('kenji') }}',true)" class="module-box">
                    <img src="https://cdn-icons-png.flaticon.com/512/565/565547.png" alt="SIM Akademik" width="50">
                    <p class="mt-2">Kenji</p>
                  </div>
                </div>
                <!-- Tambahkan modul lain di sini jika perlu -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
        function goTo(target, blank)
        {
            if(blank)
        {
            window.open(target,'_blank');
        }else{
            window.location.href = target;
        }
        }
      </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
