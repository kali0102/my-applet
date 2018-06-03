<?php


class ArchiveController extends Controller
{


    public function actionIndex()
    {
        $criteria = new CDbCriteria(array(
            'condition' => 'status=' . Archive::STATUS_PUBLISHED,
            'order' => 'updated_at DESC',
            'with' => 'commentCount',
        ));
        if (isset($_GET['tag']))
            $criteria->addSearchCondition('tags', $_GET['tag']);

        $dataProvider = new CActiveDataProvider('Archive', array(
            'pagination' => array(
                'pageSize' => 10,
            ),
            'criteria' => $criteria,
        ));

        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionView($id)
    {
        $post = $this->loadModel($id);
        $comment = $this->newComment($post);

        $this->render('view', array(
            'model' => $post,
            'comment' => $comment,
        ));
    }


    protected function newComment($post)
    {
        $comment = new Comment;
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'comment-form') {
            echo CActiveForm::validate($comment);
            Yii::app()->end();
        }
        if (isset($_POST['Comment'])) {
            $comment->attributes = $_POST['Comment'];
            if ($post->addComment($comment)) {
                if ($comment->status == Comment::STATUS_PENDING)
                    Yii::app()->user->setFlash('commentSubmitted', 'Thank you for your comment. Your comment will be posted once it is approved.');
                $this->refresh();
            }
        }
        return $comment;
    }
}