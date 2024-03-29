<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "send_log".
 *
 * @property int $id
 * @property int $usr_id
 * @property int $num_id
 * @property string $log_message
 * @property int $log_success
 * @property int $log_created
 *
 * @property Numbers $num
 * @property Users $usr
 */
class SendLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'send_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usr_id', 'num_id', 'log_success', 'log_created'], 'integer'],
            [['log_message'], 'string', 'max' => 255],
            [['num_id'], 'exist', 'skipOnError' => true, 'targetClass' => Numbers::className(), 'targetAttribute' => ['num_id' => 'num_id']],
            [['usr_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['usr_id' => 'usr_id']],
        ];
    }



    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['log_created'],
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
            'id' => 'ID',
            'usr_id' => 'Usr ID',
            'num_id' => 'Num ID',
            'log_message' => 'Log Message',
            'log_success' => 'Log Success',
            'log_created' => 'Log Created',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNum()
    {
        return $this->hasOne(Numbers::className(), ['num_id' => 'num_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsr()
    {
        return $this->hasOne(Users::className(), ['usr_id' => 'usr_id']);
    }
}
