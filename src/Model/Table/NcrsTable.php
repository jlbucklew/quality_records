<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ncrs Model
 *
 * @property \App\Model\Table\JobsTable|\Cake\ORM\Association\BelongsTo $Jobs
 * @property \App\Model\Table\PicturesTable|\Cake\ORM\Association\BelongsToMany $Pictures
 *
 * @method \App\Model\Entity\Ncr get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ncr newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ncr[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ncr|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ncr|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ncr patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ncr[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ncr findOrCreate($search, callable $callback = null, $options = [])
 */
class NcrsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('ncrs');
        $this->setDisplayField('ncr_number');
        $this->setPrimaryKey('id');

        $this->belongsTo('Jobs', [
            'foreignKey' => 'job_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Pictures', [
            'foreignKey' => 'ncr_id',
            'targetForeignKey' => 'picture_id',
            'joinTable' => 'ncrs_pictures'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('ncr_number')
            ->allowEmpty('ncr_number');

        $validator
            ->scalar('ncr_issued_for')
            ->maxLength('ncr_issued_for', 255)
            ->allowEmpty('ncr_issued_for');

        $validator
            ->scalar('part_po')
            ->maxLength('part_po', 60)
            ->allowEmpty('part_po');

        $validator
            ->scalar('vendor')
            ->maxLength('vendor', 60)
            ->allowEmpty('vendor');

        $validator
            ->scalar('discrepancy')
            ->allowEmpty('discrepancy');

        $validator
            ->boolean('tag_attached')
            ->allowEmpty('tag_attached');

        $validator
            ->boolean('supervisor_made_aware')
            ->allowEmpty('supervisor_made_aware');

        $validator
            ->scalar('reported_by')
            ->maxLength('reported_by', 60)
            ->allowEmpty('reported_by');

        $validator
            ->dateTime('reported_date')
            ->allowEmpty('reported_date');

        $validator
            ->scalar('disposition_notes')
            ->allowEmpty('disposition_notes');

        $validator
            ->scalar('dispositioned_by')
            ->maxLength('dispositioned_by', 60)
            ->allowEmpty('dispositioned_by');

        $validator
            ->dateTime('dispositioned_date')
            ->allowEmpty('dispositioned_date');

        $validator
            ->scalar('reworked_by')
            ->maxLength('reworked_by', 60)
            ->allowEmpty('reworked_by');

        $validator
            ->dateTime('reworked_date')
            ->allowEmpty('reworked_date');

        $validator
            ->integer('new_ncr_number')
            ->allowEmpty('new_ncr_number');

        $validator
            ->scalar('reinspection_notes')
            ->allowEmpty('reinspection_notes');

        $validator
            ->boolean('tag_removed')
            ->allowEmpty('tag_removed');

        $validator
            ->scalar('reinspected_by')
            ->maxLength('reinspected_by', 60)
            ->allowEmpty('reinspected_by');

        $validator
            ->dateTime('reinspected_date')
            ->allowEmpty('reinspected_date');

        $validator
            ->boolean('reinspection_result')
            ->allowEmpty('reinspection_result');

        $validator
            ->scalar('disposition_selection')
            ->maxLength('disposition_selection', 10)
            ->allowEmpty('disposition_selection');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['job_id'], 'Jobs'));

        return $rules;
    }
}
