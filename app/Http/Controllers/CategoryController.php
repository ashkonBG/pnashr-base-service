<?php

namespace App\Http\Controllers;

use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * CategoryController constructor.
     *
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Get all root categories
     *
     * @return JsonResponse
     */
    public function roots()
    {
        return response()->json($this->categoryRepository->getRootCategories());
    }

    /**
     * Get direct children by category slug
     *
     * @param string $category
     *
     * @return JsonResponse
     */
    public function children(string $category)
    {
        return response()->json($this->categoryRepository->getCategoryChildren($category));
    }

    /**
     * Get direct parent by category slug
     *
     * @param string $category
     *
     * @return JsonResponse
     */
    public function parent(string $category)
    {
        return response()->json($this->categoryRepository->findCategoryParent($category));
    }

    /**
     * Get descendants by category slug
     *
     * @param string $category
     *
     * @return JsonResponse
     */
    public function descendants(string $category)
    {
        return response()->json($this->categoryRepository->getCategoryDescendants($category));
    }

    /**
     * Get ancestors by category slug
     *
     * @param string $category
     *
     * @return JsonResponse
     */
    public function ancestors(string $category)
    {
        return response()->json($this->categoryRepository->getCategoryAncestors($category));
    }
}
