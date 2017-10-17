<?php 

namespace App\Http\Requests\Api\Contracts;

use Illuminate\Foundation\Http\FormRequest;

interface ProfileUpdateRequestinterface extends Request
{
    /**
     * ユーザーID.
     *
     * @return int
     */
    public function userId();

    /**
     * プロフィール内容.
     *
     * @return string
     */
    public function content();


    /**
     * プロフィール画像（元データ）.
     *
     * @return blob
     */
    public function rawImage();


    /**
     * プロフィール画像（サムネイル）.
     *
     * @return blob
     */
    public function thumbnailImage();
}
