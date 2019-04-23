<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "send_log_aggregated".
 *
 * @property int $ag_log_id
 * @property string $date
 * @property int $usr_id
 * @property int $cnt_id
 * @property int $total_successful
 * @property int $total_failed
 *
 * @property Countries $cnt
 * @property Users $usr
 */
class SendLogAggregated extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'send_log_aggregated';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'usr_id', 'cnt_id'], 'required'],
            [['date'], 'safe'],
            [['usr_id', 'cnt_id', 'total_successful', 'total_failed'], 'integer'],
            [['cnt_id'], 'exist', 'skipOnError' => true, 'targetClass' => Countries::className(), 'targetAttribute' => ['cnt_id' => 'cnt_id']],
            [['usr_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['usr_id' => 'usr_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ag_log_id' => 'Ag Log ID',
            'date' => 'Date',
            'usr_id' => 'Usr ID',
            'cnt_id' => 'Cnt ID',
            'total_successful' => 'Total Successful',
            'total_failed' => 'Total Failed',
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
    public function getUsr()
    {
        return $this->hasOne(Users::className(), ['usr_id' => 'usr_id']);
    }
}
