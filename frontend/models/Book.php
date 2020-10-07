<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $bookId
 * @property string $bookName
 * @property string $referenceNo
 * @property string $publisher
 * @property int $status 0 available 1 issued 2 pending  
 *
 * @property Bookauthor[] $bookauthors
 * @property Borrowedbook[] $borrowedbooks
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bookName', 'referenceNo', 'publisher'], 'required'],
            [['status'], 'integer'],
            [['bookName'], 'string', 'max' => 100],
            [['referenceNo', 'publisher'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bookId' => 'Book ID',
            'bookName' => 'Book Name',
            'referenceNo' => 'Reference No',
            'publisher' => 'Publisher',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Bookauthors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookauthors()
    {
        return $this->hasMany(Bookauthor::className(), ['bookId' => 'bookId']);
    }

    /**
     * Gets query for [[Borrowedbooks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBorrowedbooks()
    {
        return $this->hasMany(Borrowedbook::className(), ['bookId' => 'bookId']);
    }
}
