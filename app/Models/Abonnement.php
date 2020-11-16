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
 * Class Abonnement
 *
 * @property int $id
 * @property string $numero
 * @property int $nb_tv
 * @property int $montant
 * @property int $reduction
 * @property int $prix_tv
 * @property int $amplie_id
 * @property int $secteur_id
 * @property bool $status
 * @property int $abonnes_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property Abonne $abonne
 * @property Amply $amply
 * @property Collection|LignePaiement[] $ligne_paiements
 *
 * @package App\Models
 */
class Abonnement extends Model
{
	use SoftDeletes;
    protected $table = 'abonnements';
    public $timestamps = true;

	protected $casts = [
		'nb_tv' => 'int',
		'montant' => 'int',
		'reduction' => 'int',
		'prix_tv' => 'int',
        'amplie_id' => 'int',
        'secteur_id' => 'int',
		'status' => 'bool',
		'abonnes_id' => 'int'
	];

	protected $fillable = [
		'numero',
		'nb_tv',
		'montant',
		'reduction',
		'prix_tv',
        'amplie_id',
        'secteur_id',
		'status',
		'abonnes_id'
	];

	public function abonne()
	{
		return $this->belongsTo(Abonne::class, 'abonnes_id');
	}

	public function amply()
	{
		return $this->belongsTo(Amply::class, 'amplie_id');
	}

	public function ligne_paiements()
	{
		return $this->hasMany(LignePaiement::class);
	}
}
