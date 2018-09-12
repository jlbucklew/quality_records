<?php
namespace App\Controller;

use App\Controller\AppController;

use League\Flysystem\Filesystem;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;


use Cake\Datasource\ConnectionManager;


/**
 * Pictures Controller
 *
 * @property \App\Model\Table\PicturesTable $Pictures
 *
 * @method \App\Model\Entity\Picture[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PicturesController extends AppController
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
            //'contain' => ['Jobs', 'Ncrs', 'Tags']
        ];
        $pictures = $this->paginate($this->Pictures);

        $this->set(compact('pictures'));

        $jobs = $this->Pictures->Jobs->find('list', ['limit' => 200]);
        $ncrs = $this->Pictures->Ncrs->find('list', ['limit' => 200]);
        $tags = $this->Pictures->Tags->find('list', ['limit' => 200]);
        $this->set(compact('picture', 'jobs', 'ncrs', 'tags'));

    }







    public function filter($limit = 100) {
        // $pictures = $this->Pictures->find('all')->limit($limit);
        // $this->set('pictures', $pictures);

//, $id = 160

        $query = $this->Pictures->find('all')
            ->limit($limit)
            //->where(['id' => $id]);
            //->where(['Tags_title' => 'rotor']);
            //->contain(['Tags']);
            ->contain(['Jobs','Ncrs', 'Tags']);
            //->where(['Tags.title' => 'rotor']);

        $this->set('pictures', $this->paginate($query));


    }




    /**
     * View method
     *
     * @param string|null $id Picture id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $picture = $this->Pictures->get($id, [
            'contain' => ['Jobs', 'Ncrs', 'Tags']
        ]);

        $this->set('picture', $picture);

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */



    public function add() {
        $connection = ConnectionManager::get('default');

        function resizeImage($resourceType,$image_width,$image_height,$resizeWidth,$resizeHeight) {
            // $resizeWidth = 100;
            // $resizeHeight = 100;
            $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
            imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight, $image_width,$image_height);
            imagedestroy($resourceType);
            return $imageLayer;
        }

        if ($this->request->is('post')) {
            if(!empty($this->request->getData())){
                foreach ($this->request->getData('picture') as $result) {

                $exif = exif_read_data($result['tmp_name'], 0, true);
                if(!empty($exif["EXIF"]["DateTimeOriginal"])) {
                    $createdDateTime = strtotime($exif["EXIF"]["DateTimeOriginal"]);
                }

                $picture_name = $result['name'];
                $pictureRoot = 'webroot/job_pictures/';



$jobID = $this->request->getData('job_id');

$results = $connection
    ->newQuery()
    ->select('job_number')
    ->from('jobs')
    ->where(['id' => $jobID])
    ->execute()
    ->fetch('assoc');

$jobNumber = $results['job_number'];

$picture_dir = WWW_ROOT.'job_pictures/'.$jobNumber.'/';

if (!file_exists($picture_dir)) {
    mkdir($picture_dir, 0777, true);
}

$picture_dir = $pictureRoot.$jobNumber.'/';



                
                $rTime = (str_replace('.', '', microtime(1)));
                    if( !empty($picture_name)){
                        $tmprary_name = $result['tmp_name'];
                        $temp = explode(".", $picture_name);
                        $newfilename = 'orig-'.$rTime . '.' . end($temp);
                        $dbFileName = $rTime . '.' . end($temp);

                        if (move_uploaded_file($tmprary_name , $picture_dir.$newfilename)) {
                            //$this->Flash->success(__('The picture '. basename($picture_name). ' has been saved.'));

                            $picture = $this->Pictures->newEntity();
                            $picture->job_id = $this->request->getData('job_id');
                            $picture->picture_name = $dbFileName;
                            $picture->picture_dir = 'job_pictures/';
                            //$picture->picture_title = $picture_name;
                            $picture->picture_title = 'fffff';

                            if ($this->Pictures->save($picture)) {
                                //$this->Flash->success(__('The picture has been saved.'));

                                // $temp = explode("-", $newfilename);
                                // $fileName = end($temp);
                                $fileName = $dbFileName;
                                $sourceProperties = getimagesize($picture_dir.$newfilename);

                                $uploadPath = $picture_dir;
                                $fileExt = pathinfo($newfilename, PATHINFO_EXTENSION);
                                $uploadImageType = $sourceProperties[2];
                                $sourceImageWidth = $sourceProperties[0];
                                $sourceImageHeight = $sourceProperties[1];

                                $imageSizeLg = 1200;
                                $imageSizeMd = 600;
                                $imageSizeSm = 300;
                                $imageSizeXs = 100;

                                if($sourceImageWidth > $sourceImageHeight) {
                                    $orientation = 'horizontal';
                                    //$imageSizes['orig']['height'] = $sourceImageHeight;
                                    //$imageSizes['lg']['height'] = $sourceImageHeight/($sourceImageWidth/$imageSizeLg);
                                    $imageSizes['md']['height'] = $sourceImageHeight/($sourceImageWidth/$imageSizeMd);
                                    $imageSizes['sm']['height'] = $sourceImageHeight/($sourceImageWidth/$imageSizeSm);
                                    $imageSizes['xs']['height'] = $sourceImageHeight/($sourceImageWidth/$imageSizeXs);
                                    //$imageSizes['orig']['width'] = $sourceImageWidth;
                                    //$imageSizes['lg']['width'] = $imageSizeLg;
                                    $imageSizes['md']['width'] = $imageSizeMd;
                                    $imageSizes['sm']['width'] = $imageSizeSm;
                                    $imageSizes['xs']['width'] = $imageSizeXs;
                                } else {
                                    $orientation = 'vertical';
                                    //$imageSizes['orig']['height'] = $sourceImageHeight;
                                    //$imageSizes['lg']['height'] = $imageSizeLg;
                                    $imageSizes['md']['height'] = $imageSizeMd;
                                    $imageSizes['sm']['height'] = $imageSizeSm;
                                    $imageSizes['xs']['height'] = $imageSizeXs;
                                    //$imageSizes['orig']['width'] = $sourceImageWidth;
                                    //$imageSizes['lg']['width'] = $sourceImageWidth/($sourceImageHeight/$imageSizeLg);
                                    $imageSizes['md']['width'] = $sourceImageWidth/($sourceImageHeight/$imageSizeMd);
                                    $imageSizes['sm']['width'] = $sourceImageWidth/($sourceImageHeight/$imageSizeSm);
                                    $imageSizes['xs']['width'] = $sourceImageWidth/($sourceImageHeight/$imageSizeXs);
                                }

                                foreach($imageSizes as $key => $prefix) {
                                    $resizeFileName = $key.'-'.$fileName;
                                    $new_width = $prefix['width'];
                                    $new_height = $prefix['height'];


                                switch ($uploadImageType) {
                                    case IMAGETYPE_JPEG:
                                        $resourceType = imagecreatefromjpeg($picture_dir.$newfilename); 
                                        $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width,$new_height);
                                        imagejpeg($imageLayer,$uploadPath.$resizeFileName);
                                        break;

                                    case IMAGETYPE_GIF:
                                        $resourceType = imagecreatefromgif($picture_dir.$newfilename); 
                                        $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width,$new_height);
                                        imagegif($imageLayer,$uploadPath.$resizeFileName);
                                        break;

                                    case IMAGETYPE_PNG:
                                        $resourceType = imagecreatefrompng($picture_dir.$newfilename); 
                                        $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width,$new_height);
                                        imagepng($imageLayer,$uploadPath.$resizeFileName);
                                        break;

                                    default:
                                        break;
                                }
                                move_uploaded_file($newfilename, $uploadPath. $resizeFileName);
                                
                                }

                            } else {
                                //$this->Flash->error(__('The picture could not be saved. Please, try again.'));
                            }
                        } 
                    }
                }
                return $this->redirect(['action' => 'index']);
            }
        }
        $jobs = $this->Pictures->Jobs->find('list', ['limit' => 200]);
        $ncrs = $this->Pictures->Ncrs->find('list', ['limit' => 200]);
        $tags = $this->Pictures->Tags->find('list', ['limit' => 200]);
        $this->set(compact('picture', 'jobs', 'ncrs', 'tags'));
    }








    // public function add() {
    //     if ($this->request->is('post')) {
    //         if(!empty($this->request->getData())){
    //             foreach ($this->request->getData('file') as $result) {
    //             $picture_name = $result['name'];
    //             $picture_dir = 'webroot/job_pictures/';
    //             $rTime = (str_replace('.', '', microtime(1)));
    //                 if( !empty($picture_name)){
    //                     $tmprary_name = $result['tmp_name'];
    //                     $temp = explode(".", $picture_name);
    //                     $newfilename = $rTime . '.' . end($temp);

    //                     if (move_uploaded_file($tmprary_name , $picture_dir.$newfilename)) {
    //                         //$this->Flash->success(__('The picture '. basename($picture_name). ' has been saved.'));

    //                         $picture = $this->Pictures->newEntity();
    //                         $picture->job_id = $this->request->getData('job_id');
    //                         $picture->picture_name = $newfilename;
    //                         $picture->picture_dir = 'job_pictures/';
    //                         //$picture->picture_title = $picture_name;
    //                         $picture->picture_title = 'fffff';

    //                         if ($this->Pictures->save($picture)) {
    //                             //$this->Flash->success(__('The picture has been saved.'));
    //                         } else {
    //                             //$this->Flash->error(__('The picture could not be saved. Please, try again.'));
    //                         }
    //                     } 
    //                 }
    //             }
    //             return $this->redirect(['action' => 'index']);
    //         }
    //     }
    //     $jobs = $this->Pictures->Jobs->find('list', ['limit' => 200]);
    //     $ncrs = $this->Pictures->Ncrs->find('list', ['limit' => 200]);
    //     $tags = $this->Pictures->Tags->find('list', ['limit' => 200]);
    //     $this->set(compact('picture', 'jobs', 'ncrs', 'tags'));
    // }




    // public function add()
    // {
    //     $picture = $this->Pictures->newEntity();
    //     if ($this->request->is('post')) {
    //         $picture = $this->Pictures->patchEntity($picture, $this->request->getData());

    //         if ($this->Pictures->save($picture)) {
    //             $this->Flash->success(__('The picture has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The picture could not be saved. Please, try again.'));
        
    //     }
    //     $jobs = $this->Pictures->Jobs->find('list', ['limit' => 200]);
    //     $ncrs = $this->Pictures->Ncrs->find('list', ['limit' => 200]);
    //     $tags = $this->Pictures->Tags->find('list', ['limit' => 200]);
    //     $this->set(compact('picture', 'jobs', 'ncrs', 'tags'));
    // }

    /**
     * Edit method
     *
     * @param string|null $id Picture id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $picture = $this->Pictures->get($id, [
            'contain' => ['Ncrs', 'Tags']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $picture = $this->Pictures->patchEntity($picture, $this->request->getData());
            if ($this->Pictures->save($picture)) {
                $this->Flash->success(__('The picture has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The picture could not be saved. Please, try again.'));
        }
        $jobs = $this->Pictures->Jobs->find('list', ['limit' => 200]);
        $ncrs = $this->Pictures->Ncrs->find('list', ['limit' => 200]);
        $tags = $this->Pictures->Tags->find('list', ['limit' => 200]);
        $this->set(compact('picture', 'jobs', 'ncrs', 'tags'));
    }





    public function download($id) {
        $picture = $this->Pictures->get($id);
        $path = WWW_ROOT.$picture->picture_dir.$picture->picture_name;
        $this->response->body(function() use($path){
            return file_get_contents($path);
        });
        return $this->response->withDownload($picture->picture_name);
    }





    /**
     * Delete method
     *
     * @param string|null $id Picture id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */


    public function delete($id) {
        $picture = $this->Pictures->get($id);

        $connection = ConnectionManager::get('default');
        $jobID = $picture['job_id'];
        $results = $connection
            ->newQuery()
            ->select('job_number')
            ->from('jobs')
            ->where(['id' => $jobID])
            ->execute()
            ->fetch('assoc');
        $jobNumber = $results['job_number'];

        $files = glob(WWW_ROOT.$picture->picture_dir.$jobNumber.'/*'.$picture->picture_name); 
        foreach($files as $file){
            if(is_file($file)) {
                unlink($file);
            }
        }
        $this->Pictures->delete($picture);
        return $this->redirect(['action' => 'index']);
    }



    public function generateThumbnails($id) {
    //     $picture = $this->Pictures->get($id);
    //     $path = WWW_ROOT.$picture->picture_dir.$picture->picture_name;

    // function resizeImage($resourceType,$image_width,$image_height,$resizeWidth,$resizeHeight) {
    //     // $resizeWidth = 100;
    //     // $resizeHeight = 100;
    //     $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
    //     imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight, $image_width,$image_height);
    //     imagedestroy($resourceType);
    //     return $imageLayer;
    // }

    // $fileName = $picture->picture_name;
    // $sourceProperties = getimagesize($path);

    // $uploadPath = WWW_ROOT.$picture->picture_dir;
    // $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
    // $uploadImageType = $sourceProperties[2];
    // $sourceImageWidth = $sourceProperties[0];
    // $sourceImageHeight = $sourceProperties[1];

    // $imageSizeLg = 1200;
    // $imageSizeMd = 600;
    // $imageSizeSm = 100;
    // $imageSizeXs = 60;

    // if($sourceImageWidth > $sourceImageHeight) {
    //     $orientation = 'horizontal';
    //     //$imageSizes['orig']['height'] = $sourceImageHeight;
    //     $imageSizes['lg']['height'] = $sourceImageHeight/($sourceImageWidth/$imageSizeLg);
    //     $imageSizes['md']['height'] = $sourceImageHeight/($sourceImageWidth/$imageSizeMd);
    //     $imageSizes['sm']['height'] = $sourceImageHeight/($sourceImageWidth/$imageSizeSm);
    //     $imageSizes['xs']['height'] = $sourceImageHeight/($sourceImageWidth/$imageSizeXs);
    //     //$imageSizes['orig']['width'] = $sourceImageWidth;
    //     $imageSizes['lg']['width'] = $imageSizeLg;
    //     $imageSizes['md']['width'] = $imageSizeMd;
    //     $imageSizes['sm']['width'] = $imageSizeSm;
    //     $imageSizes['xs']['width'] = $imageSizeXs;
    // } else {
    //     $orientation = 'vertical';
    //     //$imageSizes['orig']['height'] = $sourceImageHeight;
    //     $imageSizes['lg']['height'] = $imageSizeLg;
    //     $imageSizes['md']['height'] = $imageSizeMd;
    //     $imageSizes['sm']['height'] = $imageSizeSm;
    //     $imageSizes['xs']['height'] = $imageSizeXs;
    //     //$imageSizes['orig']['width'] = $sourceImageWidth;
    //     $imageSizes['lg']['width'] = $sourceImageWidth/($sourceImageHeight/$imageSizeLg);
    //     $imageSizes['md']['width'] = $sourceImageWidth/($sourceImageHeight/$imageSizeMd);
    //     $imageSizes['sm']['width'] = $sourceImageWidth/($sourceImageHeight/$imageSizeSm);
    //     $imageSizes['xs']['width'] = $sourceImageWidth/($sourceImageHeight/$imageSizeXs);
    // }

    // foreach($imageSizes as $key => $prefix) {
    //     $resizeFileName = $key.'-'.$fileName;
    //     $new_width = $prefix['width'];
    //     $new_height = $prefix['height'];


    // switch ($uploadImageType) {
    //     case IMAGETYPE_JPEG:
    //         $resourceType = imagecreatefromjpeg($path); 
    //         $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width,$new_height);
    //         imagejpeg($imageLayer,$uploadPath.$resizeFileName);
    //         break;

    //     case IMAGETYPE_GIF:
    //         $resourceType = imagecreatefromgif($path); 
    //         $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width,$new_height);
    //         imagegif($imageLayer,$uploadPath.$resizeFileName);
    //         break;

    //     case IMAGETYPE_PNG:
    //         $resourceType = imagecreatefrompng($path); 
    //         $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width,$new_height);
    //         imagepng($imageLayer,$uploadPath.$resizeFileName);
    //         break;

    //     default:
    //         break;
    // }
    // move_uploaded_file($fileName, $uploadPath. $resizeFileName);
    
    // }

    //     return $this->redirect(['action' => 'index']);
    }














    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $picture = $this->Pictures->get($id);

    //     if ($this->Pictures->delete($picture)) {
    //         $this->Flash->success(__('The picture has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The picture could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }
}
