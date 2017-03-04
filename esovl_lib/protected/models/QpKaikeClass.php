<?php

/**
 * This is the model class for table "qp_kaike_class".
 *
 * The followings are the available columns in table 'qp_kaike_class':
 * @property integer $kk_id
 * @property integer $qpk_id
 * @property string $kk_title
 * @property string $npic
 * @property string $kk_kcts
 * @property string $kk_pxmb
 * @property string $kk_jcts
 * @property string $kk_xxjb
 * @property string $kk_sfbt
 */
class QpKaikeClass extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return QpKaikeClass the static model class
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
		return 'qp_kaike_class';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('qpk_id, kk_title, kk_kcts, kk_pxmb, kk_jcts, kk_xxjb, kk_sfbt', 'required'),
			array('qpk_id', 'numerical', 'integerOnly'=>true),
			array('kk_title, npic', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('kk_id, qpk_id, kk_title, npic, kk_kcts, kk_pxmb, kk_jcts, kk_xxjb, kk_sfbt', 'safe', 'on'=>'search'),
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
			'kk_id' => 'Kk',
			'qpk_id' => 'Qpk',
			'kk_title' => 'Kk Title',
			'npic' => 'Npic',
			'kk_kcts' => 'Kk Kcts',
			'kk_pxmb' => 'Kk Pxmb',
			'kk_jcts' => 'Kk Jcts',
			'kk_xxjb' => 'Kk Xxjb',
			'kk_sfbt' => 'Kk Sfbt',
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

		$criteria->compare('kk_id',$this->kk_id);

		$criteria->compare('qpk_id',$this->qpk_id);

		$criteria->compare('kk_title',$this->kk_title,true);

		$criteria->compare('npic',$this->npic,true);

		$criteria->compare('kk_kcts',$this->kk_kcts,true);

		$criteria->compare('kk_pxmb',$this->kk_pxmb,true);

		$criteria->compare('kk_jcts',$this->kk_jcts,true);

		$criteria->compare('kk_xxjb',$this->kk_xxjb,true);

		$criteria->compare('kk_sfbt',$this->kk_sfbt,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function getAll($id,$limit='6',$order='qpk_id desc')
	{
		$criteria=new CDbCriteria;
		if($id)$criteria->addCondition(" qpk_id = '{$id}' ");
		if($order)$criteria->order=$order;
		if($limit)$criteria->limit=$limit;
		$array=$this->findAll($criteria);
		return $array;
	}
	public function getAllKcList($toArray = true, $order="kk_id"){
		$criteria=new CDbCriteria;
		$criteria->order = $order;
		$criteria->select = 'kk_id,qpk_id,kk_title';
		$all = $this->findAll($criteria);
		if($toArray){
            $all = $this->fomartToArray($all);
        }
		return $all;
	}
	
    private function fomartToArray($all){
        $return = array();
        foreach($all as $value){
            $return[$value->qpk_id][$value->kk_id] =$value->kk_title;
        }
        return $return;
    }
}