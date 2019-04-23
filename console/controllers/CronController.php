<?php


namespace console\controllers;


use common\models\SendLog;
use common\models\SendLogAggregated;
use yii\console\Controller;

class CronController extends  Controller
{
    /**
     * Aggregate all logs for previous day Cron task should be setted at the begin of day
     * @param int $today
     * @throws \Exception
     */
    public function actionAggregateLogs($today = 0 ){
        $date = new \DateTime('-1 day');
        if($today){
            $date = new \DateTime();
        }

        /** Get all log data for previous day */
        $logs = SendLog::find()
            ->addSelect(['date' => 'FROM_UNIXTIME(log_created, "%Y-%m-%d")', 'usr_id', 'cnt_id'=>'numbers.cnt_id',  'total_successful'=>'SUM(CASE WHEN log_success = 1 THEN 1 ELSE 0 END)', 'total_failed'=>'SUM(CASE WHEN log_success = 0 THEN 1 ELSE 0 END)'])
            ->joinWith(['num'])
            ->where(['FROM_UNIXTIME(log_created, "%Y-%m-%d")'=>$date->format('Y-m-d')])
            ->groupBy(['FROM_UNIXTIME(log_created, "%Y-%m-%d")', 'usr_id', 'numbers.cnt_id'])->asArray()->all();

        /** Insert date to agregated table */
        foreach ($logs as $log){
            $aggLog = new SendLogAggregated([
                'date'=>$date->format('Y-m-d'),
                'usr_id'=>$log['usr_id'],
                'cnt_id'=>$log['cnt_id'],
                'total_successful'=>$log['total_successful'],
                'total_failed'=>$log['total_failed'],
            ]);
            try{
                $aggLog->save();
            }
            catch (\Exception $e){
                echo $e->getMessage();
            }
        }
        SendLog::deleteAll(['FROM_UNIXTIME(log_created, "%Y-%m-%d")'=>$date->format('Y-m-d')]);
    }

}