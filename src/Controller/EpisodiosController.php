<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Episodios Controller
 *
 * @property \App\Model\Table\EpisodiosTable $Episodios
 *
 * @method \App\Model\Entity\Episodio[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EpisodiosController extends AppController
{

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usuariosTable = TableRegistry::getTableLocator()->get('Usuarios');
        $id = $this->Auth->user('id');
        $usuario = $usuariosTable->get($id);

        $episodio = $this->Episodios->newEntity();
        if ($this->request->is('post')) {
            $episodio = $this->Episodios->patchEntity($episodio, $this->request->getData());
            $episodio->data = date_format(new \DateTime(), 'Y-m-d');
            $episodio->canai_id = ($this->Episodios->Canais->getCanal($this->Auth->user('id')))->id;
            $episodio->arquivo = $this->Episodios->slugUpload($this->request->getData()['arquivo']['name']);

            if($episodio->canai_id != null){
                if ($this->Episodios->save($episodio)) {
                    $destino = WWW_ROOT."files".DS."canais".DS.$episodio->canai_id.DS."episodios".DS.$episodio->id.DS;
                    $arquivo = $this->request->getData()['arquivo'];
                    $arquivo['name'] = $episodio->arquivo;
                    $this->Episodios->upload($arquivo, $destino);

                    $this->Flash->success(__('Episodio salvo com sucesso.'));
    
                    return $this->redirect(['controller' => 'meucanal']);
                }
                $this->Flash->error(__('Não foi possível salvar episódio. Tente novamente.'));
            } else {
                $this->Flash->error(__('Você ainda não possui um canal. Por favor, crie um primeiro.'));
                return $this->redirect(['controller' => 'Canais', 'action' => 'add']);
            }

        }
        $this->set(compact('episodio', 'usuario'));
    }

    public function lista($id)
    {
        $canalTable = TableRegistry::getTableLocator()->get('Canais');
        $canal = $canalTable->get($id);
        $episodios = $this->Episodios->getEpisodios($id);

        $usuariosTable = TableRegistry::getTableLocator()->get('Usuarios');
        $id = $this->Auth->user('id');
        $usuario = $usuariosTable->get($id);
        
        $favoritosTable = TableRegistry::getTableLocator()->get('Favoritos');
        $favoritos = $favoritosTable->getFavoritosByUser($id);

        $i = 0;
        $files = [];
        foreach($episodios as $episodio){
            $files[$i] = '../../files'.DS.'canais'.DS.$canal->id.DS.'episodios'.DS.$episodio->id.DS.$episodio->arquivo;
            $i++;
        }

        foreach($episodios as $episodio){
            foreach($favoritos as $favorito){
                if($favorito->episodio_id == $episodio->id){
                    $episodio->favorito = true;
                }
            }
        }

        $this->set(compact('episodios', 'canal', 'files', 'usuario'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Episodio id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $episodio = $this->Episodios->get($id, [
            'contain' => [],
        ]);
        
        $usuariosTable = TableRegistry::getTableLocator()->get('Usuarios');
        $id = $this->Auth->user('id');
        $usuario = $usuariosTable->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $arquivo_old = $episodio->arquivo;
            $episodio = $this->Episodios->patchEntity($episodio, $this->request->getData());
            $episodio->arquivo = $this->Episodios->slugUpload($this->request->getData()['arquivo']['name']);
            
            if ($this->Episodios->save($episodio)) {
                $destino = WWW_ROOT."files".DS."canais".DS.$episodio->canai_id.DS."episodios".DS.$episodio->id.DS;
                $arquivo = $this->request->getData()['arquivo'];
                $arquivo['name'] = $episodio->arquivo;
                $this->Episodios->upload($arquivo, $destino);
                $this->Episodios->deleteArquivo($destino, $arquivo_old);

                $this->Flash->success(__('O episódio foi salvo.'));

                return $this->redirect(['controller' => 'Canais', 'action' => 'meucanal']);
            }
            $this->Flash->error(__('O episódio não pode ser salvo. Por favor, tente novamente.'));
        }
        $canais = $this->Episodios->Canais->find('list', ['limit' => 200]);
        $this->set(compact('episodio', 'canais', 'usuario'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Episodio id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $episodio = $this->Episodios->get($id);
        if ($this->Episodios->delete($episodio)) {
            $this->Flash->success(__('Episódio deletado.'));
        } else {
            $this->Flash->error(__('O episódio não pode ser deletado. Por favor, tente novamente.'));
        }

        return $this->redirect(['controller' => 'Canais', 'action' => 'meucanal']);
    }
}
