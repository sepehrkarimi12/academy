<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_course}}".
 *
 * @property int $id
 * @property string $cname
 * @property int $tid
 * @property string $startdate
 * @property string $enddate
 * @property string $starttime
 * @property string $endtime
 * @property int $capacity
 * @property int $cost
 *
 * @property TblTeacher $t
 * @property TblPayment[] $tblPayments
 * @property TblRegister[] $tblRegisters
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tbl_course}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cname', 'startdate', 'enddate', 'starttime', 'endtime', 'capacity', 'cost'], 'required'],
            [['tid', 'capacity', 'cost'], 'integer'],
            [['cname'], 'string', 'max' => 100],
            [['startdate', 'enddate'], 'string', 'max' => 50],
            [['starttime', 'endtime'], 'string', 'max' => 5],
            [['tid'], 'exist', 'skipOnError' => true, 'targetClass' => Teacher::className(), 'targetAttribute' => ['tid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'cname' => Yii::t('app', 'Cname'),
            'tid' => Yii::t('app', 'Tid'),
            'startdate' => Yii::t('app', 'Startdate'),
            'enddate' => Yii::t('app', 'Enddate'),
            'starttime' => Yii::t('app', 'Starttime'),
            'endtime' => Yii::t('app', 'Endtime'),
            'capacity' => Yii::t('app', 'Capacity'),
            'cost' => Yii::t('app', 'Cost'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getT()
    {
        return $this->hasOne(Teacher::className(), ['id' => 'tid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPayments()
    {
        return $this->hasMany(Payment::className(), ['cid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblRegisters()
    {
        return $this->hasMany(Register::className(), ['cid' => 'id']);
    }

    public function getAllTeachers() 
   { 
       return Teacher::find()->All(); 
   }
}
