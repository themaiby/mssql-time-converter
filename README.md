# mssql-time-converter
Converts MSSQL float time to PHP datetime object.

## Example
```
$a = new MSSQLTimeConverter();

$MSDateTime = 43243.5382623071;

$humanDate = $a->fromFloat($MSDateTime);

echo $humanDate->format('Y-m-d H:i:s.u'); // 2018-05-25 12:55:05.000000
```

### TODO:
* Converting to float from time/timestamp