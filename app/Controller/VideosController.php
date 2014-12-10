<?php
App::uses('AppController', 'Controller');
/**
 * Videos Controller
 *
 * @property Video $Video
 * @property PaginatorComponent $Paginator
 */
class VideosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = "public_dashboard";
		$this->Video->recursive = 0;
		
		if($this->request->is('post')) {
			/* ------------------------------------------------------------ IF SUBMIT BUTTON IS HIT ------------------------------------------------------------*/
			if(!empty($this->request->data['Video']['search_value'])) {
				if(!isset($this->request->data['Video']['reset'])) {
					$this->Session->write('Video.search_value', $this->request->data['Video']['search_value']);
				}
			}
			
			/* ------------------------------------------------------------ IF RESET BUTTON IS HIT ------------------------------------------------------------*/
			if(isset($this->request->data['Video']['reset'])) {
				$this->Session->delete('Video.search_value');
			}
		}
		
		/* ----------------------------------------------------------------------------------------- PAGINATION WITH SEARCH VALUE ------------------------------------------------------------------------*/
		
		$search_value = $this->Session->read('Video.search_value');
		$this->paginate = array('order' => array('Video.id' => 'ASC'));
		
		if(!empty($search_value)) {
			$this->paginate = array(
				'conditions' => array(
					'or' => array (
						'Video.video_link LIKE "%'.$search_value.'%"'
					)
				), 
				'order' => array('Video.id' => 'ASC')
			);
			
			$videos = $this->paginate();
		/* ------------------------------------------------------------------------------------------- DEFAULT PAGINATION HERE ----------------------------------------------------------------------------------*/
		} else {
			$videos = $this->paginate();		
		}
		
		$this->set('search_value', $search_value);
		$this->set('videos', $videos);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout = "public_dashboard";
		if (!$this->Video->exists($id)) {
			throw new NotFoundException(__('Invalid video'));
		}
		$options = array('conditions' => array('Video.' . $this->Video->primaryKey => $id));
		$this->set('video', $this->Video->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = "public_dashboard";
		if ($this->request->is('post')) {
			$this->Video->create();
			if ($this->Video->save($this->request->data)) {
				$this->Session->setFlash(__('The video has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The video could not be saved. Please, try again.'));
			}
		}
		$groups = $this->Video->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout = "public_dashboard";
		if (!$this->Video->exists($id)) {
			throw new NotFoundException(__('Invalid video'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Video->save($this->request->data)) {
				$this->Session->setFlash(__('The video has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The video could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Video.' . $this->Video->primaryKey => $id));
			$this->request->data = $this->Video->find('first', $options);
		}
		$groups = $this->Video->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Video->id = $id;
		if (!$this->Video->exists()) {
			throw new NotFoundException(__('Invalid video'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Video->delete()) {
			$this->Session->setFlash(__('The video has been deleted.'));
		} else {
			$this->Session->setFlash(__('The video could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
