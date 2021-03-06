<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Canais Model
 *
 * @property \App\Model\Table\UsuariosTable&\Cake\ORM\Association\BelongsTo $Usuarios
 * @property \App\Model\Table\EpisodiosTable&\Cake\ORM\Association\HasMany $Episodios
 * @property \App\Model\Table\EstatisticasTable&\Cake\ORM\Association\HasMany $Estatisticas
 *
 * @method \App\Model\Entity\Canai get($primaryKey, $options = [])
 * @method \App\Model\Entity\Canai newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Canai[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Canai|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Canai saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Canai patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Canai[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Canai findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CanaisTable extends Table
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

        $this->setTable('canais');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('UploadRed');
        $this->addBehavior('DeleteArq');

        $this->belongsTo('Usuarios', [
            'foreignKey' => 'usuario_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Episodios', [
            'foreignKey' => 'canai_id',
        ]);
        $this->hasMany('Estatisticas', [
            'foreignKey' => 'canai_id',
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
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->scalar('categoria')
            ->maxLength('categoria', 255)
            ->requirePresence('categoria', 'create')
            ->notEmptyString('categoria');

        $validator
            ->scalar('descricao')
            ->maxLength('descricao', 255)
            ->requirePresence('descricao', 'create')
            ->notEmptyString('descricao');

        $validator
            ->scalar('imagem')
            ->maxLength('imagem', 255)
            ->requirePresence('imagem', 'create')
            ->allowEmptyFile('imagem');

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
        $rules->add($rules->existsIn(['usuario_id'], 'Usuarios'));

        return $rules;
    }

    public function getCanal($id_usuario)
    {
        $query = $this->find()
                      ->select()
                      ->where(['usuario_id' => $id_usuario])
                      ->contain(['Usuarios', 'Episodios', 'Estatisticas']);
        return $query->first();
    }

    public function pesquisa($query)
    {
        $query = $this->find()
                      ->select()
                      ->where(['nome LIKE' => '%'.$query.'%'])->orWhere(['categoria LIKE' =>'%'.$query.'%']);
        return $query->all();
    }

}
