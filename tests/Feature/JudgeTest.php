<?php

namespace Tests\Feature;

use App\Models\Judge;
use Illuminate\Validation\ValidationException;

class JudgeTest extends DatabaseTest
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testJudge()
    {
        $initialCount = Judge::count();
        // insert valid contest and check for count
        $validJudge = $this->insertJudge('Judge1', 'http://www.link.com', 'http://www.apilink.com');
        $this->assertTrue(Judge::count() == $initialCount + 1);
        $validJudge->delete();
        $this->assertTrue(Judge::count() == $initialCount); // test deleting


        // insert invalid models
        try {
            $this->insertJudge('', 'http://www.link.com', 'http://www.apilink.com');
            $this->fail("Shouldn't reach here w/out throwing Validation Exception - missing data");
        } catch (ValidationException $e) {
        }
        try {
            $this->insertJudge('Judge1', 'link.com', 'http://www.apilink.com');
            $this->fail("Shouldn't reach here w/out throwing Validation Exception - invalid link");
        } catch (ValidationException $e) {
        }
        try {
            $this->insertJudge('Judge1', 'http://www.link.com', 'http://');
            $this->fail("Shouldn't reach here w/out throwing Validation Exception - invalid api link");
        } catch (ValidationException $e) {
        }
        $validJudge = $this->insertJudge('Judge1', 'http://www.link.com', 'http://www.apilink.com');
        try {
            $this->insertJudge('Judge1', 'http://www.link2.com', 'http://www.apilink.com');
            $this->fail("Shouldn't reach here w/out throwing Validation Exception - name duplicate");
        } catch (ValidationException $e) {
        }
        try {
            $this->insertJudge('Judge2', 'http://www.link.com', 'http://www.apilink.com');
            $this->fail("Shouldn't reach here w/out throwing Validation Exception - link duplicate");
        } catch (ValidationException $e) {
        }

        $validJudge->delete();

        $this->assertTrue(Judge::count() == $initialCount); // not inserted
    }
}