<?php

/**
 * This is the model class for table "nnews".
 *
 * The followings are the available columns in table 'nnews':
 * @property integer $nid
 * @property integer $nclass
 * @property string $ntitle
 * @property string $npic
 * @property string $ncon
 * @property integer $nclick
 * @property integer $nbool
 * @property string $ndate
 */
class Nnews extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Nnews the static model class
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
		return 'nnews';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nid, nclass, ntitle, ncon, ndate', 'required'),
			array('nid, nclass, nclick, nbool', 'numerical', 'integerOnly'=>true),
			array('ntitle', 'length', 'max'=>200),
			array('npic', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('nid, nclass, ntitle, npic, ncon, nclick, nbool, ndate', 'safe', 'on'=>'search'),
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
			'nid' => 'Nid',
			'nclass' => 'Nclass',
			'ntitle' => 'Ntitle',
			'npic' => 'Npic',
			'ncon' => 'Ncon',
			'nclick' => 'Nclick',
			'nbool' => 'Nbool',
			'ndate' => 'Ndate',
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

		$criteria->compare('nid',$this->nid);

		$criteria->compare('nclass',$this->nclass);

		$criteria->compare('ntitle',$this->ntitle,true);

		$criteria->compare('npic',$this->npic,true);

		$criteria->compare('ncon',$this->ncon,true);

		$criteria->compare('nclick',$this->nclick);

		$criteria->compare('nbool',$this->nbool);

		$criteria->compare('ndate',$this->ndate,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	//ÍÆ¼öÑ§Ð£
	public function getTjNews($limit='5')
	{
		$criteria=new CDbCriteria;
		$criteria->addCondition('nbool=1');
		$criteria->order="ndate desc";
		$criteria->limit=$limit;
		$TjNews=$this->findAll($criteria);
		return $TjNews;
	}
}