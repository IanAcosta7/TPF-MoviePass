<?php
    require_once("header.php");
?>
    <main>
        <form action="<?= ROOT_CLIENT?>User/signin" method="POST">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Ingrese su email" required>

            <label for="password">Contraseña</label>
            <input type="password" name="password" placeholder="Ingrese su contraseña" required>

            <button type="submit">Enviar</button>
            
            <a href="<?= ROOT_CLIENT?>User/register">No tiene cuenta? Registrate ahora</a>
        </form>
    </main>
<?php
    require_once("footer.php");
?>