<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Http\Resources\ImageCollection;
use App\Http\Resources\ImageResource;
use App\Models\Image;
use App\Services\ImageService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    private $service;

    public function __construct(ImageService $imageService)
    {
        $this->service = $imageService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Image::orderByDesc('id')->paginate(5);

        return new ImageCollection($images);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ImageRequest $request)
    {
        $image = $this->service->store($request);

        return new ImageResource($image);
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        return new ImageResource($image);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateImageRequest $request, Image $image)
    {
        $image = $this->service->update($request, $image);

        return new ImageResource($image);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        $this->service->delete($image);

        return response()->json([
            'message' => 'Image deleted!'
        ]);
    }
}
