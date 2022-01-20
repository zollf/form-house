<?php

namespace formhouse\formhouse\records;

use craft\db\ActiveRecord;
use craft\validators\SlugValidator;

use formhouse\formhouse\models\FieldsEnum;

/**
 * FieldRecord
 * @property int $id ID
 * @property string $title Title
 * @property string $slug Slug
 * @property int $type Type
 * @property bool $required Required
 */
class FieldRecord extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%formhouse_fields}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'string'],
            [['slug', 'title'], 'unique'],
            ['slug', SlugValidator::class],
            ['type', 'in', 'range' => FieldsEnum::getConstantsByName()],
            [['required'], 'boolean'],
            [['title', 'type', 'slug', 'required'], 'required'],
        ];
    }
}
