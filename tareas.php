<!DOCTYPE html>

<?php  

	$cod_user = $_POST['codigo'];

?>



<html lang="es">
<head>
  <title>Lista de tareas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

  <link rel="stylesheet" type="text/css" href="CSS/tareas.css">
  <script src="tareas.js"></script>

</head>
<body onload="cargar_tareas(<?php echo $cod_user; ?>);">
  <div class="container">
    <div class="justify-content-center">
      <h1 class= "titulo" ></h1>
      <div id = "contenido">    
        
      </div>
      <script src="tareas.js"></script>


      <form class="form__reg ">
        <br></br>
        <input id="ing_tarea" class="input" type="text" placeholder="Tarea" required autofocus >
        <button  onclick="ingresar_tarea(<?php echo $cod_user; ?>)" class="btn btn-danger my-2 my-sm-0" type="button">Registrar</button>
      </form>
      <div class="dropdown">
        <img src="imagenes/help.ico" >
        <span>Manual de Usuario</span>
        <div class="dropdown-content">
          <p>Bienvenido! Puedes agregar tareas usando la casilla "Tarea" y pulsando el boton "Registrar".
          Cuando hayas terminado una tarea puedes tacharla pulsando sobre ella.</p>
        </div>
      </div>
  </div>



</body>
</html>

