<?php

namespace Database\Seeders;

use App\Enums\ProductCreatorRoleEnum;
use App\Enums\ProductTypeEnum;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * ProductsSeeder constructor.
     *
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @return void
     */
    public function run()
    {
        $this->productRepository->createWithRelations([
            'admin_id' => 1,
            'type' => ProductTypeEnum::BOOK(),
            'title' => 'Product test',
            'publisher_id' => 1,
            'price' => 0,
            'description' => 'Some sample text',
            'ISBN' => '12345',
            'printing_number' => '123',
            'edition_number' => '123',
            'status' => 1,
        ], [1], [1 => ['role' => ProductCreatorRoleEnum::AUTHOR()]], [1]);
    }
}
