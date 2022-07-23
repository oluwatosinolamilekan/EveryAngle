<?php declare(strict_types=1);

namespace App\Actions\Media;

use App\Models\Media;

class ViewMedia
{
    public function action($id)
    {
        $media = Media::where('id',$id)->first();
        if($media){
            return $media;
        }
        throw new \Exception('Media does not exist');
    }
}
