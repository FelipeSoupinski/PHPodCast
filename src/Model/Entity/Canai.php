<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Canai Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $categoria
 * @property string $descricao
 * @property string $imagem
 * @property int $usuario_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Usuario $usuario
 * @property \App\Model\Entity\Episodio[] $episodios
 * @property \App\Model\Entity\Estatistica[] $estatisticas
 */
class Canai extends Entity
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
        'nome' => true,
        'categoria' => true,
        'descricao' => true,
        'imagem' => true,
        'usuario_id' => true,
        'created' => true,
        'modified' => true,
        'usuario' => true,
        'episodios' => true,
        'estatisticas' => true,
    ];
}
