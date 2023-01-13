<html>
<head><title>SE LO ASEGURO S.A.S.</title></head>
<body>

<center>
<h1>Consultas</h1>

<h2>Primer botón</h2>

<form action="consultas.php" method="post">
<input type="submit" value="Enviar" class="btn btn-success" name="btn_sen">
</form>

    <?php

        if(isset($_POST['btn_sen'])) // Se verifica si se presionó el botón
        {
            include("open_conexion.php");

            $res2 = mysqli_query($conexion, "SELECT * FROM (SELECT * FROM (SELECT * FROM(SELECT Count(codigo) AS conteo, carne_emp FROM $tabla1  GROUP BY carne_emp) AS table_res_1 WHERE conteo BETWEEN 2 AND 4) AS table_res_2 INNER JOIN $tabla2 ON $tabla2.carne = table_res_2.carne_emp) AS table_res_3 INNER JOIN $tabla5 ON $tabla5.carne = table_res_3.carne");

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
                        <td><b><center>Reputacion</center></b></td>
                    </tr>
                    <tr>
                        <td><center>".$consulta['carne']."</center></td>
                        <td><center>".$consulta['cedula']."</center></td>
                        <td><center>".$consulta['nombre_completo']."</center></td>
                        <td><center>".$consulta['salario']."</center></td>
                        <td><center>".$consulta['nivel_de_educacion']."</center></td>
                        <td><center>".$consulta['fecha_de_ingreso']."</center></td>
                        <td><center>".$consulta['reputacion']."</center></td>
                    </tr>
                </table>
                       
             ";
            }
        }

    ?>

<br>
<h2>Segundo botón</h2>

<form action="consultas.php" method="post">
<input type="submit" value="Enviar" class="btn btn-success" name="btn_sen_2">
</form>

<?php

        if(isset($_POST['btn_sen_2'])) // Se verifica si se presionó el botón
        {
            include("open_conexion.php");

            $res2 = mysqli_query($conexion, "SELECT * FROM (SELECT `codigo`, `fecha`, `tipo_de_incentivo`, `descripcion`, `carne` FROM (SELECT * FROM (SELECT `carne_emp` FROM (SELECT Count(codigo) AS `conteo`, `incentivo`.`carne_emp` FROM `incentivo` WHERE `carne_emp` IS NOT NULL GROUP BY `carne_emp`) AS tabla_resul_1 WHERE `conteo` > 2) AS tabla_resul_2 INNER JOIN `empleado` ON tabla_resul_2.carne_emp = `empleado`.`carne`) AS tabla_resul_3 INNER JOIN `incentivo` ON tabla_resul_3.carne_emp = `incentivo`.`carne_emp`) AS tabla_resul_4 INNER JOIN `analista` ON tabla_resul_4.carne = `analista`.`carne`");

            while($consulta = mysqli_fetch_array($res2))
            {
             echo 
             "
                <table width=\100%\" border=\"1\">
                    <tr>
                        <td><b><center>Código</center></b></td>
                        <td><b><center>Fecha</center></b></td>
                        <td><b><center>Tipo de incentivo</center></b></td>
                        <td><b><center>Descripcion</center></b></td>
                        <td><b><center>Carne empleado</center></b></td>
                    </tr>
                    <tr>
                        <td><center>".$consulta['codigo']."</center></td>
                        <td><center>".$consulta['fecha']."</center></td>
                        <td><center>".$consulta['tipo_de_incentivo']."</center></td>
                        <td><center>".$consulta['descripcion']."</center></td>
                        <td><center>".$consulta['carne']."</center></td>
                    </tr>
                </table>
                       
             ";
            }
        }

?>

<br>

<h2>Tercer botón</h2>

<form action="consultas.php" method="post">
<input type="submit" value="Enviar" class="btn btn-success" name="btn_sen_3">
</form>

<?php

        if(isset($_POST['btn_sen_3'])) // Se verifica si se presionó el botón
        {
            include("open_conexion.php");

            $res2 = mysqli_query($conexion, "DELETE FROM tabla_aux");
            $res3 = mysqli_query($conexion, "INSERT INTO tabla_aux SELECT `carne_emp`, COUNT(`carne_emp`) AS conteo FROM `incentivo` WHERE `carne_emp` IS NOT NULL  GROUP BY `carne_emp`");
            $res4 = mysqli_query($conexion, "DELETE FROM `tabla_aux` WHERE `conteo` != (SELECT MAX(`conteo`) FROM `tabla_aux`)");
            $res5 = mysqli_query($conexion, "SELECT * FROM tabla_aux INNER JOIN `empleado` ON tabla_aux.carne_emp = `empleado`.`carne`");

            while($consulta = mysqli_fetch_array($res5))
            {
             if($consulta['tipo_empleado'] == "Vendedor")
             { 
                $res6 = mysqli_query($conexion, "SELECT * FROM tabla_aux INNER JOIN `empleado` ON tabla_aux.carne_emp = `empleado`.`carne` INNER JOIN `vendedor` ON tabla_aux.carne_emp = `vendedor`.`carne`");
                $consulta = mysqli_fetch_array($res6);
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

            if($consulta['tipo_empleado'] == "Abogado")
             { 
                $res6 = mysqli_query($conexion, "SELECT * FROM tabla_aux INNER JOIN `empleado` ON tabla_aux.carne_emp = `empleado`.`carne` INNER JOIN `abogado` ON tabla_aux.carne_emp = `abogado`.`carne`");
                $consulta = mysqli_fetch_array($res6);
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

            if($consulta['tipo_empleado'] == "Analista")
             { 
                $res6 = mysqli_query($conexion, "SELECT * FROM tabla_aux INNER JOIN `empleado` ON tabla_aux.carne_emp = `empleado`.`carne` INNER JOIN `analista` ON tabla_aux.carne_emp = `analista`.`carne`");
                $consulta = mysqli_fetch_array($res6);
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

<br>


</center>

</body>
</html>