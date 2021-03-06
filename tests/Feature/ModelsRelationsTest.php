<?php

namespace Tests\Feature;

use App\Models\Language;
use App\Models\Tag;
use Log;
use App\Utilities\Constants;

class ModelsRelationsTest extends DatabaseTest
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRelations()
    {
        // Create models
        $user = $this->insertUser('user121', 'a12@a.a', 'aaaaaa', 'aa31a');
        $admin = $this->insertUser('use12r121', 'a1312@a.a', 'aaaaaa', 'aa131a', '1');
        $language = new Language([Constants::FLD_LANGUAGES_NAME => 'C+++1']);
        $language->save();
        $judge = $this->insertJudge('1', 'Codeforces3', 'http://www.judge3.com');
        $contest = $this->insertContest('Contest1', '2017-12-12 12:12:12', '10', '0', $admin);
        $problem1 = $this->insertProblem('Problem1', '20', $judge, '123', '213');
        $question = $this->insertQuestion('Question1', "HelloHelloHelloHelloHelloHelloHelloHelloHelloHelloHelloHelloHelloHelloHelloHelloHelloHello", 'Answer1', $contest, $user, $problem1);
        $question->saveAnswer("Ansert1", $admin);
        $submission = $this->insertSubmission('123', 100, 200, '1', $problem1, $user, $language);
        $tag = new Tag([Constants::FLD_TAGS_NAME => 'Tag0123']);
        $tag->save();

        // Tags + problems
        $problem1->tags()->sync([$tag->id], false);
        $tag = new Tag([Constants::FLD_TAGS_NAME => 'Tag01232']);
        $tag->save();
        $problem1->tags()->sync([$tag->id], false);
        $problem = $this->insertProblem('Problem1', '20', $judge, '22', '33');
        $problem->tags()->sync([$tag->id], false);
        $problem->tags()->sync([$tag->id], false);
        $problem->tags()->sync([$tag->id], false);
        $problem->tags()->sync([$tag->id], false);
        $problem->tags()->sync([$tag->id], false);
        $problem->tags()->sync([$tag->id], false);

        $this->assertEquals(count($tag->problems()->get()), 2);

        // Problem + Submissions
        $this->assertEquals(count($problem1->submissions), 1);
        $this->assertEquals($submission->problem()->getResults()->id, $problem1->id);

        // Problem + Judge
        $this->assertEquals(count($judge->problems()), 1);
        $this->assertEquals($problem1->judge()->getResults()->id, $judge->id);

        // Problem + contest
        $contest->problems()->sync([$problem1->id], false);

        $this->assertEquals(count($contest->problems()->get()), 1);
        $this->assertEquals(count($problem1->contests()->get()), 1);

        // Submission + Language
        $this->assertEquals(count($language->submissions()), 1);

        // Contest + Question
        $this->assertEquals(count($contest->questions()), 1);
        $this->assertEquals($question->contest()->getResults()->id, $contest->id);

        // User + Submission
        $this->assertEquals(count($user->submissions), 1);
        $this->assertEquals($submission->user()->getResults()->id, $user->id);

        // User + Question
        $this->assertEquals(count($user->questions()), 1);
        $this->assertEquals(count($admin->answeredQuestions()), 1);
        $this->assertEquals($question->user()->getResults()->id, $user->id);
        $this->assertEquals($question->admin()->getResults()->id, $admin->id);

        // User + Judge
        $user->addHandle($judge->id, 'asd');

        // User + Contest
        $user->participatingContests()->save($contest);
        $admin->organizingContests()->save($contest);
        $this->assertEquals(count($user->participatingContests()), 1);
        $this->assertEquals(count($admin->organizingContests()), 1);
        Log::info($contest->organizers()->getResults());
        Log::info($contest->participants()->getResults());

        // Contest + Owner
        $this->assertEquals(count($admin->owningContests()), 1);
    }

}
