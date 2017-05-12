<?php

namespace App\Http\Controllers\Contest;

use Auth;
use Session;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Problem;
use App\Models\Tag;
use App\Models\Judge;
use App\Models\Contest;
use App\Models\Group;
use App\Models\Notification;
use App\Utilities\Constants;
use App\Utilities\Utilities;
use App\Http\Controllers\RetrieveProblems;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContestController extends Controller
{
    use RetrieveProblems;

    /**
     * Show all contests page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $endedContests = Contest::ofPublic()
            ->ofEnded()
            ->orderByDesc(Constants::FLD_CONTESTS_TIME)
            ->paginate(Constants::CONTESTS_COUNT_PER_PAGE, ['*'], 'past');

        $upcomingContests = Contest::ofPublic()
            ->ofUpcoming()
            ->orderByDesc(Constants::FLD_CONTESTS_TIME)
            ->paginate(Constants::CONTESTS_COUNT_PER_PAGE, ['*'], 'upcoming');

        $runningContests = Contest::ofPublic()
            ->ofRunning()
            ->orderByDesc(Constants::FLD_CONTESTS_TIME)
            ->paginate(Constants::CONTESTS_COUNT_PER_PAGE, ['*'], 'running');

        return view('contests.index')
            ->with('endedContests', $endedContests)
            ->with('upcomingContests', $upcomingContests)
            ->with('runningContests', $runningContests)
            ->with('pageTitle', config('app.name') . ' | Contests');
    }

    /**
     * Show single contest problems page
     *
     * Authorization happens in the defined Gate
     *
     * @param Contest $contest
     * @return \Illuminate\View\View
     */
    public function displayContestProblems(Contest $contest)
    {
        if (!$contest) {
            return redirect(route(Constants::ROUTES_CONTESTS_INDEX)); // contest doesn't exist
        }

        $problems = $contest->problemStatistics()->get();

        return view('contests.contest')
            ->with('contest', $contest)
            ->with('problems', $problems)
            ->with('view', 'problems')
            ->with('pageTitle', config('app.name') . ' | ' . $contest[Constants::FLD_CONTESTS_NAME]);
    }

    /**
     * Show single contest standings page
     *
     * Authorization happens in the defined Gate
     *
     * @param Contest $contest
     * @return \Illuminate\View\View
     */
    public function displayContestStandings(Contest $contest)
    {
        if (!$contest) {
            return redirect(route(Constants::ROUTES_CONTESTS_INDEX)); // contest doesn't exist
        }

        $problems = $contest->problemStatistics()->get();
        $standings = $this->getStandingsInfo($contest);

        return view('contests.contest')
            ->with('contest', $contest)
            ->with('standings', $standings)
            ->with('problems', $problems)
            ->with('view', 'standings')
            ->with('pageTitle', config('app.name') . ' | ' . $contest[Constants::FLD_CONTESTS_NAME]);
    }

    /**
     * Show single contest standings page
     *
     * Authorization happens in the defined Gate
     *
     * @param Contest $contest
     * @return \Illuminate\View\View
     */
    public function displayContestStatus(Contest $contest)
    {
        if (!$contest) {
            return redirect(route(Constants::ROUTES_CONTESTS_INDEX)); // contest doesn't exist
        }

        $submissions = $contest
            ->submissions()
            ->paginate(Constants::CONTEST_SUBMISSIONS_PER_PAGE);

        return view('contests.contest')
            ->with('contest', $contest)
            ->with('submissions', $submissions)
            ->with('view', 'submissions')
            ->with('pageTitle', config('app.name') . ' | ' . $contest[Constants::FLD_CONTESTS_NAME]);
    }

    /**
     * Show single contest standings page
     *
     * Authorization happens in the defined Gate
     *
     * @param Contest $contest
     * @return \Illuminate\View\View
     */
    public function displayContestParticipants(Contest $contest)
    {
        if (!$contest) {
            return redirect(route(Constants::ROUTES_CONTESTS_INDEX)); // contest doesn't exist
        }

        $participants = $contest
            ->participants()
            ->select(Constants::PARTICIPANTS_DISPLAYED_FIELDS)
            ->paginate(Constants::CONTEST_PARTICIPANTS_PER_PAGE);

        return view('contests.contest')
            ->with('contest', $contest)
            ->with('participants', $participants)
            ->with('view', 'participants')
            ->with('pageTitle', config('app.name') . ' | ' . $contest[Constants::FLD_CONTESTS_NAME]);
    }

    /**
     * Show single contest questions page
     *
     * Authorization happens in the defined Gate
     *
     * @param Contest $contest
     * @return \Illuminate\View\View
     */
    public function displayContestQuestions(Contest $contest)
    {
        if (!$contest) {
            return redirect(route(Constants::ROUTES_CONTESTS_INDEX)); // contest doesn't exist
        }

        $problems = $contest->problemStatistics()->get();
        $questions = $this->getQuestionsInfo($contest, Auth::user());

        return view('contests.contest')
            ->with('contest', $contest)
            ->with('questions', $questions)
            ->with('problems', $problems)
            ->with('view', 'questions')
            ->with('pageTitle', config('app.name') . ' | ' . $contest[Constants::FLD_CONTESTS_NAME]);
    }

    /**
     * Show add/edit contest page
     *
     * @param \Illuminate\Http\Request $request
     * @param Contest $contest
     *
     * @return \Illuminate\View\View
     */
    private function addEditContestView(Request $request, Contest $contest = null)
    {

        // Check server sessions for saved filters data (i.e. tags, organisers, judges)
        $tags = $judges = [];

        $problems = $this->getProblemsWithSessionFilters(
            $request, $tags, $judges,
            Constants::CONTEST_PROBLEMS_SELECTED_FILTERS,
            Constants::CONTEST_PROBLEMS_SELECTED_JUDGES,
            Constants::CONTEST_PROBLEMS_SELECTED_TAGS
        );

        // Are filters applied (to inform user that there're filters applied from previous visit)
        $areFiltersApplied = count($tags) || count($judges);

        $view = view('contests.add_edit')
            ->with('problems', $problems)
            ->with('judges', Judge::all())
            ->with('checkBoxes', 'true')
            ->with('filtersApplied', $areFiltersApplied)
            ->with('formURL', route(Constants::ROUTES_CONTESTS_INDEX))
            ->with('syncFiltersURL', route(Constants::ROUTES_CONTESTS_FILTERS_SYNC))
            ->with('detachFiltersURL', route(Constants::ROUTES_CONTESTS_FILTERS_DETACH))
            ->with(Constants::CONTEST_PROBLEMS_SELECTED_TAGS, $tags)
            ->with(Constants::CONTEST_PROBLEMS_SELECTED_JUDGES, $judges)
            ->with('pageTitle', config('app.name') . ' | ' . ((isset($contest)) ? $contest[Constants::FLD_CONTESTS_NAME] : 'Contest'));

        // When editing
        if ($contest) {
            $view->with('contest', $contest)
                ->with('group', $contest->groups()->first())
                ->with('formURL', route(Constants::ROUTES_CONTESTS_UPDATE, $contest[Constants::FLD_CONTESTS_ID]));
        }
        return $view;
    }

    /**
     * Return add contest view
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        return $this->addEditContestView($request, null);
    }

    /**
     * Return edit contest view
     *
     * @param Request $request
     * @param Contest $contest
     * @return \Illuminate\View\View
     */
    public function editContestView(Request $request, Contest $contest)
    {
        return $this->addEditContestView($request, $contest);

    }

    /**
     * Show add group contest page
     *
     *
     * @param Group $group
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addGroupContestView(Request $request, Group $group)
    {

        // Check server sessions for saved filters data (i.e. tags, organisers, judges)
        $tags = $judges = [];

        $problems = $this->getProblemsWithSessionFilters(
            $request, $tags, $judges,
            Constants::CONTEST_PROBLEMS_SELECTED_FILTERS,
            Constants::CONTEST_PROBLEMS_SELECTED_JUDGES,
            Constants::CONTEST_PROBLEMS_SELECTED_TAGS
        );

        return view('contests.add_edit')
            ->with('problems', $problems)
            ->with('judges', Judge::all())
            ->with('checkBoxes', 'true')
            ->with('group', $group)
            ->with('formURL', route(Constants::ROUTES_GROUPS_CONTEST_STORE, $group[Constants::FLD_GROUPS_ID]))
            ->with('syncFiltersURL', route(Constants::ROUTES_CONTESTS_FILTERS_SYNC))
            ->with('detachFiltersURL', route(Constants::ROUTES_CONTESTS_FILTERS_DETACH))
            ->with(Constants::CONTEST_PROBLEMS_SELECTED_TAGS, $tags)
            ->with(Constants::CONTEST_PROBLEMS_SELECTED_JUDGES, $judges)
            ->with('pageTitle', config('app.name') . ' | Add Contest');
    }

    /**
     * Save contest to database
     *
     * ToDo: test this function
     *
     * @param Request $request
     * @param Group $group
     * @param Contest $contest
     *
     * @return mixed
     */
    public function saveContest(Request $request, Group $group = null, Contest $contest = null)
    {
        // Validate contest time at first:
        // Start datetime isn't in the past
        // End date is within the allowed period
        $this->validate($request, [
            Constants::FLD_CONTESTS_TIME => 'required|date_format:Y-m-d H:i:s|after:' . Carbon::now() . '|before:' . Carbon::now()->addDays(Constants::CONTESTS_MAX_START_DATETIME),
        ]);

        // Flag to indicate that we're saving old contest
        $editingContest = ($contest != null);

        // Adding new contest and assign the owner
        if (!$contest) {
            // Create contest object
            $contest = new Contest($request->all());

            // Assign owner
            $contest->owner()->associate(Auth::user());
        } else {
            // Update contest
            $contest[Constants::FLD_CONTESTS_NAME] = $request->get('name');
            $contest[Constants::FLD_CONTESTS_TIME] = $request->get('time');
            $contest[Constants::FLD_CONTESTS_DURATION] = floor($request->get('duration'));
            $contest[Constants::FLD_CONTESTS_VISIBILITY] = $request->get('visibility');
        }

        // Automatically set visibility to private for groups
        if ($group) {
            $contest[Constants::FLD_CONTESTS_VISIBILITY] = Constants::CONTEST_VISIBILITY_PRIVATE;
        }

        // Fill relations
        if ($contest->save()) {

            // Detach contest old organisers
            if ($editingContest)
                $contest->organizers()->detach();

            // Assign organisers
            $this->associateContestOrganisers($contest, $request->get('organisers'), $group);

            // Send notifications
            $this->sendPrivateContestInvitations($contest, $request->get('invitees'), $request->get('visibility'), $group);

            // Add problems
            $this->associateContestProblems($contest, $request->get('problems_ids'));

            // Flush sessions
            Session::forget([Constants::CONTEST_PROBLEMS_SELECTED_FILTERS]);

            // Return success message
            Session::flash("messages", ["Contest Saved Successfully"]);
            return redirect(route(Constants::ROUTES_CONTESTS_DISPLAY, $contest[Constants::FLD_CONTESTS_ID]));

        } else {   // return error message
            Session::flash("messages", ["Sorry, Contest was not saved. Please retry later"]);
            return redirect(route(Constants::ROUTES_CONTESTS_INDEX));
        }
    }

    /**
     * Add contest function
     *
     * @param Request $request
     *
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        return $this->saveContest($request, null, null);
    }

    /**
     * Add group contest function
     *
     * @param Request $request
     * @param Group $group
     *
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function addGroupContest(Request $request, Group $group)
    {
        return $this->saveContest($request, $group, null);
    }

    /**
     * Edit contest function
     *
     * @param Request $request
     * @param Contest $contest
     *
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function editContest(Request $request, Contest $contest)
    {
        return $this->saveContest($request, $contest->groups()->first(), $contest);
    }

    /**
     * Retrieve tags by name for auto complete
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function tagsAutoComplete()
    {
        $tags = Tag::select('name')->get();
        return response()->json($tags);
    }

    /**
     * Retrieve usernames for auto complete
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function usersAutoComplete(Request $request)
    {
        $query = $request->get('query');
        $users = User::select([Constants::FLD_USERS_USERNAME . ' as name'])
            ->where(Constants::FLD_USERS_USERNAME, 'LIKE', "%$query%")
            ->where(Constants::FLD_USERS_USERNAME, '!=', Auth::user()[Constants::FLD_USERS_USERNAME])
            ->get();
        return response()->json($users);
    }

    /**
     * Save problems filters (tags, judges) into server session to later retrieval
     *
     * @param Request $request
     */
    public function applyProblemsFilters(Request $request)
    {
        Session::put(Constants::CONTEST_PROBLEMS_SELECTED_FILTERS, $request->get('selected_filters'));
    }

    /**
     * Clear problems filters (tags, judges) from server session
     */
    public function clearProblemsFilters()
    {
        Session::forget(Constants::CONTEST_PROBLEMS_SELECTED_FILTERS);
    }

    /**
     * Delete a certain contest if you're owner
     *
     * Authorization happens in the defined Gate (owner-contest)
     *
     * @param Contest $contest
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteContest(Contest $contest)
    {
        $contest->delete();
        return redirect(route(Constants::ROUTES_CONTESTS_INDEX));
    }

    /**
     * Cancel user participation in a contest
     *
     * @param Contest $contest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function leaveContest(Contest $contest)
    {
        $user = Auth::user();
        $user->participatingContests()->detach($contest);
        return back();
    }

    /**
     * Remove participant from the contest (by organiser/owner)
     *
     * @param Contest $contest
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeParticipant(Contest $contest, User $user)
    {
        $user->participatingContests()->detach($contest);
        return back();
    }

    /**
     * Register user participation in a contest
     *
     * Authorization happens in the defined Gate
     *
     * @param Contest $contest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function joinContest(Contest $contest)
    {
        $user = Auth::user();
        $user->participatingContests()->syncWithoutDetaching([$contest[Constants::FLD_CONTESTS_ID]]);
        return back();
    }

    /**
     * Reorder problems in a contest
     *
     * Authorization happens in the defined Gate (owner-contest)
     *
     * @param Request $request
     * @param Contest $contest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reorderContest(Request $request, Contest $contest)
    {
        $problemsIDsNewOrder = $request->get('problems_order');
        $this->updateContestProblemsOrder($contest, $problemsIDsNewOrder);
        return response()->json(['status' => 204], 200);
    }

    /**
     * Get contest standings data
     *
     * ToDo comment function content
     *
     * @param Contest $contest
     * @return array
     */
    private function getStandingsInfo($contest)
    {
        //\DB::enableQueryLog();

        //TODO: fix pagination
        $rawData = $contest
            ->standings()
            ->get();
        //->paginate(Constants::CONTEST_STANDINGS_PER_PAGE, ['*'], 'standings_page');

        //dd(\DB::getQueryLog());

        $standings = [];
        $idx = 0;
        $len = count($rawData);

        for ($i = 0; $i < $len; ++$i) {
            $standings[$idx] = [];
            $cur = &$standings[$idx];
            $curData = (array)$rawData[$i];
            $cur[Constants::FLD_SUBMISSIONS_USER_ID] = $curData[Constants::FLD_SUBMISSIONS_USER_ID];
            $cur[Constants::FLD_USERS_USERNAME] = $curData[Constants::FLD_USERS_USERNAME];
            $cur[Constants::FLD_USERS_SOLVED_COUNT] = $curData[Constants::FLD_USERS_SOLVED_COUNT];
            $cur[Constants::FLD_USERS_TRAILS_COUNT] = $curData[Constants::FLD_USERS_TRAILS_COUNT];
            $cur[Constants::FLD_USERS_PENALTY] = $curData[Constants::FLD_USERS_PENALTY];

            $cur[Constants::TBL_PROBLEMS] = [];
            $problems = &$cur[Constants::TBL_PROBLEMS];

            do {
                $problems[] = [
                    Constants::FLD_SUBMISSIONS_PROBLEM_ID => $curData[Constants::FLD_SUBMISSIONS_PROBLEM_ID],
                    Constants::FLD_PROBLEMS_SOLVED_COUNT => $curData[Constants::FLD_PROBLEMS_SOLVED_COUNT],
                    Constants::FLD_PROBLEMS_TRAILS_COUNT => $curData[Constants::FLD_PROBLEMS_TRAILS_COUNT]
                ];

                if (++$i < $len) {
                    $curData = (array)$rawData[$i];
                }
            } while ($i < $len && $cur[Constants::FLD_SUBMISSIONS_USER_ID] == $curData[Constants::FLD_SUBMISSIONS_USER_ID]);

            --$i;
            ++$idx;
        }

        return $standings;
    }

    /**
     * Get contest questions info
     *
     * @param Contest $contest
     * @param User $user
     * return mixed
     */
    private function getQuestionsInfo(Contest $contest, User $user)
    {
        $isOwnerOrOrganizer = \Gate::forUser($user)->allows('owner-organizer-contest', [$contest[Constants::FLD_CONTESTS_ID]]);

        // Get contest announcements
        $announcements = $contest->announcements()->get();

        // If user is logged in and not organizer, get his questions too
        if ($user && !$isOwnerOrOrganizer) {
            // Get user specific questions
            $questions = $user->questions($contest[Constants::FLD_CONTESTS_ID])->get();

            // Merge announcements and user questions
            $announcements = $announcements->merge($questions);
        } else if ($user && $isOwnerOrOrganizer) {

            // If admin get all questions
            $questions = $contest->questions()
                ->where(Constants::FLD_QUESTIONS_STATUS, '!=', Constants::QUESTION_STATUS_ANNOUNCEMENT);

            // Merge announcements and all questions
            $announcements = $announcements->merge($questions->get());
        }

        // Get extra data from foreign keys
        foreach ($announcements as $announcement) {
            // Get admin username from id if answer is provided
            if ($announcement[Constants::FLD_QUESTIONS_ADMIN_ID])
                $announcement[Constants::FLD_QUESTIONS_ADMIN_ID] =
                    User::find($announcement[Constants::FLD_QUESTIONS_ADMIN_ID])->username;

            // Get problem number from id
            $announcement[Constants::FLD_QUESTIONS_PROBLEM_ID] =
                Utilities::generateProblemNumber(Problem::find($announcement[Constants::FLD_QUESTIONS_PROBLEM_ID]));
        }

        return $announcements;
    }

    /**
     * Update contest problems order in DB
     *
     * @param Contest $contest
     * @param $problemIDs
     */
    private function updateContestProblemsOrder(Contest $contest, $problemIDs)
    {
        $i = 1;
        foreach ($problemIDs as $problemID) {
            if (!$problemID) continue;
            $problemPivot = $contest->problems()->find($problemID)->pivot;
            $problemPivot[Constants::FLD_CONTEST_PROBLEMS_PROBLEM_ORDER] = $i;
            $problemPivot->save();
            $i++;
        }
    }

    /**
     * Associate the given contest with the given organisers
     *
     * @param Contest $contest
     * @param $organisers
     * @param Group $group
     */
    private function associateContestOrganisers(Contest $contest, $organisers, Group $group = null)
    {
        // For private contests (not in groups) we set the organisers as received
        // from the request
        if (!$group) {
            $organisers = explode(",", $organisers);
            $organisers = User::whereIn('username', $organisers)->get();
            foreach ($organisers as $organiser) {
                if ($organiser[Constants::FLD_USERS_ID] != Auth::user()[Constants::FLD_USERS_ID])
                    $contest->organizers()->save($organiser);
            }
        }
        // Private group contest
        // Add group admins and owner as contest organisers
        else {
            // Set group owner as organiser if not already the owner
            if ($group->owner() != Auth::user()) {
                $contest->organizers()->attach($group->owner());
            }

            // Set group admins as organisers
            foreach ($group->admins() as $admin) {
                if ($admin[Constants::FLD_USERS_ID] != Auth::user()[Constants::FLD_USERS_ID])
                    $contest->organizers()->save($admin);
            }
        }
    }

    /**
     * Send private contest invitations to invitees
     * If group contest, the invitations will be sent to group members
     *
     * @param Contest $contest
     * @param $invitees
     * @param $visibility
     * @param Group $group
     */
    private function sendPrivateContestInvitations(Contest $contest, $invitees, $visibility, Group $group = null)
    {
        // Send notifications to Invitees if private contest and not for specific group
        if (!$group && $visibility == Constants::CONTEST_VISIBILITY_PRIVATE) {

            // Get invitees
            $invitees = explode(",", $invitees);
            $invitees = User::whereIn('username', $invitees)->get();
            foreach ($invitees as $invitee) {
                // Send notifications
                Notification::make(Auth::user(), $invitee, $contest, Constants::NOTIFICATION_TYPE_CONTEST, false);
            }
        } else if ($group) { // Send group members invitations
            // Get invitees
            foreach ($group->members()->get() as $member) {
                Notification::make(Auth::user(), $member, $contest, Constants::NOTIFICATION_TYPE_CONTEST, false);
            }

            // Associate contest with group
            $group->contests()->syncWithoutDetaching($contest);
        }
    }

    /**
     * Associate problems to contest
     *
     * @param Contest $contest
     * @param $problemsIDs
     */
    private function associateContestProblems(Contest $contest, $problemsIDs)
    {
        // Add Problems
        $problems = explode(",", $problemsIDs);

        // Limit problems array to limit
        $problems = array_slice($problems, 0, Constants::CONTESTS_PROBLEMS_MAX_COUNT);

        // Sync problems
        $contest->problems()->sync($problems);

        // Set initial problems order
        $this->updateContestProblemsOrder($contest, $problems);
    }
}
