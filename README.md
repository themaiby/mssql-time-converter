# mssql-time-converter
Converts float type to DateTime object.
Uses in MSSQL, so you can make query
```sql
SELECT CAST(43243.5382623071 AS datetime) as human_time;
-- or
SELECT CAST(GETDATE() AS float) as float_time;
```


## Usage
<strong>floatToDateTime</strong>
```php
$timeConverter = new MSSQLTimeConverter();
$MSDateTime = 43243.5382623071;

$humanDate = $timeConverter->floatToDateTime($MSDateTime);
echo $humanDate->format('Y-m-d H:i:s.u'); // 2018-05-25 12:55:05.000000
```

<strong>dateTimeToFloat</strong>
```php
$timezone = timezone_open('Europe/Kiev');

$timeNow = new DateTime();
$timeNow->setTimezone($timezone);

$floatTime = new MSSQLTimeConverter();

echo $floatTime->dateTimeToFloat($timeNow);
```

### TODO:
* Converting to float from time/timestamp