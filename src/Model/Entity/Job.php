<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Job Entity
 *
 * @property int $id
 * @property string $job_number
 * @property string $customer
 * @property string $station
 * @property bool $state
 *
 * @property \App\Model\Entity\Ncr[] $ncrs
 * @property \App\Model\Entity\Picture[] $pictures
 */
class Job extends Entity
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
        'job_number' => true,
        'customer' => true,
        'station' => true,
        'state' => true,
        'ncrs' => true,
        'pictures' => true
    ];
}
