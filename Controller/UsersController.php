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
	public $components = array(
        'Paginator'=>[
            'limit'=>3
        ],
        'session',
    );    
    //コンポーネント:各コントローラーに使えるようにする
    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
    }

    public function isAuthorized($user) {
//            parent::isAuthorized();
        //一覧表示と詳細表示は誰でも可能            
        if (in_array($this->action, array('index','view','login','logout'))) {
            return true;
        }  
        if($user['role'] ==='admin'){
            return true;
        }
        
        if($this->action === 'edit') {
//       ログインしたユーザーがeditアクションの時に編集しようとしてるユーザーとidが一致したらtrueを返す。   
            
            if( $this->params['pass'][0] === $user['id'])
            {
                return true;
            }
        }

        // adminは編集や削除や追加ができる //adminは上記以外のactionにアクセスできる
//            }

        return false;
    }        

    public function login(){
        $this->layout = 'front';
        if($this->request->is('post')){
           if ($this->Auth->login()) {
                $this->Flash->success(('ログインしました'));
//                    var_dump($this->Auth->redirect());
//                    exit;
                $this->redirect(array('action'=>'index'));
             } else {
                $this->Flash->danger(('ユーザーネームかパスワードが間違ってます'));
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
				$this->Flash->success('ユーザー登録完了しました');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error('ユーザー登録できませんでした。もう一度登録してください');
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
