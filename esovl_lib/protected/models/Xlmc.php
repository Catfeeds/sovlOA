<?php

/**
 * This is the model class for table "xlmc".
 *
 * The followings are the available columns in table 'xlmc':
 * @property integer $mc_id
 * @property string $mc_title
 */
class Xlmc extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Xlmc the static model class
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
		return 'xlmc';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mc_title', 'required'),
			array('mc_title', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('mc_id, mc_title', 'safe', 'on'=>'search'),
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
			'mc_id' => 'Mc',
			'mc_title' => 'Mc Title',
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

		$criteria->compare('mc_id',$this->mc_id);

		$criteria->compare('mc_title',$this->mc_title,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function getAllKcList($toArray = true, $order="mc_id"){
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
            $return[$value->mc_id] = $value->mc_title;
        }
        return $return;
    }
}