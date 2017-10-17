<?php

namespace App\Services;

use App\Repositories\Contracts\ProfileRepositoryInterface;
use App\Http\Requests\Api\Contracts\ProfileUpdateRequestInterface;
use App\Http\Requests\Api\ProfileUpdateRequest;

class ProfileService extends Service
{
    protected $profileRepository;

    public function __construct(ProfileRepositoryInterface $profileRepository) {
        $this->profileRepository = $profileRepository;
    }


    /**
     * プロフィール更新(レコードがなければ新規）
     *
     * @param \App\Http\Requests\Api\Contracts\ProfileUpdateRequestInterface $request
     *
     * @return \App\Entities\Profile
     */
    public function update(ProfileUpdateRequest $request)
    {
        return $this->profileRepository->update(
            $request->userId()
            ,$request->content()
            ,$request->rawImage()
            ,$request->thumbnailImage()
        );
    }

}
