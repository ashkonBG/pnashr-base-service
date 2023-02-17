<?php

namespace App\Repositories\Category;

use App\Models\Category;
use Kalnoy\Nestedset\Collection;

interface CategoryRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getRootCategories(): Collection;

    /**
     * @param string $category
     *
     * @return Collection|null
     */
    public function getCategoryChildren(string $category): ?Collection;

    /**
     * @param string $category
     *
     * @return Category|null
     */
    public function findCategoryParent(string $category): ?Category;

    /**
     * @param string $category
     *
     * @return Collection|null
     */
    public function getCategoryDescendants(string $category): ?Collection;

    /**
     * @param string $category
     *
     * @return Collection|null
     */
    public function getCategoryAncestors(string $category): ?Collection;
}
