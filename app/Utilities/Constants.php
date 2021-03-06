<?php

namespace App\Utilities;

class Constants
{
    //region Routes

    // Problems routes
    const ROUTES_PROBLEMS_INDEX = 'problems';

    // Contests routes
    const ROUTES_CONTESTS_INDEX = 'contests.index';
    const ROUTES_CONTESTS_CREATE = 'contests.create';
    const ROUTES_CONTESTS_STORE = 'contests.store';
    const ROUTES_CONTESTS_EDIT = 'contests.edit';
    const ROUTES_CONTESTS_UPDATE = 'contests.update';
    const ROUTES_CONTESTS_DELETE = 'contests.delete';
    const ROUTES_CONTESTS_REORDER_PROBLEMS = 'contests.reorder';
    const ROUTES_CONTESTS_LEAVE = 'contests.leave';
    const ROUTES_CONTESTS_JOIN = 'contests.join';
    const ROUTES_CONTESTS_DISPLAY = 'contests.display';
    const ROUTES_CONTESTS_PROBLEMS = 'contests.problems';
    const ROUTES_CONTESTS_STANDINGS = 'contests.standings';
    const ROUTES_CONTESTS_STATUS = 'contests.status';
    const ROUTES_CONTESTS_PARTICIPANTS = 'contests.participants';
    const ROUTES_CONTESTS_PARTICIPANTS_DELETE = 'contests.participants.delete';
    const ROUTES_CONTESTS_QUESTIONS = 'contests.questions';
    const ROUTES_CONTESTS_QUESTIONS_ANNOUNCE = 'contests.questions.announce';
    const ROUTES_CONTESTS_QUESTIONS_RENOUNCE = 'contests.questions.renounce';
    const ROUTES_CONTESTS_QUESTIONS_STORE = 'contests.questions.store';
    const ROUTES_CONTESTS_QUESTIONS_ANSWER_STORE = 'contests.questions.answer.store';
    const ROUTES_CONTESTS_FILTERS_SYNC = 'contests.filters.sync';
    const ROUTES_CONTESTS_FILTERS_DETACH = 'contests.filters.detach';
    const ROUTES_CONTESTS_INVITEES_AUTO_COMPLETE = 'contests.invitees.auto_complete';
    const ROUTES_CONTESTS_ORGANIZERS_AUTO_COMPLETE = 'contests.organizers.auto_complete';
    const ROUTES_CONTESTS_TAGS_AUTO_COMPLETE = 'contests.tags.auto_complete';

    // Groups routes
    const ROUTES_GROUPS_INDEX = 'groups';
    const ROUTES_GROUPS_CREATE = 'groups.create';
    const ROUTES_GROUPS_STORE = 'groups.store';
    const ROUTES_GROUPS_EDIT = 'groups.edit';
    const ROUTES_GROUPS_UPDATE = 'groups.update';
    const ROUTES_GROUPS_DELETE = 'groups.delete';
    const ROUTES_GROUPS_DISPLAY = 'groups.display';
    const ROUTES_GROUPS_LEAVE = 'groups.leave';
    const ROUTES_GROUPS_SHEET_CREATE = 'groups.sheets.create';
    const ROUTES_GROUPS_SHEET_STORE = 'groups.sheets.store';
    const ROUTES_GROUPS_SHEET_EDIT = 'groups.sheets.edit';
    const ROUTES_GROUPS_SHEET_UPDATE = 'groups.sheets.update';
    const ROUTES_GROUPS_SHEET_DISPLAY = 'groups.sheets.display';
    const ROUTES_GROUPS_SHEET_DELETE = 'groups.sheets.delete';
    const ROUTES_GROUPS_SHEET_SOLUTION_STORE = 'groups.sheets.problem.solution.store';
    const ROUTES_GROUPS_SHEET_SOLUTION_DISPLAY = 'groups.sheets.problem.solution.display';
    const ROUTES_GROUPS_SHEET_SYNC_FILTERS = 'groups.sheets.create.sync_filters';
    const ROUTES_GROUPS_SHEET_DETACH_FILTERS = 'groups.sheets.create.detach_filters';
    const ROUTES_GROUPS_INVITEES_AUTO_COMPLETE = 'groups.invitees.auto_complete';
    const ROUTES_GROUPS_INVITATION_STORE = 'groups.invitations.store';
    const ROUTES_GROUPS_REQUEST_STORE = 'groups.request.store';
    const ROUTES_GROUPS_REQUEST_ACCEPT = 'groups.request.accept';
    const ROUTES_GROUPS_REQUEST_REJECT = 'groups.request.reject';
    const ROUTES_GROUPS_MEMBER_REMOVE = 'groups.members.remove';
    const ROUTES_GROUPS_CONTEST_CREATE = 'groups.contests.create';
    const ROUTES_GROUPS_CONTEST_STORE = 'groups.contests.store';
    const ROUTES_GROUPS_ADMINS_AUTO_COMPLETE = 'groups.admins.auto_complete';

    // Teams routes
    const ROUTES_TEAMS_CREATE = 'teams.create';
    const ROUTES_TEAMS_STORE = 'teams.store';
    const ROUTES_TEAMS_EDIT = 'teams.edit';
    const ROUTES_TEAMS_UPDATE = 'teams.update';
    const ROUTES_TEAMS_DELETE = 'teams.delete';
    const ROUTES_TEAMS_INVITE = 'teams.invite';
    const ROUTES_TEAMS_INVITEES_AUTO_COMPLETE = 'teams.invitees.auto_complete';
    const ROUTES_TEAMS_MEMBERS_REMOVE = 'teams.members.remove';
    const ROUTES_TEAMS_INVITATIONS_CANCEL = 'teams.invitations.cancel';
    const ROUTES_TEAMS_INVITATIONS_ACCEPT = 'teams.invitations.accept';
    const ROUTES_TEAMS_INVITATIONS_REJECT = 'teams.invitations.reject';

    // Blogs routes
    const ROUTES_BLOGS_INDEX = 'blogs';
    const ROUTES_BLOGS_USER_POSTS_INDEX = 'blogs.user.index';
    const ROUTES_BLOGS_POST_DISPLAY = 'blogs.display';
    const ROUTES_BLOGS_POST_CREATE = 'blogs.post.create';
    const ROUTES_BLOGS_POST_STORE = 'blogs.post.store';
    const ROUTES_BLOGS_POST_EDIT = 'blogs.post.edit';
    const ROUTES_BLOGS_POST_UPDATE = 'blogs.post.update';
    const ROUTES_BLOGS_POST_DELETE = 'blogs.post.delete';
    const ROUTES_BLOGS_COMMENT_STORE = 'blogs.comment.store';
    const ROUTES_BLOGS_COMMENT_UPDATE = 'blogs.comment.update';
    const ROUTES_BLOGS_COMMENT_DELETE = 'blogs.comment.delete';
    const ROUTES_BLOGS_UPVOTE = 'blogs.upvote';
    const ROUTES_BLOGS_DOWNVOTE = 'blogs.downvote';
    const ROUTES_BLOGS_COMMENT_UPVOTE = 'blogs.comment.upvote';
    const ROUTES_BLOGS_COMMENT_DOWNVOTE = 'blogs.comment.downvote';

    // Profile routes
    const ROUTES_PROFILE = 'profile';
    const ROUTES_PROFILE_PROBLEMS = 'profile.problems';
    const ROUTES_PROFILE_PROBLEMS_SOLVED = 'profile.problems.solved';
    const ROUTES_PROFILE_PROBLEMS_UNSOLVED = 'profile.problems.unsolved';
    const ROUTES_PROFILE_CONTESTS = 'profile.contests';
    const ROUTES_PROFILE_GROUPS = 'profile.groups';
    const ROUTES_PROFILE_TEAMS = 'profile.teams';
    const ROUTES_PROFILE_BLOGS = 'profile.blogs';
    const ROUTES_PROFILE_EDIT = 'profile.edit';
    const ROUTES_PROFILE_UPDATE = 'profile.update';

    // Notifications Routes
    const ROUTES_NOTIFICATIONS_MARK_ALL_READ = 'notifications.mark_all_read';
    const ROUTES_NOTIFICATIONS_DELETE = 'notifications.delete';

    // Auth routes
    // Note that Laravel calls these routes with these names from their internal code
    // So do not change these names
    const ROUTES_AUTH_LOGIN = 'login';
    const ROUTES_AUTH_LOGOUT = 'logout';
    const ROUTES_AUTH_REGISTER = 'register';
    const ROUTES_AUTH_PASSWORD_REQUEST = 'password.request';
    const ROUTES_AUTH_PASSWORD_EMAIL = 'password.email';
    const ROUTES_AUTH_PASSWORD_RESET = 'password.reset';

    // Errors routes
    const ROUTES_ERRORS_404 = 'errors/404';
    const ROUTES_ERRORS_401 = 'errors/401';

    //=============================================================
    //endregion

    //region Limits

    const TEAM_MEMBERS_MAX_COUNT = 3;
    const POSTS_COUNT_PER_PAGE = 15;
    const POSTS_MAX_DISPLAY_LIMIT = 120;

    //=============================================================
    //endregion

    //region Problems page

    //
    // Problems page constants
    //

    const PROBLEMS_COUNT_PER_PAGE = 30;

    const URL_QUERY_SEARCH_KEY = "q";
    const URL_QUERY_JUDGES_KEY = "judges";
    const URL_QUERY_TAGS_KEY = "tags";
    const URL_QUERY_TAG_KEY = "tag";
    const URL_QUERY_SORT_PARAM_KEY = "sort";
    const URL_QUERY_SORT_ORDER_KEY = "order";
    const URL_QUERY_PAGE_KEY = "page";

    const URL_QUERY_SORT_PARAM_ID_KEY = "id";
    const URL_QUERY_SORT_PARAM_NAME_KEY = "name";
    const URL_QUERY_SORT_PARAM_ACCEPTED_COUNT_KEY = "acceptedCount";
    const URL_QUERY_SORT_PARAM_JUDGE_KEY = "judge";

    const PROBLEMS_SORT_PARAMS = [
        self::URL_QUERY_SORT_PARAM_ID_KEY => self::FLD_PROBLEMS_ID,
        self::URL_QUERY_SORT_PARAM_NAME_KEY => self::FLD_PROBLEMS_NAME,
        self::URL_QUERY_SORT_PARAM_ACCEPTED_COUNT_KEY => self::FLD_PROBLEMS_SOLVED_COUNT,
        self::URL_QUERY_SORT_PARAM_JUDGE_KEY => self::FLD_PROBLEMS_JUDGE_ID,
        '' => self::FLD_PROBLEMS_ID
    ];
    // ============================================================
    //endregion

    //region Contests page

    //
    // Contests page constants
    //

    const CONTESTS_PROBLEMS_MAX_COUNT = 10; // Corresponding to javascript constant
    const CONTESTS_DURATION_MAX = 2592000; // Contest max duration in secs == 30 days
    const CONTESTS_MAX_START_DATETIME = 30; // Contest max start daytime in days == 30 days
    const CONTESTS_COUNT_PER_PAGE = 30;
    const CONTEST_STANDINGS_PER_PAGE = 30;
    const CONTEST_SUBMISSIONS_PER_PAGE = 30;
    const CONTEST_PARTICIPANTS_PER_PAGE = 30;

    const CONTESTS_PENALTY_PER_WRONG_SUBMISSION = 20;

    const CONTESTS_CONTESTS_KEY = 'contests';

    //
    // Single contest page constants
    //

    // Add/edit contest page keys
    const CONTEST_PROBLEMS_SELECTED_FILTERS = "contest_selected_filters";
    const CONTEST_PROBLEMS_SELECTED_JUDGES = "selected_judges";
    const CONTEST_PROBLEMS_SELECTED_TAGS = "selected_tags";
    const CONTESTS_SELECTED_ORGANISERS = "selected_organisers";
    const CONTEST_AUTO_COMPLETE_ORGANISERS = 1;
    const CONTEST_AUTO_COMPLETE_TAGS = 0;

    // Participants
    const PARTICIPANTS_DISPLAYED_FIELDS = [
        self::FLD_USERS_USERNAME,
        self::FLD_USERS_COUNTRY
    ];
    // ============================================================
    //endregion

    //region Groups page

    //
    // Groups page constants
    //

    const GROUPS_COUNT_PER_PAGE = 30;

    const GROUPS_GROUPS_KEY = 'groups';

    //
    // Single group page constants
    //

    // Main keys
    const SINGLE_GROUP_GROUP_KEY = "group";
    const SINGLE_GROUP_MEMBERS_KEY = "members";
    const SINGLE_GROUP_REQUESTS_KEY = "requests";
    const SINGLE_GROUP_SHEETS_KEY = "sheets";
    const SINGLE_GROUP_CONTESTS_KEY = "contests";
    const SINGLE_GROUP_EXTRA_KEY = "extra";

    // Details keys

    // Group
    const SINGLE_GROUP_ID_KEY = "id";
    const SINGLE_GROUP_NAME_KEY = "name";
    const SINGLE_GROUP_OWNER_KEY = "owner";

    // Extra
    const SINGLE_GROUP_IS_USER_OWNER = "user_is_owner";
    const SINGLE_GROUP_IS_USER_MEMBER = "user_is_member";
    const SINGLE_GROUP_USER_SENT_REQUEST = "user_sent_request";


    // Members displayable fields
    const MEMBERS_DISPLAYED_FIELDS = [
        self::FLD_USERS_ID,
        self::FLD_USERS_USERNAME,
        self::FLD_USERS_EMAIL,
        self::FLD_USERS_COUNTRY
    ];

    // Contests displayable fields
    const CONTESTS_DISPLAYED_FIELDS = [
        self::FLD_CONTESTS_ID,
        self::FLD_CONTESTS_NAME,
        self::FLD_CONTESTS_TIME,
        self::FLD_CONTESTS_DURATION,
    ];

    // Requests displayable fields
    const REQUESTS_DISPLAYED_FIELDS = [
        self::FLD_USERS_ID,
        self::FLD_USERS_USERNAME,
        self::FLD_USERS_EMAIL,
    ];

    // Sheets displayable fields
    const SHEETS_DISPLAYED_FIELDS = [
        self::FLD_SHEETS_ID,
        self::FLD_SHEETS_NAME
    ];
    // ============================================================
    //endregion

    //region Sheet page

    //
    // Sheet page constants
    //

    // Main keys
    const SINGLE_SHEET_SHEET_KEY = "sheet";
    const SINGLE_SHEET_PROBLEMS_KEY = "problems";
    const SINGLE_SHEET_EXTRA_KEY = "extra";

    // Details keys

    // Sheet
    const SINGLE_SHEET_ID_KEY = "id";
    const SINGLE_SHEET_NAME_KEY = "name";
    const SINGLE_SHEET_GROUP_ID_KEY = "group_id";
    const SHEET_PROBLEMS_SELECTED_FILTERS = "sheet_selected_filters";
    const SHEET_PROBLEMS_SELECTED_JUDGES = "selected_judges";
    const SHEET_PROBLEMS_SELECTED_TAGS = "selected_tags";

    // Extra

    // ============================================================
    //endregion

    //region Judges

    //
    // Judges constants
    //
    const JUDGE_CODEFORCES_ID = 1;
    const JUDGE_UVA_ID = 2;
    const JUDGE_LIVE_ARCHIVE_ID = 3;

    const JUDGE_NAME_KEY = 0;
    const JUDGE_LINK_KEY = 1;
    const JUDGE_PROBLEM_LINK_KEY = 2;
    const JUDGE_PROBLEM_LINK_ATTRIBUTES_KEY = 3;
    const JUDGE_PROBLEM_NUMBER_FORMAT_KEY = 4;
    const JUDGE_PROBLEM_NUMBER_FORMAT_ATTRIBUTES_KEY = 5;

    const JUDGES = [
        self::JUDGE_CODEFORCES_ID => [
            self::JUDGE_NAME_KEY => "Codeforces",
            self::JUDGE_LINK_KEY => "http://codeforces.com/",
            self::JUDGE_PROBLEM_LINK_KEY => "http://codeforces.com/problemset/problem/{1}/{2}",
            self::JUDGE_PROBLEM_LINK_ATTRIBUTES_KEY => [
                "{1}" => self::FLD_PROBLEMS_JUDGE_FIRST_KEY,
                "{2}" => self::FLD_PROBLEMS_JUDGE_SECOND_KEY
            ],
            self::JUDGE_PROBLEM_NUMBER_FORMAT_KEY => "{1}{2}",
            self::JUDGE_PROBLEM_NUMBER_FORMAT_ATTRIBUTES_KEY => [
                "{1}" => self::FLD_PROBLEMS_JUDGE_FIRST_KEY,
                "{2}" => self::FLD_PROBLEMS_JUDGE_SECOND_KEY
            ]
        ],
        self::JUDGE_UVA_ID => [
            self::JUDGE_NAME_KEY => "UVa",
            self::JUDGE_LINK_KEY => "https://uva.onlinejudge.org/",
            self::JUDGE_PROBLEM_LINK_KEY => "https://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&page=show_problem&problem={1}",
            self::JUDGE_PROBLEM_LINK_ATTRIBUTES_KEY => [
                "{1}" => self::FLD_PROBLEMS_JUDGE_FIRST_KEY
            ],
            self::JUDGE_PROBLEM_NUMBER_FORMAT_KEY => "P{1}",
            self::JUDGE_PROBLEM_NUMBER_FORMAT_ATTRIBUTES_KEY => [
                "{1}" => self::FLD_PROBLEMS_JUDGE_SECOND_KEY
            ]
        ],
        self::JUDGE_LIVE_ARCHIVE_ID => [
            self::JUDGE_NAME_KEY => "Live Archive",
            self::JUDGE_LINK_KEY => "https://icpcarchive.ecs.baylor.edu/",
            self::JUDGE_PROBLEM_LINK_KEY => "https://icpcarchive.ecs.baylor.edu/index.php?option=com_onlinejudge&Itemid=8&page=show_problem&problem={1}",
            self::JUDGE_PROBLEM_LINK_ATTRIBUTES_KEY => [
                "{1}" => self::FLD_PROBLEMS_JUDGE_FIRST_KEY
            ],
            self::JUDGE_PROBLEM_NUMBER_FORMAT_KEY => "P{1}",
            self::JUDGE_PROBLEM_NUMBER_FORMAT_ATTRIBUTES_KEY => [
                "{1}" => self::FLD_PROBLEMS_JUDGE_SECOND_KEY
            ]
        ]
    ];

    //
    // Submission verdicts & languages
    //

    // Full list verdicts
    const VERDICT_FAILED = '0';
    const VERDICT_ACCEPTED = '1';
    const VERDICT_PARTIAL_ACCEPTED = '2';
    const VERDICT_COMPILATION_ERROR = '3';
    const VERDICT_RUNTIME_ERROR = '4';
    const VERDICT_WRONG_ANSWER = '5';
    const VERDICT_PRESENTATION_ERROR = '6';
    const VERDICT_TIME_LIMIT_EXCEEDED = '7';
    const VERDICT_MEMORY_LIMIT_EXCEEDED = '8';
    const VERDICT_IDLENESS_LIMIT_EXCEEDED = '9';
    const VERDICT_SECURITY_VIOLATED = '10';
    const VERDICT_CRASHED = '11';
    const VERDICT_INPUT_PREPARATION_CRASHED = '12';
    const VERDICT_CHALLENGED = '13';
    const VERDICT_SKIPPED = '14';
    const VERDICT_TESTING = '15';
    const VERDICT_REJECTED = '16';
    const VERDICT_UNKNOWN = '17';
    const VERDICT_COUNT = 18;   // Note: To be incremented manually

    const VERDICT_NAMES = [
        self::VERDICT_FAILED => 'Failed',
        self::VERDICT_ACCEPTED => 'Accepted',
        self::VERDICT_PARTIAL_ACCEPTED => 'Partial Accepted',
        self::VERDICT_COMPILATION_ERROR => 'Compilation Error',
        self::VERDICT_RUNTIME_ERROR => 'Runtime Error',
        self::VERDICT_WRONG_ANSWER => 'Wrong Answer',
        self::VERDICT_PRESENTATION_ERROR => 'Presentation Error',
        self::VERDICT_TIME_LIMIT_EXCEEDED => 'Time Limit Exceeded',
        self::VERDICT_MEMORY_LIMIT_EXCEEDED => 'Memory Limit Exceeded',
        self::VERDICT_IDLENESS_LIMIT_EXCEEDED => 'Idleness Limit Exceeded',
        self::VERDICT_SECURITY_VIOLATED => 'Security Violated',
        self::VERDICT_CRASHED => 'Crashed',
        self::VERDICT_INPUT_PREPARATION_CRASHED => 'Input Preparation Crashed',
        self::VERDICT_CHALLENGED => 'Challenged',
        self::VERDICT_SKIPPED => 'Skipped',
        self::VERDICT_TESTING => 'Testing',
        self::VERDICT_REJECTED => 'Rejected',
        self::VERDICT_UNKNOWN => 'Unknown',
    ];

    // Simple list of verdicts
    const SIMPLE_VERDICT_NOT_SOLVED = 0;
    const SIMPLE_VERDICT_ACCEPTED = 1;
    const SIMPLE_VERDICT_WRONG_SUBMISSION = 2;

    // Codeforces submission verdicts
    const CODEFORCES_SUBMISSION_VERDICTS = [
        "FAILED" => self::VERDICT_FAILED,
        "OK" => self::VERDICT_ACCEPTED,
        "PARTIAL" => self::VERDICT_PARTIAL_ACCEPTED,
        "COMPILATION_ERROR" => self::VERDICT_COMPILATION_ERROR,
        "RUNTIME_ERROR" => self::VERDICT_RUNTIME_ERROR,
        "WRONG_ANSWER" => self::VERDICT_WRONG_ANSWER,
        "PRESENTATION_ERROR" => self::VERDICT_PRESENTATION_ERROR,
        "TIME_LIMIT_EXCEEDED" => self::VERDICT_TIME_LIMIT_EXCEEDED,
        "MEMORY_LIMIT_EXCEEDED" => self::VERDICT_MEMORY_LIMIT_EXCEEDED,
        "IDLENESS_LIMIT_EXCEEDED" => self::VERDICT_IDLENESS_LIMIT_EXCEEDED,
        "SECURITY_VIOLATED" => self::VERDICT_SECURITY_VIOLATED,
        "CRASHED" => self::VERDICT_CRASHED,
        "INPUT_PREPARATION_CRASHED" => self::VERDICT_INPUT_PREPARATION_CRASHED,
        "CHALLENGED" => self::VERDICT_CHALLENGED,
        "SKIPPED" => self::VERDICT_SKIPPED,
        "TESTING" => self::VERDICT_TESTING,
        "REJECTED" => self::VERDICT_REJECTED,
        "UNKNOWN" => self::VERDICT_UNKNOWN
    ];

    // uHunt submission verdicts
    const UHUNT_SUBMISSION_VERDICTS = [
        "10" => self::VERDICT_FAILED,
        "15" => self::VERDICT_REJECTED,
        "20" => self::VERDICT_TESTING,
        "30" => self::VERDICT_COMPILATION_ERROR,
        "35" => self::VERDICT_SECURITY_VIOLATED,
        "40" => self::VERDICT_RUNTIME_ERROR,
        "45" => self::VERDICT_CRASHED,
        "50" => self::VERDICT_TIME_LIMIT_EXCEEDED,
        "60" => self::VERDICT_MEMORY_LIMIT_EXCEEDED,
        "70" => self::VERDICT_WRONG_ANSWER,
        "80" => self::VERDICT_PRESENTATION_ERROR,
        "90" => self::VERDICT_ACCEPTED,
    ];

    // uHunt submission languages
    const UHUNT_SUBMISSION_LANGUAGES = [
        "1" => "ANSI C",
        "2" => "Java",
        "3" => "C++",
        "4" => "Pascal",
        "5" => "C++11"
    ];
    // ============================================================
    //endregion

    //region Database

    //
    // Database constants
    //

    const ACCOUNT_ROLE_USER = '0';
    const ACCOUNT_ROLE_ADMIN = '1';
    const ACCOUNT_ROLE_SUPER_ADMIN = '2';
    const ACCOUNT_ROLES = [
        self::ACCOUNT_ROLE_USER,
        self::ACCOUNT_ROLE_ADMIN,
        self::ACCOUNT_ROLE_SUPER_ADMIN
    ];

    const GENDER_MALE = '0';
    const GENDER_FEMALE = '1';
    const USER_GENDERS = [
        self::GENDER_MALE,
        self::GENDER_FEMALE
    ];

    const CONTEST_PARTICIPANT_ROLE_MEMBER = '0';
    const CONTEST_PARTICIPANT_ROLE_OWNER = '1';
    const CONTEST_PARTICIPANT_ROLE_ADMIN = '2';
    const CONTEST_PARTICIPANT_ROLES = [
        self::CONTEST_PARTICIPANT_ROLE_MEMBER,
        self::CONTEST_PARTICIPANT_ROLE_OWNER,
        self::CONTEST_PARTICIPANT_ROLE_ADMIN
    ];

    const CONTEST_VISIBILITY_PUBLIC = '0';
    const CONTEST_VISIBILITY_PRIVATE = '1';
    const CONTEST_VISIBILITIES = [
        self::CONTEST_VISIBILITY_PUBLIC,
        self::CONTEST_VISIBILITY_PRIVATE
    ];

    const QUESTION_STATUS_NORMAL = '0';
    const QUESTION_STATUS_ANNOUNCEMENT = '1';
    const QUESTION_STATUS = [
        self::QUESTION_STATUS_NORMAL,
        self::QUESTION_STATUS_ANNOUNCEMENT
    ];

    const NOTIFICATION_STATUS_UNREAD = '0';
    const NOTIFICATION_STATUS_READ = '1';
    const NOTIFICATION_STATUS = [
        self::NOTIFICATION_STATUS_UNREAD,
        self::NOTIFICATION_STATUS_READ
    ];

    const NOTIFICATION_TYPE_CONTEST = '0';
    const NOTIFICATION_TYPE_GROUP = '1';
    const NOTIFICATION_TYPE_TEAM = '2';
    const NOTIFICATION_TYPES = [
        self::NOTIFICATION_TYPE_CONTEST,
        self::NOTIFICATION_TYPE_GROUP,
        self::NOTIFICATION_TYPE_TEAM
    ];

    const NOTIFICATION_TEXT_MESSAGE = [
        self::NOTIFICATION_TYPE_CONTEST => "You're invited to join the private contest: ",
        self::NOTIFICATION_TYPE_GROUP => "You're invited to join the private group: ",
        self::NOTIFICATION_TYPE_TEAM => "You're invited to join the private team: ",
    ];

    const RESOURCE_VOTE_TYPE_DOWN = '0';
    const RESOURCE_VOTE_TYPE_UP = '1';
    const RESOURCE_VOTE_TYPES = [
        self::RESOURCE_VOTE_TYPE_DOWN,
        self::RESOURCE_VOTE_TYPE_UP
    ];

    const RESOURCE_VOTE_POST = '0';
    const RESOURCE_VOTE_COMMENT = '1';

    //
    // Tables
    //

    // Model tables
    const TBL_USERS = "users";
    const TBL_PASSWORD_RESETS = "password_resets";
    const TBL_CONTESTS = "contests";
    const TBL_PROBLEMS = "problems";
    const TBL_SUBMISSIONS = "submissions";
    const TBL_QUESTIONS = "questions";
    const TBL_JUDGES = "judges";
    const TBL_TAGS = "tags";
    const TBL_LANGUAGES = "languages";
    const TBL_GROUPS = "groups";
    const TBL_SHEETS = "sheets";
    const TBL_TEAMS = "teams";
    const TBL_NOTIFICATIONS = "notifications";
    const TBL_BLOGS = "blogs";
    const TBL_POSTS = "posts";
    const TBL_COMMENTS = "comments";

    // Pivot tables
    const TBL_USER_HANDLES = "user_handles";
    const TBL_CONTEST_PROBLEMS = "contest_problems";
    const TBL_CONTEST_PARTICIPANTS = "contest_participants";
    const TBL_CONTEST_TEAMS = "contest_teams";
    const TBL_CONTEST_ADMINS = "contest_admins";
    const TBL_PROBLEM_TAGS = "problem_tags";
    const TBL_GROUP_ADMINS = "group_admins";
    const TBL_GROUP_MEMBERS = "group_members";
    const TBL_GROUP_CONTESTS = "group_contests";
    const TBL_GROUP_JOIN_REQUESTS = "group_join_requests";
    const TBL_SHEET_PROBLEMS = "sheet_problems";
    const TBL_TEAM_MEMBERS = "team_members";
    const TBL_COMMENTS_REPLIES = "comments_replies";
    const TBL_LIKEABLES = "likeables";
    const TBL_VOTES = "votes";
    const TBL_DOWN_VOTES = "down_votes";

    // Extra tables
    const TBL_HANDLES_SYNC_QUEUE = "handles_sync_queue";

    //
    // Fields
    //

    // General fields
    const FLD_CREATED_AT = "created_at";
    const FLD_UPDATED_AT = "updated_at";

    // Users
    const FLD_USERS_ID = "id";
    const FLD_USERS_USERNAME = "username";
    const FLD_USERS_EMAIL = "email";
    const FLD_USERS_PASSWORD = "password";
    const FLD_USERS_FIRST_NAME = "first_name";
    const FLD_USERS_LAST_NAME = "last_name";
    const FLD_USERS_GENDER = "gender";
    const FLD_USERS_BIRTHDATE = "birthdate";
    const FLD_USERS_COUNTRY = "country";
    const FLD_USERS_PROFILE_PICTURE = "profile_picture";
    const FLD_USERS_ROLE = "role";
    const FLD_USERS_REMEMBER_TOKEN = "remember_token";
    const FLD_USERS_PENALTY = "user_penalty";                       // Derived attribute
    const FLD_USERS_SOLVED_COUNT = "user_solved_count";             // Derived attribute
    const FLD_USERS_TRAILS_COUNT = "user_trials_count";             // Derived attribute
    const FLD_USERS_CODEFORCES_HANDLE = "codeforces_handle";        // Used in sign up & profile pages
    const FLD_USERS_UVA_HANDLE = "uva_handle";                      // Used in sign up & profile pages
    const FLD_USERS_LIVE_ARCHIVE_HANDLE = "live_archive_handle";    // Used in sign up & profile pages

    // Password resets
    const FLD_PASSWORD_RESETS_EMAIL = "email";
    const FLD_PASSWORD_RESETS_TOKEN = "token";
    const FLD_PASSWORD_RESETS_CREATED_AT = "created_at";

    // Contests
    const FLD_CONTESTS_ID = "id";
    const FLD_CONTESTS_OWNER_ID = "owner_id";
    const FLD_CONTESTS_NAME = "name";
    const FLD_CONTESTS_TIME = "time";
    const FLD_CONTESTS_DURATION = "duration";
    const FLD_CONTESTS_VISIBILITY = "visibility";

    // Problems
    const FLD_PROBLEMS_ID = "id";
    const FLD_PROBLEMS_JUDGE_ID = "judge_id";
    const FLD_PROBLEMS_JUDGE_FIRST_KEY = "judge_first_key";
    const FLD_PROBLEMS_JUDGE_SECOND_KEY = "judge_second_key";
    const FLD_PROBLEMS_NAME = "name";
    const FLD_PROBLEMS_SOLVED_COUNT = "solved_count";
    const FLD_PROBLEMS_TRAILS_COUNT = "trials_count";               // Derived attribute

    // Submissions
    const FLD_SUBMISSIONS_ID = "id";
    const FLD_SUBMISSIONS_JUDGE_SUBMISSION_ID = "judge_submission_id";
    const FLD_SUBMISSIONS_USER_ID = "user_id";
    const FLD_SUBMISSIONS_PROBLEM_ID = "problem_id";
    const FLD_SUBMISSIONS_LANGUAGE_ID = "language_id";
    const FLD_SUBMISSIONS_SUBMISSION_TIME = "submission_time";
    const FLD_SUBMISSIONS_EXECUTION_TIME = "execution_time";
    const FLD_SUBMISSIONS_CONSUMED_MEMORY = "consumed_memory";
    const FLD_SUBMISSIONS_VERDICT = "verdict";
    const FLD_SUBMISSIONS_PROBLEM_NAME = "problem_name";            // Derived attribute
    const FLD_SUBMISSIONS_LANGUAGE_NAME = "language_name";          // Derived attribute

    // Questions
    const FLD_QUESTIONS_ID = "id";
    const FLD_QUESTIONS_USER_ID = "user_id";
    const FLD_QUESTIONS_CONTEST_ID = "contest_id";
    const FLD_QUESTIONS_PROBLEM_ID = "problem_id";
    const FLD_QUESTIONS_TITLE = "title";
    const FLD_QUESTIONS_CONTENT = "content";
    const FLD_QUESTIONS_STATUS = "status";
    const FLD_QUESTIONS_ANSWER = "answer";
    const FLD_QUESTIONS_ADMIN_ID = "admin_id";

    // Judges
    const FLD_JUDGES_ID = "id";
    const FLD_JUDGES_NAME = "name";
    const FLD_JUDGES_LINK = "link";

    // Tags
    const FLD_TAGS_ID = "id";
    const FLD_TAGS_NAME = "name";

    // Languages
    const FLD_LANGUAGES_ID = "id";
    const FLD_LANGUAGES_NAME = "name";

    // Groups
    const FLD_GROUPS_ID = "id";
    const FLD_GROUPS_NAME = "name";
    const FLD_GROUPS_OWNER_ID = "owner_id";

    // Sheets
    const FLD_SHEETS_ID = "id";
    const FLD_SHEETS_NAME = "name";
    const FLD_SHEETS_GROUP_ID = "group_id";

    // Teams
    const FLD_TEAMS_ID = "id";
    const FLD_TEAMS_NAME = "name";

    // Notifications
    const FLD_NOTIFICATIONS_ID = "id";
    const FLD_NOTIFICATIONS_SENDER_ID = "sender_id";
    const FLD_NOTIFICATIONS_RECEIVER_ID = "receiver_id";
    const FLD_NOTIFICATIONS_RESOURCE_ID = "resource_id";    // Group id, contest id, ...etc
    const FLD_NOTIFICATIONS_TYPE = "type";                  // From group, contest, team, ...etc
    const FLD_NOTIFICATIONS_STATUS = "status";              // Read, unread

    // User handles
    const FLD_USER_HANDLES_USER_ID = "user_id";
    const FLD_USER_HANDLES_JUDGE_ID = "judge_id";
    const FLD_USER_HANDLES_HANDLE = "handle";

    // Contest problems
    const FLD_CONTEST_PROBLEMS_CONTEST_ID = "contest_id";
    const FLD_CONTEST_PROBLEMS_PROBLEM_ID = "problem_id";
    const FLD_CONTEST_PROBLEMS_PROBLEM_ORDER = "problem_order";

    // Contest participants
    const FLD_CONTEST_PARTICIPANTS_CONTEST_ID = "contest_id";
    const FLD_CONTEST_PARTICIPANTS_USER_ID = "user_id";

    // Contest teams
    const FLD_CONTEST_TEAMS_CONTEST_ID = "contest_id";
    const FLD_CONTEST_TEAMS_TEAM_ID = "team_id";

    // Contest admins
    const FLD_CONTEST_ADMINS_ADMIN_ID = "user_id";
    const FLD_CONTEST_ADMINS_CONTEST_ID = "contest_id";

    // Problem tags
    const FLD_PROBLEM_TAGS_PROBLEM_ID = "problem_id";
    const FLD_PROBLEM_TAGS_TAG_ID = "tag_id";

    // Group members
    const FLD_GROUP_MEMBERS_USER_ID = "user_id";
    const FLD_GROUP_MEMBERS_GROUP_ID = "group_id";

    // Group contests
    const FLD_GROUP_CONTESTS_GROUP_ID = "group_id";
    const FLD_GROUP_CONTESTS_CONTEST_ID = "contest_id";

    // Group join requests
    const FLD_GROUPS_JOIN_REQUESTS_USER_ID = "user_id";
    const FLD_GROUPS_JOIN_REQUESTS_GROUP_ID = "group_id";

    // Group admins
    const FLD_GROUP_ADMINS_ADMIN_ID = "user_id";
    const FLD_GROUP_ADMINS_GROUP_ID = "group_id";

    // Sheet problems
    const FLD_SHEET_PROBLEMS_SHEET_ID = "sheet_id";
    const FLD_SHEET_PROBLEMS_PROBLEM_ID = "problem_id";
    const FLD_SHEET_PROBLEMS_SOLUTION = "solution";
    const FLD_SHEET_PROBLEMS_SOLUTION_LANG = "solution_lang";

    // Team members
    const FLD_TEAM_MEMBERS_TEAM_ID = "team_id";
    const FLD_TEAM_MEMBERS_USER_ID = "user_id";

    // Blogs
    const FLD_BLOGS_BLOG_ID = "id";
    const FLD_BLOGS_OWNER_ID = "owner_id";

    // Posts
    const FLD_POSTS_ID = "id";
    const FLD_POSTS_OWNER_ID = "owner_id";
    const FLD_POSTS_TITLE = "title";
    const FLD_POSTS_BODY = "body";
    const FLD_POSTS_UP_VOTES = "up_vote";
    const FLD_POSTS_DOWN_VOTES = "down_vote";
    const FLD_POSTS_CREATED_AT = "created_at";

    // Comments
    const FLD_COMMENTS_ID = "id";
    const FLD_COMMENTS_USER_ID = "user_id";
    const FLD_COMMENTS_POST_ID = "post_id";
    const FLD_COMMENTS_PARENT_ID = "parent_id";
    const FLD_COMMENTS_TITLE = "title";
    const FLD_COMMENTS_BODY = "body";
    const FLD_COMMENTS_UP_VOTES = "up_vote";
    const FLD_COMMENTS_DOWN_VOTES = "down_vote";
    const FLD_COMMENTS_CREATED_AT = "created_at";

    // Comments Replies
    const COMMENTS_REPLIES = "replies";

    // Up/Down Vote
    const FLD_VOTES_ID = "id";
    const FLD_VOTES_USER_ID = "user_id";
    const FLD_VOTES_RESOURCE_ID = "resource_id";
    const FLD_VOTES_RESOURCE_TYPE = "resource_type";
    const FLD_VOTES_TYPE = "type";
    const FLD_VOTES_DELETED_AT = "deleted_at";
    const FLD_VOTES_CREATED_AT = "created_at";

    // Handles sync queue
    const FLD_HANDLES_SYNC_QUEUE_USER_ID = "user_id";
    const FLD_HANDLES_SYNC_QUEUE_JUDGE_ID = "judge_id";
    // ============================================================

    //endregion

    //region Exceptions

    //
    // Exceptions constants
    //

    // Group Invitation Exception
    const INVITATION_EXCEPTION_INVITED = "INVITED";
    const INVITATION_EXCEPTION_MSGS = [
        self::INVITATION_EXCEPTION_INVITED => 'This receiver has already received notification regarding this resource',
    ];

    //=============================================================
    //endregion
}
