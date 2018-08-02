<?php

class MSSQLTimeConverter
{
    /**
     * @param float             $time
     * @param DateTimeZone|null $timezone
     *
     * @return DateTime
     */
    public function floatToDateTime(float $time, DateTimeZone $timezone = null): DateTime
    {
        $explodedTime = explode('.', $time);

        $days = $explodedTime[0];
        $seconds = (float)('0.' . $explodedTime[1]) * 86400; // percent value of day time

        $startDate = new DateTime('1900-01-01', timezone_open($timezone));

        $daysInterval = DateInterval::createFromDateString($days . ' days');
        $secInterval = DateInterval::createFromDateString($seconds . ' seconds');

        return $startDate->add($daysInterval)->add($secInterval);
    }

    /**
     * @param DateTime          $dateTime
     * @param DateTimeZone|null $timezone
     *
     * @return float
     */
    public function dateTimeToFloat(DateTime $dateTime, DateTimeZone $timezone = null): float
    {
        $startDate = new DateTime('1900-01-01', timezone_open($timezone));

        $diff = $startDate->diff($dateTime, true);

        $days = $diff->days;
        $hours = $diff->h;
        $minutes = $diff->i;
        $seconds = $diff->s;

        $humanSecond = ($hours * 60 * 60) + ($minutes * 60) + $seconds;
        $percentTime = $humanSecond / 86400;

        return $days + $percentTime;
    }
}
