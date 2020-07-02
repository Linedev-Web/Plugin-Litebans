<?php

class LitebansAppController extends AppController
{

    public function __construct($request = null, $response = null)
    {
        parent::__construct($request, $response);

        $timezone = "Europe/Paris";
        date_default_timezone_set($timezone); // set configured timezone

    }

    /**
     * Returns a string that shows the expiry date of a punishment.
     * If the punishment does not expire, it will be shown as permanent.
     * If the punishment has already expired, it will show as expired.
     * @param row
     * @return string
     */
    function expiry($row)
    {
        if ($row <= 0) {
            $result = (string)'Permanent';
        } else {
            $result = $this->millis_to_date($row);
        }
        return $result;
    }

    /**
     * Converts a timestamp (in milliseconds) to a date using the configured date format.
     * @param int
     * @return string
     */
    function dateStarAndDateEnd($dateStartTime, $dateEndTime)
    {
        if ($dateEndTime != -1 && $dateEndTime != 0) {
            $date_format = '%Y-%m-%d %H:%M:%S';
            $ts = $dateStartTime / 1000;
            $te = $dateEndTime / 1000;
            $dateStart = new DateTime(strftime($date_format, $ts));
            $dateEnd = new DateTime(strftime($date_format, $te));
            $diff = $dateStart->diff($dateEnd);
            return $this->format_interval($diff);
        }
    }

    /**
     * Format an interval to show all existing components.
     * If the interval doesn't have a time component (years, months, etc)
     * That component won't be displayed.
     *
     * @param DateInterval $interval The interval
     *
     * @return string Formatted interval string.
     */
    function format_interval(DateInterval $interval)
    {
        $result = "";
        if ($interval->y) {
            $result .= $interval->format("%y ans ");
        }
        if ($interval->m) {
            $result .= $interval->format("%m mois ");
        }
        if ($interval->d) {
            $result .= $interval->format("%d jour ");
        }
        if ($interval->h) {
            $result .= $interval->format("%h heures ");
        }
        if ($interval->i) {
            $result .= $interval->format("%i minutes ");
        }
        if ($interval->s) {
            $result .= $interval->format("%s secondes ");
        }

        return $result;
    }

    /**
     * Converts a timestamp (in milliseconds) to a date using the configured date format.
     * @param int
     * @return string
     */
    function millis_to_date($millis)
    {

        $date_format = '%B %d, %Y, %H:%M';

        $date_month_translations = array(
            "January" => "janvier",
            "February" => "février",
            "March" => "mars",
            "April" => "avril",
            "May" => "mai",
            "June" => "juin",
            "July" => "juillet",
            "August" => "août",
            "September" => "septembre",
            "October" => "octobre",
            "November" => "novembre",
            "December" => "décembre",
        );

        $ts = $millis / 1000;
        $result = strftime($date_format, $ts);
        $translations = $date_month_translations;
        if ($translations !== null) {
            foreach ($translations as $key => $val) {
                $result = str_replace($key, $val, $result);
            }
        }
        return $result;
    }

    /**
     * Prepares text to be displayed on the web interface.
     * Removes chat colours, replaces newlines with proper HTML, and sanitizes the text.
     * @param string
     * @return string|null
     */
    function clean($text)
    {
        if ($text === null) return null;
        if (strstr($text, "\xa7") || strstr($text, "&")) {
            $text = preg_replace("/(?i)(\x{00a7}|&)[0-9A-FK-OR]/u", "", $text);
        }
        $text = htmlspecialchars($text, ENT_QUOTES, "UTF-8");
        if (strstr($text, "\n")) {
            $text = preg_replace("/\n/", "<br>", $text);
        }
        return $text;
    }

}