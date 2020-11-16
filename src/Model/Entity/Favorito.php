<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Favorito Entity
 *
 * @property int $id
 * @property int $episodio_id
 * @property int $usuario_id
 *
 * @property \App\Model\Entity\Episodio $episodio
 * @property \App\Model\Entity\Usuario $usuario
 */
class Favorito extends Entity
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
        'episodio_id' => true,
        'usuario_id' => true,
        'episodio' => true,
        'usuario' => true,
    ];
}
