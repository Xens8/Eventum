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
      height: 100%;
      background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
      color: #f8f9fa;
    }

    .row.content {
      min-height: 100%;
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
      position: absolute;
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
    h5 {
      color: #f8f9fa !important;
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
        <li class="active"><a href="{{ route('mis.eventos') }}">Mis Eventos</a></li>
        <li><a href="{{ route('recomendados') }}">Recomendados</a></li>
        <li><a href="{{ route('perfil') }}">Mi Perfil</a></li>
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
      <h4><small>Mis Eventos Registrados</small></h4>
      <hr>
      
      <!-- Evento 1 -->
      <h2>Festival de Tecnología</h2>
      <h5><span class="glyphicon glyphicon-time"></span> <span style="color: #f8f9fa;">25 de Abril, 2025 - Ciudad de México</span></h5>
      <p>Explora lo último en inteligencia artificial, realidad aumentada y robótica en un festival único lleno de experiencias interactivas y networking con expertos.</p>
      <hr>
      
      <!-- Evento 2 -->
      <h2>Concierto de Música Indie</h2>
      <h5><span class="glyphicon glyphicon-time"></span> <span style="color: #f8f9fa;">20 de Abril, 2025 - Guadalajara</span></h5>
      <h5><span class="label">Música</span> <span class="label">Festival</span></h5><br>
      <p>Una noche mágica con bandas emergentes y food trucks en un ambiente relajado. ¡Lleva a tus amigos y descubre tu nueva banda favorita!</p>
      <hr>
      
    </div>

  </div>
</div>

<footer class="container-fluid">
  <p>© 2025 Eventum - Todos los derechos reservados</p>
</footer>

</body>
</html>
