<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Picture Entity
 *
 * @property int $id
 * @property int $job_id
 * @property string $picture
 * @property string $picture_dir
 * @property int $picture_size
 * @property string $picture_type
 *
 * @property \App\Model\Entity\Job $job
 * @property \App\Model\Entity\Ncr[] $ncrs
 * @property \App\Model\Entity\Tag[] $tags
 */
class Picture extends Entity
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
        'job_id' => true,
        'picture' => true,
        'picture_dir' => true,
        'picture_size' => true,
        'picture_type' => true,
        'job' => true,
        'ncrs' => true,
        'tags' => true
    ];
}
