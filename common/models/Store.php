<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "store".
 *
 * @property int $id
 * @property string $title
 * @property int $regionId
 * @property string $city
 * @property string $address
 * @property int $userId
 */
class Store extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'store';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'regionId', 'city', 'address', 'userId'], 'required'],
            [['regionId', 'userId'], 'integer'],
            [['title', 'city', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * Задать значение свойтву
     * 
     * @param type $name - название свойства
     * @param type $value - значение свойства
     * @return object - объекст модели
     */
    public function set($name, $value){
        if($this->hasAttribute($name)){
            $this->$name = $value;
        }
        return $this;
    }
    
    /**
     * Получить значение свойства
     * 
     * @param type $name - название свойства
     * @return type - значение свойства
     */
    public function get($name){
        return ($this->hasAttribute($name)) ? $this->$name : NULL;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название магазина',
            'regionId' => 'Идентификатор региона',
            'city' => 'Город',
            'address' => 'Адрес',
            'userId' => 'Идентификатор менеджера',
        ];
    }
}
