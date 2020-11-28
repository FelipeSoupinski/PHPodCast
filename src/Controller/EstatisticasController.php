<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Estatisticas Controller
 *
 * @property \App\Model\Table\EstatisticasTable $Estatisticas
 *
 * @method \App\Model\Entity\Estatistica[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EstatisticasController extends AppController
{

    public function canal()
    {
        $user = $this->Auth->user('id');
        $canal = $this->Estatisticas->Canais->getCanal($user);
        $estatistica = $this->Estatisticas->getEstatisticas($canal->id);

        $usuariosTable = TableRegistry::getTableLocator()->get('Usuarios');
        $usuario = $usuariosTable->get($user);

        $this->set(compact('estatistica', 'usuario'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $estatistica = $this->Estatisticas->newEntity();
        if ($this->request->is('post')) {
            $estatistica = $this->Estatisticas->patchEntity($estatistica, $this->request->getData());
            if ($this->Estatisticas->save($estatistica)) {
                $this->Flash->success(__('The estatistica has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estatistica could not be saved. Please, try again.'));
        }
        $canais = $this->Estatisticas->Canais->find('list', ['limit' => 200]);
        $this->set(compact('estatistica', 'canais'));
    }

}
