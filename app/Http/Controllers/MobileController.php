<?php

namespace App\Http\Controllers;

use App\Repositories\Setting\SettingRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MobileController extends Controller
{
    /**
     * @var SettingRepositoryInterface
     */
    private $settingRepository;

    /**
     * MobileController constructor.
     *
     * @param SettingRepositoryInterface $settingRepository
     */
    public function __construct(SettingRepositoryInterface $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function checkForUpdate(Request $request)
    {
        $platformType = $request->get('type') . '_version';

        $setting = $this->settingRepository->findByPlatformType($platformType);

        return response()->json([
            'latest_version' => $setting->setting_value['current_version'],
            'critical' => $setting->setting_value['critical']
        ]);
    }
}
