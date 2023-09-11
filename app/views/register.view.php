<div class="container">
    <form class="login" action="<?= URL ?>/register/validate" method="POST" autocomplete="off">
        <h1 class="login__title">Registre sus datos</h1>
        <div>
            <input type="text" class="login__input" name="first_name" placeholder="Nombre">
        </div>
        <div>
            <input type="text" class="login__input" name="last_name" placeholder="Apellidos">
        </div>
        <div>
            <input type="text" class="login__input" id="email" name="email" placeholder="Correo electronico">
        </div>
        <div>
            <input type="text" class="login__input" name="phone" placeholder="Celular">
        </div>
        <div>
            <input type="password" class="login__input" name="password" placeholder="Contraseña">
        </div>
        <div>
            <input type="password" class="login__input" name="password_confirm" placeholder="Confirme su contraseña">
        </div>
        <div class="login__panel">
            <button class="login__btn">Validar datos</button>
            <a href="<?= URL ?>/login" class="login__link">Ya tengo usuario</a>
        </div>        
    </form>
</div>

<script src="<?= URL ?>/assets/js/register.js"></script>