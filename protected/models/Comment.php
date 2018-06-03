<?php

/**
 * This is the model class for table "comment".
 *
 * The followings are the available columns in table 'comment':
 * @property integer $id
 * @property string $content
 * @property integer $staus
 * @property string $author
 * @property string $email
 * @property string $url
 * @property integer $archive_id
 * @property integer $created_at
 */
class Comment extends CActiveRecord
{

    const STATUS_PENDING = 0;
    const STATUS_APPROVED = 1;

    public function tableName()
    {
        return 'comment';
    }

    public function rules()
    {
        return array(
            array('content, staus, author, email, url, archive_id, created_at', 'required'),
            array('staus, archive_id, created_at', 'numerical', 'integerOnly' => true),
            array('content, email, url', 'length', 'max' => 128),
            array('author', 'length', 'max' => 64),
            array('id, content, staus, author, email, url, archive_id, created_at', 'safe', 'on' => 'search'),
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
            'content' => 'Content',
            'staus' => 'Staus',
            'author' => 'Author',
            'email' => 'Email',
            'url' => 'Url',
            'archive_id' => 'Archive',
            'created_at' => 'Created At',
        );
    }

    public function search()
    {
        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id);
        $criteria->compare('content', $this->content, true);
        $criteria->compare('staus', $this->staus);
        $criteria->compare('author', $this->author, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('archive_id', $this->archive_id);
        $criteria->compare('created_at', $this->created_at);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
