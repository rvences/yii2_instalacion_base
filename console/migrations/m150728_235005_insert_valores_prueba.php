<?php

use yii\db\Schema;
use yii\db\Migration;

class m150728_235005_insert_valores_prueba extends Migration
{
    public function up()
    {
        $this->batchInsert('user',
            array('username', 'auth_key', 'password_hash', 'email', 'status', 'created_at', 'updated_at'),
            array(
                ['kory', 'RjwwBJFBEWPsRsj9oCcgivVErTFegjfm', '$2y$13$qCG9wSmSRq6C0FEMdU9pbeZWfYkwkXrSVG3boHf5Nv3dsbI4km9My', 'kvences@gmail.com', '10', '1438127540', '1438127540'  ],
                ['kory2', 'RjwwBJFBEWPsRsj9oCcgivVErTFegjfm', '$2y$13$qCG9wSmSRq6C0FEMdU9pbeZWfYkwkXrSVG3boHf5Nv3dsbI4km9My', 'kvences@gmail.com', '10', '1438127540', '1438127540'  ]
            ));

    }

    public function down()
    {
        echo "m150728_235005_insert_valores_prueba cannot be reverted.\n";
        $this->delete('user');

        return true;
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
