<?php

/**
 * This is the model class for table "{{customer}}".
 * The followings are the available columns in table '{{customer}}':
 * @property integer $id
 * @property string $name
 * @property string $create_time
 * @property string $update_time
 * The followings are the available model relations:
 * @property Book[] $books
 */
class Customer extends BaseType
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{customer}}';
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'books' => array(self::MANY_MANY, 'Book', '{{book_customer}}(customer_id, book_id)'),
        );
    }

    protected function beforeDelete()
    {
        if (parent::beforeDelete()) {
            BookCustomer::model()->deleteAllByAttributes(['customer_id' => $this->id]);

            return true;
        }

        return false;
    }

    protected function afterSave()
    {

        if (!$this->isNewRecord) {
            BookCustomer::model()->deleteAll('customer_id = :customer_id', array('customer_id' => $this->id));
        }

        if (isset($_POST['Customer']['books'])) {
            foreach ($_POST['Customer']['books'] as $book_id) {
                $BookCustomer = new BookCustomer();
                $BookCustomer->book_id = $book_id;
                $BookCustomer->customer_id = $this->id;
                $BookCustomer->save();
            }
        }

        parent::afterSave();
    }

}
