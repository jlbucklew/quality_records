<?php
namespace App\Controller;

use App\Controller\AppController;

//use Cake\Datasource\ConnectionManager;

/**
 * Ncrs Controller
 *
 * @property \App\Model\Table\NcrsTable $Ncrs
 *
 * @method \App\Model\Entity\Ncr[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NcrsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Jobs']
        ];
        $ncrs = $this->paginate($this->Ncrs);

        $this->set(compact('ncrs'));
    }

    /**
     * View method
     *
     * @param string|null $id Ncr id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ncr = $this->Ncrs->get($id, [
            'contain' => ['Jobs', 'Pictures']
        ]);

        $this->set('ncr', $ncr);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ncr = $this->Ncrs->newEntity();
        if ($this->request->is('post')) {
            $ncr = $this->Ncrs->patchEntity($ncr, $this->request->getData());
            if ($this->Ncrs->save($ncr)) {
                $this->Flash->success(__('The ncr has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ncr could not be saved. Please, try again.'));
        }
        $jobs = $this->Ncrs->Jobs->find('list', ['limit' => 200]);
        $pictures = $this->Ncrs->Pictures->find('list', ['limit' => 200]);
        //$pictures = $this->Ncrs->Pictures->find();
        $this->set(compact('ncr', 'jobs', 'pictures'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ncr id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ncr = $this->Ncrs->get($id, [
            'contain' => ['Pictures']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $ncr = $this->Ncrs->patchEntity($ncr, $this->request->getData());
            if ($this->Ncrs->save($ncr)) {
                $this->Flash->success(__('The ncr has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ncr could not be saved. Please, try again.'));
        }
        $jobs = $this->Ncrs->Jobs->find('list', ['limit' => 200]);
        $pictures = $this->Ncrs->Pictures->find()
            ->select('picture_name')
            ->select('id')
            ->from('pictures')
            ->where(['job_id' => $ncr['job_id']]);

        // $picturesSelected = $this->Ncrs->Ncrs_pictures->find()
        //     ->select('picture_id')
        //     ->from('ncrs_pictures')
        //     ->where(['ncr_id' => $ncr['id']]);


        $jobNumber = $this->Ncrs->Jobs->find('list')
            ->select('job_number')
            ->from('jobs')
            ->where(['id' => $ncr['job_id']]);



// CREATE TABLE ncrs_pictures (
// ncr_id INT NOT NULL,
// picture_id INT NOT NULL,
// PRIMARY KEY (ncr_id, picture_id),
// FOREIGN KEY (ncr_id) REFERENCES ncrs(id),
// FOREIGN KEY (picture_id) REFERENCES pictures(id)
// );








        $this->set(compact('ncr', 'jobs', 'pictures', 'jobNumber'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ncr id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ncr = $this->Ncrs->get($id);
        if ($this->Ncrs->delete($ncr)) {
            $this->Flash->success(__('The ncr has been deleted.'));
        } else {
            $this->Flash->error(__('The ncr could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
