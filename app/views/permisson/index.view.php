<div>

    <div>
        <button><a href="<?= URL ?>/permisson/create">crear permiso</a></button>
    </div>
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Fecha de creado</th>
                <th>Fecha de modificacion</th>
                <th>acciones</th>
            </tr>
        </thead>
        <tbody>

        <?php

            use Adso\libs\DateHelper;
            use Adso\libs\Helper;

            foreach($data['permisos'] as $value){

        ?>
            <tr>
                <td><?= $value['name_permisson'] ?></td>
                <td><?= DateHelper::shortDate($value['created_at']) ?></td>
                <td><?= DateHelper::shortDate($value['updated_at']) ?></td>
                <td>
                    <a href="<?= URL ?>/permisson/editar/<?= Helper::encrypt($value['id_permission']) ?>">editar</a>
                </td>
            </tr>
            <?php
            }
        ?>
        </tbody>
    </table>

</div>