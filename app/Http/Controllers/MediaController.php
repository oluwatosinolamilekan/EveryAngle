<?php

namespace App\Http\Controllers;

use App\Actions\Category\ViewCategory;
use App\Actions\Media\CreateMedia;
use App\Actions\Media\DeleteMedia;
use App\Actions\Media\ListMedia;
use App\Actions\Media\UpdateMedia;
use App\Http\Requests\storeMediaRequest;
use App\Http\Requests\UpdateMediaRequest;
use App\Http\Resources\MediaResource;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index()
    {
        $medias = (new ListMedia())->action();
        return MediaResource::collection($medias);
    }

    public function view($id)
    {
        $media = (new ViewCategory())->action($id);
        return new MediaResource($media);
    }

    public function create(StoreMediaRequest $request)
    {
        $media = (new CreateMedia())->action($request->validated());
        return new MediaResource($media);
    }

    public function update(UpdateMediaRequest $request,$id)
    {
        $media = (new UpdateMedia())->action($request->validated(), $id);
        return (new MediaResource($media))
            ->response()
            ->setStatusCode(204);
    }

    public function delete($id)
    {
        (new DeleteMedia())->action($id);
        return $this->resourceDeleted();
    }
}
