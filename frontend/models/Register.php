<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_register".
 *
 * @property int $id
 * @property int $sid
 * @property int $cid
 * @property string $rdate
 *
 * @property TblCourse $c
 * @property TblStudent $s
 */
class Register extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_register';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sid', 'cid', 'rdate'], 'required'],
            [['sid', 'cid'], 'integer'],
            [['rdate'], 'string', 'max' => 50],
            [['cid'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['cid' => 'id']],
            [['sid'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['sid' => 'id']],
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
            'rdate' => Yii::t('app', 'Rdate'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getC()
    {
        return $this->hasOne(Course::className(), ['id' => 'cid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS()
    {
        return $this->hasOne(Student::className(), ['id' => 'sid']);
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
