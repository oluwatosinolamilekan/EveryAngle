<?php declare(strict_types=1);

namespace App\Actions\Category;

use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\DB;

class UpdateCategory
{
    /**
     * @throws Exception
     */
    public function action($attributes, $id)
    {
        $category = Category::where('id',$id)->first();
        if($category){
            $category->update($attributes);
            return $category->refresh();
        }
        throw new Exception('Category does not exist');
    }
}
