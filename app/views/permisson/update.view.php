<div>
    <form action="<?= URL ?>/permisson/update/<?= $data["id"]?>" method="post">
        <h1>actualizacion de permisos</h1>
        <input type="text" name="per_name" placeholder="crea un nuevo permiso" value="<?= $data["data"]["name_permisson"] ?>">
        <?php
            if(isset($data["errors"])){
                if( array_key_exists("per_error", $data["errors"])){
            ?>
                <span class="login__error"><?= $data['errors']['per_error'] ?></span>
            <?php
                }
            }

        ?>
        <button>actualizar permiso</button>
    </form>
</div>