<?php

namespace formhouse\formhouse\controllers;

use craft\web\Controller;

class FieldsController extends Controller
{
    /**
     * @return \yii\base\Response
     */
    public function actionIndex()
    {
        return $this->renderTemplate('form-house/fields/index');
    }
}