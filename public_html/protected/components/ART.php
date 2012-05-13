<?php

class ART extends CApplicationComponent
{

 	public $membership = array(); //Массив связей между пользователями и кластерами
 	public $features = array(); // Массив векторов-признаков
 	public $prototype_vector = array(); // Массив векторов прототипов

 	public $members = array(); //массив, содержащий количество пользователей в каждом кластере

 	protected $beta = 1;  //Малое положительное число
 	protected $vigilance = 0.9; //Внимательность

 	public $users = array(); //Массив пользователей
 	public $videos = array(); //Массив видео


 	/*-------------------Функция, перемножающая два вектора---------------------*/
 	protected function vectorBitwiseAnd($v1,$v2)
 	{
 		$result = array();
 		for ($i = 0;$i<=sizeof($v1);$i++)
 			$result[$i] = ($v1[$i]&&$v2[$i]);
 		return $result;
 	}
	/*--------------------------------------------------------------------------*/

	/*----------Функция, считающая количество единиц в векторе------------------*/
	protected function vectorMagnitude($v)
	{
		$result = 0;
		foreach ($v as $item)
			if ($item==1)
				$result++;
		return $result;
	}
	/*---------------------------------------------------------------------------*/

	/*--------------------Функция, модифицирующая вектор-прототип----------------*/
	protected function updatePrototypeVector($key)
	{
		foreach ($this->prototype_vector[$key] as $item)
			$item = 0;

		$first = true;
		foreach ($this->users as $user)
			if ($membership[$user->id]==$key)
				if ($first)
				{
					foreach ($this->videos as $k=>$video)
						$this->prototype_vector[$key][$k] = $this->features[$user->id][$k];
					$first = false;
				}
				else
					foreach ($this->videos as $k=>$video)
						$this->prototype_vector[$key][$k] = $this->prototype_vector[$key][$k]&&$this->features[$user->id][$k];
	}
	/*--------------------------------------------------------------------------*/

	/*----------------------Процедура инициализации класса----------------------*/
 	public function init()
 	{
 		$this->vigilance = Yii::app()->params->vigilance;
 		$this->users = User::model()->findAll();
 		$this->videos = Video::model()->findAll();

 		foreach ($this->videos as $k=>$video)
 		{
 			$this->prototype_vector[0][$k] = 0;
 			$this->members[0] = 0;
 		}

		foreach ($this->users as $user)
 			$this->membership[$user->id] = -1;
 		foreach ($this->users as $user)
 		{
 			foreach ($this->videos as $k=>$video)
 			{
 				$sql = 'SELECT * FROM `order` LEFT JOIN `order_has_copy` ON `order`.`id`=`order_has_copy`.`order_id` LEFT JOIN `copy` ON `order_has_copy`.`copy_id`=`copy`.`id` WHERE `order`.`user_id`='.$user->id.' AND `copy`.`video_id`='.$video->id.' ;';
 				$datareader = Yii::app()->db->createCommand($sql)->queryRow();
 				if ($datareader)
 					$this->features[$user->id][$k] = 1;
 				else
 					$this->features[$user->id][$k] = 0;
 			}
 		}
 	}
 	/*------------------------------------------------------------------*/

 	/*--------Процедура кластеризации-----------------------------------*/
 	public function art1()
 	{
 		$and_result = array();
 		$pvec = 0;
 		$magPE = 0;
 		$magP = 0;
 		$magE = 0;
 		$count = Yii::app()->params->count;
 		while ($count)
 		{
	 		foreach ($this->users as $user)
	 		{
	 			foreach ($this->prototype_vector as $key=>$prototype_vector)
	 			{
	 				if ($this->members[$key])
	 				{

	 					$and_result = $this->vectorBitwiseAnd($prototype_vector,$this->features[$user->id]);
	 					$magPE = $this->vectorMagnitude($and_result);
	 					$magP = $this->vectorMagnitude($prototype_vector);
	 					$magE = $this->vectorMagnitude($this->features[$user->id]);

	 					$result = $magPE/($this->beta+$magP);
	 					$test = $magE/($this->beta+sizeof($this->videos));
	 					if ($result>$test)
	 					{
	 						if ($magPE/$magE<$this->vigilance)
	 						{
	 							$old = -1;
	 							if ($this->membership[$user->id]!=$key)
	 							{
	 								$old = $this->membership[$user->id];
	 								$this->membership[$user->id] = $key;
	 								if ($old>=0)
	 								{
	 									$this->members[$old]--;
	 									if ($this->members[$old]==0)
	 										unset($this->prototype_vector[$old]);
	 								}
	 								$this->members[$key]++;
	 								if (isset($this->prototype_vector[$old]) && $old<sizeof($this->prototype_vector))
	 									$this->updatePrototypeVector($old);

									$this->updatePrototypeVector($key);
									break;
	 							}
	 						}
	 					}
	 				}
	 			}

	 			if ($this->membership[$user->id]==-1)
	 			{ 
	 				$size = sizeof($this->prototype_vector);
	 				foreach ($this->videos as $key=>$video)
	 					$this->prototype_vector[$size][$key] = $this->features[$user->id][$key];
	 				$this->membership[$user->id] = $size;
	 				$this->members[$size] = 1;
	 			}
	 		}
 			$count--;
 		}

 		return array('features'=>$this->features,'membership'=>$this->membership);
 	}
 	/*-------------------------------------------------------------------------------------*/

 	/*-----------Процедура формирования рекомендаций, возвращает массив фильмов------------*/
 	public function recommended($video_array)
 	{

 		$new_user = new User;
 		$new_user->id = 5000000;
 		$this->users[] = $new_user;
 		foreach ($this->videos as $key=>$video)
 			if (in_array($video->id,$video_array))
 				$this->features[$new_user->id][$key] = 1;
 			else
 				$this->features[$new_user->id][$key] = 0;
 		foreach ($this->users as $user)
 			$this->membership[$user->id] = -1;

 		$this->art1();

 		$limit = Yii::app()->params->limit;

 		$sum_vector = array();
 		foreach ($this->videos as $key=>$video)
 			$sum_vector[$key] = 0;

 		$cluster = $this->membership[$new_user->id];
 		foreach ($this->membership as $user_id=>$cluster_id)
 			if ($cluster==$cluster_id&&$user_id!=$new_user->id)
 				foreach ($this->features[$user_id] as $key=>$item)
 					if ($this->features[$new_user->id][$key]!=1)
 						$sum_vector[$key]+=$this->features[$user_id][$key];

 		$array_of_videos = array();
 		foreach ($this->videos as $key=>$video)
 			$array_of_videos[$key] = $video->id;

 		$vid = array();

 		while ($limit)
 		{
 			$mark = 0;
 			$key = -1;
 			foreach ($sum_vector as $k=>$item)
 				if ($item>$mark)
 				{
 					$mark = $item;
 					$key = $k;
 				}
 			if ($mark!=0&&$key!=-1)
 			{
 				$vid[] = $key;
 				unset($sum_vector[$key]);
 			}
 			else
 				break;
 			$limit--;
 		}
 		$result = array();

 		foreach ($vid as $key=> $value)
 			$result[] = $array_of_videos[$value];

 		return $result;
 	}
 	/*----------------------------------------------------------------------*/
}