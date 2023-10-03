<?php
    include("db/conexionDB.php");
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
    <header class="header">
        <img src="restaurant-logo-design-template-b281aeadaa832c28badd72c1f6c5caad_screen.jpg">
        <h3>Don Chincho</h3>
    </header>
    <section id="listProductos">
        <div id="encabezado_lista">
            <h2>Menú</h2>
            <form>
                <div class="input_group">
                    <label for="titulo">Título:</label>
                    <input class="input_form" name="titulo" id="input_titulo" type="text"
                        placeholder="Ingrese un título" />
                </div>
                <div class="input_group">
                    <label for="tipo">Tipo:</label>
                    <select class="input_form" name="tipo" id="select_tipo">
                        <option value="vacio">Vacío</option>
                        <option value="comida">Comida</option>
                        <option value="bebida">Bebida</option>
                    </select>
                </div>
                <div class="input_group">
                    <label for="orden">Orden:</label>
                    <select class="input_form" id="orden" name="select_orden">
                        <option value="none">Sin orden</option>
                        <option value="asc">Ascendente</option>
                        <option value="desc">Descendente</option>
                    </select>
                </div>
                <button type="submit" class="btn_submit">Filtrar</button>
            </form>
        </div>
        <hr />
        <?php
            include("Repository/PedidosRepository.php");
            $pr = new PedidosRepository();

            var_dump($pr->getPedidos());
        ?>
        <div id="productos_contenedor">
            <div class="cartas">
                <img
                    src="https://www.shutterstock.com/shutterstock/photos/2147550405/display_1500/stock-photo-grilled-picanha-with-farofa-and-vinaigrette-2147550405.jpg">
                <div class="descripcion_producto">
                    <h3>Churrasco</h3>
                    <h5>Comida</h5>
                    <p class="producto_precio">Valor: <span>$ 1500</span></p>
                </div>
            </div>
            <div class="cartas">
                <img
                    src="https://www.shutterstock.com/shutterstock/photos/2147550405/display_1500/stock-photo-grilled-picanha-with-farofa-and-vinaigrette-2147550405.jpg">
                <div class="descripcion_producto">
                    <h3>Churrasco al disco</h3>
                    <h5>Comida</h5>
                    <p class="producto_precio">Valor: <span>$ 1500</span></p>
                </div>
            </div>
            <div class="cartas">
                <img
                    src="https://www.shutterstock.com/shutterstock/photos/2147550405/display_1500/stock-photo-grilled-picanha-with-farofa-and-vinaigrette-2147550405.jpg">
                <div class="descripcion_producto">
                    <h3>Milanesa Napolitana</h3>
                    <h5>Comida</h5>
                    <p class="producto_precio">Valor: <span>$ 3500</span></p>
                </div>
            </div>
            <div class="cartas">
                <img
                    src="https://www.shutterstock.com/shutterstock/photos/2147550405/display_1500/stock-photo-grilled-picanha-with-farofa-and-vinaigrette-2147550405.jpg">
                <div class="descripcion_producto">
                    <h3>Papas Fritas</h3>
                    <h5>Comida</h5>
                    <p class="producto_precio">Valor: <span>$ 1500</span></p>
                </div>
            </div>
            <div class="cartas">
                <img
                    src="https://www.shutterstock.com/shutterstock/photos/2147550405/display_1500/stock-photo-grilled-picanha-with-farofa-and-vinaigrette-2147550405.jpg">
                <div class="descripcion_producto">
                    <h3>Coca Cola</h3>
                    <h5>Bebida</h5>
                    <p class="producto_precio">Valor: <span>$ 300</span></p>
                </div>
            </div>
            <div class="cartas">
                <img
                    src="https://www.shutterstock.com/shutterstock/photos/2147550405/display_1500/stock-photo-grilled-picanha-with-farofa-and-vinaigrette-2147550405.jpg">
                <div class="descripcion_producto">
                    <h3>Churrasco</h3>
                    <h5>Comida</h5>
                    <p class="producto_precio">Valor: <span>$ 1500</span></p>
                </div>
            </div>
            <div class="cartas">
                <img
                    src="https://www.shutterstock.com/shutterstock/photos/2147550405/display_1500/stock-photo-grilled-picanha-with-farofa-and-vinaigrette-2147550405.jpg">
                <div class="descripcion_producto">
                    <h3>Churrasco</h3>
                    <h5>Comida</h5>
                    <p class="producto_precio">Valor: <span>$ 1500</span></p>
                </div>
            </div>
            <div class="cartas">
                <img
                    src="https://www.shutterstock.com/shutterstock/photos/2147550405/display_1500/stock-photo-grilled-picanha-with-farofa-and-vinaigrette-2147550405.jpg">
                <div class="descripcion_producto">
                    <h3>Churrasco</h3>
                    <h5>Comida</h5>
                    <p class="producto_precio">Valor: <span>$ 1500</span></p>
                </div>
            </div>
            <div class="cartas">
                <img
                    src="https://www.shutterstock.com/shutterstock/photos/2147550405/display_1500/stock-photo-grilled-picanha-with-farofa-and-vinaigrette-2147550405.jpg">
                <div class="descripcion_producto">
                    <h3>Churrasco</h3>
                    <h5>Comida</h5>
                    <p class="producto_precio">Valor: <span>$ 1500</span></p>
                </div>
            </div>
            <div class="cartas">
                <img
                    src="https://www.shutterstock.com/shutterstock/photos/2147550405/display_1500/stock-photo-grilled-picanha-with-farofa-and-vinaigrette-2147550405.jpg">
                <div class="descripcion_producto">
                    <h3>Churrasco</h3>
                    <h5>Comida</h5>
                    <p class="producto_precio">Valor: <span>$ 1500</span></p>
                </div>
            </div>

        </div>
    </section>
    <a href="/altapedido.html" id="agregar_pedido">Agregar Pedido</a>
    <footer class="footer">
        <p>Creado con ❤ por <b>David Potin</b> & <b>Agustin Surila Soto</b> | <b>A&ntilde;o 2023</b></p>
    </footer>
</body>

</html>