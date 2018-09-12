<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NcrsPictures Model
 *
 * @property \App\Model\Table\NcrsTable|\Cake\ORM\Association\BelongsTo $Ncrs
 * @property \App\Model\Table\PicturesTable|\Cake\ORM\Association\BelongsTo $Pictures
 *
 * @method \App\Model\Entity\NcrsPicture get($primaryKey, $options = [])
 * @method \App\Model\Entity\NcrsPicture newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\NcrsPicture[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\NcrsPicture|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NcrsPicture|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NcrsPicture patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\NcrsPicture[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\NcrsPicture findOrCreate($search, callable $callback = null, $options = [])
 */
class NcrsPicturesTable extends Table
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

        $this->setTable('ncrs_pictures');
        $this->setDisplayField('ncr_id');
        $this->setPrimaryKey(['ncr_id', 'picture_id']);

        $this->belongsTo('Ncrs', [
            'foreignKey' => 'ncr_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Pictures', [
            'foreignKey' => 'picture_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['ncr_id'], 'Ncrs'));
        $rules->add($rules->existsIn(['picture_id'], 'Pictures'));

        return $rules;
    }
}
