<?php
namespace backend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;

    public $first_name;
    public $last_name;
    public $age;
    public $gender;
    public $birthdate;
    public $address;
    public $type;

    public $section_id;
    public $level_id;

    public $full_name;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['first_name', 'required'],
            ['last_name', 'required'],
            ['age', 'required'],
            ['type', 'required'],
            ['gender', 'required'],
            ['birthdate', 'required'],
            ['address', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            [['section_id','level_id'], 'safe'],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['age', 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'level_id' => 'Grade Level',
            'section_id' => 'Section',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->type = $this->type;
            $user->first_name = $this->first_name;
            $user->last_name = $this->last_name;
            $user->full_name = $this->first_name." ".$this->last_name;
            $user->age = $this->age;
            $user->gender = $this->gender;
            $user->birthdate = $this->birthdate;
            $user->address = $this->address;
            if ($this->type == 'Student') {
                $user->section_id = $this->section_id;
                $user->level_id = $this->level_id;    
            } else {
                $user->section_id = '';
                $user->level_id = '';
            }
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                Yii::$app->session->setFlash('success');
            } else {
                Yii::$app->session->setFlash('failed');
            }
        }

        return null;
    }
}
