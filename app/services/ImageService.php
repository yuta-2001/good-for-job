<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use InterventionImage;


class ImageService {
	
	public static function upload ($imageFile) {

		$resizedImage = InterventionImage::make($imageFile)->resize(1920,1080)->encode();
		$fileName = uniqid(rand().'_');
		$extension = $imageFile->extension();
		$fileNameToStore = $fileName. '.' .$extension;

		Storage::put('public/' . $fileNameToStore, $resizedImage);

		return $fileNameToStore;
	}

}