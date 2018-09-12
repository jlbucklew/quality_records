<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * NcrsPicture Entity
 *
 * @property int $ncr_id
 * @property int $picture_id
 *
 * @property \App\Model\Entity\Ncr $ncr
 * @property \App\Model\Entity\Picture $picture
 */
class NcrsPicture extends Entity
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
        'ncr' => true,
        'picture' => true
    ];
}
