<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_teacher}}".
 *
 * @property int $id
 * @property string $fname
 * @property string $lname
 * @property string $workfield
 * @property string $experience
 * @property string $phone
 * @property string $cellphone
 * @property string $address
 *
 * @property TblCourse[] $tblCourses
 */
class Teacher extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tbl_teacher}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fname', 'lname', 'workfield', 'experience', 'phone', 'cellphone', 'address'], 'required'],
            [['fname', 'lname', 'workfield'], 'string', 'max' => 100],
            [['experience'], 'string', 'max' => 2],
            [['phone', 'cellphone'], 'string','min'=>8, 'max' => 11],
            [['phone', 'cellphone'], 'integer'],
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
            'workfield' => Yii::t('app', 'Workfield'),
            'experience' => Yii::t('app', 'Experience'),
            'phone' => Yii::t('app', 'Phone'),
            'cellphone' => Yii::t('app', 'Cellphone'),
            'address' => Yii::t('app', 'Address'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblCourses()
    {
        return $this->hasMany(TblCourse::className(), ['tid' => 'id']);
    }
}
