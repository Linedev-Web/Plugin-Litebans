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
    function dateStarAndDateEnd($dateEndTime)
    {
        if ($dateEndTime != -1 && $dateEndTime != 0) {
            $date_format = '%Y-%m-%d %H:%M:%S';
            $te = $dateEndTime / 1000;
            $dateStart = new DateTime(date("Y-m-d H:i:s"));
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
            $result .= $interval->format("%d jour(s) ");
        }
        if ($interval->h) {
            $result .= $interval->format("%hh");
        }
        if ($interval->i) {
            $result .= $interval->format("%i m ");
        }
        if ($interval->s) {
            $result .= $interval->format("%s s ");
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

        $date_format = '%d-%m-%Y  %H:%M';
        $ts = $millis / 1000;
        $result = strftime($date_format, $ts);
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