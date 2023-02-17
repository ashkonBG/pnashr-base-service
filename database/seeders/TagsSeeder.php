<?php

namespace Database\Seeders;

use App\Repositories\Tag\TagRepositoryInterface;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * @var TagRepositoryInterface
     */
    private $tagRepository;

    /**
     * TagsSeeder constructor.
     *
     * @param TagRepositoryInterface $tagRepository
     */
    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    /**
     * @return void
     */
    public function run()
    {
        $this->tagRepository->create([
            'name' => 'Tag test',
        ]);
    }
}
