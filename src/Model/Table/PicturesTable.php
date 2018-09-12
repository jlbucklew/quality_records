<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pictures Model
 *
 * @property \App\Model\Table\JobsTable|\Cake\ORM\Association\BelongsTo $Jobs
 * @property \App\Model\Table\NcrsTable|\Cake\ORM\Association\BelongsToMany $Ncrs
 * @property \App\Model\Table\TagsTable|\Cake\ORM\Association\BelongsToMany $Tags
 *
 * @method \App\Model\Entity\Picture get($primaryKey, $options = [])
 * @method \App\Model\Entity\Picture newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Picture[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Picture|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Picture|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Picture patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Picture[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Picture findOrCreate($search, callable $callback = null, $options = [])
 */

//$upload_time = preg_replace('/(0)\.(\d+) (\d+)/', '$3$1$2', $microtime());

class PicturesTable extends Table
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

        $this->setTable('pictures');
        $this->setDisplayField('picture_name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Jobs', [
            'foreignKey' => 'job_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Ncrs', [
            'foreignKey' => 'picture_id',
            'targetForeignKey' => 'ncr_id',
            'joinTable' => 'ncrs_pictures'
        ]);
        $this->belongsToMany('Tags', [
            'foreignKey' => 'picture_id',
            'targetForeignKey' => 'tag_id',
            'joinTable' => 'pictures_tags'
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
            //->scalar('picture')
            ->maxLength('picture', 255)
            ->allowEmpty('picture');

        $validator
            //->scalar('picture_name')
            ->maxLength('picture_name', 255)
            ->allowEmpty('picture_name');

        $validator
            ->scalar('picture_dir')
            ->maxLength('picture_dir', 255)
            ->allowEmpty('picture_dir');

        $validator
            ->integer('picture_size')
            ->allowEmpty('picture_size');

        $validator
            ->scalar('picture_type')
            ->maxLength('picture_type', 255)
            ->allowEmpty('picture_type');

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
