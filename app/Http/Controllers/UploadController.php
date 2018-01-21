<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;

class UploadController extends Controller {

	public function upload(){

		if(Input::hasFile('file')){

			
			$file = Input::file('file');
			

			$filename = $file->getClientOriginalName();
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			$allowed = array('pdf');
			if( ! in_array( $ext, $allowed ) ) {
				echo 'File format error: Only support pdf format.';
			}
			else{
				// echo '<img src= "uploads/'.$file->getClientOriginalName().'"/>';
				echo '<iframe src= "uploads/'.$file->getClientOriginalName().'" width="100%" style="height:100%"></iframe>';
				$file->move('uploads', $file->getClientOriginalName());
				echo 'Uploaded';
			}
			
		}

	}
}