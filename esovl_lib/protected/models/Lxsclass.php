<?php

/**
 * This is the model class for table "lxsclass".
 *
 * The followings are the available columns in table 'lxsclass':
 * @property integer $ls_id
 * @property integer $lb_id
 * @property string $ls_title
 */
class Lxsclass extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Lxsclass the static model class
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
		return 'lxsclass';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lb_id, ls_title', 'required'),
			array('lb_id', 'numerical', 'integerOnly'=>true),
			array('ls_title', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ls_id, lb_id, ls_title', 'safe', 'on'=>'search'),
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
			'ls_id' => 'Ls',
			'lb_id' => 'Lb',
			'ls_title' => 'Ls Title',
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

		$criteria->compare('ls_id',$this->ls_id);

		$criteria->compare('lb_id',$this->lb_id);

		$criteria->compare('ls_title',$this->ls_title,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}