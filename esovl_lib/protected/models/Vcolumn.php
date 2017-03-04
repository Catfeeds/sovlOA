<?php

/**
 * This is the model class for table "vcolumn".
 *
 * The followings are the available columns in table 'vcolumn':
 * @property integer $vc_id
 * @property string $vc_class
 * @property integer $vc_pid
 * @property string $vc_type
 * @property integer $vc_ishome
 * @property string $vc_icon
 */
class Vcolumn extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Vcolumn the static model class
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
		return 'vcolumn';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vc_class, vc_pid', 'required'),
			array('vc_pid, vc_ishome', 'numerical', 'integerOnly'=>true),
			array('vc_class', 'length', 'max'=>100),
			array('vc_type', 'length', 'max'=>20),
			array('vc_icon', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('vc_id, vc_class, vc_pid, vc_type, vc_ishome, vc_icon', 'safe', 'on'=>'search'),
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
			'vc_id' => 'Vc',
			'vc_class' => 'Vc Class',
			'vc_pid' => 'Vc Pid',
			'vc_type' => 'Vc Type',
			'vc_ishome' => 'Vc Ishome',
			'vc_icon' => 'Vc Icon',
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

		$criteria->compare('vc_id',$this->vc_id);

		$criteria->compare('vc_class',$this->vc_class,true);

		$criteria->compare('vc_pid',$this->vc_pid);

		$criteria->compare('vc_type',$this->vc_type,true);

		$criteria->compare('vc_ishome',$this->vc_ishome);

		$criteria->compare('vc_icon',$this->vc_icon,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	public function getAllByPid($id){
		if(is_array($id)){
			$models=$this->findAll("vc_pid in(".join(",",$id).")");
		}else{
			$models=$this->findAll("vc_pid ='{$id}'");
		}
		$arr=array();
		foreach($models as $value){
			$arr[]=$value['vc_id'];
		}
		return $arr;
	}
	
	public function getAllTagsByid($id,$ishot=false,$limit="",$notorder=true){
		$criteria=new CDbCriteria;
		$criteria->addCondition("vc_pid ='{$id}'");
		if($ishot)$criteria->addCondition("vc_ishome !='0'");
		if($notorder)$criteria->order='vc_ishome';
		if($limit)$criteria->limit=$limit;
		$arr=$this->findAll($criteria);
		return $arr;
	}
}