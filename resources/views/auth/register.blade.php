<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <title>Register | Marketplace Katering</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Marketplace Katering" name="description" />
    <meta content="Aliffirdaus" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Daftar Gratis</h5>
                                        <p>Buat akunmu secara gratis sekarang.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="p-4">
                                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Kantor</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Masukkan Nama" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="address" class="form-label">Alamat Kantor</label>
                                        <textarea class="form-control" id="address" name="address"
                                            placeholder="Masukkan Alamat" required></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Nomor Telepon Kantor</label>
                                        <input type="number" class="form-control" id="phone" name="phone"
                                            placeholder="Masukkan Nomor Telepon" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Alamat E-mail</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Masukkan Alamat E-mail" required>
                                        <div class="invalid-feedback">
                                            Mohon masukkan alamat e-mail yang valid
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="userpassword" class="form-label">Kata Sandi</label>
                                        <input type="password" class="form-control" id="userpassword" name="password"
                                            placeholder="Masukkan Kata Sandi" required>
                                    </div>

                                    <input type="hidden" id="role" name="role" value="customer" required>

                                    <div class="mt-4 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light"
                                            type="submit">Daftar</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <p class="mb-0">Dengan mendaftar anda menyetujui <a href="#"
                                                class="text-primary">Kebijakan Penggunaan</a> Marketplace Katering</p>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">

                        <div>
                            <p>Sudah memiliki akun ? <a href="auth-login.html" class="fw-medium text-primary">
                                    Masuk</a> </p>©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Alif.
                            Develop by <a href="https://www.linkedin.com/in/alif-firdauzz/" target="_blank">Alif</a>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end account-pages -->

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <!-- App js -->
    <script src="assets/js/app.js"></script>
</body>

</html>
{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
