<?php
// Para eliminar el Warning se agrega la siguiente línea
// http://www.tutorial-zoo.com/yii-2/fixtures/creating-a-new-fixture
// Exception 'yii\base\InvalidParamException' with message 'Invalid path alias: @tests/unit/fixtures'
Yii::setAlias('tests', dirname(dirname(__DIR__)) . '/tests');