<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Resultat Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $evenement_id
 * @property \Cake\I18n\Time $temps_puce
 * @property \Cake\I18n\Time $temps_officiel
 * @property int $classement
 * @property int $classement_cat
 * @property float $inscription
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Evenement $evenement
 */
class Resultat extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
