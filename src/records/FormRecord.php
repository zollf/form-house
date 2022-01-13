<?php

namespace formhouse\formhouse\records;

use craft\db\ActiveRecord;

/**
 * FormRecord
 */
class FormRecord extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%formhouse_forms}}';
    }
}
