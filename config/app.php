<?php
/**
 * Yii Application Config
 *
 * Edit this file at your own risk!
 *
 * The array returned by this file will get merged with
 * vendor/craftcms/cms/src/config/app/main.php and [web|console].php, when
 * Craft's bootstrap script is defining the configuration for the entire
 * application.
 *
 * You can define custom modules and system components, and even override the
 * built-in system components.
 */

use craft\helpers\MailerHelper;
use craft\mail\transportadapters\Smtp;

return [
    'modules' => [
        'my-module' => \modules\Module::class,
    ],
    'components' => [
        'mailer' => function() {

            $settings = Craft::$app->getSystemSettings()->getEmailSettings();

            $settings->transportType = Smtp::class;
            $settings->transportSettings = [
                'host'              => 'maildev',
                'port'              => 25,
                'useAuthentication' => false,
                'username'          => null,
                'password'          => null,
                'encryptionMethod'  => null,
                'timeout'           => 10
            ];

            return MailerHelper::createMailer($settings);
        }
    ],
];
