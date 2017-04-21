<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Utilities\Constants;
use App\Http\Controllers\ProblemController;
use App\Models\Problem;
use App\Models\User;
use Carbon\Carbon;
use Charts;
use Image;


class UserController extends Controller
{
    /**
     * Show the user profile page.
     *
     * @param $user
     * @return \Illuminate\View\View
     */
    public function index($user)
    {
      $userData = User::where('username', $user)->first();

      return view('profile.index', ['userName' => $user])
      ->with('pageTitle', config('app.name'). ' | '. $user)
      ->withDate(UserController::userDate($user))
      ->with('problems', UserController::userWrongSubmissions($user))
      ->with('counter',UserController::userNumberOfSolvedProblems($user))
      ->with('chart',UserController::statistics())
      ->with('userData',$userData);
    }

    /**
     * calculates statistics (undone)
     *
     * 
     * @return $chart
     */
    public function statistics()
    {

     $weekDays=array(
       Carbon::now()->format('l')
       ,Carbon::now()->subDays(1)->format('l')
       ,Carbon::now()->subDays(2)->format('l')
       ,Carbon::now()->subDays(3)->format('l')
       ,Carbon::now()->subDays(4)->format('l')
       ,Carbon::now()->subDays(5)->format('l')
       ,Carbon::now()->subDays(6)->format('l'));

     $chart = Charts::multi('areaspline', 'highcharts')
     ->title('User Activity')
     ->colors(['#ff0000', '#00FFFF '])
     ->labels([$weekDays['6'], $weekDays['5'], $weekDays['4'], $weekDays['3'], $weekDays['2'],$weekDays['1'], $weekDays['0']])
     ->dataset('submitted porblems', [3, 4, 3, 5, 4, 10, 15])
     ->dataset('problems solved',  [1, 3, 4, 3, 3, 5, 4]);
     return $chart;
   }

    /**
     * Show the edit profile page.
     *
     * 
     * @return \Illuminate\View\View
     */
    public function edit()
    {

      $user=\Auth::user();
      return view('profile.edit')->with('pageTitle', config('app.name').'|'.$user->username)->with('user',$user);

    }

    /**
     * handling data request in edit profile page
     *
     * @param $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function editProfile(Request $request)
    {
      //TODO @Abzo image cropping
      //TODO delete old images of the same user
      //TODO seperate edit password
      //TODO country drop down ,birthdate
      //TODO verficcation issue(picture and the pass)
      //TODO show edited new info in the view 
      //TODO add missing fillable att in User model
      $user= \Auth::user();

      //temporarly validation of picture and pass(should be in model)
      $this->validate($request,array(
        'profile_picture' =>'nullable|mimes:jpg,jpeg,png|max:2500',
        'password' => 'nullable|min:6',
        'ConfirmPassword' => 'nullable|min:6|same:password', ));

      //saving picture in database
      if($request->hasFile('profile_picture'))
      {
        $image=$request->file('profile_picture');
        $fileName=$user->id.'.'.$image->getClientOriginalExtension();
        $fileLocation=public_path('images/'.$fileName);
        Image::make($image)->save($fileLocation);
        $user->profile_picture=$fileName;
      }

      //saving pass,email,username,first,last names and gender in database
      $user->password=Hash::make($request->input('password'));
      $user->email = $request->input('email');
      $user->username=$request->input('username');
      $user->first_name=$request->input('FirstName');
      $user->last_name =$request->input('LastName');
      if($request->input('gender')=='Male')
        {
        $user->gender = '0';
        }
      else
        {
        $user->gender ='1';
        }
      //saving in the database
      $user->save();
      $id=$user->username;
      //redirecting with the id of the current/modified username
      return redirect('profile/'.$id);
    }

    /**
     * makes formatted joined date of the user
     * @param $username
     * @return $date
     */
    public function userDate($user)
    {
      $userData = User::where('username', $user)->first();
      $userInfo = $userData->toArray();
      $dateCreated = $userInfo['created_at'];
      if($dateCreated!=Null)
      {
        $dateCreatedArr = preg_split("/[\s-]+/", $dateCreated);
        $dt = Carbon::create($dateCreatedArr['0'], $dateCreatedArr['1'], $dateCreatedArr['2']);
        $date = $dt->toFormattedDateString();
      }
      else
      {
        $date=NULL;
      }
      return $date;
    }

    /**
     * gets user wrong submissions
     *
     * @param $username
     * @return array of problems paginated
     */
    public function userWrongSubmissions($user)
    {
      $problemsArr = User::getWrongAnswerProblems($user);
      return Problem::whereIn('id', $problemsArr)->paginate(5);
    }

    /**
     * gets count of solved problems
     *
     * @param $username
     * @return $int
     */
    public function userNumberOfSolvedProblems($user)
    {
      return count(User::getSolvedProblems($user));
    }


  }