<?php

namespace App\Actions\Media;

use App\Models\Media;
use Exception;

class ListMediaCategory
{
    public function action($categoryId)
    {
        return Media::where('category_id',$categoryId)->paginate(10);
    }
}
