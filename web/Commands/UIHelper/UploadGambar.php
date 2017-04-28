<?php

namespace TCommands\UIHelper;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

use Exception, Validator, TAuth, Storage;
use Carbon\Carbon;

class UploadGambar
{
	protected $file;

	/**
	 * Create a new job instance.
	 *
	 * @param  $file
	 * @return void
	 */
	public function __construct(UploadedFile $file)
	{
		$this->file     = $file;
	}

	/**
	 * Execute the job.
	 *
	 * @return void
	 */
	public function handle()
	{
		try
		{
  			$rules 		= ['image' => 'image|mimes:jpeg,bmp,png|max:5000']; 
  			//mimes:jpeg,bmp,png and for max size max:10000

  			//1. validate file
  			$validator	= Validator::make(['image' => $this->file], $rules);

  			if(!$validator->passes())
  			{
				throw new Exception($validator->messages()->toJson(), 1);
  			}
			
			$fn 		= 'ktp-'.Str::slug(microtime()).'.'.$this->file->getClientOriginalExtension(); 

			$date 		= Carbon::now();
			$dp 		= $date->format('Y/m/d');

      		$this->file->move(public_path().'/'.$dp, $fn); // uploading file to given path
			
			// Storage::disk('local')->put($fn, $this->file);

			return ['url' => url('/'.$dp.'/'.$fn)];
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}
}