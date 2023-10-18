<div>
    <form action="<?= URL ?>/roles/update/<?= $data['id'] ?>"  method="post">
        <h1>Actualizar rol</h1>
        <input type="text" name="rol_name" value="<?= $data['data']['name_role']?> " placeholder="actualizar un rol">
        <button>actualizar</button>
    </form>
</div>