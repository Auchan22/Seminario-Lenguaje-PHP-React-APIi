<?php 
include("db/conexionDB.php");
include("Repository/PedidosRepository.php");
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
    <?php include("components/header.php");?>
    <section id="listProductos">
    <?php
            $pe = new PedidosRepository();

            $pedidos_array = $pe->getPedidos($_GET);
            if($pedidos_array->num_rows > 0):
            foreach($pedidos_array as $item) :
            ?>
                <div class="cartas">
                    <img src="viewImage.php?id_item=<?php echo $item["id"]; ?>" alt="Imagen producto">
                    <div class="descripcion_producto">
                        <h3><?php echo $item["nombre"] ?></h3>
                        <h5><?php echo $item["tipo"] ?></h5>
                        <p class="producto_precio">Valor: <span>$ <?php echo $item["precio"] ?></span></p>
                    </div>
                </div>
            <?php  endforeach;
             else{
                    echo "No hay pedidos disponibles";
                }
                endif;
            ?>

        </div>
    </section>
    <a href="./index.php" id="agregar_pedido">Volver al Menu</a> 
    <?php include("components/footer.php");?>
    <script src="indexPedidos.js" type="text/javascript"></script>
</body>

</html>