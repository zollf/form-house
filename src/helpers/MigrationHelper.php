<?php

namespace formhouse\formhouse\helpers;

use craft\db\Migration;

class MigrationHelper
{
    
    /**
     * Contains base table information to be added when creating table
     */
    public static function baseFields(Migration $migration)
    {
        return [
          'id' => $migration->primaryKey(),
          'dateCreated' => $migration->dateTime()->notNull(),
          'dateUpdated' => $migration->dateTime()->notNull(),
          'uid' => $migration->uid(),
        ];
    }
}
