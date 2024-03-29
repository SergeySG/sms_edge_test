<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "users".
 *
 * @property int $usr_id
 * @property string $usr_name
 * @property int $usr_active
 * @property int $usr_created
 *
 * @property SendLog[] $sendLogs
 * @property SendLogAggregated[] $sendLogAggregateds
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['usr_created'],
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
    public function rules()
    {
        return [
            [['usr_name'], 'required'],
            [['usr_active', 'usr_created'], 'integer'],
            [['usr_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'usr_id' => 'Usr ID',
            'usr_name' => 'Usr Name',
            'usr_active' => 'Usr Active',
            'usr_created' => 'Usr Created',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSendLogs()
    {
        return $this->hasMany(SendLog::className(), ['usr_id' => 'usr_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSendLogAggregateds()
    {
        return $this->hasMany(SendLogAggregated::className(), ['usr_id' => 'usr_id']);
    }
}
