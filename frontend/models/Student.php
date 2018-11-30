<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_student".
 *
 * @property int $id
 * @property string $fname
 * @property string $lname
 * @property int $birthday
 * @property string $birthplace
 * @property string $certificate
 * @property string $phone
 * @property string $cellphone
 * @property string $address
 *
 * @property TblPayment[] $tblPayments
 * @property TblRegister[] $tblRegisters
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fname', 'lname', 'birthday', 'birthplace', 'certificate', 'phone', 'cellphone', 'address'], 'required'],
            [['birthday'], 'integer'],
            [['certificate'], 'string'],
            [['fname', 'lname', 'birthplace'], 'string', 'max' => 100],
            [['phone', 'cellphone'], 'string', 'max' => 11],
            [['address'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'fname' => Yii::t('app', 'Fname'),
            'lname' => Yii::t('app', 'Lname'),
            'birthday' => Yii::t('app', 'Birthday'),
            'birthplace' => Yii::t('app', 'Birthplace'),
            'certificate' => Yii::t('app', 'Certificate'),
            'phone' => Yii::t('app', 'Phone'),
            'cellphone' => Yii::t('app', 'Cellphone'),
            'address' => Yii::t('app', 'Address'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPayments()
    {
        return $this->hasMany(TblPayment::className(), ['sid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblRegisters()
    {
        return $this->hasMany(TblRegister::className(), ['sid' => 'id']);
    }
}
