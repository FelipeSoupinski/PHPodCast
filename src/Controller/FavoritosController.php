<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Favoritos Controller
 *
 * @property \App\Model\Table\FavoritosTable $Favoritos
 *
 * @method \App\Model\Entity\Favorito[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FavoritosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Episodios', 'Usuarios'],
        ];
        $favoritos = $this->paginate($this->Favoritos);

        $this->set(compact('favoritos'));
    }

    /**
     * View method
     *
     * @param string|null $id Favorito id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $favorito = $this->Favoritos->get($id, [
            'contain' => ['Episodios', 'Usuarios'],
        ]);

        $this->set('favorito', $favorito);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $favorito = $this->Favoritos->newEntity();
        if ($this->request->is('post')) {
            $favorito = $this->Favoritos->patchEntity($favorito, $this->request->getData());
            if ($this->Favoritos->save($favorito)) {
                $this->Flash->success(__('The favorito has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The favorito could not be saved. Please, try again.'));
        }
        $episodios = $this->Favoritos->Episodios->find('list', ['limit' => 200]);
        $usuarios = $this->Favoritos->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('favorito', 'episodios', 'usuarios'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Favorito id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $favorito = $this->Favoritos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $favorito = $this->Favoritos->patchEntity($favorito, $this->request->getData());
            if ($this->Favoritos->save($favorito)) {
                $this->Flash->success(__('The favorito has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The favorito could not be saved. Please, try again.'));
        }
        $episodios = $this->Favoritos->Episodios->find('list', ['limit' => 200]);
        $usuarios = $this->Favoritos->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('favorito', 'episodios', 'usuarios'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Favorito id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $favorito = $this->Favoritos->get($id);
        if ($this->Favoritos->delete($favorito)) {
            $this->Flash->success(__('The favorito has been deleted.'));
        } else {
            $this->Flash->error(__('The favorito could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
