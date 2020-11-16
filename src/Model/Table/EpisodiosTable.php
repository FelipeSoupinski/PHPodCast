<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Episodios Model
 *
 * @property \App\Model\Table\CanaisTable&\Cake\ORM\Association\BelongsTo $Canais
 * @property \App\Model\Table\FavoritosTable&\Cake\ORM\Association\HasMany $Favoritos
 *
 * @method \App\Model\Entity\Episodio get($primaryKey, $options = [])
 * @method \App\Model\Entity\Episodio newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Episodio[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Episodio|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Episodio saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Episodio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Episodio[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Episodio findOrCreate($search, callable $callback = null, $options = [])
 */
class EpisodiosTable extends Table
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

        $this->setTable('episodios');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Canais', [
            'foreignKey' => 'canai_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Favoritos', [
            'foreignKey' => 'episodio_id',
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('titulo')
            ->maxLength('titulo', 255)
            ->requirePresence('titulo', 'create')
            ->notEmptyString('titulo');

        $validator
            ->scalar('descricao')
            ->maxLength('descricao', 255)
            ->requirePresence('descricao', 'create')
            ->notEmptyString('descricao');

        $validator
            ->date('data')
            ->requirePresence('data', 'create')
            ->notEmptyDate('data');

        $validator
            ->scalar('arquivo')
            ->maxLength('arquivo', 255)
            ->requirePresence('arquivo', 'create')
            ->notEmptyString('arquivo');

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
        $rules->add($rules->existsIn(['canai_id'], 'Canais'));

        return $rules;
    }
}
