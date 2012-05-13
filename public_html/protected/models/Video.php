<?php

/**
 * This is the model class for table "video".
 *
 * The followings are the available columns in table 'video':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $dtime
 * @property string $actors
 * @property string $producer
 *
 * The followings are the available model relations:
 * @property Copy[] $copies
 * @property VideoHasGenre[] $videoHasGenres
 */
class Video extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Video the static model class
	 */

	public $image;
	public $genres = array();

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'video';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, dtime, producer', 'required'),
			array('name, producer', 'length', 'max'=>100),
			array('dtime', 'length', 'max'=>45),
			array('actors', 'length', 'max'=>200),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description, dtime, actors, producer', 'safe', 'on'=>'search'),
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
			'copies' => array(self::HAS_MANY, 'Copy', 'video_id'),
			'videoHasGenres' => array(self::HAS_MANY, 'VideoHasGenre', 'video_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Навзание',
			'description' => 'Описание',
			'dtime' => 'Год выхода',
			'actors' => 'Актеры',
			'genres'=>'Жанр',
			'producer' => 'Режиссер',
			'image'=>'Обложка',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('dtime',$this->dtime,true);
		$criteria->compare('actors',$this->actors,true);
		$criteria->compare('producer',$this->producer,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	protected function afterSave()
	{
		$conn = $this->getDbConnection();
		$conn->createCommand('DELETE FROM `video_has_genre` WHERE `video_has_genre`.`video_id`='.$this->id)->execute();
		foreach ($this->genres as $genre)
		{
			$vhg = new VideoHasGenre;
			$vhg->video_id = $this->id;
			$vhg->genre_id = $genre;
			$vhg->save();
		}
		return parent::afterSave();
	}

	protected function afterFind()
	{
		$conn = $this->getDbConnection();
		$sql = 'SELECT `video_has_genre`.`genre_id` FROM `video_has_genre` WHERE `video_has_genre`.`video_id`='.$this->id.' ;';
		$datareader = $conn->createCommand($sql)->query();
		foreach ($datareader as $row)
			$this->genres[] = $row['genre_id'];
		return parent::afterFind();
	}

	public function getGenreAsString()
	{
		$result = '';
		$i = 0;
		foreach ($this->genres as $genre)
		{
			$genre_model = Genre::model()->findByPk($genre);
			$result .= $genre_model->name;
			if ($i!=sizeof($this->genres)-1)
				$result .= ', ';
			$i++;
		}
		if (!empty($result))
			return $result;
		else
			return 'Нет';
	}

	public function getPopularVideos()
	{
		$conn = $this->getDbConnection();
		$sql = 'SELECT `video`.`id`, COUNT(`order_has_copy`.`id`) as `count` FROM `video` LEFT JOIN `copy` ON `video`.`id`=`copy`.`video_id` LEFT JOIN `order_has_copy` ON `copy`.`id`=`order_has_copy`.`copy_id` GROUP BY `copy`.`id` ORDER BY `count` DESC LIMIT 10 ;';
		$datareader = $conn->createCommand($sql)->query();
		foreach ($datareader as $row)
			$result[] = Video::model()->findByPk($row['id']);
		return $result;
	}

	public function getNewVideos()
	{
		$criteria = new CDbCriteria;
		$criteria->order = 'dtime DESC LIMIT 10';
		$result = Video::model()->findAll($criteria);
		return $result;
	}

	public function checkDir()
	{
		$path = Yii::app()->basePath.'/../images/'.$this->id;
		if (!is_dir($path))
			mkdir($path,0777,true);
	}

	public function getImageUrl()
	{
		$path = Yii::app()->basePath.'/../images/'.$this->id.'/cover.jpg';
		if (file_exists($path))
			return '/images/'.$this->id.'/cover.jpg';
		else
			return '/images/default/cover.jpg';	
	}

	public function getName()
	{
		$result = $this->name.'<br />'.$this->dtime;
		foreach ($this->videoHasGenres as $k=>$vhg)
		{
			$genre = Genre::model()->findByPk($vhg->genre_id);
			if ($k==sizeof($this->videoHasGenres)-1)
				$result .= $genre->name;
			else
				$result .= $genre->name.', ';
		}
	}
}