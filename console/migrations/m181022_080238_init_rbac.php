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

        // add "createComment" permission
        $createComment = $auth->createPermission('createComment');
        $createComment->description = 'Create a comment';
        $auth->add($createComment);

        // add "updateComment" permission
        $updateComment = $auth->createPermission('updateComment');
        $updateComment->description = 'Update a comment';
        $auth->add($updateComment);

        // add "author" role and give this role the "createComment" permission
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $createComment);

        // add "admin" role and give this role the "updateComment" permission
        // as well as the permissions of the "author" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updateComment);
        $auth->addChild($admin, $author);
    }


    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }
}
