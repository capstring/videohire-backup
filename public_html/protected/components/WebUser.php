<?php
class WebUser extends CWebUser {
    private $_model = null;
 
    function getRole() {
        if($user = $this->getModel()){
            // в таблице User есть поле role
            return $user->role;
        }
    }
 
    private function getModel(){
        if (!$this->isGuest && $this->_model === null){
            $this->_model = User::model()->findByPk($this->id, array('select' => 'role'));
        }
        return $this->_model;
    }
	
	public function questAuthorization($id) 
	{
		$user=User::model()->findByPk($id);
		if ($this->beforeLogin($id, array(), false)) 
		{
			$this->setId($user->id);
			$this->setName($user->login);
			$this->afterLogin(false);
		}
	}
}