<?php declare(strict_types=1);

namespace App\Actions\Category;

use App\Models\Category;

class ViewCategory
{
    /**
     * @throws \Exception
     */
    public function action($id)
    {
        $category = Category::where('id',$id)->first();
        if($category){
            return $category;
        }
        throw new \Exception('Category does not exist');
    }
}
