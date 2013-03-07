<?php


class Fayum_auth extends Session
{
	public function __construct()
	{
		parent::__construct();
		//time out to be 30 minutes
		if (isset($this->LAST_ACTIVITY) && (time() - $this->LAST_ACTIVITY > 1800)) {
		    session_destroy();   // destroy session data in storage
		    session_unset();     // unset $_SESSION variable for the runtime
		}else{
			$this->LAST_ACTIVITY = time();
		}
		
	}

	public function authenticate($mode)
	{
		if(!isset($this->auth_status))
			return false;
		switch($mode)
		{
			case 'view':
				return $this->auth_status >= 2;
				break;
			case 'input':
				return $this->auth_status >= 3;
				break;
			case 'admin':
				return $this->auth_status >= 4;
				break;
		}
		return false;
		
	}
	public function set_authentication($auth_level)
	{
		$this->auth_status 	 = $auth_level;
		$this->LAST_ACTIVITY = time();
	}
	

}
