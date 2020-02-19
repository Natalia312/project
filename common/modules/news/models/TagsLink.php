<?php

namespace common\modules\news\models;

use Yii;

/**
 * This is the model class for table "tags_link".
 *
 * @property int $ID
 * @property int $tag_id
 * @property string $model_text
 */
class TagsLink extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tags_link';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tag_id', 'model_text'], 'required'],
            [['tag_id'], 'integer'],
            [['model_text'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'tag_id' => 'Tag ID',
            'model_text' => 'Model Text',
        ];
    }
}
