<?php

namespace formhouse\formhouse\models;

use craft\base\Model;
use yii\base\ErrorException;

/**
 * Used as a basic form house response model
 * @inheritdoc
 */
class Response extends Model
{
    /**
     * Whether the request was successful or not (no errors or dataErrors occurred)
     * @var boolean
     */
    public $success;

    /**
     * Yii getErrors() return on invalid data
     * @var array|null
     */
    public $dataErrors;

    /**
     * Message about the error 
     * @var string|null
     */
    public $message = '';

    /**
     * Data to be sent back on successful request
     * @var array|null
     */
    public $data;

    /**
     * @param array $data
     * @param string $message
     * @throws ErrorException propagated from method `asJson`
     * @return array
     */
    public function asSuccess(array $data = null, string $message = 'Request was successful')
    {
        $this->success = true;
        $this->data = $data;
        $this->message = $message;
        return $this->asJson();
    }

    /**
     * Returns a data error json response
     * @param array $dataErrors
     * @param string $message
     * @throws ErrorException propagated from method `asJson`
     * @return array
     */
    public function asDataError(array $dataErrors, string $message = 'Invalid data was submitted.')
    {   
        $this->success = false;
        $this->dataErrors = $dataErrors;
        $this->message = $message;
        return $this->asJson();
    }

    /**
     * Validates itself, then cast as an array
     * Usually to be sent with a response
     * @throws ErrorException
     * @return array
     */
    public function asJson()
    {
        if (!$this->validate()) {
          // Response model is invalid, ideally this should never happen.
            throw new ErrorException('Response model is invalid.');
        }
        return array_filter($this->toArray(), function ($item) {
            return $item !== null;
        });
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['success'], 'boolean'],
            [['message'], 'string'],
            [['success', 'message'], 'required']
        ];
    }
}

