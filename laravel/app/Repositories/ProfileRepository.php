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
     * プロフィール初期化(レコード生成）
     *
     * @param int    $userId
     * @param string $userName
     *
     * @return \App\Entities\Profile
     */
    public function init($userId, $userName){
        $obj = $this->profile->newInstance();
        return $obj->updateOrCreate(
            ['user_id' => $userId ],
            [
                'content'          => null 
                ,'nickname'        => $userName 
                ,'raw_image'       => null // TODO 初期画像セット
                ,'thumbnail_image' => null // TODO 初期画像セット
                ,'mime_type'       => null // TODO 初期画像セット
            ]
        );
    }


    /**
     * プロフィール情報取得
     *
     * @param int    $userId
     *
     * @return \App\Entities\Profile
     */
    public function get($userId){
        $obj = $this->profile->newInstance();
        return  $obj->where('user_id', $userId)->first();
    }


    /**
     * プロフィール更新(レコードがなければ新規）
     *
     * @param int    $userId
     * @param string $nickname
     * @param string $content
     * @param blob   $rawImage
     * @param blob   $thumbnailImage
     * @param string $mimeType
     *
     * @return \App\Entities\Profile
     */
    public function update($userId,$nickname,$content,$rawImage,$thumbnailImage,$mimeType)
    {
        $obj = $this->profile->newInstance();
        return $obj->updateOrCreate(
            ['user_id' => $userId ],
            [
                'nickname'         => $nickname
                ,'content'         => $content
                ,'raw_image'       => $rawImage 
                ,'thumbnail_image' => $thumbnailImage 
                ,'mime_type'       => $mimeType 
            ]
        );
    }
}
