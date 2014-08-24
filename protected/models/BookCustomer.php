<?php

/**
 * This is the model class for table "{{book_customer}}".
 * The followings are the available columns in table '{{book_customer}}':
 * @property integer $book_id
 * @property integer $customer_id
 */
class BookCustomer extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     *
     * @param string $className active record class name.
     *
     * @return BookCustomer the static model class
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
        return '{{book_customer}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('book_id, customer_id', 'required'),
            array('book_id, customer_id', 'numerical', 'integerOnly' => true),
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
            'customer_id' => 'Customer'
        );
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('book_id', $this->book_id);
        $criteria->compare('customer_id', $this->customer_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
