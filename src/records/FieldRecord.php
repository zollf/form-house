<?php

namespace formhouse\formhouse\records;

use craft\db\ActiveRecord;

/**
 * FieldRecord
 */
class FieldRecord extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%formhouse_fieldrecord}}';
    }
}
