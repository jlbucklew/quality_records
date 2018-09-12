<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PicturesTags Controller
 *
 * @property \App\Model\Table\PicturesTagsTable $PicturesTags
 *
 * @method \App\Model\Entity\PicturesTag[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PicturesTagsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pictures', 'Tags']
        ];
        $picturesTags = $this->paginate($this->PicturesTags);

        $this->set(compact('picturesTags'));
    }

    /**
     * View method
     *
     * @param string|null $id Pictures Tag id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $picturesTag = $this->PicturesTags->get($id, [
            'contain' => ['Pictures', 'Tags']
        ]);

        $this->set('picturesTag', $picturesTag);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $picturesTag = $this->PicturesTags->newEntity();
        if ($this->request->is('post')) {
            $picturesTag = $this->PicturesTags->patchEntity($picturesTag, $this->request->getData());
            if ($this->PicturesTags->save($picturesTag)) {
                $this->Flash->success(__('The pictures tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pictures tag could not be saved. Please, try again.'));
        }
        $pictures = $this->PicturesTags->Pictures->find('list', ['limit' => 200]);
        $tags = $this->PicturesTags->Tags->find('list', ['limit' => 200]);
        $this->set(compact('picturesTag', 'pictures', 'tags'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pictures Tag id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $picturesTag = $this->PicturesTags->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $picturesTag = $this->PicturesTags->patchEntity($picturesTag, $this->request->getData());
            if ($this->PicturesTags->save($picturesTag)) {
                $this->Flash->success(__('The pictures tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pictures tag could not be saved. Please, try again.'));
        }
        $pictures = $this->PicturesTags->Pictures->find('list', ['limit' => 200]);
        $tags = $this->PicturesTags->Tags->find('list', ['limit' => 200]);
        $this->set(compact('picturesTag', 'pictures', 'tags'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pictures Tag id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $picturesTag = $this->PicturesTags->get($id);
        if ($this->PicturesTags->delete($picturesTag)) {
            $this->Flash->success(__('The pictures tag has been deleted.'));
        } else {
            $this->Flash->error(__('The pictures tag could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
