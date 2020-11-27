<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Estatisticas Model
 *
 * @property \App\Model\Table\CanaisTable&\Cake\ORM\Association\BelongsTo $Canais
 *
 * @method \App\Model\Entity\Estatistica get($primaryKey, $options = [])
 * @method \App\Model\Entity\Estatistica newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Estatistica[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Estatistica|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Estatistica saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Estatistica patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Estatistica[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Estatistica findOrCreate($search, callable $callback = null, $options = [])
 */
class EstatisticasTable extends Table
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

        $this->setTable('estatisticas');

        $this->belongsTo('Canais', [
            'foreignKey' => 'canai_id',
            'joinType' => 'INNER',
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
            ->requirePresence('id', 'create')
            ->notEmptyString('id');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->date('data')
            ->requirePresence('data', 'create')
            ->notEmptyDate('data');

        $validator
            ->integer('total_ouvintes')
            ->requirePresence('total_ouvintes', 'create')
            ->notEmptyString('total_ouvintes');

        $validator
            ->integer('horas_reproduzidas')
            ->requirePresence('horas_reproduzidas', 'create')
            ->notEmptyString('horas_reproduzidas');

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

    public function getEstatisticas($canal)
    {
        $query = $this->find()
                      ->select()
                      ->where(['canai_id' => $canal]);
        return $query->first();
    }

}
