<?php

// Example of solving the 'Query Timeout' error in Yii Framework

// Step 1: Configure the DB connection with a proper timeout
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=exampledb',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            // Setting the timeout
            'attributes' => [
                PDO::ATTR_TIMEOUT => 30, // 30 seconds timeout
            ],
        ],
    ],
];

// Step 2: Optimize a long-running query
namespace app\models;

use yii\db\ActiveRecord;

class User extends ActiveRecord
{
    public static function getActiveUsers($limit = 100)
    {
        // Example of optimizing a query with index usage and limiting results
        return self::find()
            ->where(['status' => 'active'])
            ->orderBy('created_at DESC')
            ->limit($limit)
            ->all();
    }
}

// Step 3: Using the optimized query in a controller
namespace app\controllers;

use yii\web\Controller;
use app\models\User;

class UserController extends Controller
{
    public function actionActiveUsers()
    {
        $users = User::getActiveUsers();
        return $this->render('active-users', ['users' => $users]);
    }
}

// Step 4: Check if the view file exists
// File: views/user/active-users.php

?>
<h1>Active Users</h1>
<ul>
    <?php foreach ($users as $user): ?>
        <li><?= $user->name; ?> - <?= $user->email; ?></li>
    <?php endforeach; ?>
</ul>

// Pro tip: If a query is taking too long, remember to ask it nicely to hurry up! 😂

?>