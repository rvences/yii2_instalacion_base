<?php

use yii\db\Schema;
use yii\db\Migration;

class m150728_221627_create_empresas_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%empresas}}', [
            // Solo permite que se registra el nombre de la cuenta, dependencia, empresa o fundacion
            'idempresa' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'cuenta' => Schema::TYPE_STRING . '(100) NOT NULL',
            'status' => Schema::TYPE_STRING . " NOT NULL DEFAULT 'ACTIVO'",
        ], $tableOptions);

        $this->addForeignKey('fk_user_id', 'empresas', 'user_id', 'user', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        echo "m150728_221627_create_empresas_table fue eliminada.\n";
        $this->dropTable('{{%empresas}}');
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
