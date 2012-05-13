<?php

/**
 * This is the model class for table "video_has_genre".
 *
 * The followings are the available columns in table 'video_has_genre':
 * @property integer $id
 * @property integer $video_id
 * @property integer $genre_id
 *
 * The followings are the available model relations:
 * @property Genre $genre
 * @property Video $video
 */
class VideoHasGenre extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return VideoHasGenre the static model class
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
		return 'video_has_genre';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('video_id, genre_id', 'required'),
			array('video_id, genre_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, video_id, genre_id', 'safe', 'on'=>'search'),
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
			'genre' => array(self::BELONGS_TO, 'Genre', 'genre_id'),
			'video' => array(self::BELONGS_TO, 'Video', 'video_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'video_id' => 'Video',
			'genre_id' => 'Genre',
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
		$criteria->compare('genre_id',$this->genre_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}