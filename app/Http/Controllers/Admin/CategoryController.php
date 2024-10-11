<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\Category\CategoryDataTable;
use App\DataTables\Admin\Category\TrashCategoryDataTable;
use App\Domains\Category\Dto\CreateCategoryDto;
use App\Domains\Category\Dto\UpdateCategoryDto;
use App\Domains\Category\Models\Category;
use App\Domains\Category\Services\CategoryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Requests\ChangeStatusRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.category.index');
    }

    public function trash_index(TrashCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.category.trash');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryService $categoryService, CreateCategoryRequest $request)
    {
        try {
            $createCategoryDto = CreateCategoryDto::fromAppRequest($request);
            $createdCategory = $categoryService->createCategory($createCategoryDto);

            if ($createdCategory) {
                flash()->success('Create category successfully.');
            }

            return redirect()->route('admin.categories.index');
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryService $categoryService, UpdateCategoryRequest $request, Category $category)
    {
        try {
            $updateCategoryDto = UpdateCategoryDto::fromAppRequest($request, $category);

            $updatedCategory = $categoryService->updateCategory($updateCategoryDto, $category);

            if ($updatedCategory) {
                flash()->success('Update category successfully.');
            }

            return redirect()->route('admin.categories.index');
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryService $categoryService, Category $category)
    {
        try {
            $categoryService->deleteCategory($category);

            return response(['status' => 'success', 'Deleted Successfully!']);
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }


    public function restore(CategoryService $categoryService, Category $category)
    {
        try {
            $restoredCategory = $categoryService->restoreCategory($category);

            if ($restoredCategory) {
                flash()->success('Restore successfully.');
            }

            return redirect()->route('admin.category.trash-index');
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }

    public function delete(CategoryService $categoryService, Category $category)
    {
        try {
            $categoryService->removeCategory($category);

            return response(['status' => 'success', 'Deleted Successfully!']);
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }


    public function change_status(CategoryService $categoryService, ChangeStatusRequest $request)
    {
        try {
            $categoryService->changeStatusCategory($request->id, $request->status);

            return response(['message' => 'status has been updated!']);
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }
}
