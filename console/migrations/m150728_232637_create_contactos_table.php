<?php

use yii\db\Schema;
use yii\db\Migration;

class m150728_232637_create_contactos_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%contactos}}', [
            // Toda la información de los contactos NO se liga a nada
            'idcontacto' => Schema::TYPE_PK,
            'puesto' => Schema::TYPE_STRING . '(50) NOT NULL',
            'nombre' =>  Schema::TYPE_STRING . '(100) NOT NULL',
            'telefono' => Schema::TYPE_STRING . '(15) ',
            'correo' => Schema::TYPE_STRING . '(100) ',
            'direccion' => Schema::TYPE_STRING,
            'asistente' => Schema::TYPE_STRING,
            'fecha_reunion' => Schema::TYPE_DATETIME,
            'UNIQUE KEY (nombre, telefono)',
        ], $tableOptions);

    }

    public function down()
    {
        echo "m150728_232637_create_contactos_table cannot be reverted.\n";
        $this->dropTable('{{%contactos}}');

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
