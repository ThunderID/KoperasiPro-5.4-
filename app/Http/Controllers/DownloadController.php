<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use TAuth, App;

class DownloadController extends Controller
{
	// Construct
    public function __construct()
    {
        parent::__construct();
    }

	/**
	 * lihat index
	 *
	 * @return Response
	 */
	public function download($filename)
	{
		// is filename null
		if($filename == null){
	    	// return document error page
			return App::abort(404, 'File tidak dikenali');
		}

		// is file exist
	    if(!file_exists( public_path() . '/documents/' . $filename)) {
	    	// return document error page
			return App::abort(404, 'File yang Anda minta tidak lagi tersedia. Silahkan hubungi Admin.');
	    }  

	    // return download file
	    return response()->download(public_path() . '/documents/' . $filename);
	}
}