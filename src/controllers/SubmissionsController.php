<?php

namespace formhouse\formhouse\controllers;

use craft\web\Controller;

class SubmissionsController extends Controller
{
    /**
     * @return \yii\base\Response
     */
    public function actionIndex()
    {
        return $this->renderTemplate('form-house/submissions/index');
    }
}