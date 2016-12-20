<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Evenement Entity
 *
 * @property int $id
 * @property string $evenement
 * @property \Cake\I18n\Time $date
 * @property string $lieu
 * @property int $category_id
 * @property float $distance
 * @property int $denivele
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Resultat[] $resultats
 */
class Evenement extends Entity
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
