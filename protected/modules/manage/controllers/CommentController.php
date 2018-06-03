<?php

class CommentController extends Controller
{
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionCreate()
    {
        $model = new Comment;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Comment'])) {
            $model->attributes = $_POST['Comment'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Comment'])) {
            $model->attributes = $_POST['Comment'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('Comment');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin()
    {
        $model = new Comment('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Comment']))
            $model->attributes = $_GET['Comment'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

}
