<?php

class MSSQLTimeConverter
{
    /**
     * @param float $time
     * @return DateTime
     */
    public function fromFloat(float $time) {
        $explodedMSTime = explode('.', $time);

        $days = $explodedMSTime[0];
        $seconds = '0.' . $explodedMSTime[1];

        $startDate = new DateTime('1900-01-01');

        try {
            // int val is always days count since 1900-01-01 00:00:00
            $daysInterval = DateInterval::createFromDateString($days . ' days');

            // percent value of day time
            $humanSeconds = intval( 86400 * $seconds);

            $secInterval = DateInterval::createFromDateString($humanSeconds. ' seconds');

            $resultDate = $startDate->add($daysInterval)->add($secInterval);
        } catch (Exception $e) {
            echo $e;
        }

        return $resultDate;
    }
}
