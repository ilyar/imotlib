<?php

class m140822_123257_init extends CDbMigration
{
    public function safeUp()
    {
        $sql = file_get_contents(dirname(__FILE__) . '/../data/schema.ddl');
        $this->execute($sql);
    }

    public function safeDown()
    {
        $this->dropForeignKey('{{book_author_author_fkey}}', '{{book_author}}');
        $this->dropForeignKey('{{book_author_book_fkey}}', '{{book_author}}');
        $this->dropForeignKey('{{book_customer_customer_fkey}}', '{{book_customer}}');
        $this->dropForeignKey('{{book_customer_book_fkey}}', '{{book_customer}}');

        $this->dropTable('{{author}}');
        $this->dropTable('{{book}}');
        $this->dropTable('{{customer}}');
        $this->dropTable('{{book_author}}');
        $this->dropTable('{{book_customer}}');
    }

}