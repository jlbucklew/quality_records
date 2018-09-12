<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Jobs Model
 *
 * @property \App\Model\Table\NcrsTable|\Cake\ORM\Association\HasMany $Ncrs
 * @property \App\Model\Table\PicturesTable|\Cake\ORM\Association\HasMany $Pictures
 *
 * @method \App\Model\Entity\Job get($primaryKey, $options = [])
 * @method \App\Model\Entity\Job newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Job[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Job|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Job|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Job patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Job[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Job findOrCreate($search, callable $callback = null, $options = [])
 */
class JobsTable extends Table
{


    public function getJobNumber($id)
    {
        //$jobNumber=$this->find('all', ['conditions'=>['is_active'=>'Y']]);

        $jobNumber = $this
            ->find()
            ->select(['job_number'])
            ->where(['id' => $id]);
        
        return $jobNumber;
    }







    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('jobs');
        $this->setDisplayField('job_number');
        $this->setPrimaryKey('id');

        $this->hasMany('Ncrs', [
            'foreignKey' => 'job_id'
        ]);
        $this->hasMany('Pictures', [
            'foreignKey' => 'job_id'
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
            ->scalar('job_number')
            ->maxLength('job_number', 5)
            ->allowEmpty('job_number');

        $validator
            ->scalar('customer')
            ->maxLength('customer', 200)
            ->allowEmpty('customer');

        $validator
            ->scalar('station')
            ->maxLength('station', 200)
            ->allowEmpty('station');

        $validator
            ->boolean('state')
            ->allowEmpty('state');

        return $validator;
    }
}
