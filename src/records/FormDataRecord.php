<?php

namespace formhouse\formhouse\records;

use craft\db\ActiveRecord;


/**
 * FormDataRecord
 */
class FormDataRecord extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%formhouse_form_data}}';
    }
}
