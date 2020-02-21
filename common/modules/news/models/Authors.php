<?php

namespace common\modules\news\models;

use Yii;

/**
 * This is the model class for table "name".
 *
 * @property int $id
 * @property string $name
 */
class Authors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'name';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'name' => 'Name',
        ];
    }
}
