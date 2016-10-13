<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
        //コンポーネント:各コントローラーに使えるようにする
        public function beforeFilter() {
//            $this->layout = 'admin';
        }
        
        public function isAuthorized($user) {
            //一覧表示と詳細表示は誰でも可能            
            if (in_array($this->action, array('index','view','login','logout'))) {
                return true;
            }  

            // adminは編集や削除や追加ができる
            if (in_array($this->action, array('add','edit', 'delete'))) {
                $postId = (int) $this->request->params['pass'][0];
                if ($this->Post->isOwnedBy($postId, $user['id'])) {
                    return true;
                }
            }

            return false;
        }
        
        
        
        public function login(){
            
            if($this->request->is('post')){
               if ($this->Auth->login()) {
                    $this->redirect($this->Auth->redirect());
                 } else {
                    $this->Flash->error(('ユーザーネームかパスワードが間違ってます'));
                 }
            }
        }
           
        public function logout() {  
        
                $this->redirect($this->Auth->logout());
        }


        
        /**
 * index method
 *
 * @return void
 */
	public function index() {

		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException('ユーザーが存在しません');
		}
		$options = array('conditions' => array('User.id' => $id));
//                var_dump($this->User->find('first', $options));
//                exit;
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
//                    var_dump($this->request->data);
//                    exit;
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		}
	}
        
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
//			var_dump($options);
//                        exit;
                        
                        $this->request->data = $this->User->find('first', $options);
//                        var_dump($this->request->data);
//                        exit;
//                        エラーになってもリクエストデーターの中に入力されたデータが入り放し。
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
                
		if ($this->User->delete()) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
