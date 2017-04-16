<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Utilities\Constants;

class CreateGroupContestsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Constants::TBL_GROUPS_CONTESTS, function (Blueprint $table) {
            $table->unsignedInteger(Constants::FLD_GROUP_CONTESTS_GROUP_ID);
            $table->unsignedInteger(Constants::FLD_GROUP_CONTESTS_CONTEST_ID);
            $table->primary(array(
                    Constants::FLD_GROUP_CONTESTS_GROUP_ID,
                    Constants::FLD_GROUP_CONTESTS_CONTEST_ID
                )
            );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Constants::TBL_GROUPS_CONTESTS);
    }
}
