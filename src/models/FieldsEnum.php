<?php

namespace formhouse\formhouse\models;

use yii2mod\enum\helpers\BaseEnum;

class FieldsEnum extends BaseEnum
{
    const TEXT = 0;
    const MULTILINE_TEXT = 1;
    const NUMBER = 2;
    const CHECKBOX = 3;
    const RADIO = 4;
    const DATE = 5;
    
    /**
     * @var array
     */
    public static $list = [
        self::TEXT => 'Text',
        self::MULTILINE_TEXT => 'Multi-line Text',
        self::NUMBER => 'Number',
        self::CHECKBOX => 'Checkbox',
        self::RADIO => 'Radio',
        self::DATE => 'Date'
    ];
}
