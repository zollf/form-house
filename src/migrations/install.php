<?php

namespace formhouse\formhouse\migrations;

use formhouse\formhouse\records\FieldRecord;
use formhouse\formhouse\records\FormRecord;
use formhouse\formhouse\records\FormDataRecord;
use formhouse\formhouse\helpers\MigrationHelper;
use formhouse\formhouse\records\FormFieldRecord;
use formhouse\formhouse\records\SubmissionRecord;
use craft\helpers\MigrationHelper as CraftMigrationHelper;

use craft\db\Migration;

class Install extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->dropTables();
        $this->createTables();
        $this->createIndexes();
        $this->addForeignKeys();

        return true;
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->deleteForeignKeys();
        $this->dropTables();
        return true;
    }

    private function dropTables()
    {
        // Delete tables with foreign key constraints first
        $this->dropTableIfExists(FormDataRecord::tableName());
        $this->dropTableIfExists(FormFieldRecord::tableName());
        $this->dropTableIfExists(FieldRecord::tableName());
        $this->dropTableIfExists(SubmissionRecord::tableName());
        $this->dropTableIfExists(FormRecord::tableName());
    }

    private function createTables()
    {
        // Field Table
        $this->createTable(FieldRecord::tableName(), array_merge(
            MigrationHelper::baseFields($this),
            [
                'title' =>  $this->string()->notNull(),
                'slug' => $this->string()->unique()->notNull(),
                'type' => $this->integer()->notNull(),
            ]
        ));

        // Form Table
        $this->createTable(FormRecord::tableName(), array_merge(
            MigrationHelper::baseFields($this),
            [
                'title' => $this->string()->notNull(),
                'slug' => $this->string()->unique()->notNull(),
                'siteId' => $this->integer()->notNull(),
                'author' => $this->integer()->notNull(),
                'propagationType' => $this->integer(),
            ]
        ));

        // Fields/Forms Associative Tables
        $this->createTable(FormFieldRecord::tableName(), array_merge(
            MigrationHelper::baseFields($this),
            [
                'fieldFk' => $this->integer()->notNull(),
                'formFk' => $this->integer()->notNull(),
            ]
        ));

        // FormData Table
        $this->createTable(FormDataRecord::tableName(), array_merge(
            MigrationHelper::baseFields($this),
            [
                'submissionFk' => $this->integer()->notNull(),
                'formFieldFk' => $this->integer()->notNull(),
                'data' => $this->text()->notNull(),
            ]
        ));

        // Submission Table
        $this->createTable(SubmissionRecord::tableName(), array_merge(
            MigrationHelper::baseFields($this),
            [
                'formFk' => $this->integer()->notNull(),
                'url' => $this->string()->notNull(),
                'siteId' => $this->integer()->notNull(),
            ]
        ));
    }

    private function createIndexes()
    {
        // Fields: Make slug unique
        $this->createIndex(
            $this->db->getIndexName(FieldRecord::tableName(), 'slug', true),
            FieldRecord::tableName(),
            'slug',
            true,
        );

        // Forms: Make slug unique
        $this->createIndex(
            $this->db->getIndexName(FormRecord::tableName(), 'slug', true),
            FieldRecord::tableName(),
            'slug',
            true,
        );
    }

    // Adds all foreign keys
    private function addForeignKeys()
    {
        // One submission belongs to a one form
        $this->addForeignKey(
            'formhouse__submissions__form_fk',
            SubmissionRecord::tableName(),
            'form_fk',
            FormRecord::tableName(),
            'id',
        );

        // Many form data belongs to one submission
        $this->addForeignKey(
            'formhouse__form_data__submission_fk',
            FormDataRecord::tableName(),
            'submission_fk',
            SubmissionRecord::tableName(),
            'id',
        );

        // One form data belongs to one field in a form
        $this->addForeignKey(
            'formhouse__form_data__form_field_fk',
            FormDataRecord::tableName(),
            'form_field_fk',
            FormFieldRecord::tableName(),
            'id',
        );

        // Many fields belong to many forms (MANY-TO-MANY)
        $this->addForeignKey(
            'formhouse__form_field__field_fk',
            FormFieldRecord::tableName(),
            'field_fk',
            FieldRecord::tableName(),
            'id',
        );
        $this->addForeignKey(
            'formhouse__form_field__form_fk',
            FormFieldRecord::tableName(),
            'form_fk',
            FormRecord::tableName(),
            'id',
        );
    }

    // Delete all foreign keys
    private function deleteForeignKeys()
    {
        CraftMigrationHelper::dropForeignKeyIfExists(SubmissionRecord::tableName(), 'form_fk');
        CraftMigrationHelper::dropForeignKeyIfExists(FormDataRecord::tableName(), 'submission_fk');
        CraftMigrationHelper::dropForeignKeyIfExists(FormDataRecord::tableName(), 'form_field_fk');
        CraftMigrationHelper::dropForeignKeyIfExists(FormFieldRecord::tableName(), 'field_fk');
        CraftMigrationHelper::dropForeignKeyIfExists(FormFieldRecord::tableName(), 'form_fk');
    }
}
