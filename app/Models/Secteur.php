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
 * Class Secteur
 * 
 * @property int $id
 * @property string $numero
 * @property string $nom_secteur
 * @property string $adresse
 * @property string $responsable
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Amply[] $amplies
 *
 * @package App\Models
 */
class Secteur extends Model
{
	use SoftDeletes;
	protected $table = 'secteur';

	protected $fillable = [
		'numero',
		'nom_secteur',
		'adresse',
		'responsable'
	];

	public function amplies()
	{
		return $this->hasMany(Amply::class);
	}
}
