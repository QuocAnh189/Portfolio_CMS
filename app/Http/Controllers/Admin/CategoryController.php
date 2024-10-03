<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\CategoryDataTable;
use App\Domains\Category\Dto\CreateCategoryDto;
use App\Domains\Category\Dto\UpdateCategoryDto;
use App\Domains\Category\Models\Category;
use App\Domains\Category\Services\CategoryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryRequest;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.category.index');
        // $category = Category::withTrashed()->first();
        // $category->restore();
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
    public function store(CreateCategoryRequest $request)
    {
        try {
            $createCategoryDto = CreateCategoryDto::fromAppRequest($request);
            $createdCategory = $this->categoryService->createCategory($createCategoryDto);

            if ($createdCategory) {
                flash()->option('position', 'top-center')->success('Create category successfully.');
            }

            return redirect()->route('admin.categories.index');
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());
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
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            $updateCategoryDto = UpdateCategoryDto::fromAppRequest($request, $category);

            $updatedCategory = $this->categoryService->updateCategory($updateCategoryDto, $category);

            if ($updatedCategory) {
                flash()->option('position', 'top-center')->success('Update category successfully.');
            }

            return redirect()->route('admin.categories.index');
        } catch (\Exception $e) {
            flash()->option('position', 'top-center')->error($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $this->categoryService->deleteCategory($category);

        return response(['status' => 'success', 'Deleted Successfully!']);
    }

    public function change_status(Request $request)
    {
        // dd($request->all());
        $this->categoryService->changeStatusCategory($request->id, $request->status);
        // $category = Category::findOrFail($request->id);
        // $category->status = $request->status === 'true' ? 'active' : 'inactive';
        // $category->save();

        return response(['message' => 'status has been updated!']);
    }
}
