<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Favoritos Controller
 *
 * @property \App\Model\Table\FavoritosTable $Favoritos
 *
 * @method \App\Model\Entity\Favorito[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FavoritosController extends AppController
{

    public function add()
    {
        $episodiosTable = TableRegistry::getTableLocator()->get('Episodios');
        $favorito = $this->Favoritos->newEntity();
        $favorito->usuario_id = $this->Auth->user('id');

        $data = $this->request->getData('title');
        $data = explode(' - ', $data, 2);
        $ep = $episodiosTable->getEpisodioByName($data[1]);

        $favorito->episodio_id = $ep->id;
        if($favorito->episodio_id != null and $this->Favoritos->check($ep->id, $favorito->usuario_id)){
            $this->Favoritos->save($favorito);
        }
    }

    public function remove()
    {
        $this->request->allowMethod(['post', 'delete']);

        $episodiosTable = TableRegistry::getTableLocator()->get('Episodios');

        $data = $this->request->getData('title');
        $data = explode(' - ', $data, 2);
        $ep = $episodiosTable->getEpisodioByName($data[1]);

        $favorito = $this->Favoritos->getFavoritosByEpAndUser($ep->id, $this->Auth->user('id'));

        if($favorito != null and !$this->Favoritos->check($ep->id, $this->Auth->user('id'))){
            $this->Favoritos->delete($favorito);
        }
    }
}
