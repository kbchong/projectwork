<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Grade;

use common\models\User;

/**
 * GradeSearch represents the model behind the search form about `frontend\models\Grade`.
 */
class GradeSearch extends Grade
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['grade_subject', 'user_id', 'grade_quarter_number', 'grade_date_created'], 'safe'],
            [['grade_remarks'], 'number'],
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
        if (Yii::$app->user->identity->type == 'Student') {
            $query = Grade::find()->where(['user_id'=>Yii::$app->user->identity->id]);
        } else {
            $query = Grade::find();
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('user');

        $query->andFilterWhere([
            'id' => $this->id,
            'grade_remarks' => $this->grade_remarks,
            'grade_date_created' => $this->grade_date_created,
        ]);

        $query->andFilterWhere(['like', 'grade_subject', $this->grade_subject])
            ->andFilterWhere(['like', 'grade_quarter_number', $this->grade_quarter_number])
            ->andFilterWhere(['like', 'user.full_name', $this->user_id]);

        return $dataProvider;
    }
}
