<div>
    <div>
        <button><a href="<?= URL ?>/roles/create">crear rol</a></button>
    </div>
           
        <table border="1">
            <thead>
                <tr>
                    <th>id</th>
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

                foreach($data['roles'] as $value){
                ?>
                <tr>
                    <td><?= $value['name_role'] ?></td>
                    <td><?= DateHelper::shortDate($value['created_at']) ?></td>
                    <td><?= DateHelper::shortDate($value['updated_at']) ?></td>
                    <td>
                        <a href="<?= URL ?>/roles/editar/<?= $value['id_role'] ?>">editar</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
            
        
        
    </form>
</div>
