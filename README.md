# mssql-time-converter
Converts float type to DateTime object.
Uses in MSSQL, so you can make query
```sql
SELECT CAST(43243.5382623071 AS datetime) as human_time;
-- or
SELECT CAST(GETDATE() AS float) as float_time;
```

But without milliseconds yet

## Usage
<strong>Float to DateTime</strong>
```php
$converter = new MSSQLTimeConverter();
$MSDateTime = 43243.5382623071;
$humanDate = $converter->floatToDateTime($MSDateTime, 'Europe/Kiev');

echo $humanDate->format('Y-m-d H:i:s.u'); // 2018-05-25 12:55:05.000000
```

<strong>DateTime to Float</strong>
```php
$timeNow = new DateTime('2018-05-25 12:55:05.000000', 'Europe/Kiev');
$converter = new MSSQLTimeConverter();

echo $converter->dateTimeToFloat($timeNow); // ~43243.5382623071
```
<strong>If you want to convert only time</strong>
```php
$time = "12:55:05";
// You need to hardcore 1900-01-01. I hope it's temporary.
$dateTime = new DateTime("1900-01-01 " . $time, 'Europe/Kiev');
$converter = new MSSQLTimeConverter();

echo $converter->dateTimeToFloat($timeNow); // ~43243.5382623071
```

### TODO
* take with milliseconds
