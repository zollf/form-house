<?php

namespace formhouse\formhouse\controllers;

use craft\web\Controller;

class FormsController extends Controller
{
    /**
     * @return \yii\base\Response
     */
    public function actionIndex()
    {
        return $this->renderTemplate('form-house/forms/_index');
    }
}
