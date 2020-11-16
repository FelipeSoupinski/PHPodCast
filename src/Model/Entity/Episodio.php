<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Episodio Entity
 *
 * @property int $id
 * @property string $titulo
 * @property string $descricao
 * @property int $canai_id
 * @property \Cake\I18n\FrozenDate $data
 * @property string $arquivo
 *
 * @property \App\Model\Entity\Canai $canai
 * @property \App\Model\Entity\Favorito[] $favoritos
 */
class Episodio extends Entity
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
        'titulo' => true,
        'descricao' => true,
        'canai_id' => true,
        'data' => true,
        'arquivo' => true,
        'canai' => true,
        'favoritos' => true,
    ];
}
