<?php

/**
 * This is the model class for table "pxsclass".
 *
 * The followings are the available columns in table 'pxsclass':
 * @property integer $ps_id
 * @property integer $pb_id
 * @property string $ps_title
 * @property string $ps_pic
 */
class Pxsclass extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Pxsclass the static model class
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
		return 'pxsclass';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pb_id, ps_title', 'required'),
			array('pb_id', 'numerical', 'integerOnly'=>true),
			array('ps_title', 'length', 'max'=>200),
			array('ps_pic', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ps_id, pb_id, ps_title, ps_pic', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ps_id' => 'Ps',
			'pb_id' => 'Pb',
			'ps_title' => 'Ps Title',
			'ps_pic' => 'Ps Pic',
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

		$criteria->compare('ps_id',$this->ps_id);

		$criteria->compare('pb_id',$this->pb_id);

		$criteria->compare('ps_title',$this->ps_title,true);

		$criteria->compare('ps_pic',$this->ps_pic,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	//培训小类
	public function getSclass()
	{
		$criteria=new CDbCriteria;
		// if($order)$criteria->order=$order;
		// if($limit)$criteria->limit=$limit;
		$models = $this->findAll($criteria);
		$arr = array();
		foreach($models as $value){
			$arr[] = $value['ps_title'];
		}
		return $arr;
	}
	public function getByPbidclass($id)
	{
		$criteria=new CDbCriteria;
		if($id)$criteria->addCondition("pb_id ='{$id}'");
		// if($order)$criteria->order=$order; pb_id
		// if($limit)$criteria->limit=$limit;
		$models = $this->findAll($criteria);
		// $arr = array();
		// foreach($models as $value){
			// $arr[] = $value['ps_title'];
		// }
		return $models;
	}
	//通过pb_id
	//public function getAllByPid($pid){
	//	$criteria=new CDbCriteria;
	//	$idArr=Pxbclass::model()->getAllByPid($pid);
	//	$criteria->addCondition("pb_id in(".join(",",$idArr).")");
	//	$models = $this->findAll($criteria);
	//	return $models;
	//}
}