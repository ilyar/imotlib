<?php

/**
 * This is the model class for table "{{author}}".
 * The followings are the available columns in table '{{author}}':
 * @property integer $id
 * @property string $name
 * @property string $create_time
 * @property string $update_time
 * The followings are the available model relations:
 * @property Book[] $libBooks
 */
class Author extends BaseType
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
        return '{{author}}';
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'books' => array(self::MANY_MANY, 'Book', '{{book_author}}(author_id, book_id)'),
        );
    }

    protected function beforeDelete()
    {
        if (parent::beforeDelete()) {
            BookAuthor::model()->deleteAllByAttributes(['author_id' => $this->id]);

            return true;
        }

        return false;
    }

    protected function afterSave()
    {

        if (!$this->isNewRecord) {
            BookAuthor::model()->deleteAll('author_id = :author_id', array('author_id' => $this->id));
        }

        if (isset($_POST['Author']['books'])) {
            foreach ($_POST['Author']['books'] as $book_id) {
                $BookAuthor = new BookAuthor();
                $BookAuthor->book_id = $book_id;
                $BookAuthor->author_id = $this->id;
                $BookAuthor->save();
            }
        }

        parent::afterSave();
    }

}
