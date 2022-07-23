<?php declare(strict_types=1);

namespace App\Actions\Category;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CreateCategory
{
    public function action($attributes)
    {
        DB::beginTransaction();
        $category = Category::create($attributes);
        DB::commit();
        return $category;
    }
}
