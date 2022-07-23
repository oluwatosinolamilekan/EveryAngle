<?php declare(strict_types=1);


namespace App\Actions\Media;

use App\Models\Media;
use Illuminate\Support\Facades\DB;

class CreateMedia
{
    /**
     * @param $attributes
     * @return Media
     */
    public function action($attributes): Media
    {
        DB::beginTransaction();
        $media = Media::create($attributes);
        DB::commit();
        return $media;
    }
}
