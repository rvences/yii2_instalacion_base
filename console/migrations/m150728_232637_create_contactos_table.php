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


        // Inserta algunos Clientes
        $this->batchInsert('contactos',
            array('puesto', 'nombre', 'telefono', 'correo', 'direccion', 'asistente', 'fecha_reunion'),
            array(
                [ 'Director de Comunicación Institucional', 'Lic. Dante Pinal Ibarra', ' 5265-7404', 'dante.pinal@fonacot.gob.mx', 'Insurgentes Sur 452 pb,  Col. Roma Sur,  Del. Cuauhtémoc, c.p.  06760', 'Sria. Margrit', '24 DE ABRIL 2014'],
                ['Coordinador de Administracion y Finanzas', 'Javier Gilberto Dennis Valenzuwla', '53424966, Nextel 46001898', 'copredsaf@hotmail.com', 'Calz. Mexico Tacuba 562 Edif. Anexo Sur 2do Piso. Col Popotla', null, null],
                ['Subdirector de Comunicación Social', 'Mtro. Luis Miguel Aldama Martínez', '55 73 24 63 cel: 5585 810426', 'aldama.luis@gmail.com', 'Plaza de la Constitución #1, Col. Tlalpan Centro', null, null],
            )
        );

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
