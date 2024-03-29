<?php

/**
 * This is the model class for table "copy".
 *
 * The followings are the available columns in table 'copy':
 * @property integer $id
 * @property integer $video_id
 * @property integer $type_id
 * @property double $cost
 * @property string $location
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property MediaType $type
 * @property Video $video
 * @property UserHasCopy[] $userHasCopies
 */
class Copy extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Copy the static model class
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
		return 'copy';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('video_id, type_id, status', 'numerical', 'integerOnly'=>true),
			array('cost', 'numerical'),
			array('location', 'length', 'max'=>300),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, video_id, type_id, cost, location, status', 'safe', 'on'=>'search'),
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
			'type' => array(self::BELONGS_TO, 'Media', 'type_id'),
			'video' => array(self::BELONGS_TO, 'Video', 'video_id'),
			'userHasCopies' => array(self::HAS_MANY, 'UserHasCopy', 'copy_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'video_id' => 'Видео',
			'type_id' => 'Тип носителя',
			'cost' => 'Стоимость',
			'location' => 'Расположение',
			'status' => 'Статус',
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
		$criteria->compare('video_id',$this->video_id);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('cost',$this->cost);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}