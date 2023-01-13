<html>
<head><title>SE LO ASEGURO S.A.S.</title></head>
<body>
<center>

<h1>Búsquedas</h1>

<h2>Primera búsqueda</h2>

    <form method="POST" action="busquedas.php" >

    <div class="form-group">
      <label for="cod_inv">Código incentivo</label>
      <input type="number" name="cod_inc" class="form-control" id="cod_inc">
    </div>
    <br>
    <input type="submit" value="Buscar" class="btn btn-success" name="btn_cod_inc">
    <br>
    <br>
   <?php
    error_reporting(0);
    include("open_conexion.php");

        if(isset($_POST['btn_cod_inc']))

         // Se verifica si se presionó el botón
        {
            include("open_conexion.php");

            $cod_inc = $_POST['cod_inc'];

            $res1 = mysqli_query($conexion,"SELECT * FROM `incentivo` WHERE `incentivo`.`codigo` = '$cod_inc'");

            $auxiliar = 0;
            if(mysqli_num_rows($res1) == 0)
            {
                echo "El incentivo no existe";
                $auxiliar = 1;
            }

            $res2 = mysqli_query($conexion,"SELECT * FROM `incentivo` WHERE `incentivo`.`codigo` = '$cod_inc'");

            if(is_null(mysqli_fetch_array($res2)['carne_emp']) AND $auxiliar == 0)
            {
                echo "El incentivo no ha sido otorgado a ningún empleado";
            }

            // PARA EL SUBTIPO VENDEDOR

            $res2 = mysqli_query($conexion,"SELECT * FROM $tabla2 WHERE carne = (SELECT carne_emp FROM $tabla1 WHERE codigo = $cod_inc)");

            if(mysqli_fetch_array($res2)['tipo_empleado'] == "Vendedor")
            {

            $res2 = mysqli_query($conexion,"SELECT * FROM `empleado` INNER JOIN `vendedor` ON `empleado`.`carne` = `vendedor`.`carne` WHERE `vendedor`.`carne` = (SELECT `carne_emp` FROM `incentivo` WHERE `codigo` = '$cod_inc')"); // Obtiene toda la información de los vendedores

            while($consulta = mysqli_fetch_array($res2))
            {
             echo 
             "
                <table width=\100%\" border=\"1\">
                    <tr>
                        <td><b><center>Carné</center></b></td>
                        <td><b><center>Cedula</center></b></td>
                        <td><b><center>Nomble completo</center></b></td>
                        <td><b><center>Salario</center></b></td>
                        <td><b><center>Nivel de educacion</center></b></td>
                        <td><b><center>Fecha de ingreso</center></b></td>
                        <td><b><center>Tipo de empleado</center></b></td>
                        <td><b><center>Reputacion</center></b></td>
                    </tr>
                    <tr>
                        <td><center>".$consulta['carne']."</center></td>
                        <td><center>".$consulta['cedula']."</center></td>
                        <td><center>".$consulta['nombre_completo']."</center></td>
                        <td><center>".$consulta['salario']."</center></td>
                        <td><center>".$consulta['nivel_de_educacion']."</center></td>
                        <td><center>".$consulta['fecha_de_ingreso']."</center></td>
                        <td><center>".$consulta['tipo_empleado']."</center></td>
                        <td><center>".$consulta['reputacion']."</center></td>

                    </tr>
                </table>
                       
             ";
            }

            }

            // PARA EL SUBTIPO ABOGADO

            $res2 = mysqli_query($conexion,"SELECT * FROM $tabla2 WHERE carne = (SELECT carne_emp FROM $tabla1 WHERE codigo = $cod_inc)");

            if(mysqli_fetch_array($res2)['tipo_empleado'] == "Abogado")
            {

            $res2 = mysqli_query($conexion,"SELECT * FROM `empleado` INNER JOIN `abogado` ON `empleado`.`carne` = `abogado`.`carne` WHERE `abogado`.`carne` = (SELECT `carne_emp` FROM `incentivo` WHERE `codigo` = '$cod_inc')"); // Obtiene toda la información de los vendedores

            while($consulta = mysqli_fetch_array($res2))
            {
             echo 
             "
                <table width=\100%\" border=\"1\">
                    <tr>
                        <td><b><center>Carné</center></b></td>
                        <td><b><center>Cedula</center></b></td>
                        <td><b><center>Nomble completo</center></b></td>
                        <td><b><center>Salario</center></b></td>
                        <td><b><center>Nivel de educacion</center></b></td>
                        <td><b><center>Fecha de ingreso</center></b></td>
                        <td><b><center>Tipo de empleado</center></b></td>
                        <td><b><center>Campo de acción</center></b></td>
                        <td><b><center>Años de experiencia</center></b></td>
                    </tr>
                    <tr>
                        <td><center>".$consulta['carne']."</center></td>
                        <td><center>".$consulta['cedula']."</center></td>
                        <td><center>".$consulta['nombre_completo']."</center></td>
                        <td><center>".$consulta['salario']."</center></td>
                        <td><center>".$consulta['nivel_de_educacion']."</center></td>
                        <td><center>".$consulta['fecha_de_ingreso']."</center></td>
                        <td><center>".$consulta['tipo_empleado']."</center></td>
                        <td><center>".$consulta['campo_de_accion']."</center></td>
                        <td><center>".$consulta['años_de_experiencia']."</center></td>

                    </tr>
                </table>
                       
             ";
            }

            }

            // PARA EL SUBTIPO ANALISTA


            $res2 = mysqli_query($conexion,"SELECT * FROM $tabla2 WHERE carne = (SELECT carne_emp FROM $tabla1 WHERE codigo = $cod_inc)");

            if(mysqli_fetch_array($res2)['tipo_empleado'] == "Analista")
            {

            $res2 = mysqli_query($conexion,"SELECT * FROM `empleado` INNER JOIN `analista` ON `empleado`.`carne` = `analista`.`carne` WHERE `analista`.`carne` = (SELECT `carne_emp` FROM `incentivo` WHERE `codigo` = '$cod_inc')"); // Obtiene toda la información de los vendedores

            while($consulta = mysqli_fetch_array($res2))
            {
             echo 
             "
                <table width=\100%\" border=\"1\">
                    <tr>
                        <td><b><center>Carné</center></b></td>
                        <td><b><center>Cedula</center></b></td>
                        <td><b><center>Nomble completo</center></b></td>
                        <td><b><center>Salario</center></b></td>
                        <td><b><center>Nivel de educacion</center></b></td>
                        <td><b><center>Fecha de ingreso</center></b></td>
                        <td><b><center>Tipo de empleado</center></b></td>
                        <td><b><center>Años de experiencia</center></b></td>
                    </tr>
                    <tr>
                        <td><center>".$consulta['carne']."</center></td>
                        <td><center>".$consulta['cedula']."</center></td>
                        <td><center>".$consulta['nombre_completo']."</center></td>
                        <td><center>".$consulta['salario']."</center></td>
                        <td><center>".$consulta['nivel_de_educacion']."</center></td>
                        <td><center>".$consulta['fecha_de_ingreso']."</center></td>
                        <td><center>".$consulta['tipo_empleado']."</center></td>
                        <td><center>".$consulta['años_de_experiencia']."</center></td>

                    </tr>
                </table>
                       
             ";
            }

            }
            
        }

    ?>


<h2>Segunda búsqueda</h2>

   <form method="POST" action="busquedas.php" >

    <div class="form-group">
      <label for="cod">Carné empleado</label>
      <input type="number" name="cod" class="form-control" id="cod">
    </div>

    <br>

    <div class="form-group">
        <label for="fecha">Fecha inicial</label>
        <input type="date" name="fecha1" class="form-control" id="fecha1" >
    </div>

    <br>

    <div class="form-group">
        <label for="fecha">Fecha final</label>
        <input type="date" name="fecha2" class="form-control" id="fecha2" >
    </div>

    <br>

<input type="submit" value="Buscar" class="btn btn-success" name="btn_send_bus2">
<br>
<br>

<?php if(isset($_POST['btn_send_bus2']))
        {
            $cod_emp = $_POST['cod'];
            $fecha_ini = $_POST['fecha1'];
            $fecha_fin = $_POST['fecha2'];

            $res2 = mysqli_query($conexion,"SELECT * FROM `empleado` WHERE `empleado`.`carne` = '$cod_emp'");

            if(mysqli_num_rows($res2) == 0)
            {
                echo "El empleado no existe";
            }

            $res2 = mysqli_query($conexion,"SELECT * FROM `incentivo` WHERE (`incentivo`.`fecha` BETWEEN '$fecha_ini' AND '$fecha_fin') AND `incentivo`.`carne_emp`=  '$cod_emp'"); 

            while($consulta = mysqli_fetch_array($res2))
            {
             echo 
             "
                <table width=\100%\" border=\"1\">
                    <tr>
                        <td><b><center>Código</center></b></td>
                        <td><b><center>Carné empleado</center></b></td>
                        <td><b><center>Tipo de incentivo</center></b></td>
                        <td><b><center>Descripcion</center></b></td>
                        <td><b><center>Carné empleado</center></b></td>
                    </tr>
                    <tr>
                        <td><center>".$consulta['codigo']."</center></td>
                        <td><center>".$consulta['fecha']."</center></td>
                        <td><center>".$consulta['tipo_de_incentivo']."</center></td>
                        <td><center>".$consulta['descripcion']."</center></td>
                        <td><center>".$consulta['carne_emp']."</center></td>

                    </tr>
                </table>
                       
             ";
            }

        }        
        


?>

</center>
</body>
</html>