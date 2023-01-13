<html>
<head><title>SE LO ASEGURO S.A.S.</title></head>
<body>

<center>
<h1>Agregar INCENTIVO</h1>

    <form method="POST" action="incentivo.php" >

    <div class="form-group">
      <label for="doc">Código</label>
      <input type="number" name="cod" class="form-control" id="cod">
    </div>

    <br>

    <div class="form-group">
        <label for="nombre">Fecha</label>
        <input type="date" name="fecha" class="form-control" id="fecha" >
    </div>

    <br>

    <div class="form-group">
        <label for="tipo">Tipo de incentivo</label>
        <select id="cars" name="tipo">
            <option value="vacacional">Vacacional</option>
            <option value="economico">Económico</option>
            <option value="material">Material</option>
        </select>
    </div>

    <br>

    <div class="form-group">
        <label for="tel">Descripción</label>
        <input type="text" name="descripcion" class="form-control" id="descripcion">
    </div>

    <br>

<label for="carne">Seleccione un empleado:</label>
    <?php
    include("open_conexion.php");
    $resultados1 = mysqli_query($conexion,"SELECT carne FROM $tabla2");
    ?>
    <select name="carne">
    <option value="Sin empleado">Sin empleado</option>
    <?php
    $i=0;
    while($row = mysqli_fetch_array($resultados1)) {
    ?>
    <option value="<?=$row["carne"];?>"><?=$row["carne"];?></option>
    <?php
    $i++;
    }
    ?>
    </select>

    <br>
    <br>

	<input type="submit" value="Enviar" class="btn btn-success" name="btn_send_inc">

</center>

<!-- CONEXIÓN A LA BASE DE DATOS-->

	<?php

		if(isset($_POST['btn_send_inc'])) // Se verifica si se envió información a través del botón
		{
			include("open_conexion.php");

            $cod = $_POST['cod']; // Obtiene por el método POST lo ingresado en esa variable
            $fecha = $_POST['fecha'];
            $tipo = $_POST['tipo'];
            $descripcion = $_POST['descripcion'];
            $carne = $_POST['carne'];

            $consistencia = 0; // Auxiliar para determinar la consistencia
            if($cod == "" || $fecha == "" || $tipo == "" || $descripcion == "")
            {
                echo "Todos los campos son obligatorios";
                $consistencia = 1;
            }
            
            if($carne == "Sin empleado" AND $consistencia == 0)
            {
                $conexion -> query("INSERT INTO $tabla1(codigo, fecha, tipo_de_incentivo, descripcion, carne_emp) values ('$cod', '$fecha', '$tipo', '$descripcion', NULL)");
                echo "Se ha procesado su transacción";
            }

            if($carne != "Sin empleado" AND $consistencia == 0)
            {
                $conexion -> query("INSERT INTO $tabla1(codigo, fecha, tipo_de_incentivo, descripcion, carne_emp) values ('$cod', '$fecha', '$tipo', '$descripcion', '$carne')");
                echo "Se ha procesado su transacción";
            }

            

            include("cerrar_conexion.php");

            // Los nombres coinciden con los que estan en la BD
		}

	?>

<center>
<h1>Eliminar INCENTIVO</h1>

    <form method="POST" action="incentivo.php" >

    <div class="form-group">
      <label for="cod_eli">Código</label>
      <input type="number" name="cod_eli" class="form-control" id="cod_eli">
    </div>
    <br>
    <input type="submit" value="Eliminar" class="btn btn-success" name="btn_send_inc_eli"><br>

<?php
    
    if(isset($_POST['btn_send_inc_eli'])) // Se verifica si se presionó el botón
    {
      include("open_conexion.php");

            echo "Se ha procesado su transacción";

            $incentivo_eli = $_POST['cod_eli']; 

            $conexion -> query("DELETE FROM $tabla1 where codigo = '$incentivo_eli'"); 

            include("cerrar_conexion.php");
    }

?>

</center>

</body>
</html>