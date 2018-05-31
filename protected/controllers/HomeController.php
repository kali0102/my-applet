<?php

class HomeController extends Controller
{
    public function actionIndex()
    {
        $criteria = new CDbCriteria;
        $criteria->order = 'id ASC';
        $items = Item::model()->with('siteCount')->findAll($criteria);

        $this->render('index', ['items' => $items]);
    }
}