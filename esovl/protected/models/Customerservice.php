<?php

/**
 * This is the model class for table "customerservice".
 *
 * The followings are the available columns in table 'customerservice':
 * @property integer $cs_id
 * @property string $cs_number
 * @property string $cs_name
 * @property integer $cs_status
 * @property integer $cs_order
 */
class Customerservice extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Customerservice the static model class
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
		return 'customerservice';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cs_number, cs_name', 'required'),
			array('cs_status, cs_order', 'numerical', 'integerOnly'=>true),
			array('cs_number', 'length', 'max'=>100),
			array('cs_name', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cs_id, cs_number, cs_name, cs_status, cs_order', 'safe', 'on'=>'search'),
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
			'cs_id' => 'Cs',
			'cs_number' => 'Cs Number',
			'cs_name' => 'Cs Name',
			'cs_status' => 'Cs Status',
			'cs_order' => 'Cs Order',
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

		$criteria->compare('cs_id',$this->cs_id);

		$criteria->compare('cs_number',$this->cs_number,true);

		$criteria->compare('cs_name',$this->cs_name,true);

		$criteria->compare('cs_status',$this->cs_status);

		$criteria->compare('cs_order',$this->cs_order);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function getAllKefu()
	{
		$kefu=$this->findAll();
		return $this->toArray($kefu);
	
	}
	public function toArray($array)
	{
		$arr=array();
		foreach($array as $val){
			$arr[]=array("number"=>$val['cs_number'],'name'=>$val['cs_name']);
		}
		return $arr;
	
	}
}