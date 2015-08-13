<?php
/**
 * Created by PhpStorm.
 * User: kory
 * Date: 12/08/15
 * Time: 19:37
 */

namespace tests\unit\fixtures;

use yii\test\ActiveFixture;
//use tests\unit\fixtures\UserFixture;

class EmpresasFixture extends ActiveFixture
{
    public $modelClass = 'frontend\models\Empresas';
    public $depends = ['tests\unit\fixtures\UserFixture'];
    public function fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => '@app/tests/unit/fixtures/data/user.php',
            ],
        ];


    }
}