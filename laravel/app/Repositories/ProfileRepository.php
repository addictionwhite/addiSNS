<?php 

namespace App\Repositories;

use App\Entities\Profile;
use App\Repositories\Contracts\ProfileRepositoryInterface;


class ProfileRepository implements ProfileRepositoryInterface
{
    protected $profile;

    public function __construct(Profile $profile)
    {
        $this->profile = $profile;
    }


    /**
     * プロフィール更新(レコードがなければ新規）
     *
     * @param int    $userId
     * @param string $content
     * @param blob   $rawImage
     * @param blob   $thumbnailImage
     *
     * @return \App\Entities\Profile
     */
    public function update($userId,$content,$rawImage,$thumbnailImage)
    {
        $obj = $this->profile->newInstance();
        return $obj->updateOrCreate(
            ['user_id' => $userId ],
            [
                'content'          => $content
                ,'raw_image'       => $rawImage 
                ,'thumbnail_image' => $thumbnailImage 
            ]
        );
    }
}
