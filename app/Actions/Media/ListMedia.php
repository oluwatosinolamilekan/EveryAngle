<?php declare(strict_types=1);

namespace App\Actions\Media;

use App\Models\Media;

class ListMedia
{
    public function action()
    {
        return Media::paginate(10);
    }
}
