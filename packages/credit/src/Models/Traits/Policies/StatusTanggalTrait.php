<?php 

namespace Thunderlabid\Credit\Models\Traits\Policies;

use Thunderlabid\Credit\Models\Traits\Policies\Scopes\TampilkanSemuaScope;
use Thunderlabid\Credit\Models\Traits\Policies\Scopes\TanggalPengajuanScope;

/**
 * Apply scope to get current date
 *
 * @author cmooy
 */
trait StatusTanggalTrait 
{
    /**
     * Boot the scope tanggal pengajuan
     *
     * @return void
     */
    public static function bootStatusTanggalTrait()
    {
        static::addGlobalScope(new TampilkanSemuaScope);
        static::addGlobalScope(new TanggalPengajuanScope);
    }

	/**
	 * formatting pengajuan created_at menjadi tanggal pengajuan
	 *
	 * @return string $value ["d/m/Y"]
	 */	
	protected function getTanggalPengajuanAttribute()
	{
		return $this->formatDateTo($this->attributes['tanggal_pengajuan']);
	}
}