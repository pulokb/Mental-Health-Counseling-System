<?php

namespace App\Helpers;

use Image;
use File;

class FileHelper
{
    /**
     * Upload image and handle different sizes (regular, avatar, big).
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $user
     * @return string|null
     */
    public static function uploadImage($request, $user = NULL)
    {
        $imageName = $user ? $user->image : ''; // Keep existing image name if no new image is uploaded

        if ($request->hasFile('image')) {
            // Check if the file is valid
            if (!$request->file('image')->isValid()) {
                \Log::error('Uploaded image is not valid.');
                return null; // Early exit if the image is not valid
            }

            // Delete the old image if a new one is uploaded
            if ($user && $user->image) {
                FileHelper::deleteImage($user);
            }

            // Handle new image upload
            $image = $request->file('image');
            $imageName = time() . uniqid() . '.' . $image->getClientOriginalExtension();

            // Save the image
            Image::make($image)->resize(570, 380)->save(public_path('images/' . $imageName), 50);

            \Log::info('New image saved: ' . $imageName);
        } else {
            \Log::warning('No image was uploaded.');
        }

        return $imageName;
    }

    /**
     * Delete the old images from the server.
     *
     * @param mixed $user
     * @return void
     */
    public static function deleteImage($user)
    {
        if ($user && $user->image) {
            $imagePaths = [
                public_path('images/' . $user->image),           // Regular image
            ];

            // Delete if the file exists
            foreach ($imagePaths as $path) {
                if (File::exists($path)) {
                    File::delete($path);
                    \Log::info('Deleted image: ' . $path);
                }
            }
        }
    }
}
