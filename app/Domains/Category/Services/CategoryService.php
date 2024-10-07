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

    public function getAllCategory()
    {
        return $this->categoryRepository->findAll();
    }

    public function createCategory($createCategoryDto)
    {
        if (file_exists($createCategoryDto['image'])) {
            $createCategoryDto['image'] = $this->uploadImage($createCategoryDto['image'], 'category', ['width' => 300, 'height' => 300]);
        }
        return $this->categoryRepository->createCategory($createCategoryDto);
    }

    public function updateCategory($updateCategoryDto, Category $category)
    {
        if (file_exists($updateCategoryDto['image'])) {
            $updateCategoryDto['image'] = $this->uploadImage($updateCategoryDto['image'], 'category', ['width' => 300, 'height' => 300]);
        }

        return $this->categoryRepository->updateCategory($updateCategoryDto, $category);
    }

    public function deleteCategory(Category $category)
    {
        return $this->categoryRepository->deleteCategory($category);
    }

    public function changeStatusCategory($categoryId, $status)
    {
        return $this->categoryRepository->changeStatusCategory($categoryId, $status);
    }
}
