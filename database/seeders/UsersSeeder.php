<?php

namespace Database\Seeders;

use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * UsersSeeder constructor.
     *
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return void
     */
    public function run()
    {
        $this->userRepository->create([
            'first_name' => 'test',
            'last_name' => 'testing',
            'phone_number' => '989121234567',
            'status' => 1,
            'device_limit' => 3,
        ]);
    }
}
