<?php

namespace app\modules\front\controllers;

use \app\controllers\BaseController;
/**
 * Default controller for the `front` module
 */
class DefaultController extends BaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
//        \Yii::$app->language = 'vi';
        return $this->render('index');
    }
    
    public function actionTest()
    {
        return $this->render('index');
    }
}
