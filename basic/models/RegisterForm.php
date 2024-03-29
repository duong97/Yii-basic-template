<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\helpers\Tools;
use \app\helpers\Constants;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class RegisterForm extends Model
{
    public $email;
    public $password;
    public $cpassword;
    public $first_name, $last_name;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['email', 'password', 'cpassword', 'first_name', 'last_name'], 'required'],
            [['email'], 'email'],
            ['cpassword', 'compare', 'compareAttribute' => 'password'],
            ['password', 'string', 'length'=>[6,25], 
                'tooShort' => Yii::t("app", "Password must be between 6 and 25 characters long."),
                'tooLong'  => Yii::t("app", "Password must be between 6 and 25 characters long.")],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'cpassword' => Yii::t('app', 'Confirm Password')
        ];
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function register()
    {
        $message = '';
        if ($this->validateNewUser($message)) {
            $this->createNewUser();
        }
    }

    public function validateNewUser(&$message){
        $model = Users::find()->where(['email' => $this->email])->one();
        
        if(!empty($model)){
            $message = Yii::t('app', 'Email already exists!');
            return false;
        }
        return true;
    }
    
    public function createNewUser(){
        $user = new Users();
        $user->email            = $this->email;
        $user->created_date     = date('Y-m-d H:i:s');
        $user->last_access      = date('Y-m-d H:i:s');
        $user->salt             = md5($user->created_date);
        $user->password         = md5(trim($this->password));
        $user->first_name       = $this->first_name;
        $user->last_name        = $this->last_name;
        $user->role             = Constants::USER;
        $user->ip               = Tools::getIp();
        $user->save();
    }
}
