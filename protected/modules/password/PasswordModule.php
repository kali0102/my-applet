<?php

class PasswordModule extends CWebModule
{
    public function init()
    {
        $this->setImport(array(
            $this->getId() . '.models.*',
            $this->getId() . '.components.*',
        ));
    }

    public function beforeControllerAction($controller, $action)
    {
        if (parent::beforeControllerAction($controller, $action)) {
            return true;
        } else
            return false;
    }
}
