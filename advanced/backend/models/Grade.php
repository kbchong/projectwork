<?php

namespace backend\models;

use common\models\User;

use Yii;

/**
 * This is the model class for table "grade".
 *
 * @property integer $id
 * @property string $grade_subject
 * @property string $grade_quarter_number
 * @property string $grade_remarks
 * @property string $grade_date_created
 * @property integer $user_id
 *
 * @property User $user
 */
class Grade extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grade';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['grade_subject', 'user_id'], 'required'],
            [['grade_subject'], 'string'],
            [['grade_quarter_number','grade_subject'], 'unique', 'targetAttribute' => ['user_id','grade_quarter_number','grade_subject']],
            [['grade_remarks'], 'number','min'=>60, 'max' =>100], 
            [['grade_date_created'], 'safe'],
            [['user_id'], 'integer'],
            [['grade_quarter_number'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'grade_subject' => 'Subject',
            'grade_quarter_number' => 'Quarter Number',
            'grade_remarks' => 'Remarks',
            'grade_date_created' => 'Date Created',
            'user_id' => 'Full Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
