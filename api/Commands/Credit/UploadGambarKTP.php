<?php

namespace Thunderlabid\API\Commands\Credit;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

use Thunderlabid\Credit\Models\Kredit;

use Exception, Validator, TAuth, Storage;
use Carbon\Carbon;

class UploadGambarKTP
{
	protected $nomor_kredit;
	protected $file;

	/**
	 * Create a new job instance.
	 *
	 * @param  $file
	 * @return void
	 */
	public function __construct(string $nomor_kredit, UploadedFile $file)
	{
		$this->nomor_kredit     = $nomor_kredit;
		$this->file     		= $file;
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
			
			$date 		= Carbon::now();
			$fn 		= 'ktp-'.Str::slug(microtime()).'.'.$this->file->getClientOriginalExtension(); 

      		$dp 		= $date->format('Y/m/d');

      		$this->file->move(public_path().'/'.$dp, $fn); // uploading file to given path
			
			// Storage::disk('local')->put($fn, $this->file);

			$kredit = Kredit::nomorkredit($this->nomor_kredit)->firstorfail();
			$kredit->setKreditur(['foto_ktp' => url('/'.$dp.'/'.$fn), 'is_ektp' => true]);
			$kredit->save();

			return $kredit->toArray();
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}
}