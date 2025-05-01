<!DOCTYPE html>
<html lang="es">
<head>
  <title>Eventum - Plataforma de Eventos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
  <!-- Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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

<div class="container-fluid">
  <div class="row content">
    
    <!-- Barra lateral -->
    <div class="col-sm-3 sidenav">
      <h4>Eventum</h4>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="{{ route('home') }}">Inicio</a></li>
        <li><a href="{{ route('mis.eventos') }}">Mis Eventos</a></li>
        <li><a href="{{ route('recomendados') }}">Recomendados</a></li>
        <li class="active"><a href="{{ route('perfil') }}">Mi Perfil</a></li>
        @role('admin')
          <li><a href="{{ route('admin.eventos') }}">Eventos</a></li>
        @endrole
      </ul><br>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Buscar eventos...">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
    </div>

    <!-- Contenido principal -->
    <div class="col-sm-9">
      <!-- Saludo de bienvenida -->
      <div class="profile-header">
  <h3>Bienvenido, 
    @if(Auth::check())
      {{ Auth::user()->name }}  <!-- Mostrar el nombre del usuario -->
    @else
      Usuario
    @endif
  </h3>
  <h5>
    @if(Auth::check() && Auth::user()->hasRole('admin'))
      ¡Bienvenido Administrador!  <!-- Saludo si es administrador -->
    @elseif(Auth::check())
      ¡Bienvenido a tu perfil!  <!-- Saludo normal si es usuario común -->
    @endif
  </h5>
</div>

      <h4><small>MI PERFIL</small></h4>
      <hr>

      <!-- Formulario de edición de perfil -->
      <form action="{{ route('updatePerfil') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="nombre">Nombre:</label>
          <input type="text" class="form-control" id="nombre" name="nombre" value="{{ Auth::user()->name }}" required>
        </div>
        <div class="form-group">
          <label for="email">Correo Electrónico:</label>
          <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
        </div>
        <div class="form-group">
          <label for="intereses">Intereses:</label>
          <textarea class="form-control" id="intereses" name="intereses" rows="3" placeholder="Ej. Tecnología, Música, Viajar...">{{ Auth::user()->intereses }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      </form>

      <!-- Botón de cerrar sesión dentro del contenido -->
      <br><br>
      <form action="{{ route('logout') }}" method="POST">
        @csrf  <!-- Este es el token CSRF -->
        <button type="submit" class="btn btn-danger">Cerrar sesión</button>
      </form>
    </div>

  </div>
</div>

<!-- Footer al final de la página -->
<footer class="container-fluid">
  <p>© 2025 Eventum - Todos los derechos reservados</p>
</footer>

</body>
</html>
