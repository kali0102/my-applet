<?php

/**
 * This is the model class for table "item".
 *
 * The followings are the available columns in table 'item':
 * @property string $id
 * @property string $name
 * @property string $thumb
 * @property integer $sort
 */
class Item extends CActiveRecord
{
    public function tableName()
    {
        return 'item';
    }

    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, thumb', 'required'),
            array('sort', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 32),
            array('thumb', 'length', 'max' => 128),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, thumb, sort', 'safe', 'on' => 'search'),
        );
    }

    public function relations()
    {
        return array(
            'siteCount' => [self::STAT, 'Site', 'item_id']
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => '主键',
            'name' => '名称',
            'thumb' => '缩略图',
            'sort' => '排序',
        );
    }

    public function search()
    {
        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('thumb', $this->thumb, true);
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
