<?php

use yii\db\Migration;

/**
 * Class m181022_080238_init_rbac
 */
class m181022_080238_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181022_080238_init_rbac cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $auth = Yii::$app->authManager;

        // add "edita privolegios" permission
        $editPrivilegios = $auth->createPermission('editPrivilegios');
        $editPrivilegios->description = 'Editar Privilegios';
        $auth->add($editPrivilegios);

        // add "Gere BackOffice" permission
        $gereBackOffice = $auth->createPermission('gereBackOffice');
        $gereBackOffice->description = 'Gere BackOffice';
        $auth->add($gereBackOffice);

        // add "author" role and give this role the "createComment" permission
        $admin = $auth->createRole('Admin');
        $auth->add($admin);
        $auth->addChild($admin, $editPrivilegios);

        // add "admin" role and give this role the "updateComment" permission
        // as well as the permissions of the "author" role
        $mod = $auth->createRole('moderador');
        $auth->add($mod);
        $auth->addChild($mod, $gereBackOffice);
        $auth->addChild($admin, $mod);

        $normal=$auth->createRole('User Normal');
        $auth->addChild($normal);
        

    }


    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }
}
