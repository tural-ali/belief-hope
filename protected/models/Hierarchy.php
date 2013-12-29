<?php

/**
 * This is the model class for table "Hierarchy".
 *
 * The followings are the available columns in table 'Hierarchy':
 * @property string $id
 * @property string $title_az
 * @property string $title_en
 * @property string $title_ru
 * @property string $token
 * @property string $sort
 * @property string $parent
 * @property integer $menuType
 * @property string $icon
 * @property integer $blog
 *
 * The followings are the available model relations:
 * @property Content[] $contents
 */
class Hierarchy extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Hierarchy';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sort', 'required'),
			array('menuType, blog', 'numerical', 'integerOnly'=>true),
			array('title_az, title_en, title_ru, token, icon', 'length', 'max'=>255),
			array('sort, parent', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title_az, title_en, title_ru, token, sort, parent, menuType, icon, blog', 'safe', 'on'=>'search'),
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
			'contents' => array(self::HAS_MANY, 'Content', 'catID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title_az' => 'Title Az',
			'title_en' => 'Title En',
			'title_ru' => 'Title Ru',
			'token' => 'Token',
			'sort' => 'Sort',
			'parent' => 'Parent',
			'menuType' => '1 - top 
2 - bottom 
3 - left',
			'icon' => 'Icon',
			'blog' => 'Blog',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('title_az',$this->title_az,true);
		$criteria->compare('title_en',$this->title_en,true);
		$criteria->compare('title_ru',$this->title_ru,true);
		$criteria->compare('token',$this->token,true);
		$criteria->compare('sort',$this->sort,true);
		$criteria->compare('parent',$this->parent,true);
		$criteria->compare('menuType',$this->menuType);
		$criteria->compare('icon',$this->icon,true);
		$criteria->compare('blog',$this->blog);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Hierarchy the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
