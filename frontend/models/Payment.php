<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_payment".
 *
 * @property int $id
 * @property int $sid
 * @property int $cid
 * @property int $cost
 * @property string $pdate
 *
 * @property TblStudent $s
 * @property TblCourse $c
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_payment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sid', 'cid', 'cost', 'pdate'], 'required'],
            [['sid', 'cid', 'cost'], 'integer'],
            [['pdate'], 'string', 'max' => 50],
            [['sid'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['sid' => 'id']],
            [['cid'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['cid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'sid' => Yii::t('app', 'Sid'),
            'cid' => Yii::t('app', 'Cid'),
            'cost' => Yii::t('app', 'Cost'),
            'pdate' => Yii::t('app', 'Pdate'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS()
    {
        return $this->hasOne(TblStudent::className(), ['id' => 'sid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getC()
    {
        return $this->hasOne(TblCourse::className(), ['id' => 'cid']);
    }

    public function getAllStudents()
    {
        return Student::find()->All();
    }

    public function getAllCourses()
    {
        return Course::find()->All();
    }
}
