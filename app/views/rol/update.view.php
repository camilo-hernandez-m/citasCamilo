<div>
    <form action="<?= URL ?>/roles/update/<?= $data['id'] ?>"  method="post">
        <h1>Actualizar rol</h1>
        <input type="text" name="rol_name" value="<?= $data['data']['name_role']?> " placeholder="actualizar un rol">
        <?php
            if(isset($data["errors"])){
                if( array_key_exists("rol_error", $data["errors"])){
            ?>
                <span class="login__error"><?= $data['errors']['rol_error'] ?></span>
            <?php
                }
            }

        ?>
        <button>actualizar</button>
    </form>
</div>