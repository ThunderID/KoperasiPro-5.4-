<?php

namespace Thunderlabid\Web\Commands\Credit;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Thunderlabid\Credit\Models\Kredit;

use Exception, DB, TAuth, Carbon\Carbon;

class UpdateKreditur implements ShouldQueue
{
	use InteractsWithQueue, Queueable, SerializesModels;

	protected $id_kredit;
	protected $kreditur;

	/**
	 * Create a new job instance.
	 *
	 * @param  $kreditur
	 * @return void
	 */
	public function __construct($id_kredit, $kreditur)
	{
		$this->id_kredit	= $id_kredit;
		$this->kredit		= $kreditur;
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
			$kredit 			= Kredit::findorfail($this->id_kredit);

			DB::BeginTransaction();

			if(isset($this->kreditur['relasi'])))
			{
				$kredit->kreditur->tambahRelasi($this->kreditur['relasi']);
			}

			if(isset($this->kreditur['telepon'])))
			{
				$kredit->kreditur->setTelepon($this->kreditur['telepon']);
			}

			if(isset($this->kreditur['pekerjaan'])))
			{
				$kredit->kreditur->setPekerjaan($this->kreditur['pekerjaan']);
			}

			if(isset($this->kreditur['penghasilan_bersih'])))
			{
				$kredit->kreditur->setPenghasilanBersih($this->kreditur['penghasilan_bersih']);
			}

			if(isset($this->kreditur['foto_ktp'])))
			{
				$kredit->kreditur->setFotoKTP($this->kreditur['foto_ktp']);
			}

			if(isset($this->kreditur['alamat'])))
			{
				$kredit->kreditur->tambahAlamatRumah($this->kreditur['alamat']);
			}

			$kredit->kreditur->save();

			DB::commit();

			return true;
		}
		catch(Exception $e)
		{
			DB::rollback();
			throw $e;
		}
	}
}