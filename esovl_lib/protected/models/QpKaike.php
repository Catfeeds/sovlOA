<?php

/**
 * This is the model class for table "qp_kaike".
 *
 * The followings are the available columns in table 'qp_kaike':
 * @property integer $qpk_id
 * @property string $qpk_title
 * @property string $npic
 * @property string $qpk_num
 */
class QpKaike extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return QpKaike the static model class
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
		return 'qp_kaike';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('qpk_title, npic, qpk_num', 'required'),
			array('qpk_title, npic, qpk_num', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('qpk_id, qpk_title, npic, qpk_num', 'safe', 'on'=>'search'),
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
			'qpk_id' => 'Qpk',
			'qpk_title' => 'Qpk Title',
			'npic' => 'Npic',
			'qpk_num' => 'Qpk Num',
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

		$criteria->compare('qpk_id',$this->qpk_id);

		$criteria->compare('qpk_title',$this->qpk_title,true);

		$criteria->compare('npic',$this->npic,true);

		$criteria->compare('qpk_num',$this->qpk_num,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
		
	//
	public function getAll($limit='6',$order='')
	{
		$criteria=new CDbCriteria;
		if($order)$criteria->order=$order;
		if($limit)$criteria->limit=$limit;
		$array=$this->findAll($criteria);
		return $array;
	}
	public function getAllLbList($toArray = true, $order="qpk_id"){
		$criteria=new CDbCriteria;
		$criteria->order = $order;
		$all = $this->findAll($criteria);
		if($toArray){
            $all = $this->fomartToArray($all);
        }
		return $all;
	}
	
    private function fomartToArray($all){
        $return = array();
        foreach($all as $value){
            $return[$value->qpk_id] = $value->qpk_title;
        }
        return $return;
    }
}