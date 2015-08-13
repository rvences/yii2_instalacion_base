<?php

//use yii\db\Schema;
use yii\db\Migration;

class m150728_235005_insert_valores_prueba extends Migration
{
    public function up()
    {
        // Crea los usuarios que se pueden loguear en el sistema
        $this->batchInsert('user',
            array('username', 'auth_key', 'password_hash', 'email', 'status', 'created_at', 'updated_at'),
            array(
                ['kory', 'RjwwBJFBEWPsRsj9oCcgivVErTFegjfm', '$2y$13$qCG9wSmSRq6C0FEMdU9pbeZWfYkwkXrSVG3boHf5Nv3dsbI4km9My', 'kvences@gmail.com', '10', '1438127540', '1438127540'  ],
                ['kory2', 'RjwwBJFBEWPsRsj9oCcgivVErTFegjfm', '$2y$13$qCG9wSmSRq6C0FEMdU9pbeZWfYkwkXrSVG3boHf5Nv3dsbI4km9My', 'kvences@gmail.com', '10', '1438127540', '1438127540'  ]
            )
        );

        // Inserta algunos Clientes
        $this->batchInsert('contactos',
            array('puesto', 'nombre', 'telefono', 'correo', 'direccion', 'asistente', 'fecha_reunion'),
            array(
                [ 'Director de Comunicación Institucional', 'Lic. Dante Pinal Ibarra', ' 5265-7404', 'dante.pinal@fonacot.gob.mx', 'Insurgentes Sur 452 pb,  Col. Roma Sur,  Del. Cuauhtémoc, c.p.  06760', 'Sria. Margrit', '24 DE ABRIL 2014'],
                ['Coordinador de Administracion y Finanzas', 'Javier Gilberto Dennis Valenzuwla', '53424966, Nextel 46001898', 'copredsaf@hotmail.com', 'Calz. Mexico Tacuba 562 Edif. Anexo Sur 2do Piso. Col Popotla', null, null],
                ['Subdirector de Comunicación Social', 'Mtro. Luis Miguel Aldama Martínez', '55 73 24 63 cel: 5585 810426', 'aldama.luis@gmail.com', 'Plaza de la Constitución #1, Col. Tlalpan Centro', null, null],
            )
        );

        // Insertando los datos de Delegación, Intercambio o Fundación
        $this->batchInsert('empresas',
            array('user_id', 'cuenta', 'status'), // Se tiene que borrar todas para las llaves foraneas
            array(
                [1, 'Tlalpan', 'Visitado'],
            )
        );

        // Uniendo

    }

    public function down()
    {
        echo "m150728_235005_insert_valores_prueba cannot be reverted.\n";
        $this->delete('user');
        $this->delete('contactos');
        $this->delete('empresas');

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
