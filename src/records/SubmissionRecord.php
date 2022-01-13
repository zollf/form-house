<?php

namespace formhouse\formhouse\records;

use craft\db\ActiveRecord;

/**
 * SubmissionRecord
 */
class SubmissionRecord extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%formhouse_submissions}}';
    }
}
