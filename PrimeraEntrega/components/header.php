<header class="header">
    <div>
        <img src="restaurant-logo-design-template-b281aeadaa832c28badd72c1f6c5caad_screen.jpg">
        <h3>Don Chincho</h3>
    </div>
    <?php if(isset($_SESSION["pedido_msg"])):
        ?>
        <p id="alerta" class="mostrarAlerta"><?php echo $_SESSION["pedido_msg"]; ?></p>
    <?php endif; ?>
</header>
