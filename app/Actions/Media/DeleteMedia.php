<?php declare(strict_types=1);

namespace App\Actions\Media;

use App\Models\Media;
use Exception;
use Illuminate\Support\Facades\DB;

class DeleteMedia
{
    public function action($id)
    {
        DB::beginTransaction();
        $media = Media::where('id',$id)->first();
        if($media){
            DB::commit();
            return $media->delete();
        }
        throw new Exception('Category does not exist');
    }
}
