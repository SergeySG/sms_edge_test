<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "numbers".
 *
 * @property int $num_id
 * @property int $cnt_id
 * @property string $num_number
 * @property int $num_created
 *
 * @property Countries $cnt
 * @property SendLog[] $sendLogs
 */
class Numbers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'numbers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cnt_id'], 'integer'],
            [['num_number'], 'string', 'max' => 12],
            [['num_number'], 'unique'],
            [['cnt_id'], 'exist', 'skipOnError' => true, 'targetClass' => Countries::className(), 'targetAttribute' => ['cnt_id' => 'cnt_id']],
        ];
    }


    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['num_created'],
                ],
                'value' => function () {
                    return time();
                },
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'num_id' => 'Num ID',
            'cnt_id' => 'Cnt ID',
            'num_number' => 'Num Number',
            'num_created' => 'Num Created',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCnt()
    {
        return $this->hasOne(Countries::className(), ['cnt_id' => 'cnt_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSendLogs()
    {
        return $this->hasMany(SendLog::className(), ['num_id' => 'num_id']);
    }
}
