<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Services\ProfileService;
use App\Http\Requests\Api\ProfileUpdateRequest;

use App\Http\Controllers\Controller;


class ProfileController extends Controller
{
    public $service;

    public function __construct(ProfileService $service)
    {
        $this->service = $service;
        $this->middleware('auth');
    }


    /**
     * プロフィール編集画面.
     *
     */
    public function edit()
    {
        $profile = $this->service->get(\Auth::id());
        // サムネイル画像 base64に変換
        $base64 = base64_encode($profile->thumbnail_image); 

        return view('profileEdit',compact('profile','base64'));
    }


    /**
     * プロフィール更新処理.
     *
     * @param \App\Http\Requests\Api\ProfileUpdateRequest $request
     *
     */
    public function update(ProfileUpdateRequest $request)
    {
        try {
            $this->service->update($request);
        } catch (\Exception $e) {
            // TODO ログ処理検討
            Log::error($e->getMessage());
        }

        $profile = $this->service->get(\Auth::id());
        $base64 = base64_encode($profile->thumbnail_image); 
        return view('home',compact('profile','base64'));
    }
}
