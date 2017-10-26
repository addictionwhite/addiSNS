<?php

namespace App\Services;

use App\Repositories\Contracts\ProfileRepositoryInterface;
use App\Http\Requests\Api\Contracts\ProfileUpdateRequestInterface;
use App\Http\Requests\Api\ProfileUpdateRequest;

use Illuminate\Support\Facades\Input;

class ProfileService extends Service
{
    protected $profileRepository;

    public function __construct(ProfileRepositoryInterface $profileRepository) {
        $this->profileRepository = $profileRepository;
    }


    /**
     * プロフィール取得
    *
     * @param string $userId
     *
     * @return \App\Entities\Profile
     */
    public function get($userId){

        return $this->profileRepository->get($userId);
    }


    /**
     * プロフィール初期化
    *
     * @param int    $userId
     * @param string $userName
     *
     * @return \App\Entities\Profile
     */
    public function init($userId,$userName){

        return $this->profileRepository->init($userId,$userName);
    }


    /**
     * プロフィール更新
     *
     * @param \App\Http\Requests\Api\Contracts\ProfileUpdateRequestInterface $request
     *
     * @return \App\Entities\Profile
     */
    public function update(ProfileUpdateRequest $request)
    {
        // アップロードされたbase64の画像データ取得
        $image = Input::file('thumbnail_image');

        return $this->profileRepository->update(
            \Auth::id() 
            ,$request->nickname()
            ,$request->content()
            ,$request->rawImage()
            ,file_get_contents($image)
            ,$image->getMimeType()
        );
    }

}
