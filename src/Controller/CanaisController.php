<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Canais Controller
 *
 * @property \App\Model\Table\CanaisTable $Canais
 *
 * @method \App\Model\Entity\Canai[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CanaisController extends AppController
{

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if($this->Canais->getCanal($this->Auth->user('id')) == null) {

            $usuariosTable = TableRegistry::getTableLocator()->get('Usuarios');
            $id = $this->Auth->user('id');
            $usuario = $usuariosTable->get($id);

            $canai = $this->Canais->newEntity();
            if ($this->request->is('post')) {
                $canai = $this->Canais->patchEntity($canai, $this->request->getData());
                $canai->usuario_id = $this->Auth->user('id');
                
                $imgUpload = $this->request->getData()['imagem'];
                $imgUpload['name'] = $this->Canais->slugUploadImgRed($imgUpload['name']);

                $canai->imagem = $imgUpload['name'];
                
                if ($this->Canais->save($canai)) {
                    $destino = WWW_ROOT . "files" . DS . "canais" . DS . $canai->id . DS;
                    $this->Canais->uploadImgRed($imgUpload, $destino, 270, 270);
                    
                    $this->Flash->success(__('Canal salvo com sucesso.'));

                    return $this->redirect(['action' => 'meucanal']);
                }
                $this->Flash->error(__('Não foi possivel salvar canal. Tente novamente.'));
  
            }
            $usuarios = $this->Canais->Usuarios->find('list', ['limit' => 200]);
            $this->set(compact('canai', 'usuarios', 'usuario'));

        } else {
            $this->Flash->error(__('Você já possui um canal.'));

            return $this->redirect(['action' => 'meucanal']);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Canai id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $canai = $this->Canais->get($id, [
            'contain' => [],
        ]);

        $usuariosTable = TableRegistry::getTableLocator()->get('Usuarios');
        $id = $this->Auth->user('id');
        $usuario = $usuariosTable->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $imagem = $canai->imagem;
            $canai = $this->Canais->patchEntity($canai, $this->request->getData());
            
            $imgUpload = $this->request->getData()['imagem'];
            $imgUpload['name'] = $this->Canais->slugUploadImgRed($imgUpload['name']);

            $canai->imagem = $imgUpload['name'];

            if ($this->Canais->save($canai)) {
                $destino = WWW_ROOT . "files" . DS . "canais" . DS . $canai->id . DS;
                $this->Canais->uploadImgRed($imgUpload, $destino, 270, 270);
                $this->Canais->deleteFile($destino, $imagem, $canai->imagem);

                $this->Flash->success(__('Canal salvo com sucesso.'));

                return $this->redirect(['action' => 'meucanal']);
            }
            $this->Flash->error(__('Não.'));
        }
        $usuarios = $this->Canais->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('canai', 'usuarios', 'usuario'));
    }

    public function meucanal()
    {
        $usuariosTable = TableRegistry::getTableLocator()->get('Usuarios');
        $id = $this->Auth->user('id');
        $usuario = $usuariosTable->get($id);

        $canai = $this->Canais->getCanal($this->Auth->user('id'));

        if($canai == null) {
            $this->Flash->error(__('Você ainda não possui um canal.'));

            return $this->redirect(['controller' => 'Canais', 'action' => 'add']);
        }

        $episodiosTable = TableRegistry::getTableLocator()->get('Episodios');
        $episodios = $episodiosTable->getEpisodios($canai->id);

        $this->set(compact('canai', 'episodios', 'usuario'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Canai id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $canai = $this->Canais->get($id);
        if ($this->Canais->delete($canai)) {
            $this->Flash->success(__('Canal deletado.'));
        } else {
            $this->Flash->error(__('O canal não pode ser deletado. Tente novamente.'));
        }

        return $this->redirect(['action' => 'meucanal']);
    }
}