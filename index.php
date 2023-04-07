<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liencias Mabe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
</body>
<h1></h1>
<div class="section">
    <div class="container" style="box-shadow: 0 0 14px -3px #ccefff; padding: 35px;  margin-top: 90px;border-radius: 6px;">
        <div class="row">
            <form class="row g-3" action="php/insertar.php" method="POST">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div style="    text-align: -webkit-right;">
                        <div style="border-radius: 70%; width: 100px;  height: 100px;  display: flex; flex-direction: row; flex-wrap: wrap; justify-content: center; align-items: center; align-content: stretch; background: #2183aa;">
                            <img src="mabe-logo-white.png" alt="" style="    width: 85px;">
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <label for="password" class="visually-hidden">Password</label>
                    <input type="text" class="form-control" id="clave" name="clave" placeholder="Ingresa un password"
                        required
                        style="display: block;color: #000000 !important; border: 1px solid #e7e7e7 !important;     border-radius: 1px !important;">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3" name="registrar" style="background: #000000 !important; border-radius: 3px !important; border: none !important; box-shadow: 0 0 3px 2px #a1a1a1;">
                    Crear Liencia</button>
                </div>
            </form>

            <div class="col-md-12 col-sm-12 g-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Licencia</th>
                            <th scope="col">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("php/conexion.php");
                        $getmysql = new mysqlconex();
                        $getconex = $getmysql->conex();

                        $consulta = "SELECT * FROM licencia";
                        $resultado = mysqli_query($getconex, $consulta);
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            echo "<tr>";
                            echo "<td>" . $fila["ID"] . "</td>";
                            echo "<td>" . $fila["clave"] . "</td>";
                            echo "<td> <form action='php/eliminar.php' method='POST'>
                                <input type='hidden' name='clave' value='" . $fila["clave"] . "'>
                                <input class='btn btn-danger' type='submit' name='eliminar' value='Eliminar' style='    background: #2183aa !important;
                                border-radius: 3px !important;
                                border: none !important;
                                box-shadow: 0 0 8px 2px #4a4a4a75'>
                                </form></td>";
                            echo "</tr>";
                        }
                        mysqli_close($getconex);

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</html>