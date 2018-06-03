<?php

class CategoryController extends Controller
{
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionCreate()
    {
        $model = new Category;
        $model->sort = 0;
        $this->performAjaxValidation($model);
        if (isset($_POST['Category'])) {
            $model->attributes = $_POST['Category'];
            if ($model->save())
                $this->redirect(['index']);
        }
        $this->render('create', ['model' => $model]);
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $this->performAjaxValidation($model);
        if (isset($_POST['Category'])) {
            $model->attributes = $_POST['Category'];
            if ($model->save())
                $this->redirect(['index']);
        }
        $this->render('update', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    public function actionIndex()
    {
        $model = new Category('search');
        $model->unsetAttributes();
        if (isset($_GET['Category']))
            $model->attributes = $_GET['Category'];
        $this->render('index', ['model' => $model]);
    }

}
