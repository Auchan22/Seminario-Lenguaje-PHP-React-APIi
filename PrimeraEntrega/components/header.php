<header class="header">
    <div>
        <a href="./">
        <img src="restaurant-logo-design-template-b281aeadaa832c28badd72c1f6c5caad_screen.jpg">
        <h3>Don Chincho</h3>
        </a>
    </div>
    <?php if(isset($_SESSION["pedido_msg"])): // si el mensaje no es nulo entro
        ?>
        <p id="alerta" class="mostrarAlerta"><?php echo $_SESSION["pedido_msg"]; ?></p>
    <?php endif; ?>
</header>
