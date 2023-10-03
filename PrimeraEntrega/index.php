<?php
include("db/conexionDB.php");
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
                    <input class="input_form" name="titulo" id="titulo" type="text" placeholder="Ingrese un título" />
                </div>
                <div class="input_group">
                    <label for="tipo">Tipo:</label>
                    <select class="input_form" name="tipo" id="tipo">
                        <option value="vacio">Vacío</option>
                        <option value="comida">Comida</option>
                        <option value="bebida">Bebida</option>
                    </select>
                </div>
                <div class="input_group">
                    <label for="orden">Orden:</label>
                    <select class="input_form" id="orden" name="orden">
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
                <img src="https://www.afuegolento.com/img_db/timthumb.php?src=img_db/old/c56cc1c8573a4a580b734e0ab96fe9f4_thumb.jpg&w=800&z=1">
                <div class="descripcion_producto">
                    <h3>Bondiola</h3>
                    <h5>Comida</h5>
                    <p class="producto_precio">Valor: <span>$ 2500</span></p>
                </div>
            </div>
            <div class="cartas">
                <img src="https://www.shutterstock.com/shutterstock/photos/2147550405/display_1500/stock-photo-grilled-picanha-with-farofa-and-vinaigrette-2147550405.jpg">
                <div class="descripcion_producto">
                    <h3>Churrasco </h3>
                    <h5>Comida</h5>
                    <p class="producto_precio">Valor: <span>$ 1500</span></p>
                </div>
            </div>
            <div class="cartas">
                <img src="https://cloudfront-us-east-1.images.arcpublishing.com/elespectador/KRMQHXYYBFBI5KRDXUYY5AXH2A.jpg">
                <div class="descripcion_producto">
                    <h3>Milanesa Napolitana</h3>
                    <h5>Comida</h5>
                    <p class="producto_precio">Valor: <span>$ 3500</span></p>
                </div>
            </div>
            <div class="cartas">
                <img src="https://billiken.lat/wp-content/uploads/2022/06/asado-carne-cocinada-a-la-parrilla-quimica-SITIO-1280x720.jpg">
                <div class="descripcion_producto">
                    <h3>Asado </h3>
                    <h5>Comida</h5>
                    <p class="producto_precio">Valor: <span>$ 3000</span></p>
                </div>
            </div>
            <div class="cartas">
                <img src="https://www.clarin.com/2022/11/25/tR-l3EmRl_340x340__1.jpg">
                <div class="descripcion_producto">
                    <h3>Matambre a la pizza</h3>
                    <h5>Comida</h5>
                    <p class="producto_precio">Valor: <span>$ 2800</span></p>
                </div>
            </div>
            <div class="cartas">
                <img src="https://thumbs.dreamstime.com/z/botella-de-cerveza-heineken-con-una-taza-vertida-espuma-fondo-verde-arhangelsk-rusia-vertido-212949476.jpg">
                <div class="descripcion_producto">
                    <h3>Heineken</h3>
                    <h5>Bebida</h5>
                    <p class="producto_precio">Valor: <span>$ 900</span></p>
                </div>
            </div>
            <div class="cartas">
                <img src="https://www.vinosdeayerbe.com.ar/wp-content/uploads/2016/08/Paradigma02.jpeg">
                <div class="descripcion_producto">
                    <h3>Vino</h3>
                    <h5>Bebida</h5>
                    <p class="producto_precio">Valor: <span>$ 1200</span></p>
                </div>
            </div>
            <div class="cartas">
                <img src="https://acdn.mitiendanube.com/stores/001/160/839/products/004-009-003_whisky-johnnie-walker-red-label-x-1-l11-5000dfbc60949c8b8115886925321168-1024-1024.jpg">
                <div class="descripcion_producto">
                    <h3>Wisky</h3>
                    <h5>Bebida</h5>
                    <p class="producto_precio">Valor: <span>$ 400</span></p>
                </div>
            </div>
            <div class="cartas">
                <img src="https://www.paulinacocina.net/wp-content/uploads/2023/06/jugo-de-naranja-receta-y-propiedades.jpg">
                <div class="descripcion_producto">
                    <h3>Jugo de naranja</h3>
                    <h5>Bebida</h5>
                    <p class="producto_precio">Valor: <span>$ 600</span></p>
                </div>
            </div>
            <div class="cartas">
                <img src="data:image/jpeg;base64,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">
                <div class="descripcion_producto">
                    <h3>Coca cola</h3>
                    <h5>Bebida</h5>
                    <p class="producto_precio">Valor: <span>$ 800</span></p>
                </div>
            </div>

        </div>
    </section>
    <a href="./altapedido.html" id="agregar_pedido">Agregar Pedido</a>
    <footer class="footer">
        <p>Creado con ❤ por <b>David Potin</b> & <b>Agustin Surila Soto</b> | <b>A&ntilde;o 2023</b></p>
    </footer>
</body>

</html>