<?php

// Example of solving the 'Unknown Property' error in Yii Framework

// Humor: Time to be a detective and find that sneaky property! 🔍

// Model definition with proper attributes
class User extends \yii\db\ActiveRecord
{
    // Define attributes
    public $firstName;
    public $lastName;
    
    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['firstName', 'lastName'], 'required'],
            [['firstName', 'lastName'], 'string', 'max' => 255],
        ];
    }
}

// Controller using the model
class UserController extends \yii\web\Controller
{
    public function actionCreate()
    {
        $model = new User();
        
        // Assigning values correctly
        $model->firstName = 'John';
        $model->lastName = 'Doe';

        if ($model->save()) {
            // Humor: Another case closed! 🕵️‍♂️
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            // Humor: Seems like we need to dig deeper... 🕵️‍♀️
            return $this->render('create', ['model' => $model]);
        }
    }
}

// Humor: Even Sherlock Holmes would be impressed with this debugging! 🕵️
?>