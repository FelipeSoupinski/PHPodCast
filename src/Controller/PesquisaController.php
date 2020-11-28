<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Pesquisa Controller
 *
 *
 * @method \App\Model\Entity\Pesquisa[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PesquisaController extends AppController
{
    public function search()
    {   
        if($this->request->is(['POST'])){   
            $usuariosTable = TableRegistry::getTableLocator()->get('Usuarios');
            $id = $this->Auth->user('id');
            $usuario = $usuariosTable->get($id);

            $q = implode('|',$this->request->getData());
            $channels = TableRegistry::getTableLocator()->get('canais')->find()->where(['nome LIKE' => '%'.$q.'%'])->orWhere(['categoria LIKE' =>'%'.$q.'%']);
            $episodes = TableRegistry::getTableLocator()->get('episodios')->find()->where(['titulo LIKE' => '%'.$q.'%'])->orWhere(['descricao LIKE' =>'%'.$q.'%']);
            $this->set(compact('channels', 'episodes', 'usuario'));
        }

    }
}
