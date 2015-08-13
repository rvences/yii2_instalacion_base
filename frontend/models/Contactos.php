<?php

namespace app\models;

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
            [['puesto', 'nombre'], 'required'],
            [['fecha_reunion'], 'safe'],
            [['puesto'], 'string', 'max' => 50],
            [['nombre', 'correo'], 'string', 'max' => 100],
            [['telefono'], 'string', 'max' => 15],
            [['direccion', 'asistente'], 'string', 'max' => 255],
            [['nombre', 'telefono'], 'unique', 'targetAttribute' => ['nombre', 'telefono'], 'message' => 'The combination of Nombre Completo and Teléfono con cada has already been taken.']
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
            'nombre' => 'Nombre Completo',
            'telefono' => 'Teléfono con cada',
            'correo' => 'Correo Electrónico',
            'direccion' => 'Dirección',
            'asistente' => 'Nombre del Asistente',
            'fecha_reunion' => 'Fecha última reunión',
        ];
    }
}
