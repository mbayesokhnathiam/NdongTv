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
 * Class Abonne
 * 
 * @property int $id
 * @property string $prenom
 * @property string $nom
 * @property string $telephone
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Abonnement[] $abonnements
 *
 * @package App\Models
 */
class Abonne extends Model
{
	use SoftDeletes;
	protected $table = 'abonnes';

	protected $fillable = [
		'prenom',
		'nom',
		'telephone'
	];

	public function abonnements()
	{
		return $this->hasMany(Abonnement::class, 'abonnes_id');
	}
}
