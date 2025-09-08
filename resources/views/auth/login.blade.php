<!doctype html>
<html
  lang="en"
  class="light-style layout-wide customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('/') }}"
  data-template="vertical-menu-template"
  data-style="light">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Login - Litera Space</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset ('/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;600&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset ('/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset ('/vendor/css/rtl/core.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/vendor/css/rtl/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/css/demo.css') }}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset ('/vendor/css/pages/page-auth.css') }}" />

    <!-- Custom Style -->
    <style>
      body {
        background-color: #d3a27f !important; /* warna coksu */
        font-family: 'Public Sans', sans-serif;
      }
      .card {
        background-color: #fff !important; /* putih */
        border-radius: 12px;
        border: none;
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
      }
      .card-body h4, .card-body p {
        color: #4e342e; /* coklat tua untuk teks */
      }
      .btn-primary {
        background-color: #c08457 !important; /* coksu gelap */
        border: none;
        transition: 0.3s ease-in-out;
      }
      .btn-primary:hover {
        background-color: #a86c40 !important; /* coklat tua */
      }
      .form-control {
        border-radius: 8px;
      }
      .form-label {
        color: #5d4037; /* teks label coklat */
      }
    </style>
  </head>

  <body>
    <!-- Content -->
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-6">
          <!-- Login -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center mb-4">
                <span class="fw-bold text-uppercase" style="color:#c08457; font-size:22px;">Litera Space</span>
              </div>
              <!-- /Logo -->
              <h4 class="mb-1 text-center">Selamat Datang! 👋</h4>
              <p class="mb-4 text-center">Perpustakaan adalah oase bagi jiwa yang haus akan cerita.</p>

              <form id="formAuthentication" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" autofocus />
                  @error('email')
                    <span class="invalid-feedback d-block" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge">
                    <input type="password" id="password" class="form-control" name="password" placeholder="********" />
                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                  </div>
                  @error('password')
                    <span class="invalid-feedback d-block" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="d-flex justify-content-between mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" name="remember" />
                    <label class="form-check-label" for="remember-me">Ingat saya</label>
                  </div>
                </div>

                <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
              </form>
            </div>
          </div>
          <!-- /Login -->
        </div>
      </div>
    </div>
  </body>
</html>