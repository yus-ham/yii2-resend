# Yii 2 extension for [Resend](https://resend.com/)


You need this library? just install it through composer

`composer require yus-ham/yii2-resend --prefer-dist -o`


Also don't forget to configure 

```php
$config['components']['mailer'] = [
    'class' => 'yusham\resend\Mailer',
    'useFileTransport' => false,
    'viewPath' => '@app/mail',
    'transport' => [
        'apiKey' => '<YOUR_API_KEY>'
    ],
];
```


And you can then send an email as usually
```php
Yii::$app->mailer->compose('contact/html')
     ->setFrom('from@domain.com')
     ->setTo($form->email)
     ->setSubject($form->subject)
     ->send();
```
