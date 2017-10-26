<?php

namespace App\Http\Controllers;

use App\Services\ProfileService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $profileService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = $this->profileService->get(\Auth::id());
        if(is_null($profile)){
            // プロフィール未設定の場合はレコードがないため初期化処理
            $user = \Auth::user();
            $profile = $this->profileService->init($user->id, $user->name);
        }
        $base64 = base64_encode($profile->thumbnail_image); 
        return view('home',compact('profile','base64'));
    }
}
