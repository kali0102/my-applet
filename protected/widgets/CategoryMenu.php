<?php

Yii::import('zii.widgets.CPortlet');

class CategoryMenu extends CPortlet
{
    public function init()
    {
        $this->title = '文章分类';
        parent::init();
    }

    public function renderContent()
    {
        $categories = Category::model()->findAll();
        $this->render('category-menu', [
            'categories' => $categories
        ]);
    }
}