<?php

class SiteController extends Controller
{
    public $layout = '/layouts/column2';

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny',  // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionCreate()
    {
        $model = new Site;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        $model->sort = 0;
        $model->logo = 0;
        if (isset($_POST['Site'])) {
            $model->attributes = $_POST['Site'];
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

        if (isset($_POST['Site'])) {
            $model->attributes = $_POST['Site'];
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
        $model = new Site('search');
        $model->unsetAttributes();
        if (isset($_GET['Site']))
            $model->attributes = $_GET['Site'];
        $this->render('index', ['model' => $model]);
    }

    public function actionAdmin()
    {
        $model = new Site('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Site']))
            $model->attributes = $_GET['Site'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

}
