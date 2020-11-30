<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Favoritos Model
 *
 * @property \App\Model\Table\EpisodiosTable&\Cake\ORM\Association\BelongsTo $Episodios
 * @property \App\Model\Table\UsuariosTable&\Cake\ORM\Association\BelongsTo $Usuarios
 *
 * @method \App\Model\Entity\Favorito get($primaryKey, $options = [])
 * @method \App\Model\Entity\Favorito newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Favorito[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Favorito|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Favorito saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Favorito patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Favorito[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Favorito findOrCreate($search, callable $callback = null, $options = [])
 */
class FavoritosTable extends Table
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

        $this->setTable('favoritos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Episodios', [
            'foreignKey' => 'episodio_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Usuarios', [
            'foreignKey' => 'usuario_id',
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
            ->allowEmptyString('id', null, 'create');

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
        $rules->add($rules->existsIn(['episodio_id'], 'Episodios'));
        $rules->add($rules->existsIn(['usuario_id'], 'Usuarios'));

        return $rules;
    }

    /**
     * Verifica se o episodio já foi adicionado aos favoritos pelo usuario.
     * @return false caso já foi add
     * @return true caso ainda não foi
    */
    public function check($ep, $user)
    {
        $query = $this->find()
                      ->select()
                      ->where(['episodio_id' => $ep, 'usuario_id' => $user]);
        if($query->first() != null){
            return false;
        }
        return true;
    }

    public function getFavoritosByUser($user_id)
    {
        $query = $this->find()
                      ->select()
                      ->where(['usuario_id' => $user_id]);
        return $query->all();
    }

    public function getFavoritosByEpAndUser($ep, $user_id)
    {
        $query = $this->find()
                      ->select()
                      ->where(['usuario_id' => $user_id, 'episodio_id' => $ep]);
        return $query->first();
    }

}
