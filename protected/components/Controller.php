<?php

class Controller extends CController
{

    public $layout = '//layouts/column1';

    public $menu = array();

    public $breadcrumbs = array();

    /**
     * 通用单模型查询实例
     * @param int $id
     * @throws CHttpException
     * @return CModel
     */
    public function loadModel($id)
    {
        $model = null;
        $object = ucfirst($this->id);
        $object = '$model=' . $object . '::model()->findByPk((int)' . $id . ');';
        eval($object);
        if ($model === null)
            throw new CHttpException(404, '请求的页面不存在！');
        return $model;
    }

    /**
     * 通用AJAX表单验证
     * @param array CModel $model
     * @param string $formId
     * @return void
     */
    public function performAjaxValidation($model, $formId = null, $attributes = null, $loadInput = true)
    {
        $formId = isset($formId) ? $formId : $this->id;
        if (isset($_POST['ajax']) && $_POST['ajax'] === $formId . '-form') {
            CActiveForm::validate($model, $attributes, $loadInput);
            Yii::app()->end();
        }
    }
}