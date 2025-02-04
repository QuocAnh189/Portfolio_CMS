<?php

namespace App\Domains\Category\Services;

use App\Domains\Category\Models\Category;
use App\Domains\Category\Repositories\CategoryRepository;
use App\Models\Traits\UploadImage;

class CategoryService
{
    use UploadImage;
    private CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function countAllCategory()
    {
        return $this->categoryRepository->countAll();
    }

    public function getAllCategory()
    {
        return $this->categoryRepository->findAll();
    }

    public function createCategory($createCategoryDto)
    {
        if (file_exists($createCategoryDto['image'])) {
            $createCategoryDto['image'] = $this->uploadImage($createCategoryDto['image'], 'category', ['width' => 300, 'height' => 300]);
        }
        return $this->categoryRepository->create($createCategoryDto);
    }

    public function updateCategory($updateCategoryDto, Category $category)
    {
        if (file_exists($updateCategoryDto['image'])) {
            $updateCategoryDto['image'] = $this->uploadImage($updateCategoryDto['image'], 'category', ['width' => 300, 'height' => 300]);
        }

        return $this->categoryRepository->update($category->id, $updateCategoryDto);
    }

    public function deleteCategory(Category $category)
    {
        return $this->categoryRepository->delete($category->id);
    }

    public function restoreCategory(Category $category)
    {
        return $this->categoryRepository->restore($category);
    }
    public function removeCategory(Category $category)
    {
        return $this->categoryRepository->forceDelete($category);
    }

    public function changeStatusCategory($categoryId, $status)
    {
        return $this->categoryRepository->changeStatus($categoryId, $status);
    }
}
