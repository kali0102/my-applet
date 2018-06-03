<?php

/**
 * This is the model class for table "archive".
 *
 * The followings are the available columns in table 'archive':
 * @property integer $id
 * @property integer $category_id
 * @property string $title
 * @property string $content
 * @property integer $status
 * @property string $tags
 * @property integer $created_at
 * @property integer $updated_at
 */
class Archive extends CActiveRecord
{

    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 2;
    const STATUS_ARCHIVED = 3;

    private $_oldTags;

    public function tableName()
    {
        return 'archive';
    }

    public function rules()
    {
        return array(
            array('title, category_id, content, status', 'required'),
            array('status', 'in', 'range' => array(1, 2, 3)),
            array('title', 'length', 'max' => 128),
            array('tags', 'match', 'pattern' => '/^[\w\s,]+$/', 'message' => 'Tags can only contain word characters.'),
            array('tags', 'normalizeTags'),

            array('title, status', 'safe', 'on' => 'search'),
        );
    }

    public function relations()
    {
        return array(
            'category' => [self::BELONGS_TO, 'Category', 'category_id'],
            'commentCount' => [self::STAT, 'Comment', 'archive_id']
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'category_id' => '分类',
            'title' => '标题',
            'content' => '内容',
            'status' => '状态',
            'tags' => '标签',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        );
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('category_id', $this->category_id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('content', $this->content, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('tags', $this->tags, true);
        $criteria->compare('created_at', $this->created_at);
        $criteria->compare('updated_at', $this->updated_at);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function beforeSave()
    {
        if (parent::beforeSave()) {
            if ($this->isNewRecord)
                $this->created_at = $this->updated_at = $_SERVER['REQUEST_TIME'];
            else
                $this->updated_at = $_SERVER['REQUEST_TIME'];
            return true;
        }
        return false;
    }

    protected function afterSave()
    {
        parent::afterSave();
        Tag::model()->updateFrequency($this->_oldTags, $this->tags);
    }

    protected function afterFind()
    {
        parent::afterFind();
        $this->_oldTags = $this->tags;
    }

    protected function afterDelete()
    {
        parent::afterDelete();
        Comment::model()->deleteAll('archive_id = ' . $this->id);
        Tag::model()->updateFrequency($this->tags, '');
    }

    public function getUrl()
    {
        return Yii::app()->createUrl('/blog/archive/view', array(
            'id' => $this->id,
            'title' => $this->title,
        ));
    }

    public function getTagLinks()
    {
        return [];
        $links = array();
        foreach (Tag::string2array($this->tags) as $tag)
            $links[] = CHtml::link(CHtml::encode($tag), array('post/index', 'tag' => $tag));
        return $links;
    }

    public function normalizeTags($attribute, $params)
    {
        $this->tags = Tag::array2string(array_unique(Tag::string2array($this->tags)));
    }

    public function addComment($comment)
    {
        if (true)
            $comment->status = Comment::STATUS_PENDING;
        else
            $comment->status = Comment::STATUS_APPROVED;
        $comment->archive_id = $this->id;
        return $comment->save();
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function showStatus($status)
    {
        $arr = [
            self::STATUS_DRAFT => '草稿',
            self::STATUS_PUBLISHED => '发布',
            self::STATUS_ARCHIVED => '归档'
        ];
        return isset($arr[$status]) ? $arr[$status] : '';
    }
}
