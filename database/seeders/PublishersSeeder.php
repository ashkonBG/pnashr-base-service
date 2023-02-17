<?php

namespace Database\Seeders;

use App\Repositories\Publisher\PublisherRepositoryInterface;
use Illuminate\Database\Seeder;

class PublishersSeeder extends Seeder
{
    /**
     * @var PublisherRepositoryInterface
     */
    private $publisherRepository;

    /**
     * PublishersSeeder constructor.
     *
     * @param PublisherRepositoryInterface $publisherRepository
     */
    public function __construct(PublisherRepositoryInterface $publisherRepository)
    {
        $this->publisherRepository = $publisherRepository;
    }

    /**
     * @return void
     */
    public function run()
    {
        $this->publisherRepository->create([
            'name' => 'Publisher test',
        ]);
    }
}
