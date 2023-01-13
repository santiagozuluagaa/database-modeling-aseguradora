<html>
<head><title>SE LO ASEGURO S.A.S.</title></head>
<body>

<center>
<h1>Agregar ANALISTA</h1>

    <form method="POST" action="analista.php" >

    <div class="form-group">
      <label for="carne">Carné</label>
      <input type="number" name="carne" class="form-control" id="carne">
    </div>
    <br>
    <div class="form-group">
      <label for="ced">Cedula</label>
      <input type="number" name="ced" class="form-control" id="ced">
    </div>
    <br>
    <div class="form-group">
      <label for="nom">Nombre completo</label>
      <input type="text" name="nom" class="form-control" id="nom">
    </div>
    <br>
    <div class="form-group">
      <label for="salario">Salario</label>
      <input type="number" name="salario" class="form-control" id="salario">
    </div>
    <br>
    <div class="form-group">
      <label for="niv_edu">Nivel de educación</label>
      <input type="text" name="niv_edu" class="form-control" id="niv_edu">
    </div>
    <br>
    <div class="form-group">
      <label for="fec_ing">Fecha de ingreso</label>
      <input type="date" name="fec_ing" class="form-control" id="fec_ing">
    </div>
    <br>
    <div class="form-group">
      <label for="anos_exp">Años de experiencia</label>
      <input type="number" name="anos_exp" class="form-control" id="anos_exp">
    </div>
    <br>

	<input type="submit" value="Enviar" class="btn btn-success" name="btn_send_ana">

</center>

<!-- CONEXIÓN A LA BASE DE DATOS-->

	<?php

		if(isset($_POST['btn_send_ana'])) // Se verifica si se envió información a través del botón
		{
			include("open_conexion.php");

            $carne = $_POST['carne']; 
            $cedula = $_POST['ced'];
            $nom_com = $_POST['nom']; 
            $salario = $_POST['salario']; 
            $niv_edu = $_POST['niv_edu']; 
            $fec_ing = $_POST['fec_ing']; 
            $anos_exp = $_POST['anos_exp']; 

            $consistencia = 0; // Auxiliar para determinar la consistencia
            if($carne == "" || $cedula == "" || $nom_com == "" || $salario == "" || $niv_edu == ""
            || $fec_ing == "" || $anos_exp == "")
            {
                echo "Todos los campos son obligatorios";
                $consistencia = 1;
            }

            if($consistencia == 0)
            {
            $conexion -> query("INSERT INTO $tabla2(carne, cedula, nombre_completo, salario, nivel_de_educacion, fecha_de_ingreso, tipo_empleado) values ('$carne', '$cedula', '$nom_com', '$salario', '$niv_edu', '$fec_ing', 'Analista')");

            $conexion -> query("INSERT INTO $tabla3(carne, años_de_experiencia) values ('$carne', '$anos_exp')");

            echo "Se ha procesado su solicitud";

            }



            include("cerrar_conexion.php");

            // Los nombres coinciden con los que estan en la BD
		}

	?>

<center>
<h1>Eliminar ANALISTA</h1>

    <form method="POST" action="analista.php" >

    <div class="form-group">
      <label for="carne_eli">Carné</label>
      <input type="number" name="carne_eli" class="form-control" id="carne_eli">
    </div>
    <br>

    <input type="submit" value="Eliminar" class="btn btn-success" name="btn_elm_ana">

  <?php

    if(isset($_POST['btn_elm_ana'])) // Se verifica si se presionó el botón
    {
      include("open_conexion.php");

            $carne_eli = $_POST['carne_eli']; 
 
            $conexion -> query("DELETE FROM $tabla2 where carne = '$carne_eli'"); // Se borra de incentivo

            $conexion -> query("DELETE FROM $tabla3 where carne = '$carne_eli'");

            $conexion -> query("DELETE FROM $tabla1 where carne_emp = '$carne_eli'"); // Borrado en cascada de los incentivos
            

            include("cerrar_conexion.php");
    }

  ?>


</center>

</body>
</html>