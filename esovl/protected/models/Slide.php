<?php

/**
 * This is the model class for table "slide".
 *
 * The followings are the available columns in table 'slide':
 * @property integer $sl_id
 * @property string $sl_pic
 * @property string $sl_piclink
 * @property string $sl_title
 * @property integer $sl_type
 * @property integer $sl_order
 */
class Slide extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Slide the static model class
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
		return 'slide';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sl_pic, sl_piclink', 'required'),
			array('sl_type, sl_order', 'numerical', 'integerOnly'=>true),
			array('sl_pic, sl_piclink', 'length', 'max'=>300),
			array('sl_title', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('sl_id, sl_pic, sl_piclink, sl_title, sl_type, sl_order', 'safe', 'on'=>'search'),
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
			'sl_id' => 'Sl',
			'sl_pic' => 'Sl Pic',
			'sl_piclink' => 'Sl Piclink',
			'sl_title' => 'Sl Title',
			'sl_type' => 'Sl Type',
			'sl_order' => 'Sl Order',
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

		$criteria->compare('sl_id',$this->sl_id);

		$criteria->compare('sl_pic',$this->sl_pic,true);

		$criteria->compare('sl_piclink',$this->sl_piclink,true);

		$criteria->compare('sl_title',$this->sl_title,true);

		$criteria->compare('sl_type',$this->sl_type);

		$criteria->compare('sl_order',$this->sl_order);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	//首页幻灯片
	public function getHomeSlide($id="0",$limit='10')
	{
		$criteria=new CDbCriteria;
		// $criteria->addCondition("sl_type='{$id}'");
		// $criteria->order='sl_order';
		// $criteria->limit=$limit;
		// $HomeSlide=$this->findAll($criteria);
		$criteria=new CDbCriteria;
		$criteria->addCondition("z_id='{$id}'");
		$criteria->select='z_pic1,z_link1,z_pic2,z_link2,z_pic3,z_link3,z_pic4,z_link4,z_pic5,z_link5,z_pic6,z_link6';
		$HomeSlide=WebStep::model()->find($criteria);
		return $this->toArray($HomeSlide);
	}
	public function toArray($array)
	{
		$arr=array();
		foreach($array as $key=>$val){
			if(stripos($key,"pic")){
				$arr['pic'][]=$val;
			}else{
				$arr["link"][]=$val;
			}
			// $arr[]=array("pic"=>$val['sl_pic'],'link'=>$val['sl_piclink'],"title"=>$val['sl_title']);
		}
		$arr1=array();
		foreach($arr["pic"] as $k=>$v){
			if($v)$arr1[]=array("pic"=>$v,'link'=>$arr["link"][$k],"title"=>'');
		}
		return $arr1;
	
	}
}