<?php

namespace App\Services;

use App\Http\Requests\ImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    public function store(ImageRequest $request): Image
    {
        $data = $request->validated();
        $file = $request->file('file');
        $filePath = Storage::disk('public')->put('images', $file);
        $data['file'] = $filePath;

        $image = Image::create($data);

        return $image;
    }

    public function update(UpdateImageRequest $request, Image $image): Image
    {
        $data = $request->validated();

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($image->file);

            $file = $request->file('file');
            $filePath = Storage::disk('public')->put('images', $file);
            $data['file'] = $filePath;
        }

        $image->update($data);

        return $image;
    }

    public function delete(Image $image): void
    {
        DB::transaction(function () use ($image) {
            Storage::disk('public')->delete($image->file);

            $image->delete();
        });
    }
}
