<?php
include("db/conexionDB.php");
include("Repository/ItemsRepository.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="restaurant-logo-design-template-b281aeadaa832c28badd72c1f6c5caad_screen.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Don Chincho</title>
</head>

<body>
    <?php include("components/header.php")?>
    <section id="listProductos">
        <div id="encabezado_lista">
            <h2>Menú</h2>
            <form method="GET" action="index.php">
                <div class="input_group">
                    <label for="titulo">Título:</label>
                    <input class="input_form" name="titulo" id="titulo" type="text" placeholder="Ingrese un título" />
                </div>
                <div class="input_group">
                    <label for="tipo">Tipo:</label>
                    <select class="input_form" name="tipo" id="tipo">
                        <option value="vacio">Vacío</option>
                        <option value="COMIDA">Comida</option>
                        <option value="BEBIDA">Bebida</option>
                    </select>
                </div>
                <div class="input_group">
                    <label for="orden">Orden:</label>
                    <select class="input_form" id="orden" name="orden">
                        <option value="none">Sin orden</option>
                        <option value="ASC">Ascendente</option>
                        <option value="DESC">Descendente</option>
                    </select>
                </div>
                <button type="submit" class="btn_submit">Filtrar</button>
            </form>
        </div>
        <hr />


        <div id="productos_contenedor">
            <?php
            $ir = new ItemsRepository();

            $items_array = $ir->getItems($_GET);
            if($items_array->num_rows > 0):
            foreach($items_array as $item) :
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
                else:{
                    echo "No hay productos disponibles";
                }
                endif;
            ?>

        </div>
    </section>
    <a href="./altapedido.php" id="agregar_pedido">Agregar Pedido</a>
    <?php include("components/footer.php") ?>
<script>
    <?php if(isset($_SESSION["pedido_msg"])):
    ?>
    let alerta = document.getElementById("alerta");
    alerta.classList.remove("esconderAlerta");
    alerta.classList.add("mostrarAlerta");

    setTimeout(() => {
        alerta.classList.remove("mostrarAlerta");
        alerta.classList.add("esconderAlerta");
        <?php session_unset(); ?>
    }, 4000)
    <?php endif; ?>
</script>
</body>
</html>