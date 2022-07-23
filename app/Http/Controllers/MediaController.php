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
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MediaController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $medias = (new ListMedia())->action();
        return MediaResource::collection($medias);
    }

    /**
     * @param $id
     * @return MediaResource
     * @throws Exception
     */
    public function view($id): MediaResource
    {
        $media = (new ViewCategory())->action($id);
        return new MediaResource($media);
    }

    /**
     * @param storeMediaRequest $request
     * @return MediaResource
     */
    public function create(StoreMediaRequest $request): MediaResource
    {
        $media = (new CreateMedia())->action($request->validated());
        return new MediaResource($media);
    }

    /**
     * @param UpdateMediaRequest $request
     * @param $id
     * @return JsonResponse|object
     * @throws Exception
     */
    public function update(UpdateMediaRequest $request, $id): JsonResponse
    {
        $media = (new UpdateMedia())->action($request->validated(), $id);
        return (new MediaResource($media))
            ->response()
            ->setStatusCode(204);
    }

    /**
     * @param $id
     * @return JsonResponse
     * @throws Exception
     */
    public function delete($id): JsonResponse
    {
        (new DeleteMedia())->action($id);
        return $this->resourceDeleted();
    }
}
