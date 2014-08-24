<?php

class m140822_162048_demo extends CDbMigration
{

    public function safeUp()
    {
        $this->safeDown();

        // author
        $authors = array('Homer Jay Simpson', 'Marge Simpson', 'Bart Simpson', 'Lisa Simpson', 'Maggie Simpson');
        foreach ($authors as $id => $author) {
            $this->insert(
                '{{author}}',
                [
                    'name' => $author
                ]
            );
        }

        // book and customer
        $items = 20;
        for ($i = 1; $i <= $items; $i++) {
            $this->insert(
                '{{book}}',
                [
                    'name' => sprintf('Book %d', $i)
                ]
            );
            $this->insert(
                '{{customer}}',
                [
                    'name' => sprintf('Customer %d', $i)
                ]
            );
        }

        // book_author
        $authorsCount = count($authors);
        for ($i = 1; $i <= $items; $i++) {
            $authorsId = $this->getItems(1, $authorsCount, $authorsCount);
            foreach ($authorsId as $id) {
                $this->insert('{{book_author}}', ['book_id' => $i, 'author_id' => $id]);
            }
        }

        // book_customer
        for ($i = 1; $i <= $items; $i++) {
            $customersId = $this->getItems(0, 5, $items);
            foreach ($customersId as $id) {
                $this->insert('{{book_customer}}', ['book_id' => $i, 'customer_id' => $id]);
            }
        }

    }

    public function safeDown()
    {

        $this->delete('{{book_author}}');
        $this->delete('{{book_customer}}');
        $this->delete('{{author}}');
        $this->delete('{{book}}');
        $this->delete('{{customer}}');
    }

    public function getItems($minCount, $maxCount, $maxItems)
    {
        $count = mt_rand($minCount, $maxCount);
        $items = array();
        for ($i = 0; $i < $count; $i++) {
            $id = mt_rand(1, $maxItems);
            if (!array_key_exists($id, $items)) {
                $items[$id] = $id;
            }
        }

        return $items;
    }
}