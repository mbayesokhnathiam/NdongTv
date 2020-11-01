<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Amply
 *
 * @property int $id
 * @property string $adresse
 * @property int $secteur_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property Secteur $secteur
 * @property Collection|Abonnement[] $abonnements
 *
 * @package App\Models
 */
class Amply extends Model
{
	use SoftDeletes;
	protected $table = 'amplies';

	protected $casts = [
		'secteur_id' => 'int'
	];

	protected $fillable = [
		'adresse',
		'secteur_id'
	];

	public function secteur()
	{
		return $this->belongsTo(Secteur::class);
	}

	public function abonnements()
	{
		return $this->hasMany(Abonnement::class, 'amplie_id');
	}
}
