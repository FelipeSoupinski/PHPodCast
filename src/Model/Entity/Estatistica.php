<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Estatistica Entity
 *
 * @property int $id
 * @property string $nome
 * @property \Cake\I18n\FrozenDate $data
 * @property int $canai_id
 * @property int $total_ouvintes
 * @property int $horas_reproduzidas
 *
 * @property \App\Model\Entity\Canai $canai
 */
class Estatistica extends Entity
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
        'id' => true,
        'nome' => true,
        'data' => true,
        'canai_id' => true,
        'total_ouvintes' => true,
        'horas_reproduzidas' => true,
        'canai' => true,
    ];
}
