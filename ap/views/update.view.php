<div class="container">
    <form class="login" action="<?= URL ?>/login/updatepassword/<?= $data['data'] ?>" method="POST">
        <h1 class="login__title">Modificar contraseña</h1>
        <div>
            <input type="password" name="password" class="login__input" placeholder="Contraseña">
        </div>
        <div>
            <input type="password" name="confirm_password" class="login__input" placeholder="Confirmar contraseña">
        </div>
        <div class="login__panel">
            <input type="hidden" name="id" value="<?php echo $data['data'] ?>">
            <button class="login__btn">Validar</button>
        </div>
    </form>
</div>