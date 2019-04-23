<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "countries".
 *
 * @property int $cnt_id
 * @property string $cnt_code
 * @property string $cnt_title
 * @property int $cnt_created
 *
 * @property Numbers[] $numbers
 * @property SendLogAggregated[] $sendLogAggregateds
 */
class Countries extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'countries';
    }


    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['cnt_created'],
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
            [['cnt_code', 'cnt_title'], 'required'],
            [['cnt_created'], 'integer'],
            [['cnt_code'], 'string', 'max' => 3],
            [['cnt_title'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cnt_id' => 'Cnt ID',
            'cnt_code' => 'Cnt Code',
            'cnt_title' => 'Cnt Title',
            'cnt_created' => 'Cnt Created',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNumbers()
    {
        return $this->hasMany(Numbers::className(), ['cnt_id' => 'cnt_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSendLogAggregateds()
    {
        return $this->hasMany(SendLogAggregated::className(), ['cnt_id' => 'cnt_id']);
    }
}
