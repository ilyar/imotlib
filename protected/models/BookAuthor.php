<?php

/**
 * This is the model class for table "{{book_author}}".
 * The followings are the available columns in table '{{book_author}}':
 * @property integer $book_id
 * @property integer $author_id
 */
class BookAuthor extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     *
     * @param string $className active record class name.
     *
     * @return BookAuthor the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{book_author}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('book_id, author_id', 'required'),
            array('book_id, author_id', 'numerical', 'integerOnly' => true),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'book_id' => 'Book',
            'author_id' => 'Author',
        );
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('book_id', $this->book_id);
        $criteria->compare('author_id', $this->author_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
