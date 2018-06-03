<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property integer $sort
 */
class Category extends CActiveRecord
{
    public function tableName()
    {
        return 'category';
    }

    public function rules()
    {
        return array(
            array('name, alias, sort', 'required'),
            array('sort', 'numerical', 'integerOnly' => true),
            array('name, alias', 'length', 'max' => 64),
            array('id, name, alias, sort', 'safe', 'on' => 'search'),
        );
    }

    public function relations()
    {
        return array(
            'archiveCount' => [self::STAT, 'Archive', 'category_id']
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => '名称',
            'alias' => '别名',
            'sort' => '排序',
        );
    }

    public function search()
    {
        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('alias', $this->alias, true);
        $criteria->compare('sort', $this->sort);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'defaultOrder' => 'id DESC',
            ),
            'pagination' => array(
                'pageSize' => 12,
            ),
        ));
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function getDropListData()
    {
        $models = self::model()->findAll();
        return CHtml::listData($models, 'id', 'name');
    }
}
