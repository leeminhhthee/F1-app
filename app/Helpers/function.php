<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

if (!function_exists('upload_image'))
{
	/**
	 * @param $file [tên file trùng tên input]
	 * @param array $extend [ định dạng file có thể upload được]
	 * @return array|int [ tham số trả về là 1 mảng - nếu lỗi trả về int ]
	 */
	function upload_image($file , $folder = '',array $extend  = array() )
	{
		$code = 1;
		
		// lay duong dan anh
		$baseFilename = public_path() . '/uploads/' . $_FILES[$file]['name'];
		
		// thong tin file
		$info = new SplFileInfo($baseFilename);
		
		// duoi file
		$ext = strtolower($info->getExtension());
		
		// kiem tra dinh dang file
		if ( ! $extend )
		{
			$extend = ['png','jpg','jpeg','webp'];
		}
		
		if( !in_array($ext,$extend))
		{
			return $data['code'] = 0;
		}
		
		// Tên file mới
		$nameFile = trim(str_replace('.'.$ext,'',strtolower($info->getFilename())));
		$filename = date('Y-m-d__').str_slug($nameFile) . '.' . $ext;
		
		// thu muc goc de upload
		$path = public_path().'/uploads/'.date('Y/m/d/');
		if ($folder)
		{
			$path = public_path().'/uploads/'.$folder.'/'.date('Y/m/d/');
		}
		
		if ( !File::exists($path))
		{
			mkdir($path,0777,true);
		}
		
		// di chuyen file vao thu muc uploads
		move_uploaded_file($_FILES[$file]['tmp_name'], $path. $filename);
		
		$data = [
			'name'              => $filename,
			'code'              => $code,
			'path_img'          => 'uploads/'.$filename
		];
		
		return $data;
	}
}


if (!function_exists('pare_url_file')) {
	function pare_url_file($image,$folder = '')
	{
		if (!$image)
		{
			return'/images/no-image.jpg';
		}
		
		$explode = explode('__', $image);
		
		if (isset($explode[0])) {
			$time = str_replace('_', '/', $explode[0]);
			return 'uploads/'.$folder . date('Y/m/d', strtotime($time)) . '/' . $image;
		}
	}
}


if (!function_exists('get_data_user'))
{
	function get_data_user($type,$field = 'id')
	{
		return Auth::guard($type)->user() ? Auth::guard($type)->user()->$field : '';
	}
}