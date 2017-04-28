<?php

namespace App\Models;

use App\Utilities\Constants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DownVote extends Model
{
    //Add Validation
//    use ValidateModelData;

    //Use Soft Delete
    use SoftDeletes;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = Constants::TBL_DOWN_VOTES;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        Constants::FLD_DOWN_VOTES_VOTED_ID,
        Constants::FLD_DOWN_VOTES_VOTED_TYPE,
        Constants::FLD_DOWN_VOTES_USER_ID
    ];

//    ToDo: @Samir Add Rules
//    /**
//     * The rules to check against before saving the model
//     *
//     * @var array
//     */
//    protected $rules = [
//        Constants::FLD_DOWN_VOTES_USER_ID => 'required|exists:'. Constants::TBL_USERS. ','. Constants::FLD_USERS_ID,
//        Constants::FLD_DOWN_VOTES_VOTED_TYPE => "required|in: " . "[Post::class, Comment::class])"  ,
//        Constants::FLD_DOWN_VOTES_VOTED_ID => 'nullable|exists' . Constants::TBL_COMMENTS . ','. Constants::FLD_COMMENTS_ID,
//    ];


    /*
     * Get Down Votes for all Posts (we may not use this)
     */
    public function posts(){
        return $this->morphedByMany(Comment::class, Constants::TBL_DOWN_VOTES);
    }

    /*
     * Get Down Votes for all Comments (we may not use this)
     */
    public function comments(){
        return $this->morphedByMany(Post::class, Constants::TBL_DOWN_VOTES);
    }
}
