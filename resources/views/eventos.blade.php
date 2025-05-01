<!DOCTYPE html>
<html lang="es">
<head>
  <title>Eventum - Plataforma de Eventos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">


  
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
        <li><a href="{{ route('admin.eventos') }}">Eventos</a></li>
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
      
      <!-- Botón para agregar eventos (solo visible para admin) -->
      <button id="addEventButton" class="btn btn-primary" data-toggle="modal" data-target="#agregarEventoModal" style="display:none;">Añadir Evento</button>
      
      <!-- Lista de Eventos -->
      <div id="eventosList">
        <!-- Evento 1 -->
        <h2>Festival de Tecnología</h2>
        <h5><span class="glyphicon glyphicon-time"></span> <span style="color: #f8f9fa;">25 de Abril, 2025 - Ciudad de México</span></h5>
        <p>Explora lo último en inteligencia artificial, realidad aumentada y robótica en un festival único lleno de experiencias interactivas y networking con expertos.</p>
        <button class="btn btn-danger" onclick="eliminarEvento(1)">Eliminar Evento</button>
        <hr>
        
        <!-- Evento 2 -->
        <h2>Concierto de Música Indie</h2>
        <h5><span class="glyphicon glyphicon-time"></span> <span style="color: #f8f9fa;">20 de Abril, 2025 - Guadalajara</span></h5>
        <h5><span class="label">Música</span> <span class="label">Festival</span></h5><br>
        <p>Una noche mágica con bandas emergentes y food trucks en un ambiente relajado. ¡Lleva a tus amigos y descubre tu nueva banda favorita!</p>
        <button class="btn btn-danger" onclick="eliminarEvento(2)">Eliminar Evento</button>
        <hr>
        
      </div>
      
    </div>

  </div>
</div>

<!-- Modal para añadir evento -->
<div class="modal fade" id="agregarEventoModal" tabindex="-1" role="dialog" aria-labelledby="agregarEventoModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="agregarEventoModalLabel">Añadir Evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="eventForm">
          <div class="form-group">
            <label for="eventoNombre">Nombre del Evento</label>
            <input type="text" class="form-control" id="eventoNombre" placeholder="Nombre del evento" required>
          </div>
          <div class="form-group">
            <label for="eventoDescripcion">Descripción</label>
            <textarea class="form-control" id="eventoDescripcion" placeholder="Descripción del evento" required></textarea>
          </div>
          <div class="form-group">
            <label for="eventoFecha">Fecha</label>
            <input type="date" class="form-control" id="eventoFecha" required>
          </div>
          <div class="form-group">
            <label for="eventoLugar">Lugar</label>
            <input type="text" class="form-control" id="eventoLugar" placeholder="Lugar del evento" required>
          </div>
          <div class="form-group">
            <label for="eventoPrecio">Precio</label>
            <input type="number" class="form-control" id="eventoPrecio" placeholder="Precio del evento" required>
          </div>
          <button type="submit" class="btn btn-success">Añadir Evento</button>
        </form>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p>© 2025 Eventum - Todos los derechos reservados</p>
</footer>

<script>
  // Función para eliminar evento
  function eliminarEvento(id) {
    var confirmacion = confirm("¿Estás seguro de que deseas eliminar este evento?");
    if (confirmacion) {
      // Lógica para eliminar el evento
      alert("Evento eliminado con éxito.");
      // Eliminar el evento de la lista (solo simulación aquí)
      document.getElementById("evento" + id).remove();
    }
  }

  // Mostrar botón "Añadir Evento" solo si el usuario es admin
  const userRole = "admin";  // Cambia esto según el rol del usuario (simulado como admin)
  if (userRole === "admin") {
    document.getElementById("addEventButton").style.display = "block";
  }

  // Lógica para agregar evento
  $('#eventForm').on('submit', function(event) {
    event.preventDefault();

    const nombre = $('#eventoNombre').val();
    const descripcion = $('#eventoDescripcion').val();
    const fecha = $('#eventoFecha').val();
    const lugar = $('#eventoLugar').val();
    const precio = $('#eventoPrecio').val();

    $.ajax({
        url: '/admin/añadir-evento',
        method: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            nombre: nombre,
            descripcion: descripcion,
            fecha: fecha,
            lugar: lugar,
            precio: precio
        },
        success: function(response) {
            alert("Evento añadido con éxito");
            $('#agregarEventoModal').modal('hide');
            // Recargar la lista de eventos o actualizar la vista
        },
        error: function(xhr, status, error) {
            alert("Error al guardar el evento: " + xhr.responseText);
        }
    });
});


</script>

</body>
</html>
