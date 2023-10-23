<div>
    <form action="<?= URL ?>/roles/storage" method="post">
        <h1>Creacion de rol</h1>
        <input type="text" name="rol_name" placeholder="crea un nuevo rol">
        <?php
            if(isset($data["errors"])){
                if( array_key_exists("rol_error", $data["errors"])){
            ?>
                <span class="login__error"><?= $data['errors']['rol_error'] ?></span>
            <?php
                }
            }

        ?>
        <button>crear rol</button>
    </form>
</div>