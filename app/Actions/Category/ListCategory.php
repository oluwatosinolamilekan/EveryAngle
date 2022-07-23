<?php declare(strict_types=1);

namespace App\Actions\Category;

use App\Models\Category;

class ListCategory
{
    public function action()
    {
        return Category::paginate(10);
    }
}
