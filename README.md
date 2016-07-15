Work with params for Yii2
=========================
Work with params for Yii2

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist pashkinz92/yii2-params "dev-master"
```

or add

```
"pashkinz92/yii2-params": "dev-master"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```
$config['bootstrap'][] = 'params';
$config['modules']['params'] = [
    'class' => 'pashkinz92\params\module\ParamsModule',
];
```

```yii migrate --migrationPath=@pashkinz92/params/migrations```

