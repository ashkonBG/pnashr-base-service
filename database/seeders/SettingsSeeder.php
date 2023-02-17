<?php

namespace Database\Seeders;

use App\Repositories\Setting\SettingRepositoryInterface;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * @var SettingRepositoryInterface
     */
    private $settingRepository;

    /**
     * SettingsSeeder constructor.
     *
     * @param SettingRepositoryInterface $settingRepository
     */
    public function __construct(SettingRepositoryInterface $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    /**
     * @return void
     */
    public function run()
    {
        $this->settingRepository->create([
            'setting_key' => 'ios_version',
            'setting_value' => ['current_version' => 1, 'critical' => true],
        ]);

        $this->settingRepository->create([
            'setting_key' => 'android_version',
            'setting_value' => ['current_version' => 1, 'critical' => true],
        ]);
    }
}
