<?php

/**
 * This is the model class for table "{{book}}".
 * The followings are the available columns in table '{{book}}':
 * @property integer $id
 * @property string $title
 * @property string $create_time
 * @property string $update_time
 * The followings are the available model relations:
 * @property Author[] $authors
 * @property Customer[] $customers
 * @property BookAuthors[] $bookAuthors
 * @property BookCustomers[] $bookCustomers
 */
class Book extends BaseType
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
        return '{{book}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules[] = array('authors', 'required');

        return $rules;
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'authors' => array(self::MANY_MANY, 'Author', '{{book_author}}(book_id, author_id)'),
            'customers' => array(self::MANY_MANY, 'Customer', '{{book_customer}}(book_id, customer_id)'),
            'bookAuthors' => array(self::HAS_MANY, 'BookAuthor', 'book_id'),
            'bookCustomers' => array(self::HAS_MANY, 'BookCustomer', 'book_id')
        );
    }

    function scopes()
    {
        return [
            'hasCustomers' => [
                'with' => [
                    'bookCustomers' => [
                        'select' => false,
                        'joinType' => 'INNER JOIN',
                        'group' => 'bookCustomers.book_id'
                    ]
                ]
            ],
            'hasAuthors' => [
                'with' => [
                    'bookAuthors' => [
                        'select' => false,
                        'joinType' => 'INNER JOIN',
                        'group' => 'bookAuthors.book_id'
                    ]
                ]
            ]
        ];
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        $label = parent::attributeLabels();
        $label['authors'] = 'Authors';
        $label['customers'] = 'Customers';

        return $label;
    }

    protected function beforeDelete()
    {
        if (parent::beforeDelete()) {
            BookAuthor::model()->deleteAllByAttributes(['book_id' => $this->id]);
            BookCustomer::model()->deleteAllByAttributes(['book_id' => $this->id]);

            return true;
        }

        return false;
    }

    protected function afterSave()
    {

        if (!$this->isNewRecord) {
            BookAuthor::model()->deleteAll('book_id = :book_id', array('book_id' => $this->id));
            BookCustomer::model()->deleteAll('book_id = :book_id', array('book_id' => $this->id));
        }

        if (isset($_POST['Book']['authors'])) {
            foreach ($_POST['Book']['authors'] as $author_id) {
                $BookAuthor = new BookAuthor();
                $BookAuthor->book_id = $this->id;
                $BookAuthor->author_id = $author_id;
                $BookAuthor->save();
            }
        }

        if (isset($_POST['Book']['customers'])) {
            foreach ($_POST['Book']['customers'] as $customer_id) {
                $BookCustomer = new BookCustomer();
                $BookCustomer->book_id = $this->id;
                $BookCustomer->customer_id = $customer_id;
                $BookCustomer->save();
            }
        }

        parent::afterSave();
    }

}
