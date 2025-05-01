<!doctype html>
<html lang="en">
  <head>
    <title>Crear cuenta</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">

    <!-- Custom Styles -->
  <style>
    body, html {
      height: 100%;
      margin: 0;
    }

    .gradient-custom {
      height: 100vh;
      background: linear-gradient(to right, #2c3e50, #4ca1af);
      color: #f8f9fa;
    }

    .row.content {
      height: 100%;
    }

    .sidenav {
      background-color: rgba(255, 255, 255, 0.1);
      height: 100%;
      padding-top: 20px;
    }

    .sidenav h4,
    .sidenav .nav > li > a {
      color: #f8f9fa;
    }

    .sidenav .nav > li.active > a,
    .sidenav .nav > li > a:hover {
      background-color: #ffffff22;
      color: #fff;
    }

    footer {
      background-color: #222;
      color: #f8f9fa;
      padding: 15px;
      text-align: center;
      position: fixed;
      bottom: 0;
      width: 100%;
    }

    .label {
      background-color: rgba(255, 255, 255, 0.25);
      color: #ffffff;
      border-radius: 0.25em;
      padding: 4px 8px;
      font-size: 12px;
    }

    h4 small,
    h5,
    .comment small {
      color: #f8f9fa !important;
    }

    .profile-header {
      background-color: #ffffff22;
      padding: 20px;
      border-radius: 8px;
      margin-bottom: 20px;
    }

    .profile-header h3 {
      margin: 0;
      font-size: 1.5em;
    }

    .profile-header h5 {
      color: #f8f9fa;
      font-size: 1.1em;
      font-style: italic;
    }

    .form-group input, .form-group textarea {
      background-color: rgba(255, 255, 255, 0.25);
      color: #fff;
      border: 1px solid #ffffff55;
    }

    .form-group input:focus, .form-group textarea:focus {
      border-color: #ffffff;
    }

    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {
        height: auto;
      }
    }
  </style>

  </head>

  <body class="gradient-custom">
    <section class="vh-100 gradient-custom">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark text-white" style="border-radius: 1rem;">
              <div class="card-body p-5 text-center">

                <div class="mb-md-5 mt-md-4 pb-5">
                  <h2 class="fw-bold mb-2 text-uppercase">Crear cuenta</h2>
                  <p class="text-white-50 mb-5">Por favor, completa los siguientes campos para registrarte</p>

                  {{-- Formulario de registro --}}
                  <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-outline form-white mb-4">
                      <input type="text" name="name" class="form-control form-control-lg" required />
                      <label class="form-label">Nombre completo</label>
                    </div>

                    <div class="form-outline form-white mb-4">
                      <input type="email" name="email" class="form-control form-control-lg" required />
                      <label class="form-label">Correo electrónico</label>
                    </div>

                    <div class="form-outline form-white mb-4">
                      <input type="password" name="password" class="form-control form-control-lg" required />
                      <label class="form-label">Contraseña</label>
                    </div>

                    <div class="form-outline form-white mb-4">
                      <input type="password" name="password_confirmation" class="form-control form-control-lg" required />
                      <label class="form-label">Confirmar contraseña</label>
                    </div>

                    <button type="submit" class="btn btn-outline-light btn-lg px-5">
                      Registrarse
                    </button>

                    <a href="{{ route('auth.google') }}" class="btn btn-danger">
                    Registrarse con Google
                    </a>

                  </form>

                  {{-- Mostrar errores de validación --}}
                  @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                      <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif

                  <div class="d-flex justify-content-center text-center mt-4 pt-1">
                    <a href="#" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                  </div>
                </div>

                <div>
                  <p class="mb-0">
                    ¿Ya tienes una cuenta?
                    <a href="{{ route('login') }}" class="text-white-50 fw-bold">Inicia sesión</a>
                  </p>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
  </body>
</html>
