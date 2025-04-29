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
      background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
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
        <li class="active"><a href="#">Inicio</a></li>
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
      <h4><small>EVENTOS RECOMENDADOS</small></h4>
      <hr>
      
      <!-- Iteración de eventos recomendados -->
      @foreach($eventos as $evento)
        <h2>{{ $evento->nombre }}</h2>
        <h5><span class="glyphicon glyphicon-time"></span> 
          <span style="color: #f8f9fa;">
            {{ \Carbon\Carbon::parse($evento->fecha)->format('d \d\e F, Y') }} - 
            {{ $evento->ciudad }}
          </span>
        </h5>
        
        <h5><span class="label">{{ $evento->categoria }}</span></h5><br>
        <p>{{ $evento->descripcion }}</p>
        <hr>
      @endforeach

      <h4>Déjanos tu comentario:</h4>
      <form role="form">
        <div class="form-group">
          <textarea class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Enviar</button>
      </form>
      <br><br>
      
      <p><span class="badge">2</span> Comentarios:</p><br>
      
      <div class="row">
        <div class="col-sm-2 text-center">
          <img src="bandmember.jpg" class="img-circle" height="65" width="65" alt="Avatar">
        </div>
        <div class="col-sm-10">
          <h4>Luis <small>9 de Abril, 2025, 3:15 PM</small></h4>
          <p>¡Excelente plataforma! Ya tengo mis boletos para el festival de tecnología. Gracias Eventum.</p>
          <br>
        </div>
        <div class="col-sm-2 text-center">
          <img src="bird.jpg" class="img-circle" height="65" width="65" alt="Avatar">
        </div>
        <div class="col-sm-10">
          <h4>Carmen <small>8 de Abril, 2025, 7:50 PM</small></h4>
          <p>Me encantó el diseño y lo fácil que es encontrar eventos cerca de mí. ¡Recomendado!</p>
          <br>
          <p><span class="badge">1</span> Respuesta:</p><br>
          <div class="row">
            <div class="col-sm-2 text-center">
              <img src="bird.jpg" class="img-circle" height="65" width="65" alt="Avatar">
            </div>
            <div class="col-xs-10">
              <h4>Equipo Eventum <small>8 de Abril, 2025, 8:05 PM</small></h4>
              <p>¡Gracias por tu apoyo, Carmen! Pronto añadiremos más ciudades 🎉</p>
              <br>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<footer class="container-fluid">
  <p>© 2025 Eventum - Todos los derechos reservados</p>
</footer>

</body>
</html>
