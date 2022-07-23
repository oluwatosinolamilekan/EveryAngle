<?php

namespace App\Http\Controllers;

use App\Actions\Category\CreateCategory;
use App\Actions\Category\DeleteCategory;
use App\Actions\Category\ListCategory;
use App\Actions\Category\UpdateCategory;
use App\Actions\Category\ViewCategory;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResources;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * @return JsonResponse|AnonymousResourceCollection
     */
    public function index()
    {
        try {
            $categories = (new ListCategory())->action();
            return CategoryResources::collection($categories);
        }catch (Exception $exception){
            return $this->resourceError($exception->getMessage());
        }
    }

    public function view($id)
    {
        try {
            $category = (new ViewCategory())->action($id);
            return new CategoryResources($category);
        }catch (Exception $exception){
            return $this->resourceError($exception->getMessage());
        }
    }

    public function create(StoreCategoryRequest  $request)
    {
        try {
            $category = (new CreateCategory())->action($request->validated());
            return new CategoryResources($category);
        }catch (Exception $exception){
            return $this->resourceError($exception->getMessage());
        }
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        try {
            $category = (new UpdateCategory())->action($request->validated(), $id);
            return (new CategoryResources($category))
                ->response()
                ->setStatusCode(204);
        }catch (Exception $exception){
            return $this->resourceError($exception->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            (new DeleteCategory())->action($id);
           return $this->resourceDeleted();
        }catch (Exception $exception){
            return $this->resourceError($exception->getMessage());
        }
    }
}
