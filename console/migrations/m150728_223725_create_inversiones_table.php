<?php

use yii\db\Schema;
use yii\db\Migration;

class m150728_223725_create_inversiones_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%inversiones}}', [
            // Toda la información de las inversiones se encuentran ligadas a la empresa NO a contactos
            'idinversion' => Schema::TYPE_PK,
            'empresa_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'anio' =>  ' YEAR NOT NULL',
            'monto_inversion' => 'DECIMAL(10,2) ',
            'monto_propuesta' => ' DECIMAL(9,2) NOT NULL DEFAULT 0 ',
            'fecha_campana' => Schema::TYPE_DATE ,
            'productos_interes' => Schema::TYPE_STRING . '(255) ',
            'comentarios' => Schema::TYPE_STRING . '(255) ',
            'propuesta' => Schema::TYPE_STRING . '(255) ',
            'campana' => Schema::TYPE_STRING . '(100) ',
            'temporalidad' => Schema::TYPE_STRING . '(255) ',
        ], $tableOptions);

        $this->addForeignKey('fk_empresa_id', 'inversiones', 'empresa_id', 'empresas', 'idempresa', 'RESTRICT', 'RESTRICT');

        // Insertando los ejemplos de inversiones
        $this->batchInsert('inversiones',
            array('empresa_id', 'anio', 'monto_inversion', 'monto_propuesta'), // Se tiene que borrar todas para las llaves foraneas
            array(
                [1, 2015, 1000000, 800000],
                [1, 2014, 1000000, 850000],
                [1, 2013, 1000000, 50000],
                [2, 2013, 1000000, 50000],
                [3, 2014, 1000000, 50000],
            )
        );
    }

    public function down()
    {
        echo "m150728_223725_create_inversiones_table cannot be reverted.\n";
        $this->dropTable('{{%inversiones}}');


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
