<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "inversiones".
 *
 * @property integer $idinversion
 * @property integer $empresa_id
 * @property string $anio
 * @property string $monto_inversion
 * @property string $monto_propuesta
 * @property string $fecha_campana
 * @property string $productos_interes
 * @property string $comentarios
 * @property string $propuesta
 * @property string $campana
 * @property string $temporalidad
 *
 * @property Empresas $empresa
 */
class Inversiones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inversiones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['empresa_id', 'anio'], 'required'],
            [['empresa_id'], 'integer'],
            [['anio', 'fecha_campana'], 'safe'],
            [['monto_inversion', 'monto_propuesta'], 'number'],
            [['productos_interes', 'comentarios', 'propuesta', 'temporalidad'], 'string', 'max' => 255],
            [['campana'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idinversion' => 'ID único',
            'empresa_id' => 'ID foráneo empresa ',
            'anio' => 'Año de la inversión',
            'monto_inversion' => 'Monto Invertido',
            'monto_propuesta' => 'Monto Propuesta',
            'fecha_campana' => 'Fecha de Campaña',
            'productos_interes' => 'Productos en los que esta interesados',
            'comentarios' => 'Comentarios',
            'propuesta' => 'Documento de la Propuesta entregada',
            'campana' => 'Campaña Ofrecida',
            'temporalidad' => 'Temporalidad de la campaña',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresa()
    {
        return $this->hasOne(Empresas::className(), ['idempresa' => 'empresa_id']);
    }
}
