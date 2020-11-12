<?php
    require_once("header.php");
?>
    <main class="login">
        <form class="login-form" action="<?= ROOT_CLIENT?>Home/signup" method="POST">
            <input class="login-input" type="text" name="name" placeholder="Nombre" required>

            <input class="login-input" type="email" name="email" placeholder="Correo Electrónico" required>

            <input class="login-input" type="password" name="password" placeholder="Contraseña" required>

            <button class="login-btn" type="submit">Enviar</button>
            <a href="<?= ROOT_CLIENT?>">¿Ya tiene una cuenta? Inicia Sesión</a>
        </form>
    </main>
<?php
    require_once("footer.php");
?>