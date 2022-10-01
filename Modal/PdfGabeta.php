<?php
ob_start();
require "../InventarioH.php";
$inv = new Inventario();
$id_gaveta = $_GET['id'];
$nom = $_GET['nom'];
$desc = $_GET['desc'];
$resp = $_GET['resp'];

$datos = $inv->ImprimirGavetas($id_gaveta);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>

<style>
    header {
        display: flex;
        height: 90px;
        justify-content: space-between;
    }

    .logo1 {
        display: flex;
        width: 200px;
        height: 100px;
        position: fixed;
        top: -13px;
    }

    .logo2 {
        display: flex;
        width: 200px;
        height: 100px;
        position: fixed;
        left: 800px;
    }

    .logo2 img {
        width: 100px;
    }

    .logo2 img {
        width: 200px;
    }

    .desc {
        justify-content: center;
    }

    .content-table {
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 1em;
        font-family: sans-serif;
        min-width: 450px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    .content-table thead tr {
        background-color: rgb(255, 240, 201);
        color: black;
        text-align: middle;
    }

    .content-table th,
    .content-table td {
        padding: 12px 15px;
    }

    .content-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .content-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    .content-table tbody tr:last-of-type {
        border-bottom: 2px solid #009879;
    }
</style>

<body>
    <header>
        <div class="logo2">
            <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/emmanuel/inventario/imagenes/georgio.png" alt="...">
        </div>
        <div class="logo1">
            <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/emmanuel/inventario/imagenes/logogeorgio.png" style="" width="100px;" alt="...">
        </div>

    </header>

    <center>
        <h2>Reporte de inventario por gaveta</h2>
    </center>

    <br>

    <label id="lbl_nombreGaveta"><b>Gaveta: </b> <?php echo $nom ?></label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label id="lbl_descGaveta"><b>Descripción: </b> <?php echo $desc ?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label id="lbl_responGaveta"><b>Responsable: </b> <?php echo $resp ?></label>

    <input type="hidden" name="id_gabeta" id="id_gabeta" value="<?php echo $id_gaveta ?>">
    
    <center>

        <table class="content-table">
            <thead>
                <tr align="center">
                    <th>Cajón</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Costo</th>
                    <th>Piezas</th>
                    <th>Anomalia</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $dato) { ?>
                    <tr align="center">
                        <td><?php echo $dato['cajon']; ?></td>
                        <td><?php echo $dato['nombre']; ?></td>
                        <td><?php echo $dato['descripcion']; ?></td>
                        <td>$<?php echo $dato['costo']; ?></td>
                        <td><?php echo $dato['piezas']; ?></td>
                        <td><?php echo $dato['anomalia']; ?></td>
                        <td><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/emmanuel/inventario/imagenes/Herramientas/<?php echo $dato['foto']; ?>" style="height:100px; width:105px;"></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </center>
</body>
</html>

<?php
$html = ob_get_clean();

require_once '../plugins/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);
$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'landscape');
$dompdf->render();

$dompdf->stream("Inventario por gaveta.pdf", array("Attachment" => false))

?>