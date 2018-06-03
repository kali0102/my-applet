<?php

/**
 * @author Kyrie.liu
 * Class ItemController
 */
class ItemController extends Controller
{

    public function actionView($id)
    {
        $criteria = new CDbCriteria;
        $criteria->order = 'id ASC';
        $criteria->compare('item_id', $id);
        $sites = Site::model()->findAll($criteria);
        $this->render('view', array(
            'model' => $this->loadModel($id),
            'sites' => $sites
        ));
    }

    public function actionIndex()
    {
        $criteria = new CDbCriteria;
        $criteria->order = 'id ASC';
        $items = Item::model()->with('siteCount')->findAll($criteria);

        $this->render('index', ['items' => $items]);
    }

}
