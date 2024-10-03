<?php

namespace App\Domains\Category\Repositories;

use App\Domains\Category\Models\Category;

class CategoryRepository
{
    public function __construct()
    {
        //
    }

    public function createCategory($createCategoryDto): Category
    {
        return Category::create($createCategoryDto);
    }

    public function updateCategory($createCategoryDto, Category $category)
    {
        return $category->update($createCategoryDto);
    }

    public function deleteCategory(Category $category)
    {
        return $category->delete();
    }

    public function changeStatusCategory($categoryId, $status)
    {
        $category = Category::findOrFail($categoryId);
        $category->status = $status === 'true' ? 'active' : 'inactive';

        return $category->save();
    }
}
