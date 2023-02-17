<?php

namespace Database\Seeders;

use App\Repositories\Admin\AdminRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsSeeder extends Seeder
{
    /**
     * @var AdminRepositoryInterface
     */
    private $adminRepository;

    /**
     * AdminsSeeder constructor.
     *
     * @param AdminRepositoryInterface $adminRepository
     */
    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    /**
     * @return void
     */
    public function run()
    {
        $this->adminRepository->create([
            'first_name' => 'test',
            'last_name' => 'testing',
            'email' => 'mail@test.com',
            'email_verified_at' => Carbon::now()->toDateString(),
            'phone_number' => 9121234567,
            'password' => Hash::make('12345678'),
            'status' => 1,
        ]);
    }
}
