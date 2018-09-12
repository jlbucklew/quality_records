<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ncr Entity
 *
 * @property int $id
 * @property int $job_id
 * @property int $ncr_number
 * @property string $ncr_issued_for
 * @property string $part_po
 * @property string $vendor
 * @property string $discrepancy
 * @property bool $tag_attached
 * @property bool $supervisor_made_aware
 * @property string $reported_by
 * @property \Cake\I18n\FrozenTime $reported_date
 * @property string $disposition_notes
 * @property string $dispositioned_by
 * @property \Cake\I18n\FrozenTime $dispositioned_date
 * @property string $reworked_by
 * @property \Cake\I18n\FrozenTime $reworked_date
 * @property int $new_ncr_number
 * @property string $reinspection_notes
 * @property bool $tag_removed
 * @property string $reinspected_by
 * @property \Cake\I18n\FrozenTime $reinspected_date
 * @property bool $reinspection_result
 * @property string $disposition_selection
 *
 * @property \App\Model\Entity\Job $job
 * @property \App\Model\Entity\Picture[] $pictures
 */
class Ncr extends Entity
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
        'ncr_number' => true,
        'ncr_issued_for' => true,
        'part_po' => true,
        'vendor' => true,
        'discrepancy' => true,
        'tag_attached' => true,
        'supervisor_made_aware' => true,
        'reported_by' => true,
        'reported_date' => true,
        'disposition_notes' => true,
        'dispositioned_by' => true,
        'dispositioned_date' => true,
        'reworked_by' => true,
        'reworked_date' => true,
        'new_ncr_number' => true,
        'reinspection_notes' => true,
        'tag_removed' => true,
        'reinspected_by' => true,
        'reinspected_date' => true,
        'reinspection_result' => true,
        'disposition_selection' => true,
        'job' => true,
        'pictures' => true
    ];
}
