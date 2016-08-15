<?php

namespace app\modules\admin\modelSeach;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Video;

/**
 * VideoSeach represents the model behind the search form about `app\models\Video`.
 */
class VideoSeach extends Video
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['video_id', 'user_id', 'status'], 'integer'],
            [['video_title', 'url_video', 'create_date', 'imager_last'], 'safe'],
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
        $query = Video::find();

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
            'video_id' => $this->video_id,
            'user_id' => $this->user_id,
            'create_date' => $this->create_date,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'video_title', $this->video_title])
            ->andFilterWhere(['like', 'url_video', $this->url_video])
            ->andFilterWhere(['like', 'imager_last', $this->imager_last]);

        return $dataProvider;
    }
}
