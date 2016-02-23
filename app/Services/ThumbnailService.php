<?php

namespace App\Services;

use App\Screenshot;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Filesystem\FilesystemManager;
use Intervention\Image\Exception\NotReadableException;
use Intervention\Image\ImageManager;

class ThumbnailService
{
    /**
     * @var ImageManager
     */
    private $imageManager;
    /**
     * @var FilesystemManager
     */
    private $storage;

    /**
     * ThumbnailService constructor.
     * @param ImageManager $imageManager
     * @param FilesystemManager $storage
     */
    public function __construct(ImageManager $imageManager, FilesystemManager $storage)
    {
        $this->imageManager = $imageManager;
        $this->storage = $storage;
    }

    public function create(Screenshot $screenshot, $width)
    {
        $thumbnailPath = config("sharp.thumbnail_relative_path");
        $sourceRelativeFilePath = $screenshot->getSharpFilePathFor("");

        $thumbName = "$thumbnailPath/screenshots/$width/"
            . preg_replace('/[^A-Za-z0-9\-_.]/', '_', basename($sourceRelativeFilePath));

        $thumbFile = public_path($thumbName);

        if (!file_exists($thumbFile)) {

            // Create thumbnail directories if needed
            if (!file_exists(dirname($thumbFile))) {
                mkdir(dirname($thumbFile), 0777, true);
            }

            try {
                $sourceFile = $this->storage->disk("local")->get("data/$sourceRelativeFilePath");

                $sourceImg = $this->imageManager->make($sourceFile);

                $sourceImg->resize($width, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $sourceImg->save($thumbFile);

            } catch(FileNotFoundException $ex) {
                return null;

            } catch(NotReadableException $ex) {
                return null;
            }
        }

        return url($thumbName);
    }
}