<?php

/**
 * This is the model class for table "Slideshow".
 *
 * The followings are the available columns in table 'Slideshow':
 * @property string $id
 * @property string $title_az
 * @property string $title_en
 * @property string $title_ru
 * @property integer $sort
 * @property string $imgUrl
 * @property string $text_az
 * @property string $text_en
 * @property string $text_ru
 * @property string $url_az
 * @property string $url_en
 * @property string $url_ru
 */
class Slideshow extends CActiveRecord
{
    public $image;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Slideshow';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title_az, imgUrl, text_az, url_az', 'required'),
			array('sort', 'numerical', 'integerOnly'=>true),
			array('title_az, title_en, title_ru, imgUrl, url_az, url_en, url_ru', 'length', 'max'=>255),
			array('text_az, text_en, text_ru', 'length', 'max'=>150),
            array(
                'image', 'file',
                'types' => 'jpg, gif, png, jpeg',
                'safe' => true,
                'allowEmpty' => true,
                'maxSize' => 1024 * 1024 * 500,
            ),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title_az, title_en, title_ru, sort, imgUrl, text_az, text_en, text_ru, url_az, url_en, url_ru', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'title_az' => 'Başlıq',
			'title_en' => 'Heading',
			'title_ru' => 'Заголовок',
			'sort' => 'Növbə',
			'imgUrl' => 'Img Url',
			'text_az' => 'Mətn',
			'text_en' => 'Text',
			'text_ru' => 'Text Ru',
			'url_az' => 'Link (az)',
			'url_en' => 'Link (en)',
			'url_ru' => 'Link (ru)',
            'image' => 'Şəkil',
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
		$criteria->compare('sort',$this->sort);
		$criteria->compare('imgUrl',$this->imgUrl,true);
		$criteria->compare('text_az',$this->text_az,true);
		$criteria->compare('text_en',$this->text_en,true);
		$criteria->compare('text_ru',$this->text_ru,true);
		$criteria->compare('url_az',$this->url_az,true);
		$criteria->compare('url_en',$this->url_en,true);
		$criteria->compare('url_ru',$this->url_ru,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Slideshow the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
