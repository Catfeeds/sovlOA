<?php

/**
 * This is the model class for table "information".
 *
 * The followings are the available columns in table 'information':
 * @property integer $i_id
 * @property integer $i_class
 * @property integer $i_label
 * @property string $i_title
 * @property string $i_pic
 * @property string $i_con
 * @property integer $i_click
 * @property integer $i_bool
 * @property integer $i_submitdate
 * @property integer $i_updatetime
 */
class Information extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Information the static model class
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
		return 'information';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('i_id, i_class, i_title, i_con, i_updatetime', 'required'),
			array('i_id, i_class, i_label, i_click, i_bool, i_submitdate, i_updatetime', 'numerical', 'integerOnly'=>true),
			array('i_title', 'length', 'max'=>200),
			array('i_pic', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('i_id, i_class, i_label, i_title, i_pic, i_con, i_click, i_bool, i_submitdate, i_updatetime', 'safe', 'on'=>'search'),
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
			'i_id' => 'I',
			'i_class' => 'I Class',
			'i_label' => 'I Label',
			'i_title' => 'I Title',
			'i_pic' => 'I Pic',
			'i_con' => 'I Con',
			'i_click' => 'I Click',
			'i_bool' => 'I Bool',
			'i_submitdate' => 'I Submitdate',
			'i_updatetime' => 'I Updatetime',
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

		$criteria->compare('i_id',$this->i_id);

		$criteria->compare('i_class',$this->i_class);

		$criteria->compare('i_label',$this->i_label);

		$criteria->compare('i_title',$this->i_title,true);

		$criteria->compare('i_pic',$this->i_pic,true);

		$criteria->compare('i_con',$this->i_con,true);

		$criteria->compare('i_click',$this->i_click);

		$criteria->compare('i_bool',$this->i_bool);

		$criteria->compare('i_submitdate',$this->i_submitdate);

		$criteria->compare('i_updatetime',$this->i_updatetime);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	//根据新闻栏目ID得到新闻
	public function getAllByid($id,$limit='10',$order='i_submitdate desc',$ishot=false)
	{
		$criteria=new CDbCriteria;
		$criteria->addCondition("i_class ='{$id}");
		if($ishot)$criteria->addCondition(" i_bool = 1 ");
		$criteria->limit=$limit;
		$criteria->order=$order;
		$News=$this->findAll($criteria);
		return $News;
	}
	//根据新闻父栏目ID得到新闻
	public function getAllByPid($pid,$limit='10',$order='i_submitdate desc',$ishot=false)
	{
		$criteria=new CDbCriteria;
		$idArr=Icolumn::model()->getAllByPid($pid);
		$criteria->addCondition("i_class in(".join(",",$idArr).")");
		if($ishot)$criteria->addCondition("i_bool = 1 ");
		$criteria->limit=$limit;
		$criteria->order=$order;
		$News=$this->findAll($criteria);
		return $News;
	}
	//根据新闻标签得到新闻
	public function getAllByLable($label,$limit='10',$classid='',$order='i_submitdate desc',$ishot=false)
	{
		$criteria=new CDbCriteria;
		$criteria->addCondition("i_label in(".join(",",$label).")");
		if($ishot)$criteria->addCondition(" i_bool = 1 ");
		if($classid)$criteria->addCondition(" i_class = '{$classid}' ");
		$criteria->limit=$limit;
		$criteria->order=$order;
		$News=$this->findAll($criteria);
		return $News;
	}
}