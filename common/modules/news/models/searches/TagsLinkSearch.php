<?php

namespace common\modules\news\models\searches;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\news\models\TagsLink;

/**
 * TagsLinkSearch represents the model behind the search form about `\common\modules\news\models\TagsLink`.
 */
class TagsLinkSearch extends TagsLink
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'tag_id'], 'integer'],
            [['model_text'], 'safe'],
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
        $query = TagsLink::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ID' => $this->ID,
            'tag_id' => $this->tag_id,
        ]);

        $query->andFilterWhere(['like', 'model_text', $this->model_text]);

        return $dataProvider;
    }
}
