<?php

namespace common\modules\news\models;

use Yii;

/**
 * This is the model class for table "tegs".
 *
 * @property int $ID
 * @property string $title
 */
class Tags extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tegs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 100],
            ['title', 'trim'],
            ['title', 'uniqValidation'],
        ];
    }

    
public function uniqValidation($attribute,$message){

$model = self::find()->where(['title'=>$this->title])->count();
if($model > 0){
    $this->addError($attribute,'тег уже существует');
}

}

    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'title' => 'Title',
        ];
    }
}
