<?php

class MSSQLTimeConverter
{
    /**
     * @param float $time
     * @return DateTime
     */
    public function floatToDateTime(float $time, $timezone = 'Europe/Kiev')
    {
        $explodedMSTime = explode('.', $time);

        $days    = $explodedMSTime[0];
        $seconds = '0.' . $explodedMSTime[1];

        $startDate = new DateTime('1900-01-01', timezone_open($timezone));

        try {
            // int val is always days count since 1900-01-01 00:00:00
            $daysInterval = DateInterval::createFromDateString($days . ' days');

            // percent value of day time
            $humanSeconds = intval(86400 * $seconds);

            $secInterval = DateInterval::createFromDateString($humanSeconds . ' seconds');

            $resultDate = $startDate->add($daysInterval)->add($secInterval);
        }
        catch (Exception $e) {
            echo $e;
        }

        return $resultDate;
    }

    /**
     * @param DateTime $dateTime
     * @param string $timezone
     * @return float
     */
    public function dateTimeToFloat(DateTime $dateTime, $timezone = 'Europe/Kiev')
    {
        $startDate = new DateTime('1900-01-01 00:00:00.000', timezone_open($timezone));

        $diff = $dateTime->diff($startDate);

        $days    = $diff->days;
        $hours   = $diff->h;
        $minutes = $diff->m;
        $seconds = $diff->s;

        $humanSecond = ($hours * 60 * 60) + ($minutes * 60) + $seconds;
        $percentTime = $humanSecond / 86400;

        return $days + $percentTime;
    }
}

