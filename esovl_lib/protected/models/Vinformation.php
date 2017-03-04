<?php

/**
 * This is the model class for table "vinformation".
 *
 * The followings are the available columns in table 'vinformation':
 * @property integer $vi_id
 * @property integer $vi_class
 * @property integer $vi_label
 * @property string $vi_title
 * @property string $vi_pic
 * @property string $vi_vsp
 * @property string $vi_con
 * @property integer $vi_click
 * @property integer $vi_bool
 * @property integer $vi_submitdate
 * @property integer $vi_updatetime
 * @property string $vi_from
 * @property string $vi_author
 */
class Vinformation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Vinformation the static model class
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
		return 'vinformation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vi_class, vi_title, vi_vsp, vi_con', 'required'),
			array('vi_class, vi_label, vi_click, vi_bool, vi_submitdate, vi_updatetime', 'numerical', 'integerOnly'=>true),
			array('vi_title, vi_pic, vi_vsp, vi_from, vi_author', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('vi_id, vi_class, vi_label, vi_title, vi_pic, vi_vsp, vi_con, vi_click, vi_bool, vi_submitdate, vi_updatetime, vi_from, vi_author', 'safe', 'on'=>'search'),
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
			'vi_id' => 'Vi',
			'vi_class' => 'Vi Class',
			'vi_label' => 'Vi Label',
			'vi_title' => 'Vi Title',
			'vi_pic' => 'Vi Pic',
			'vi_vsp' => 'Vi Vsp',
			'vi_con' => 'Vi Con',
			'vi_click' => 'Vi Click',
			'vi_bool' => 'Vi Bool',
			'vi_submitdate' => 'Vi Submitdate',
			'vi_updatetime' => 'Vi Updatetime',
			'vi_from' => 'Vi From',
			'vi_author' => 'Vi Author',
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

		$criteria->compare('vi_id',$this->vi_id);

		$criteria->compare('vi_class',$this->vi_class);

		$criteria->compare('vi_label',$this->vi_label);

		$criteria->compare('vi_title',$this->vi_title,true);

		$criteria->compare('vi_pic',$this->vi_pic,true);

		$criteria->compare('vi_vsp',$this->vi_vsp,true);

		$criteria->compare('vi_con',$this->vi_con,true);

		$criteria->compare('vi_click',$this->vi_click);

		$criteria->compare('vi_bool',$this->vi_bool);

		$criteria->compare('vi_submitdate',$this->vi_submitdate);

		$criteria->compare('vi_updatetime',$this->vi_updatetime);

		$criteria->compare('vi_from',$this->vi_from,true);

		$criteria->compare('vi_author',$this->vi_author,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	//根据新闻父栏目ID得到新闻
	public function getAllByPid($pid='',$limit='10',$order='vi_submitdate desc',$ishot=false,$offset=0)
	{
		$criteria=new CDbCriteria;
		if($pid){
			$idArr=Vcolumn::model()->getAllByPid($pid);		
			$criteria->addCondition("vi_class in(".join(",",$idArr).")");
		}
		if($ishot)$criteria->addCondition("vi_bool = 1 ");
		$criteria->limit=$limit;
		$criteria->offset=$offset;
		$criteria->order=$order;
		$News=$this->findAll($criteria);
		return $News;
	}
	//根据新闻标签得到新闻 
	public function getAllByLable($label,$limit='10',$classid='',$order='vi_submitdate desc',$ishot=false,$offset=0)
	{
		$criteria=new CDbCriteria;
		$criteria->addCondition("vi_label in(".join(",",$label).")");
		if($ishot)$criteria->addCondition(" vi_bool = 1 ");
		if($classid)$criteria->addCondition(" vi_class = '{$classid}' ");
		$criteria->limit=$limit;
		$criteria->order=$order;
		$criteria->offset=$offset;
		$News=$this->findAll($criteria);
		return $News;
	}
}