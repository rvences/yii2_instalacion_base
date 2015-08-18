<?php

namespace frontend\models;

use Yii;
use common\models\User;
use frontend\models\Contactos;

/**
 * This is the model class for table "empresas".
 *
 * @property integer $idempresa
 * @property integer $user_id
 * @property string $cuenta
 * @property string $status
 *
 * @property User $user
 * @property Contactos[] $contactos
 * @property Inversiones[] $inversiones
 */
class Empresas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empresas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'cuenta'], 'required'],
            [['user_id'], 'integer'],
            [['cuenta'], 'string', 'max' => 100],
            [['status'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idempresa' => 'ID unico para cada empresa',
            'user_id' => 'Relación foránea con los usuarios del sistema',
            'cuenta' => 'Cuenta', //'Nombre de la cuenta como lo conoce el vendedor',
            'status' => 'Estado', //'En que estado se encuentra la empresa CLIENTE, VISITADO, NO VISITADO, FUERA DEL DF',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInversiones()
    {
        return $this->hasMany(Inversiones::className(), ['empresa_id' => 'idempresa']);
    }

    /**
     * Obtiene el username de acuerdo a user_id
     * @return string
     */

    public function getGerente()
    {
        return $this->user->username;
    }


    /**
     * Obtiene el listado de todos los contactos del modelo de Contacto
     * @return \yii\db\ActiveQuery
     */
    public function getContactos()
    {
        return $this->hasMany(Contactos::className(), ['empresas_id'=>'idempresa']);
        //         return $this->hasOne(Contactos::className(), ['empresas_id'=>'idempresa']);


    }

    public function getNombre()
    {
        return $this->contactos->nombre;
    }



}
