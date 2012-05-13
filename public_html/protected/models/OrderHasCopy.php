<?php

/**
 * This is the model class for table "order_has_copy".
 *
 * The followings are the available columns in table 'order_has_copy':
 * @property integer $id
 * @property integer $order_id
 * @property integer $copy_id
 * @property integer $dtime_start
 * @property integer $dtime_end
 * @property integer $dtime_end_actual
 * @property integer $employee_id
 *
 * The followings are the available model relations:
 * @property Copy $copy
 * @property Order $order
 */
class OrderHasCopy extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OrderHasCopy the static model class
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
		return 'order_has_copy';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_id, copy_id, dtime_create', 'required'),
			array('order_id, copy_id, dtime_start, dtime_end, dtime_end_actual, employee_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, order_id, copy_id, dtime_start, dtime_end, dtime_end_actual, employee_id', 'safe', 'on'=>'search'),
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
			'order' => array(self::BELONGS_TO, 'Order', 'order_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'order_id' => 'Order',
			'copy_id' => 'Copy',
			'dtime_start' => 'Dtime Start',
			'dtime_end' => 'Dtime End',
			'dtime_end_actual' => 'Dtime End Actual',
			'employee_id' => 'Employee',
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
		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('copy_id',$this->copy_id);
		$criteria->compare('dtime_start',$this->dtime_start);
		$criteria->compare('dtime_end',$this->dtime_end);
		$criteria->compare('dtime_end_actual',$this->dtime_end_actual);
		$criteria->compare('employee_id',$this->employee_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}