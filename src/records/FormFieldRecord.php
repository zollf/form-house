<?php

namespace formhouse\formhouse\records;

use craft\db\ActiveRecord;

/**
 * FormFieldRecord
 */
class FormFieldRecord extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%formhouse_form_field}}';
    }
}
