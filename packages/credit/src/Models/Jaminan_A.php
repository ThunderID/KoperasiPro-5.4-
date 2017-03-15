<?php

namespace Thunderlabid\Credit\Models;

use Thunderlabid\Credit\Models\Traits\GuidTrait;
use Thunderlabid\Credit\Models\Traits\AggregateTrait;

use Validator, Exception;

/**
 * Model Jaminan_A
 *
 * Digunakan untuk menyimpan data jaminan kredit.
 * Ketentuan : 
 * 	- auto generate id (guid)
 * 	- bisa raise event (eventraiser)
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class Jaminan_A extends BaseModel
{
	use GuidTrait;
	use AggregateTrait;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'jaminan';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'id'									,
											'kredit_id'						,
											'legalitas_kendaraan_id'			,
											'legalitas_tanah_bangunan_id'	,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'kredit_id'						=> 'max:255',
											'legalitas_kendaraan_id'			=> 'max:255',
											'legalitas_tanah_bangunan_id'	=> 'max:255',
										];
	/**
	 * Date will be returned as carbon
	 *
	 * @var array
	 */
	protected $dates				= ['created_at', 'updated_at', 'deleted_at'];

	/**
	 * data hidden
	 *
	 * @var array
	 */
	protected $hidden				= 	[
											'created_at', 
											'updated_at', 
											'deleted_at', 
										];

	/* ---------------------------------------------------------------------------- RELATIONSHIP ----------------------------------------------------------------------------*/

	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/

	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/

	/* ---------------------------------------------------------------------------- FUNCTIONS ----------------------------------------------------------------------------*/

	/**
	 * menambahkan jaminan kendaraan
	 * 
	 * @param Kredit $kredit
	 * @param array $value
	 * @return Jaminan_A $model
	 */
	public function tambahJaminanKendaraan(Kredit $kredit, $value)
	{
		//1. jaminan kendaraan max 2
		if($kredit->jaminankendaraan->count() > 2 )
		{
			throw new LimitException("Jaminan kendaraan max 2", 1);
		}

		//2. simpan jaminan
		//2a. simpan jaminan kendaraan
		$jaminan_kendaraan 		= LegalitasKendaraan_A::nomorbpkb($value['nomor_bpkb'])->first();
		if(!$jaminan_kendaraan)
		{
			$jaminan_kendaraan	= new LegalitasKendaraan_A;
		}

		$jaminan_kendaraan 		= $jaminan_kendaraan->setJaminan($this, $value);

		//2b. simpan jaminan
		$this->attributes['kredit_id']				= $kredit->id;
		$this->attributes['legalitas_kendaraan_id']	= $jaminan_kendaraan->id;

		$this->save();

		//3. it's a must to return value
		return $this;
	}

	/**
	 * menghapus jaminan kendaraan
	 * 
	 * @param Kredit $kredit
	 * @param string $value
	 * @return Jaminan_A $model
	 */
	public function hapusJaminanKendaraan(Kredit $kredit, $nomor_bpkb)
	{
		//1. jaminan hanya bisa dihapus ketika status pengajuan
		if(!in_array($kredit->status, ['pengajuan']))
		{
			throw new Exception("Hanya bisa menghapus jaminan dari kredit yang belum diajukan", 1);
		}

		//2. hapus jaminan
		//2a. hapus jaminan kendaraan
		$jaminan_kendaraan 		= LegalitasKendaraan_A::nomorbpkb($nomor_bpkb)->first();
		if(!$jaminan_kendaraan)
		{
			throw new Exception("Invalid nomor bpkb", 1);
		}

		$data 					=  Jaminan_A::where('kredit_id', $kredit->id)->where('legalitas_kendaraan_id', $jaminan_kendaraan->id)->first();

		if(!$data)
		{
			throw new Exception("Invalid kredit", 1);
		}

		$data->delete();

		//3. it's a must to return value
		return $data;
	}

	/**
	 * menghapus jaminan tanah dan bangunan
	 * 
	 * @param Kredit $kredit
	 * @param string $nomor_sertifikat
	 * @return Jaminan_A $model
	 */
	public function hapusJaminanTanahBangunan(Kredit $kredit, $nomor_sertifikat)
	{
		//1. jaminan hanya bisa dihapus ketika status pengajuan
		if(!in_array($kredit->status, ['pengajuan']))
		{
			throw new Exception("Hanya bisa menghapus jaminan dari kredit yang belum diajukan", 1);
		}

		//2. hapus jaminan
		//2a. hapus jaminan tanah dan bangunan
		$jaminan_t_bangunan 		= LegalitasTanahBangunan_A::nomorsertifikat($nomor_sertifikat)->first();
		if(!$jaminan_t_bangunan)
		{
			throw new Exception("Invalid nomor bpkb", 1);
		}

		$data 						= Jaminan_A::where('kredit_id', $kredit->id)->where('legalitas_tanah_bangunan_id', $jaminan_t_bangunan->id)->first();

		if(!$data)
		{
			throw new Exception("Invalid kredit", 1);
		}

		$data->delete();

		//3. it's a must to return nomor_sertifikat
		return $data;
	}

	/**
	 * menambahkan jaminan tanah dan bangunan
	 * 
	 * @param Kredit $kredit
	 * @param array $value
	 * @return Jaminan_A $model
	 */
	public function tambahJaminanTanahBangunan(Kredit $kredit, $value)
	{
		//1. jaminan tanahbangunan max 3
		if($kredit->jaminantanahbangunan->count() > 3 )
		{
			throw new LimitException("Jaminan tanah bangunan max 2", 1);
		}

		//2. simpan jaminan
		//2a. simpan jaminan tanahbangunan
		$jaminan_t_bangunan 		= LegalitasTanahBangunan_A::nomorsertifikat($value['nomor_sertifikat'])->first();
		if(!$jaminan_t_bangunan)
		{
			$jaminan_t_bangunan		= new LegalitasTanahBangunan_A;
		}

		$jaminan_t_bangunan 		= $jaminan_t_bangunan->setJaminan($this, $value);

		//2b. simpan jaminan
		$this->attributes['kredit_id']						= $kredit->id;
		$this->attributes['legalitas_tanah_bangunan_id']	= $jaminan_t_bangunan->id;

		$this->save();

		//3. it's a must to return value
		return $this;
	}

	/**
	 * boot
	 * observing model
	 *
	 */	
	public static function boot() 
	{
		parent::boot();
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/
}
