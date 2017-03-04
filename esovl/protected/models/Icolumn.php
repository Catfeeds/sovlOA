<?php

/**
 * This is the model class for table "icolumn".
 *
 * The followings are the available columns in table 'icolumn':
 * @property integer $ic_id
 * @property string $ic_class
 * @property integer $ic_pid
 * @property string $ic_type
 */
class Icolumn extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Icolumn the static model class
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
		return 'icolumn';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ic_id, ic_class, ic_pid', 'required'),
			array('ic_id, ic_pid', 'numerical', 'integerOnly'=>true),
			array('ic_class', 'length', 'max'=>100),
			array('ic_type', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ic_id, ic_class, ic_pid, ic_type', 'safe', 'on'=>'search'),
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
			'ic_id' => 'Ic',
			'ic_class' => 'Ic Class',
			'ic_pid' => 'Ic Pid',
			'ic_type' => 'Ic Type',
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

		$criteria->compare('ic_id',$this->ic_id);

		$criteria->compare('ic_class',$this->ic_class,true);

		$criteria->compare('ic_pid',$this->ic_pid);

		$criteria->compare('ic_type',$this->ic_type,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function getAllByPid($id){
		$models=$this->findAll("ic_pid ='{$id}'");
		$arr=array();
		foreach($models as $value){
			$arr[]=$value['ic_id'];
		}
		return $arr;
	}
	public function getAllTagsByid($id,$ishot=false){
		$criteria=new CDbCriteria;
		$criteria->addCondition("ic_pid ='{$id}'");
		if($ishot)$criteria->addCondition("ic_ishome !='0'");
		$criteria->order='ic_ishome';
		$arr=$this->findAll($criteria);
		return $arr;
	}
	public function getNameByid($id){
		$return="";
		$models=$this->find("ic_id ='{$id}'");
		if($models)$return=$models->ic_class;
		
		return $return;
	}
}