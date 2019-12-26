<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string $location
 * @property string $square
 * @property string $price
 * @property string $client
 * @property string $plan_picture
 * @property string $poster_picture
 * @property string $some_picture
 * @property int $order_of
 * @property int $status
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $filePicture;
    public $filePoster;
    public $fileSome;
    public $slider;

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public static function tableName()
    {
        return 'project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['location', 'square', 'price', 'client', 'order_of'], 'required'],
            [['client'], 'string'],
            [['order_of', 'status'], 'integer'],
            [['location', 'square', 'plan_picture', 'poster_picture', 'some_picture'], 'string', 'max' => 255],
            [['price'], 'string', 'max' => 10],
            [['filePicture', 'filePoster', 'fileSome'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['slider'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 8],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'location' => 'Наименование',
            'square' => 'Категория',
            'price' => 'Цена',
            'client' => 'Описание',
            'plan_picture' => 'Главная картинка',
            'poster_picture' => 'Poster Picture',
            'some_picture' => 'Some Picture',
            'order_of' => 'Order Of',
            'status' => 'Status',
        ];
    }

    public function setImage()
    {
        $this->filePicture = UploadedFile::getInstance($this, 'filePicture');
        if ($this->filePicture) {
            $this->deleteImage($this->plan_picture);
            $this->plan_picture = 'uploads/' . $this->filePicture->baseName . date('YmdHis') . '.' . $this->filePicture->extension;
        }

        $this->filePoster = UploadedFile::getInstance($this, 'filePoster');
        if ($this->filePoster) {
            $this->deleteImage($this->poster_picture);
            $this->poster_picture = 'uploads/' . $this->filePoster->baseName . date('YmdHis') . '.' . $this->filePoster->extension;
        }

        $this->fileSome = UploadedFile::getInstance($this, 'fileSome');
        if ($this->fileSome) {
            $this->deleteImage($this->some_picture);
            $this->some_picture = 'uploads/' . $this->fileSome->baseName . date('YmdHis') . '.' . $this->fileSome->extension;
        }

        $this->slider = UploadedFile::getInstances($this, 'slider');
        if ($this->slider) {

//            $this->deleteImage($this->some_picture);
//            $this->some_picture = 'uploads/' . $this->fileSome->baseName . date('YmdHis') . '.' . $this->fileSome->extension;
        }

    }

    public function saveImage()
    {
        if ($this->validate()) {
            if ($this->filePicture) {
                $this->filePicture->saveAs('uploads/' . $this->filePicture->baseName . date('YmdHis') . '.' . $this->filePicture->extension);
            }

            if ($this->filePoster) {
                $this->filePoster->saveAs('uploads/' . $this->filePoster->baseName . date('YmdHis') . '.' . $this->filePoster->extension);
            }

            if ($this->fileSome) {
                $this->fileSome->saveAs('uploads/' . $this->fileSome->baseName . date('YmdHis') . '.' . $this->fileSome->extension);
            }
            foreach ($this->slider as $file) {
                $file->saveAs('uploads/slider/' . $file->baseName . date('YmdHis') . '.' . $file->extension);
                $this->attachImage('uploads/slider/' . $file->baseName . date('YmdHis') . '.' . $file->extension);
                $this->deleteImage('uploads/slider/' . $file->baseName . date('YmdHis') . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }

    public function deleteImage($filePic) {
        if (file_exists($filePic)) {
            unlink($filePic);
        }
    }
}
