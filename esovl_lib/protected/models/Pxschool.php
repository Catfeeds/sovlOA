<?php

/**
 * This is the model class for table "pxschool".
 *
 * The followings are the available columns in table 'pxschool':
 * @property integer $pxs_id
 * @property string $pxs_name
 * @property integer $pxs_bool
 */
class Pxschool extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Pxschool the static model class
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
		return 'pxschool';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pxs_name', 'required'),
			array('pxs_bool', 'numerical', 'integerOnly'=>true),
			array('pxs_name', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pxs_id, pxs_name, pxs_bool', 'safe', 'on'=>'search'),
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
			'pxs_id' => 'Pxs',
			'pxs_name' => 'Pxs Name',
			'pxs_bool' => 'Pxs Bool',
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

		$criteria->compare('pxs_id',$this->pxs_id);

		$criteria->compare('pxs_name',$this->pxs_name,true);

		$criteria->compare('pxs_bool',$this->pxs_bool);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function getAllByPxid()
	{
		$criteria=new CDbCriteria;
		$models = $this->findAll($criteria);
		$pxsid = array();
		foreach($models as $val){
			$pxsid[] = $val['pxs_id'];
		}
		return $pxsid;
	}
}