<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Contactos;

/**
 * ContactosSearch represents the model behind the search form about `frontend\models\Contactos`.
 */
class ContactosSearch extends Contactos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcontacto', 'empresas_id'], 'integer'],
            [['puesto', 'nombre', 'telefono', 'correo', 'direccion', 'asistente', 'fecha_reunion'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Contactos::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idcontacto' => $this->idcontacto,
            'fecha_reunion' => $this->fecha_reunion,
            'empresas_id' => $this->empresas_id,
        ]);

        $query->andFilterWhere(['like', 'puesto', $this->puesto])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'correo', $this->correo])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'asistente', $this->asistente]);

        return $dataProvider;
    }
}
