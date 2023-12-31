<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>APM | Login</title>

    <!-- Custom fonts for this template-->
    <link href="assetAdmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assetAdmin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-color: #79CCDA;">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                                    </div>
                                    <form class="user" action="{{ route('login-post') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user shadow-sm"
                                                id="exampleInputEmail" name="inputEmail" aria-describedby="emailHelp"
                                                placeholder="Masukkan Email..." value="{{ old('inputEmail') }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user shadow-sm"
                                                id="exampleInputPassword" name="inputPassword" value="{{ old('inputPassword') }}" placeholder="Masukkan Password...">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck" name="remember_token">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-login btn-user btn-block">Login</button>
                                        <hr>
                                        <a href="{{ route('google.login') }}" class="btn btn-google btn-user btn-block">
                                           <img src="assetAdmin/img/assetLogin/google.svg" class="img-thumbnail" width="30"> Login with Google
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="#">Lupa Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="/register">Belum punya akun? klik disini!</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assetAdmin/vendor/jquery/jquery.min.js"></script>
    <script src="assetAdmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assetAdmin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assetAdmin/js/sb-admin-2.min.js"></script>
@include('sweetalert::alert')
</body>

</html>
