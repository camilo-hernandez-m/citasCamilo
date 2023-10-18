<div>
    <form action="<?= URL ?>/permisson/storage" method="post">
        <h1>Creacion de permisson</h1>
        <input type="text" name="per_name" placeholder="crea un nuevo permiso">
        <?php
            if(isset($data["errors"])){
                if( array_key_exists("per_error", $data["errors"])){
            ?>
                <span class="login__error"><?= $data['errors']['per_error'] ?></span>
            <?php
                }
            }

        ?>
        <button>crear permiso</button>
    </form>
</div>