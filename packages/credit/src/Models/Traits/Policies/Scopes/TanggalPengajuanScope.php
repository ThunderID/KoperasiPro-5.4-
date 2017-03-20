<?php 

namespace Thunderlabid\Credit\Models\Traits\Policies\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * to define user role
 *
 * @return Stocks
 * @author cmooy
 */
class TanggalPengajuanScope implements Scope  
{
	/**
	 * Apply the scope to a given Eloquent query builder.
	 *
	 * @param  \Illuminate\Database\Eloquent\Builder  $builder
	 * @param  \Illuminate\Database\Eloquent\Model  $model
	 * @return void
	 */
	public function apply(Builder $builder, Model $model)
	{
		$builder
				->selectraw('status.tanggal as tanggal_pengajuan')
				->join('status', function ($join) 
				{
					$join->on ( 'status.kredit_id', '=', 'kredit.id' )
					->where('status.status', '=', 'pengajuan')
					->wherenull('status.deleted_at')
					->orderby('status.created_at')
					;
				})
				// ->groupby('kredit.id')
				->orderby('status.tanggal')
				;
	}

	/**
	 * Remove the scope from the given Eloquent query builder.
	 *
	 * @param  \Illuminate\Database\Eloquent\Builder  $builder
	 * @param  \Illuminate\Database\Eloquent\Model  $model
	 * @return void
	 */
	public function remove(Builder $builder, Model $model)
	{
	    $query = $builder->getQuery();
	    unset($query);
	}
}
