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

<body class="">
    <div>
        <h3 style="font-size: 20px; padding: 15px; margin-top: 10px;">Mabe Liencia</h3>
        <div style="text-align: -webkit-right;">
            <div
                style="top: 10px; right: 20px; border-radius: 70%;  width: 50px; height: 50px; display: flex; flex-direction: row;  flex-wrap: wrap; justify-content: center; align-items: center;  align-content: stretch; background: #2183aa; position: absolute;">
                <img src="mabe-logo-white.png" alt="" style="    width: 45px;">
            </div>
        </div>
    </div>
    <div class="min-height-300 bg-primary position-absolute w-100">
        <div class="section ">
            <div class="container"
                style="box-shadow: 0 0 14px -3px #ccefff; padding: 35px;  margin-top: 90px;border-radius: 6px; background: white;">
                <div class="row">
                    <form class="row g-3" action="php/insertar.php" method="POST">
                        <div class="col-lg-12 col-md-12 col-sm-12">

                        </div>
                        <div class="col-auto">
                            <label for="password" class="visually-hidden">Password</label>
                            <input type="text" class="form-control" id="clave" name="clave"
                                placeholder="Ingresa una licencia" required>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3" name="registrar" style="background: #777777 !important;
    border-radius: 3px !important;
    border: none !important;
    font-size: 11px;
    box-shadow: 0 3px 7px -1px #a1a1a1;
    height: 38px;
    text-transform: uppercase;">
                                Crear Licencia</button>
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

                                // Definir variables de paginación
                                $por_pagina = 10;
                                if (isset($_GET['pagina'])) {
                                    $pagina = $_GET['pagina'];
                                } else {
                                    $pagina = 1;
                                }

                                // Obtener número total de resultados
                                $consulta = "SELECT * FROM licencia";
                                $resultado = mysqli_query($getconex, $consulta);
                                $total_resultados = mysqli_num_rows($resultado);

                                // Calcular número de páginas
                                $total_paginas = ceil($total_resultados / $por_pagina);

                                // Obtener resultados de la página actual
                                $inicio = ($pagina - 1) * $por_pagina;
                                $consulta .= " LIMIT $inicio, $por_pagina";
                                $resultado = mysqli_query($getconex, $consulta);

                                while ($fila = mysqli_fetch_assoc($resultado)) {
                                    echo "<tr>";
                                    echo "<td>" . $fila["ID"] . "</td>";
                                    echo "<td>" . $fila["clave"] . "</td>";
                                    echo "<td> <form action='php/eliminar.php' method='POST'>
                    <input type='hidden' name='clave' value='" . $fila["clave"] . "'>
                    <input class='btn btn-danger' type='submit' name='eliminar' value='Eliminar' style=' background: #aaaaaa !important;
                    border-radius: 3px !important;
                    border: none !important;
                    box-shadow: 0 3px 7px -1px #a1a1a1;
                    text-transform: uppercase;
                    font-size: 12px;'>
                    </form></td>";
                                    echo "</tr>";
                                }
                                mysqli_close($getconex);
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12 col-sm-12 g-3 pagination-center">
                        <nav aria-label="...">
                            <ul class="pagination">
                                <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                                    <?php if ($i == $pagina): ?>
                                        <li class="page-item active" aria-current="page">
                                            <span class="page-link">
                                                <?= $i ?>
                                                <span class="sr-only"></span>
                                            </span>
                                        </li>
                                    <?php else: ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?pagina=<?= $i ?>"><?= $i ?></a>
                                        </li>
                                    <?php endif ?>
                                <?php endfor ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
</body>


</html>