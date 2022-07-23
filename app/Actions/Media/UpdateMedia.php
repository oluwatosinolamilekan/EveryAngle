<?php declare(strict_types=1);

namespace App\Actions\Media;

use App\Models\Media;
use Exception;
use Illuminate\Support\Facades\DB;

class UpdateMedia
{
    public function action($attributes, $id)
    {
        DB::beginTransaction();
        $media = Media::where('id', $id)->first();
        if($media){
            $media->update($attributes);
            return $media->refresh();
        }
        throw new Exception('Media does not exist');
    }
}
