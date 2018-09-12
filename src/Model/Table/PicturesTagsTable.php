<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PicturesTags Model
 *
 * @property \App\Model\Table\PicturesTable|\Cake\ORM\Association\BelongsTo $Pictures
 * @property \App\Model\Table\TagsTable|\Cake\ORM\Association\BelongsTo $Tags
 *
 * @method \App\Model\Entity\PicturesTag get($primaryKey, $options = [])
 * @method \App\Model\Entity\PicturesTag newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PicturesTag[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PicturesTag|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PicturesTag|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PicturesTag patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PicturesTag[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PicturesTag findOrCreate($search, callable $callback = null, $options = [])
 */
class PicturesTagsTable extends Table
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

        $this->setTable('pictures_tags');
        $this->setDisplayField('picture_id');
        $this->setPrimaryKey(['picture_id', 'tag_id']);

        $this->belongsTo('Pictures', [
            'foreignKey' => 'picture_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Tags', [
            'foreignKey' => 'tag_id',
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
        $rules->add($rules->existsIn(['picture_id'], 'Pictures'));
        $rules->add($rules->existsIn(['tag_id'], 'Tags'));

        return $rules;
    }
}
