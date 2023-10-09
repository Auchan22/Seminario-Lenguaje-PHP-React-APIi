<?php
    include("Repository/ItemsRepository.php");
    include("Repository/PedidosRepository.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon"
        href="restaurant-logo-design-template-b281aeadaa832c28badd72c1f6c5caad_screen.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Don Chincho</title>
</head>

<body>
    <?php include_once("components/header.php") ?>
    <section id="formularioPedido">
        <div id="encabezado_alta_pedido">
            <h2>Generar Pedido</h2>
        </div>
        <hr />
        <form id="form_alta" method="POST" action="altapedido.php">
            <div>
                <p style="color:slategray">Los campos que poseen * son obligatorios</p>
                <hr>
            </div>
            <div class="input_group">
                <label for="item">Itém del menú: <span>*</span></label>
                <select class="input_form" name="item" id="item">
                    <option value="0">Vacío</option>
                    <?php
                        $ir = new ItemsRepository();
                        $array_result = $ir->getItems(null);

                        var_dump($array_result);

                        if($array_result->num_rows > 0):
                        foreach ($array_result as $i):
                    ?>
                    <option value="<?php echo $i["id"]; ?>"><?php echo $i["nombre"]; ?></option>
                    <?php endforeach; else:?>
                    <option>No hay productos disponibles</option>
                    <?php endif; ?>
                </select>

            </div>
            <div class="input_group">
                <label for="nro_mesa">Nro. de Mesa: <span>*</span></label>
                <select class="input_form" name="nro_mesa" id="nro_mesa">
                    <option value="0">Vacío</option>
                    <option value="1">Mesa 1</option>
                    <option value="2">Mesa 2</option>
                    <option value="3">Mesa 3</option>
                    <option value="4">Mesa 4</option>
                    <option value="5">Mesa 5</option>
                </select>
            </div>
            <div class="input_group">
                <label for="descripcion">Nota del pedido:</label>
                <textarea class="input_form" cols="5" name="descripcion" id="descripcion"></textarea>
            </div>
            <button type="submit" id="btn_submit_pedido">+ Crear Pedido</button>
        </form>
        <?php
            if(count($_POST) > 0){
                $id_item = $_POST["item"];
                $nro_mesa = $_POST["nro_mesa"];
                $descripcion = strlen($_POST["descripcion"]) > 0 ? $_POST["descripcion"] : "null";

                if(strlen($id_item) > 0 && strlen($nro_mesa) > 0){
                    $pr = new PedidosRepository();
                    $result = $pr->createPedido(["id_item" => $id_item, "nro_mesa" => $nro_mesa, "descripcion" => $descripcion]);
                }

                $_SESSION["pedido_msg"] = "Se creó el pedido de manera correcta";
                header("Location: ./index.php");
            }

        ?>
    </section>
    <?php include_once("components/footer.php") ?>
    <script src="index.js" type="text/javascript"></script>
</body>

</html>