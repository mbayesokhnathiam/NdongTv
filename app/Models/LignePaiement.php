<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LignePaiement
 *
 * @property int $id
 * @property int $abonnement_id
 * @property int $paiement_mensuel_id
 * @property int|null $montant_verse
 * @property int|null $montant_restant
 * @property bool $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property Abonnement $abonnement
 * @property PaiementMensuel $paiement_mensuel
 *
 * @package App\Models
 */
class LignePaiement extends Model
{
	use SoftDeletes;
    protected $table = 'ligne_paiement';
    public $timestamps = true;

	protected $casts = [
		'abonnement_id' => 'int',
		'paiement_mensuel_id' => 'int',
		'montant_verse' => 'int',
		'montant_restant' => 'int',
		'status' => 'bool'
	];

	protected $fillable = [
		'abonnement_id',
		'paiement_mensuel_id',
		'montant_verse',
		'montant_restant',
		'status'
	];

	public function abonnement()
	{
		return $this->belongsTo(Abonnement::class);
	}

	public function paiement_mensuel()
	{
		return $this->belongsTo(PaiementMensuel::class);
	}
}
