<?php
    require_once("header.php");
?>
    <main>
        <form action="<?= ROOT_CLIENT?>Home/signup" method="POST">
            <label for="name">Nombre</label>
            <input type="text" name="name" placeholder="Ingrese su nombre" required>

            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Ingrese su email" required>

            <label for="password">Contraseña</label>
            <input type="password" name="password" placeholder="Ingrese una contraseña" required>

            <button type="submit">Enviar</button>
        </form>
    </main>
<?php
    require_once("footer.php");
?>