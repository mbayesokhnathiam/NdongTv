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
 * Class PaiementMensuel
 * 
 * @property int $id
 * @property string $numero
 * @property string $mois
 * @property string $Annee
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|LignePaiement[] $ligne_paiements
 *
 * @package App\Models
 */
class PaiementMensuel extends Model
{
	use SoftDeletes;
	protected $table = 'paiement_mensuel';

	protected $fillable = [
		'numero',
		'mois',
		'Annee'
	];

	public function ligne_paiements()
	{
		return $this->hasMany(LignePaiement::class);
	}
}
