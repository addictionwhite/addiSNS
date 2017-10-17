<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\ProfileService;
use App\Http\Requests\Api\ProfileUpdateRequest;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public $service;

    public function __construct(ProfileService $service)
    {
        $this->service = $service;
    }

    /**
     * プロフィール編集.
     *
     * @param \App\Http\Requests\Api\ProfileUpdateRequest $request
     *
     * @return 
     */
    public function update(ProfileUpdateRequest $request)
    {
        try {
            $this->service->update($request);
        } catch (\Exception $e) {
            // TODO ログ処理検討
            Log::error($e->getMessage());
            return response()->json(['status' => 'failure']);
        }
        return response()->json(['status' => 'success']);
    }
}
