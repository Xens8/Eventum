<!doctype html>
<html lang="en">
  <head>
    <title>Iniciar sesión</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
  </head>

  <body class="gradient-custom">
    <section class="vh-100 gradient-custom">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark text-white" style="border-radius: 1rem;">
              <div class="card-body p-5 text-center">

                <div class="mb-md-5 mt-md-4 pb-5">
                  <h2 class="fw-bold mb-2 text-uppercase">Iniciar sesión</h2>
                  <p class="text-white-50 mb-5">¡Por favor, ingresa tu correo y contraseña!</p>

                  {{-- Formulario de login --}}
                  <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-outline form-white mb-4">
                      <input type="email" name="email" class="form-control form-control-lg" required />
                      <label class="form-label">Correo electrónico</label>
                    </div>

                    <div class="form-outline form-white mb-4">
                      <input type="password" name="password" class="form-control form-control-lg" required />
                      <label class="form-label">Contraseña</label>
                    </div>

                    <a href="{{ route('auth.google') }}" class="btn btn-danger">
                    Iniciar sesión con Google
                    </a>


                    <p class="small mb-5 pb-lg-2">
                      <a class="text-white-50" href="#">¿Olvidaste tu contraseña?</a>
                    </p>

                    <button type="submit" class="btn btn-outline-light btn-lg px-5">
                      Iniciar sesión
                    </button>
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
                    ¿No tienes una cuenta?
                    <a href="{{ route('register') }}" class="text-white-50 fw-bold">Regístrate</a>
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
