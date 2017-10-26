<?php 

namespace App\Http\Requests\Api;

class ProfileUpdateRequest extends Request
{

    /**
     * ニックネーム.
     *
     * @return string
     */
    public function nickname()
    {
        return $this->input('nickname');
    }


    /**
     * プロフィール内容.
     *
     * @return string
     */
    public function content()
    {
        return $this->input('content');
    }


    /**
     * プロフィール画像（元データ）.
     *
     * @return blob
     */
    public function rawImage()
    {
        return $this->input('raw_image');
    }


    /**
     * プロフィール画像（サムネイル）.
     *
     * @return blob
     */
    public function thumbnailImage()
    {
        return $this->input('thumbnail_image');
    }


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'content'         => 'nullable|string|max:255',
            'raw_image'       => 'nullable',
            // TODO boolなのでカスタムバリデーションでチェックする必要あり
            //'thumbnail_image' => 'nullable|image|mimes:jpg,png|size:5000',
        ];
    }

}
