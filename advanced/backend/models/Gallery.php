<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "gallery".
 *
 * @property integer $id
 * @property string $gallery_name
 * @property string $gallery_description
 * @property string $gallery_picture
 */
class Gallery extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['file'], 'file'],
            [['gallery_description'], 'string'],
            [['gallery_name', 'gallery_picture'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gallery_name' => 'Gallery Name',
            'gallery_description' => 'Gallery Description',
            'file' => 'Gallery Picture',
        ];
    }
}
