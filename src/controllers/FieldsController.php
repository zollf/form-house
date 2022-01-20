<?php

namespace formhouse\formhouse\controllers;

use craft\web\Controller;

use formhouse\formhouse\records\FieldRecord;
use formhouse\formhouse\models\Response;
class FieldsController extends Controller
{
    /**
     * @inheritdoc
     */
    protected $allowAnonymous = ['create'];

    /**
     * @return \yii\base\Response
     */
    public function actionIndex()
    {
        return $this->renderTemplate('form-house/fields/index');
    }
    
    /**
     * Creates a field
     * @return \yii\base\Response
     */
    public function actionCreate()
    {
        $this->requirePostRequest();
        $field = new FieldRecord;
        $field->setAttributes($this->request->getBodyParams());

        if (!$field->save()) {
            return $this->asJson((new Response)->asDataError($field->getErrors()));
        }

        return $this->asJson((new Response)->asSuccess());
    }
}