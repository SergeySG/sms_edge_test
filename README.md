<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
    </a>
    <h1 align="center">Senior Developer Practical Test
</h1>
    <br>
</p>
To start use migration and create test data

```
$ php yii migrate
$ php yii random-data

```
To generate aggregated data for today run:
```
php yii cron/aggregate-logs 'today=1'

```

To make generation for each day insert to cron tab at the at the begin of day command : 
```
php yii cron/aggregate-logs

```
