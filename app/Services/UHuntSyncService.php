<?php

namespace App\Services;

use App\Utilities\Constants;
use App\Services\JudgeSyncService;

class UHuntSyncService extends JudgeSyncService
{
    protected $apiBaseProblemsUrl;
    protected $apiProblemsParams = [];
    protected $apiBaseSubmissionsUrl;
    protected $apiSubmissionsParams = [];

    protected function parseProblemsRawData()
    {
        $data = json_decode($this->rawDataString, true);

        dd($data);

        return true;
    }

    protected function parseSubmissionsRawData()
    {
        return true;
    }
}