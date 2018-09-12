<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * NcrsPictures Controller
 *
 * @property \App\Model\Table\NcrsPicturesTable $NcrsPictures
 *
 * @method \App\Model\Entity\NcrsPicture[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NcrsPicturesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Ncrs', 'Pictures']
        ];
        $ncrsPictures = $this->paginate($this->NcrsPictures);

        $this->set(compact('ncrsPictures'));
    }

    /**
     * View method
     *
     * @param string|null $id Ncrs Picture id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ncrsPicture = $this->NcrsPictures->get($id, [
            'contain' => ['Ncrs', 'Pictures']
        ]);

        $this->set('ncrsPicture', $ncrsPicture);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ncrsPicture = $this->NcrsPictures->newEntity();
        if ($this->request->is('post')) {
            $ncrsPicture = $this->NcrsPictures->patchEntity($ncrsPicture, $this->request->getData());
            if ($this->NcrsPictures->save($ncrsPicture)) {
                $this->Flash->success(__('The ncrs picture has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ncrs picture could not be saved. Please, try again.'));
        }
        $ncrs = $this->NcrsPictures->Ncrs->find('list', ['limit' => 200]);
        $pictures = $this->NcrsPictures->Pictures->find('list', ['limit' => 200]);
        $this->set(compact('ncrsPicture', 'ncrs', 'pictures'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ncrs Picture id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ncrsPicture = $this->NcrsPictures->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ncrsPicture = $this->NcrsPictures->patchEntity($ncrsPicture, $this->request->getData());
            if ($this->NcrsPictures->save($ncrsPicture)) {
                $this->Flash->success(__('The ncrs picture has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ncrs picture could not be saved. Please, try again.'));
        }
        $ncrs = $this->NcrsPictures->Ncrs->find('list', ['limit' => 200]);
        $pictures = $this->NcrsPictures->Pictures->find('list', ['limit' => 200]);
        $this->set(compact('ncrsPicture', 'ncrs', 'pictures'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ncrs Picture id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ncrsPicture = $this->NcrsPictures->get($id);
        if ($this->NcrsPictures->delete($ncrsPicture)) {
            $this->Flash->success(__('The ncrs picture has been deleted.'));
        } else {
            $this->Flash->error(__('The ncrs picture could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
