<?php

namespace formhouse\formhouse\models;

use craft\base\Model;

/**
 * @inheritdoc
 */
class Settings extends Model
{
    /**
     * @var string
     */
    public $someAttribute = 'Some Default';

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['someAttribute', 'string'],
            ['someAttribute', 'default', 'value' => 'Some Default'],
        ];
    }
}
