<div>
    <form action="<?= URL ?>/roles/update/<?= $data['data']['id_role']?>" method="post">
        <h1>Actualizar rol</h1>
        <input type="text" name="rol_name" value="<?= $data['data']['name_role']?> " placeholder="actualizar un rol">
        <h1><?php print_r($data['data']['id_role']) ?></h1>
        <button>actualizar</button>
    </form>
</div>