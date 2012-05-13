<?php

/**
 * This is the model class for table "trash".
 *
 * The followings are the available columns in table 'trash':
 * @property integer $id
 * @property integer $user_id
 * @property integer $copy_id
 *
 * The followings are the available model relations:
 * @property Copy $copy
 * @property User $user
 */
class Trash extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Trash the static model class
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
		return 'trash';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, copy_id', 'required'),
			array('user_id, copy_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, copy_id', 'safe', 'on'=>'search'),
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
			'copy' => array(self::BELONGS_TO, 'Copy', 'copy_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'copy_id' => 'Copy',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('copy_id',$this->copy_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function copiesInTrash()
	{
		$conn = $this->getDbConnection();
		$sql = 'SELECT COUNT(`trash`.`id`) as `count` FROM `trash` WHERE `trash`.`user_id`='.Yii::app()->user->getId().' ;';
		$datareader = $conn->createCommand($sql)->queryRow();
		return $datareader['count'];
	}

	public function addCopy($copy_id)
	{
		$trash = New Trash;
		$trash->user_id = Yii::app()->user->getId();
		$trash->copy_id = $copy_id;
		if ($trash->save())
		{
			$conn = $this->getDbConnection();	
			$sql = 'UPDATE `copy` SET `copy`.`status`=1 WHERE `copy`.`id`='.$copy_id.' ;';
			$conn->createCommand($sql)->execute();
		}
	}

	public function release($id)
	{
		$conn = $this->getDbConnection();
		$sql = 'UPDATE `copy` SET `copy`.`status`=0 WHERE `copy`.`id`='.$id.' ;';
		$conn->createCommand($sql)->execute();
	}

	public function getVideosAsArray()
	{
		$conn = $this->getDbConnection();
		$sql = 'SELECT `video`.`id` FROM `trash` JOIN `copy` ON `trash`.`copy_id`=`copy`.`id` JOIN `video` ON `copy`.`video_id`=`video`.`id` WHERE `trash`.`user_id`='.Yii::app()->user->getId().' ;';
		$datareader = $conn->createCommand($sql)->query();
		$reault = array();
		foreach ($datareader as $row)
			$result[] = $row['id'];
		return $result;
	}
}