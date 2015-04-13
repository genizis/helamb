<?php

namespace CMS\BaseBundle\Services;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class Tools {
	public function uploadFile(UploadedFile $uploaded_file, $path, $rename = true)
	{
		if(!is_dir($path)){
			mkdir($path, 0777, true);
		}

		if($rename){
			$uploaded_file_info = pathinfo($uploaded_file->getClientOriginalName());
			$file_name = md5(uniqid()) . "." . $uploaded_file_info['extension'];
		}else{
			$file_name = $uploaded_file->getClientOriginalName();
		}

		$uploaded_file->move($path, $file_name);
		return $file_name;
	}

	public function resizeImage($file, $params, $crop = true){
		if(!is_dir($params['dist'])){
			mkdir($params['dist'], 0777, TRUE);
		}

		$src = $params['src'] . '/' . $file;
		$destino = $params['dist'] . '/' . $file;

		if(!file_exists($src)){
			return null;
		}

		$image = explode('.', $src);
		if(strtolower($image[count($image) - 1]) == 'jpg' || strtolower($image[count($image) - 1]) == 'jpeg'){
			$source_image = imagecreatefromjpeg($src);
		}elseif(strtolower($image[count($image) - 1]) == 'png') {
			$source_image = imagecreatefrompng($src);
		}

		$width = imagesx($source_image);
		$height = imagesy($source_image);
		$desired_height = floor($height * ($params['width'] / $width));
		$virtual_image = imagecreatetruecolor($params['width'], $desired_height);

		imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $params['width'], $desired_height, $width, $height);
		imagejpeg($virtual_image, $destino);
	}
}