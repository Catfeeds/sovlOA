<?php

/**
 * This is the model class for table "xlcal".
 *
 * The followings are the available columns in table 'xlcal':
 * @property integer $zy_id
 * @property string $zy_class
 */
class Xlcal extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Xlcal the static model class
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
		return 'xlcal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('zy_class', 'required'),
			array('zy_class', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('zy_id, zy_class', 'safe', 'on'=>'search'),
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
			'zy_id' => 'Zy',
			'zy_class' => 'Zy Class',
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

		$criteria->compare('zy_id',$this->zy_id);

		$criteria->compare('zy_class',$this->zy_class,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function getAllZyList($toArray = true, $order="zy_id"){
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
            $return[$value->zy_id] = $value->zy_class;
        }
        return $return;
    }
}