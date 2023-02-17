<?php

namespace Database\Seeders;

use App\Repositories\Creator\CreatorRepositoryInterface;
use Illuminate\Database\Seeder;

class CreatorsSeeder extends Seeder
{
    /**
     * @var CreatorRepositoryInterface
     */
    private $creatorRepository;

    /**
     * CreatorsSeeder constructor.
     *
     * @param CreatorRepositoryInterface $creatorRepository
     */
    public function __construct(CreatorRepositoryInterface $creatorRepository)
    {
        $this->creatorRepository = $creatorRepository;
    }

    /**
     * @return void
     */
    public function run()
    {
        $this->creatorRepository->createMany([[
            'name' => 'Creator test'
        ]]);
    }
}
