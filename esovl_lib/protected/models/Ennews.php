<?php

/**
 * This is the model class for table "ennews".
 *
 * The followings are the available columns in table 'ennews':
 * @property integer $nid
 * @property integer $nclass
 * @property integer $smclass
 * @property string $ntitle
 * @property string $npic
 * @property string $ncon
 * @property integer $nclick
 * @property integer $nbool
 * @property string $ndate
 * @property integer $ntype
 */
class Ennews extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ennews the static model class
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
		return 'ennews';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nid, nclass, ntitle, ndate', 'required'),
			array('nid, nclass, smclass, nclick, nbool, ntype', 'numerical', 'integerOnly'=>true),
			array('ntitle', 'length', 'max'=>100),
			array('npic', 'length', 'max'=>200),
			array('ncon', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('nid, nclass, smclass, ntitle, npic, ncon, nclick, nbool, ndate, ntype', 'safe', 'on'=>'search'),
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
			'smclass' => 'Smclass',
			'ntitle' => 'Ntitle',
			'npic' => 'Npic',
			'ncon' => 'Ncon',
			'nclick' => 'Nclick',
			'nbool' => 'Nbool',
			'ndate' => 'Ndate',
			'ntype' => 'Ntype',
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

		$criteria->compare('smclass',$this->smclass);

		$criteria->compare('ntitle',$this->ntitle,true);

		$criteria->compare('npic',$this->npic,true);

		$criteria->compare('ncon',$this->ncon,true);

		$criteria->compare('nclick',$this->nclick);

		$criteria->compare('nbool',$this->nbool);

		$criteria->compare('ndate',$this->ndate,true);

		$criteria->compare('ntype',$this->ntype);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	//热点新闻
	public function getHotNews($idArr,$limit='10',$order='nclick desc')
	{
		$criteria=new CDbCriteria;
		$criteria->addCondition("nclass in(".join(",",$idArr).") and nbool=1");
		$criteria->limit=$limit;
		$criteria->order=$order;
		$HotNews=Ennews::model()->findAll($criteria);
		return $HotNews;
	}
	//热点新闻
	public function getAllNews($idArr,$limit='10',$order='nclick desc')
	{
		$criteria=new CDbCriteria;
		$criteria->addCondition("nclass in(".join(",",$idArr).") ");
		$criteria->limit=$limit;
		$criteria->order=$order;
		$HotNews=Ennews::model()->findAll($criteria);
		return $HotNews;
	}
}