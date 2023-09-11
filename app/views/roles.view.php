<div class="container">
    <form class="login" action="<?= URL ?>/register/validate" method="POST" autocomplete="off">
        <h1 class="login__title">Cree un rol</h1>
        <div>
            <input type="text" class="login__input" name="role_name" placeholder="Nombre del rol">
        </div>
        <div class="login__panel">
            <button class="login__btn">Guardar</button>
        </div>        
    </form>
</div>
