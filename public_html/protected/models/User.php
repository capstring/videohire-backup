<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $login
 * @property string $password
 * @property string $firstname
 * @property string $secondname
 * @property string $address
 * @property string $role
 *
 * The followings are the available model relations:
 * @property UserHasCopy[] $userHasCopies
 */
class User extends CActiveRecord
{

	const SCENARIO_REGISTRATION = 'registration';

	public $password_repeat;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('login, password, firstname, secondname, address, role', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('login, password, firstname, secondname, address,password_repeat', 'required'),
			array('password_repeat', 'compare', 'compareAttribute'=>'password', 'on'=>self::SCENARIO_REGISTRATION,'message'=>'Повтор пароля должен совпадать с паролем.'),
			array('id, login, password, firstname, secondname, address, role', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'userHasCopies' => array(self::HAS_MANY, 'UserHasCopy', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'login' => 'Логин',
			'password' => 'Пароль',
			'firstname' => 'Имя',
			'secondname' => 'Фамилия',
			'address' => 'Адрес',
			'role' => 'Role',
			'password_repeat'=>'Повторите пароль',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('secondname',$this->secondname,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('role',$this->role,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	protected function beforeSave()
	{
		if ($this->isNewRecord)
		{
			$this->password = md5($this->password);
			$this->role = 'user';
		}
		return parent::beforeSave();
	}
}