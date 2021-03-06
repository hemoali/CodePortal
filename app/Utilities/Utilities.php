<?php

namespace App\Utilities;

use App\Models\Problem;
use Carbon\Carbon;
use Carbon\CarbonInterval;

class Utilities
{
    /**
     * Add a new query to the saved ones and overwrites if needed
     *
     * @param string $key the query key to be replaced/added
     * @param string $value the query value
     * @param string $defaultURL
     * @param string $fullUrl request full url
     * @param bool $unsetOrder
     * @return string
     */
    public static function getURL($key, $value, $defaultURL, $fullUrl, $unsetOrder = true)
    {
        $url_parts = parse_url($fullUrl);
        if (isset($url_parts['query'])) {
            parse_str($url_parts['query'], $params);
            if ($unsetOrder) unset($params['order']);
            $params[$key] = $value; //overwriting if page parameter exists
            $url_parts['query'] = http_build_query($params);
            $url = $url_parts['scheme'] . '://' . $url_parts['host'] . ':' . $url_parts['port'] . $url_parts['path'] . '?' . $url_parts['query'];
        } else {
            $url = $defaultURL . "?" . $key . "=" . $value;
        }
        return $url;
    }

    /**
     * Generate table heading sorting url based on the current request url and
     * the given sort parameter
     *
     * @param string $sortParam
     * @return string The sorting url of the given sort parameter
     */
    public static function getSortURL($sortParam)
    {
        if ($sortParam != request()->get(Constants::URL_QUERY_SORT_PARAM_KEY))
            $order = 'asc';
        else
            $order = request()->get(Constants::URL_QUERY_SORT_ORDER_KEY, 'asc') == 'asc' ? 'desc' : 'asc';

        $params = request()->all();
        $params[Constants::URL_QUERY_SORT_PARAM_KEY] = $sortParam;
        $params[Constants::URL_QUERY_SORT_ORDER_KEY] = $order;

        return request()->url() . '?' . http_build_query($params);
    }

    /**
     * Generate the number of the problem based on the hosting judge
     *
     * @param Problem $problem problem model object
     * @return string the id of the problem
     */
    public static function generateProblemNumber($problem)
    {
        if (!$problem) return '0';
        // Get judge data from constants file
        $judge = Constants::JUDGES[$problem->judge_id];
        $number = $judge[Constants::JUDGE_PROBLEM_NUMBER_FORMAT_KEY];
        $replacingArray = $judge[Constants::JUDGE_PROBLEM_NUMBER_FORMAT_ATTRIBUTES_KEY];

        foreach ($replacingArray as $key => $value) {
            $number = str_replace($key, $problem->$value, $number);
        }

        return $number;
    }

    /**
     * Generate the link of the problem based on the hosting judge
     *
     * @param Problem $problem problem model object
     * @return string url the problem link to the online judge
     */
    public static function generateProblemLink($problem)
    {
        // Get judge data from constants file
        $judge = Constants::JUDGES[$problem[Constants::FLD_PROBLEMS_JUDGE_ID]];
        $link = $judge[Constants::JUDGE_PROBLEM_LINK_KEY];
        $replacingArray = $judge[Constants::JUDGE_PROBLEM_LINK_ATTRIBUTES_KEY];

        foreach ($replacingArray as $key => $value) {
            $link = str_replace($key, $problem->$value, $link);
        }

        return $link;
    }

    /**
     * Convert given minutes count to hours:minutes format
     *
     * @param int $time
     *
     * @return string
     */
    public static function convertSecondsToDaysHoursMins($time)
    {
        if ($time < 1) {
            return "";
        }
        $days = floor($time / 86400);
        $hours = floor(($time % 86400) / 3600);
        $minutes = floor(($time % 86400) % 3600 / 60);

        return CarbonInterval::create(0, 0, 0, $days, $hours, $minutes, 0)->forHumans();
    }

    /**
     * Format past date time to user-friendly format (Today, Yesterday, ..etc)
     *
     * @param $dateTime
     * @return false|string
     */
    public static function formatPastDateTime($dateTime)
    {
        return Carbon::parse($dateTime)->diffForHumans();
    }

    /**
     * This function makes the input form data safe for SQL
     *
     * @param string $data input data
     * @return string safe data
     */
    public static function makeInputSafe($data)
    {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    /**
     * Truncates the post body to a reasonable limit and adding '...' to the end of the truncated body
     * @param $postBody string the body of the post
     *
     * @return string the truncated post body
     */
    public static function truncatePostBody($postBody){
        return (strlen($postBody) <= Constants::POSTS_MAX_DISPLAY_LIMIT) ? $postBody : substr( $postBody, 0, (Constants::POSTS_MAX_DISPLAY_LIMIT - 3)). "...";
    }
}
