<?php
class PostsController extends AppController {

	/**
	 *
	 *
	 * @var Post
	 */
	var $Post;

	var $name = 'Posts';




	

	function index() {
		$params = array(
				'fields' => array('title','body','hoge'), 
				//'fields' => array('Post.title',), 
				//'conditions' => array('title' => 'hehe'),
				//'order' => array('title' => 1, 'body' => 1),
				'order' => array('_id' => -1),
				'limit' => 35,
				'page' => 1,
				);
		$results = $this->Post->find('all', $params);
		//$result = $this->Post->find('count', $params);
		$this->set(compact('results'));
	}



	function add() {
		if (!empty($this->data)) {

			$this->Post->create();
			if ($this->Post->save($this->data)) {
				$this->flash(__('Post saved.', true), array('action'=>'index'));
			} else {
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(__('Invalid Post', true), array('action'=>'index'));
		}
		if (!empty($this->data)) {

			if ($this->Post->save($this->data)) {
				$this->flash(__('The Post has been saved.', true), array('action'=>'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Post->read(null,$id);
			//$this->data = $this->Post->find('first', array('conditions' => array('_id' => $id)));
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(__('Invalid Post', true), array('action'=>'index'));
		}
		if ($this->Post->delete($id)) {
			$this->flash(__('Post deleted', true), array('action'=>'index'));
		} else {
			$this->flash(__('Post deleted Fail', true), array('action'=>'index'));
		}
	}

	function deleteall(){
		$conditions = array('title'=> 'aa');
		if ($this->Post->deleteAll($conditions)) {
			$this->flash(__('Post deleteAll success', true), array('action'=>'index'));

		} else {
			$this->flash(__('Post deleteAll Fail', true), array('action'=>'index'));
		}
	}


	function updateall(){
		$conditions = array('title'=> 'ichi2' );

		$field = array('title'=> 'ichi' );


		if ($this->Post->updateAll($field, $conditions)) {
			$this->flash(__('Post updateAll success', true), array('action'=>'index'));

		} else {
			$this->flash(__('Post updateAll Fail', true), array('action'=>'index'));
		}
	}
}
?>
