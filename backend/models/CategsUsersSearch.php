<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Categs;

/**
 * CategsUsersSearch represents the model behind the search form about `common\models\Categs`.
 */
class CategsUsersSearch extends Categs
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['categ_name', 'categ_img', 'categ_status', 'categ_order'], 'safe'],
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
        $query = Categs::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'categ_name', $this->categ_name])
            ->andFilterWhere(['like', 'categ_img', $this->categ_img])
            ->andFilterWhere(['like', 'categ_status', $this->categ_status])
            ->andFilterWhere(['like', 'categ_order', $this->categ_order]);

        return $dataProvider;
    }
}
