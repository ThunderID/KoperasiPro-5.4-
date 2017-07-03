<?php

namespace App\Service\Helpers\UI;

use Exception, DB;

use App\Domain\Akses\Models\Koperasi;
use App\Domain\HR\Models\Orang;

use App\Service\Pengaturan\GrantVisa;

class UploadKaryawan
{
	protected $file;
	protected $attributes;

	/**
	 * Create a new job instance.
	 *
	 * @param  $file
	 * @return void
	 */
	public function __construct($file)
	{
		$this->file     = $file;
	}

	/**
	 * Execute the job.
	 *
	 * @return void
	 */
	public function save()
	{
		try
		{

			DB::begintransaction();

			$header			= null;
			while (($data = fgetcsv($this->file, 500, ",")) !== FALSE) 
			{

				if ($header === null) 
				{
					$header = $data;
					continue;
				}
			
				$all_row 	= array_combine($header, $data);

				$koperasi 				= Koperasi::where('kode', $all_row['kode_kantor'])->firstorfail();
				$scopes 				= $this->scopesGenerator($all_row['jabatan']);

				$orang 					= new Orang;
				$attributes['nama']		= $all_row['nama'];
				if(isset($all_row['nip']) && !is_null($all_row['nip']))
				{
					$orang 				= Orang::where('nip', $all_row['nip'])->first();

					if(!$orang)
					{
						$orang 			= new Orang;
						$attributes['nip']		= $all_row['nip'];
						$attributes['password']	= $all_row['nip'];
					}
				}
				else
				{
					$attributes['nip']		= $this->nipGenerator($all_row['tahun']);
					$attributes['password']	= $attributes['nip'];
				}
				$orang->fill($attributes);
				$orang->save();

				//grant visa
				$grant_visa 	= new GrantVisa($orang->id, $all_row['jabatan'], $scopes, $koperasi['id']);
				$grant_visa->save();

				$this->attributes[]		= $attributes;
				
			}

			DB::commit();

			return $this->attributes;
		}
		catch(Exception $e)
		{
			DB::rollback();

			throw $e;
		}
	}

	private function nipGenerator($tahun)
	{
		$orang 	 	= Orang::where('nip', 'like', $tahun.'%')->orderby('nip', 'desc')->first();
	
		if($orang)
		{
			$last_letter 	= explode('.', $orang['nip']);
			$last_letter 	= ((int)$last_letter[1] * 1) + 1;
		}
		else
		{
			$last_letter 	= 1;
		}

		$last_letter 	= str_pad($last_letter, 4, '0', STR_PAD_LEFT);

		return $tahun.'.'.$last_letter;
	} 

	private function scopesGenerator($jabatan)
	{
		$jabatan 		= strtolower(str_replace(' ', '_', $jabatan));
		switch ($jabatan) 
		{
			case 'pimpinan':
				$scopes 	= [
								[
									'list'		=> 'modifikasi_koperasi',
								],
								[
									'list'		=> 'pengajuan_kredit',
								],
								[
									'list'		=> 'survei_kredit',
								],
								[
									'list'		=> 'setujui_kredit',
								],
								[
									'list'		=> 'realisasi_kredit',
								],
								[
									'list'		=> 'kas_harian',
								],
								[
									'list'		=> 'transaksi_harian',
								],
								[
									'list'		=> 'atur_akses',
								],
							];
				break;
			case 'kabag_kredit':
				$scopes 	= [
								[
									'list'		=> 'pengajuan_kredit',
								],
								[
									'list'		=> 'survei_kredit',
								],
								[
									'list'		=> 'realisasi_kredit',
								],
							];
				break;
			case 'kabag_marketing':
				$scopes 	= [
								[
									'list'		=> 'pengajuan_kredit',
								],
							];
				break;			
			case 'kabag_kolektor':
				$scopes 	= [
								[
									'list'		=> 'pengajuan_kredit',
								],
							];
				break;
			case 'kabag_operasional':
				$scopes 	= [
								[
									'list'		=> 'modifikasi_koperasi',
								],
								[
									'list'		=> 'pengajuan_kredit',
								],
								[
									'list'		=> 'atur_akses',
								],
							];
				break;
			case 'analis_kredit':
				$scopes 	= [
								[
									'list'		=> 'pengajuan_kredit',
								],
								[
									'list'		=> 'survei_kredit',
								],
							];
				break;
			case 'marketing':
				$scopes 	= [
								[
									'list'		=> 'pengajuan_kredit',
								],
							];
				break;
			case 'kolektor':
				$scopes 	= [
								[
									'list'		=> 'pengajuan_kredit',
								],
							];
				break;
			case 'accounting_dan_tabungan':
				$scopes 	= [
								[
									'list'		=> 'pengajuan_kredit',
								],
								[
									'list'		=> 'kas_harian',
								],
								[
									'list'		=> 'transaksi_harian',
								],
							];
				break;
			case 'admin_kredit':
				$scopes 	= [
								[
									'list'		=> 'pengajuan_kredit',
								],
								[
									'list'		=> 'survei_kredit',
								],
								[
									'list'		=> 'realisasi_kredit',
								],

							];
				break;
			case 'admin_angsuran':
				$scopes 	= [
								[
									'list'		=> 'pengajuan_kredit',
								],
							];
				break;
			case 'admin_collect':
				$scopes 	= [
								[
									'list'		=> 'pengajuan_kredit',
								],
							];
				break;
			case 'teller':
				$scopes 	= [
								[
									'list'		=> 'pengajuan_kredit',
								],
								[
									'list'		=> 'kas_harian',
								],
								[
									'list'		=> 'transaksi_harian',
								],
							];
				break;
			case 'bagian_umum':
				$scopes 	= [
								[
									'list'		=> 'pengajuan_kredit',
								],
							];
				break;
			default:
				throw new Exception("Jabatan belum terdaftar", 1);
				break;
		}

		return $scopes;
	}
}