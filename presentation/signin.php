<?php
    require_once("header.php");
?>
    <main class="login">
        <form class="login-form" action="<?= ROOT_CLIENT?>Home/signin" method="POST">
            <input class="login-input" type="email" name="email" placeholder="Ingrese su email" required>

            <input class="login-input" type="password" name="password" placeholder="Ingrese su contraseña" required>

            <button class="login-btn" type="submit">Enviar</button>
            
            <a href="<?= ROOT_CLIENT?>Home/register">No tiene cuenta? Registrate ahora</a>
        </form>
    </main>
<?php
    require_once("footer.php");
?>