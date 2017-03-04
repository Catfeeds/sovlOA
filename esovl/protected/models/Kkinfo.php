<?php

/**
 * This is the model class for table "kkinfo".
 *
 * The followings are the available columns in table 'kkinfo':
 * @property integer $kid
 * @property integer $s_id
 * @property string $zyclass
 * @property string $zyname
 * @property string $ktitle
 * @property string $k_pic
 * @property string $zycon
 * @property double $xfei
 * @property integer $yhui
 * @property string $k_adderss
 * @property string $k_line
 * @property string $kcal
 * @property string $ktime
 * @property string $kdate
 * @property string $xlcal
 * @property string $xfen
 * @property integer $kclick
 * @property string $kkdate
 * @property integer $bk_id
 * @property integer $k_bj
 */
class Kkinfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Kkinfo the static model class
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
		return 'kkinfo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('s_id, zyclass, zyname, ktitle, zycon, xfei, kcal, ktime, kdate, xlcal, xfen, kclick, kkdate, bk_id', 'required'),
			array('s_id, yhui, kclick, bk_id, k_bj', 'numerical', 'integerOnly'=>true),
			array('xfei', 'numerical'),
			array('zyclass, zyname, ktitle, k_line, kcal, ktime, kdate, xlcal, xfen', 'length', 'max'=>200),
			array('k_pic', 'length', 'max'=>120),
			array('k_adderss', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('kid, s_id, zyclass, zyname, ktitle, k_pic, zycon, xfei, yhui, k_adderss, k_line, kcal, ktime, kdate, xlcal, xfen, kclick, kkdate, bk_id, k_bj', 'safe', 'on'=>'search'),
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
			'schoolinfo' => array(self::BELONGS_TO, 'School', '', 'on' => 't.s_id=schoolinfo.s_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'kid' => 'Kid',
			's_id' => 'S',
			'zyclass' => 'Zyclass',
			'zyname' => 'Zyname',
			'ktitle' => 'Ktitle',
			'k_pic' => 'K Pic',
			'zycon' => 'Zycon',
			'xfei' => 'Xfei',
			'yhui' => 'Yhui',
			'k_adderss' => 'K Adderss',
			'k_line' => 'K Line',
			'kcal' => 'Kcal',
			'ktime' => 'Ktime',
			'kdate' => 'Kdate',
			'xlcal' => 'Xlcal',
			'xfen' => 'Xfen',
			'kclick' => 'Kclick',
			'kkdate' => 'Kkdate',
			'bk_id' => 'Bk',
			'k_bj' => 'K Bj',
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

		$criteria->compare('kid',$this->kid);

		$criteria->compare('s_id',$this->s_id);

		$criteria->compare('zyclass',$this->zyclass,true);

		$criteria->compare('zyname',$this->zyname,true);

		$criteria->compare('ktitle',$this->ktitle,true);

		$criteria->compare('k_pic',$this->k_pic,true);

		$criteria->compare('zycon',$this->zycon,true);

		$criteria->compare('xfei',$this->xfei);

		$criteria->compare('yhui',$this->yhui);

		$criteria->compare('k_adderss',$this->k_adderss,true);

		$criteria->compare('k_line',$this->k_line,true);

		$criteria->compare('kcal',$this->kcal,true);

		$criteria->compare('ktime',$this->ktime,true);

		$criteria->compare('kdate',$this->kdate,true);

		$criteria->compare('xlcal',$this->xlcal,true);

		$criteria->compare('xfen',$this->xfen,true);

		$criteria->compare('kclick',$this->kclick);

		$criteria->compare('kkdate',$this->kkdate,true);

		$criteria->compare('bk_id',$this->bk_id);

		$criteria->compare('k_bj',$this->k_bj);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	//根据上课类型
	public function getAllByKcal($Kcal,$limit='9'){
		$criteria=new CDbCriteria;
		$criteria->limit=$limit;
		$criteria->with='schoolinfo';
		$criteria->addCondition("bk_id=1 and kcal like'%{$Kcal}%'");
		$criteria->order='kkdate desc';
		$models=$this->findAll($criteria);
		return $models;
	}
	public function getOtherByKcal($Kcal,$limit='9'){
		$criteria=new CDbCriteria;
		$criteria->limit=$limit;
		$criteria->with='schoolinfo';
		$criteria->addCondition("kcal like'%{$Kcal}%'");
		$criteria->order='kkdate desc';
		$models=$this->findAll($criteria);
		return $models;
	}
	//根据专业类别
	public function getAllByZyclass($Zyclass,$limit='9'){
		$criteria=new CDbCriteria;
		$criteria->limit=$limit;
		$criteria->with='schoolinfo';
		$criteria->addCondition("bk_id=1 and zyclass like'%{$Zyclass}%'");
		$criteria->order='kkdate desc';
		$models=$this->findAll($criteria);
		return $models;
	}
	public function getOtherByZyclass($Zyclass,$limit='9'){
		$criteria=new CDbCriteria;
		$criteria->limit=$limit;
		$criteria->with='schoolinfo';
		$criteria->addCondition("zyclass like'%{$Zyclass}%'");
		$criteria->order='kkdate desc';
		$models=$this->findAll($criteria);
		return $models;
	}
	
}