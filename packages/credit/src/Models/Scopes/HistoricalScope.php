<?php 

namespace Thunderlabid\Credit\Models\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Scope Link List
 *
 * Digunakan untuk static function link list untuk model
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class HistoricalScope implements Scope  
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
		$builder;
	}

	/**
	 * Add the with-trashed extension to the builder.
	 *
	 * @param  \Illuminate\Database\Eloquent\Builder  $builder
	 * @return void
	 */
	protected function addwithLog(Builder $builder)
	{
		$builder->macro('withLog', function (Builder $builder) {
			return $builder->withoutGlobalScope($this);
		});
	}

}
