<?php
/**
 * Created by PhpStorm.
 * User: ibrahimradwan
 * Date: 3/8/17
 * Time: 8:09 AM
 */

return [
    "USER_ROLE" => [
        "USER" => 0,
        "ADMIN" => 1
    ],

    "PARTICIPANT_ROLE" => [
        "USER" => 0,
        "ORGANIZER" => 1
    ],

    "USER_GENDER" => [
        "MALE" => 0,
        "FEMALE" => 1
    ],

    "CONTEST_VISIBILITY" => [
        "PUBLIC" => '0',
        "PRIVATE" => '1'
    ],

    "QUESTION_STATUS" => [
        "NORMAL" => 0,
        "ANNOUNCEMENT" => 1
    ],

    "SUBMISSION_VERDICT" => [
        "FAILED" => 0,
        "OK" => 1,
        "PARTIAL" => 2,
        "COMPILATION_ERROR" => 3,
        "RUNTIME_ERROR" => 4,
        "WRONG_ANSWER" => 5,
        "PRESENTATION_ERROR" => 6,
        "TIME_LIMIT_EXCEEDED" => 7,
        "MEMORY_LIMIT_EXCEEDED" => 8,
        "IDLENESS_LIMIT_EXCEEDED" => 9,
        "SECURITY_VIOLATED" => 10,
        "CRASHED" => 11,
        "INPUT_PREPARATION_CRASHED" => 12,
        "CHALLENGED" => 13,
        "SKIPPED" => 14,
        "TESTING" => 15,
        "REJECTED" => 16,
        "UNKNOWN" => 17
    ],
    "PROBLEMS_COUNT_PER_PAGE" => 30,
];