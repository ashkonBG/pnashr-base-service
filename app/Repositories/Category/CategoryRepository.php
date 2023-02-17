<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\BaseRepository;
use Kalnoy\Nestedset\Collection;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    /**
     * CategoryRepository constructor.
     *
     * @param Category $model
     */
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    /**
     * @inheritDoc
     */
    public function getRootCategories(): Collection
    {
        return $this->model->whereIsRoot()->get();
    }

    /**
     * @inheritDoc
     */
    public function getCategoryChildren(string $category): ?Collection
    {
        return $this->model->with('children')
            ->where('slug', $category)
            ->firstOrFail()
            ->children;
    }

    /**
     * @inheritDoc
     */
    public function findCategoryParent(string $category): ?Category
    {
        return $this->model->with('parent')
            ->where('slug', $category)
            ->firstOrFail()
            ->parent;
    }

    /**
     * @inheritDoc
     */
    public function getCategoryDescendants(string $category): ?Collection
    {
        return $this->model->with('descendants')
            ->where('slug', $category)
            ->firstOrFail()
            ->descendants->toTree();
    }

    /**
     * @inheritDoc
     */
    public function getCategoryAncestors(string $category): ?Collection
    {
        return $this->model->with('ancestors')
            ->where('slug', $category)
            ->firstOrFail()
            ->ancestors->toTree();
    }
}
