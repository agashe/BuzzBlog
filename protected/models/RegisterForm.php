<?php

/**
 * RegisterForm class.
 * RegisterForm is the data structure for keeping
 * user register form data. It is used by the 'register' action of 'SiteController'.
 */
class RegisterForm extends CFormModel
{
	public $username;
	public $email;
	public $password;
	public $confirmation;
	public $verifyCode;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('username, email, password, confirmation', 'required'),
			array('email', 'unique', 'className'=>'User'),
			array('confirmation', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match"),
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'verifyCode'=>'Verification Code',
		);
	}

	/**
	 * Create new user using the given info.
	 * @return boolean whether register is successful
	 */
	public function register()
	{
		$user = new User();

		$user->username = $this->username;
		$user->email = $this->email;
		$user->password = CPasswordHelper::hashPassword($this->password);
		$user->is_verified = true;

		$user->save();

		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}

		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=0;
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;		
	}
}
