<?php

/**
 * This is the model class for table "tag".
 *
 * The followings are the available columns in table 'tag':
 * @property integer $id
 * @property string $name
 * @property integer $frequency
 */
class Tag extends CActiveRecord
{
    public function tableName()
    {
        return 'tag';
    }

    public function rules()
    {
        return array(
            array('name', 'required'),
            array('frequency', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 128),
        );
    }

    public function relations()
    {
        return array();
    }

    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => '名称',
            'frequency' => '使用频率',
        );
    }

    public function findTagWeights($limit = 20)
    {
        $models = $this->findAll(array(
            'order' => 'frequency DESC',
            'limit' => $limit,
        ));

        $total = 0;
        foreach ($models as $model)
            $total += $model->frequency;

        $tags = array();
        if ($total > 0) {
            foreach ($models as $model)
                $tags[$model->name] = 8 + (int)(16 * $model->frequency / ($total + 10));
            ksort($tags);
        }
        return $tags;
    }

    public function suggestTags($keyword, $limit = 20)
    {
        $tags = $this->findAll(array(
            'condition' => 'name LIKE :keyword',
            'order' => 'frequency DESC, Name',
            'limit' => $limit,
            'params' => array(
                ':keyword' => '%' . strtr($keyword, array('%' => '\%', '_' => '\_', '\\' => '\\\\')) . '%',
            ),
        ));
        $names = array();
        foreach ($tags as $tag)
            $names[] = $tag->name;
        return $names;
    }

    public static function string2array($tags)
    {
        return preg_split('/\s*,\s*/', trim($tags), -1, PREG_SPLIT_NO_EMPTY);
    }

    public static function array2string($tags)
    {
        return implode(', ', $tags);
    }

    public function updateFrequency($oldTags, $newTags)
    {
        $oldTags = self::string2array($oldTags);
        $newTags = self::string2array($newTags);
        $this->addTags(array_values(array_diff($newTags, $oldTags)));
        $this->removeTags(array_values(array_diff($oldTags, $newTags)));
    }

    public function addTags($tags)
    {
        $criteria = new CDbCriteria;
        $criteria->addInCondition('name', $tags);
        $this->updateCounters(array('frequency' => 1), $criteria);
        foreach ($tags as $name) {
            if (!$this->exists('name=:name', array(':name' => $name))) {
                $tag = new Tag;
                $tag->name = $name;
                $tag->frequency = 1;
                $tag->save();
            }
        }
    }

    public function removeTags($tags)
    {
        if (empty($tags))
            return;
        $criteria = new CDbCriteria;
        $criteria->addInCondition('name', $tags);
        $this->updateCounters(array('frequency' => -1), $criteria);
        $this->deleteAll('frequency <= 0');
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

}
