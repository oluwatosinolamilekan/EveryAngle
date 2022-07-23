<?php declare(strict_types=1);

namespace App\Actions\Category;

use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\DB;

class DeleteCategory
{
    /**
     * @throws Exception
     */
    public function action($id)
    {
        DB::beginTransaction();
        $category = Category::where('id',$id)->first();
        if($category){
            DB::commit();
            return $category->delete();
        }
        throw new Exception('Category does not exist');
    }
}
