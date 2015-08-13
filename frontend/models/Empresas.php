<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "empresas".
 *
 * @property integer $idempresa
 * @property integer $user_id
 * @property string $cuenta
 * @property string $status
 *
 * @property User $user
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
            'cuenta' => 'Nombre de la cuenta como lo conoce el vendedor',
            'status' => 'En que estado se encuentra la empresa CLIENTE, VISITADO, NO VISITADO, FUERA DEL DF',
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
}
