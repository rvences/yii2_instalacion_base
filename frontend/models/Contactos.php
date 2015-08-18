<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "contactos".
 *
 * @property integer $idcontacto
 * @property string $puesto
 * @property string $nombre
 * @property string $telefono
 * @property string $correo
 * @property string $direccion
 * @property string $asistente
 * @property string $fecha_reunion
 * @property integer $empresas_id
 *
 * @property Empresas $empresas
 */
class Contactos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contactos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['puesto', 'nombre', 'empresas_id'], 'required'],
            [['fecha_reunion'], 'safe'],
            [['empresas_id'], 'integer'],
            [['puesto'], 'string', 'max' => 50],
            [['nombre', 'correo'], 'string', 'max' => 100],
            [['telefono'], 'string', 'max' => 15],
            [['direccion', 'asistente'], 'string', 'max' => 255],
            [['nombre', 'telefono'], 'unique', 'targetAttribute' => ['nombre', 'telefono'], 'message' => 'The combination of Nombre and Telefono has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcontacto' => 'Idcontacto',
            'puesto' => 'Puesto',
            'nombre' => 'Nombre',
            'telefono' => 'Telefono',
            'correo' => 'Correo',
            'direccion' => 'Direccion',
            'asistente' => 'Asistente',
            'fecha_reunion' => 'Fecha Reunion',
            'empresas_id' => 'Empresas ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresas()
    {
        return $this->hasOne(Empresas::className(), ['idempresa' => 'empresas_id']);
    }


}
