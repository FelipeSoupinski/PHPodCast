<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Usuarios Controller
 *
 * @property \App\Model\Table\UsuariosTable $Usuarios
 *
 * @method \App\Model\Entity\Usuario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsuariosController extends AppController
{

    public function configuracoes()
    {
        $id = $this->Auth->user('id');
        $usuario = $this->Usuarios->get($id);

        $hash = new DefaultPasswordHasher();

        if ($this->request->is(['patch', 'post', 'put'])) {
            
            if( $this->request->getData('NewPassword') == '' and $this->request->getData('OldPassword') == ''
                and $this->request->getData('password') != '' and $this->request->getData('email') != ''){

                if($hash->check($this->request->getData('password'), $usuario->senha)){
                    if($this->request->getData('email') != '' and $this->request->getData('email') != null){
                        $usuario->email = $this->request->getData('email');
                        $this->Usuarios->save($usuario);

                        $this->Flash->success(__('Email editado com sucesso.'));
                    } else {
                        $this->Flash->error(__('Novo email não pode ser vazio.'));
                    }
                } else {
                    $this->Flash->error(__('Senha atual não confere.'));
                }
            } 
            
            if( $this->request->getData('NewPassword') != '' and $this->request->getData('OldPassword') != ''
                and $this->request->getData('password') == '' and $this->request->getData('email') == '' ){

                if($hash->check($this->request->getData('OldPassword'), $usuario->senha)){
                    $senha = $this->request->getData('NewPassword');
                    if($senha != '' and strlen($senha) >= 6 ){
                        $usuario->senha = $senha;
                        $this->Usuarios->save($usuario);

                        $this->Flash->success(__('Senha editada com sucesso.'));
                    } else {
                        $this->Flash->error(__('Nova senha não pode ser vazia e tem de ter 6 ou mais caracteres.'));
                    }
                } else {
                    $this->Flash->error(__('Senha atual não confere.'));
                }
            } 
            
            if( $this->request->getData('password') != '' and $this->request->getData('OldPassword') != ''
                and $this->request->getData('NewPassword') != '' and $this->request->getData('email') != '') {

                if($hash->check($this->request->getData('password'), $usuario->senha)){
                    $usuario->email = $this->request->getData('email');
                    $usuario->senha = $this->request->getData('NewPassword');
                    if($this->Usuarios->save($usuario)){
                        $this->Flash->success(__('Senha e email editados com sucesso.'));
                    } else {
                        $this->Flash->error(__('Erro ao salvar usuário.'));
                    }
                } else {
                    $this->Flash->error(__('Senha atual não confere.'));
                }
            } 
            
            if($this->request->getData('imagem') != '' and $this->request->getData('imagem') != null) {
                $oldImage = $usuario->imagem;
                $imgUpload = $this->request->getData('imagem');
                $imgUpload['name'] = $this->Usuarios->slugUploadImgRed($imgUpload['name']);
                $destino = WWW_ROOT . "files" . DS . "usuarios" . DS . $usuario->id . DS;
                if ($this->Usuarios->uploadImgRed($imgUpload, $destino, 270, 270)) {
                    $usuario->imagem = $imgUpload['name'];
                    if($this->Usuarios->save($usuario)){
                        $this->Usuarios->deleteFile($destino, $oldImage, $usuario->imagem);
                        $this->Flash->success(__('Imagem editada com sucesso.'));
                    } else {
                        $this->Flash->error(__('Erro ao editar imagem.'));
                    }
                } else {
                    $this->Flash->error(__('Erro ao realizar o upload da imagem.'));
                }
            }

        }

        $this->set(compact('usuario'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usuario = $this->Usuarios->get($id);
        if ($this->Usuarios->delete($usuario)) {
            $this->Flash->success(__('The usuario has been deleted.'));
        } else {
            $this->Flash->error(__('The usuario could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
