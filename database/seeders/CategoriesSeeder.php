<?php

namespace Database\Seeders;

use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * CategoriesSeeder constructor.
     *
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return void
     */
    public function run()
    {
        $this->categoryRepository->create([
            'name' => 'Cat 1',
            'slug' => Str::slug('Cat 1'),
            'order' => 1,
            'children' => [
                [
                    'name' => 'Cat 2',
                    'slug' => Str::slug('Cat 2'),
                    'order' => 2,
                ],
                [
                    'name' => 'Cat 3',
                    'slug' => Str::slug('Cat 3'),
                    'order' => 3,
                ],
                [
                    'name' => 'Cat 4',
                    'slug' => Str::slug('Cat 4'),
                    'order' => 4,
                    'children' => [
                        [
                            'name' => 'Cat 5',
                            'slug' => Str::slug('Cat 5'),
                            'order' => 5,
                        ],
                        [
                            'name' => 'Cat 6',
                            'slug' => Str::slug('Cat 6'),
                            'order' => 6,
                        ],
                    ]
                ],
            ],
        ]);
    }
}
