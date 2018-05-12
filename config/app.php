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
                'host'              => getenv('SMTP_HOST') ?: 'localhost',
                'port'              => getenv('SMTP_PORT') ?: 25,
                'useAuthentication' => getenv('SMTP_USERNAME') || getenv('SMTP_PASSWORD'),
                'username'          => getenv('SMTP_USERNAME') ?: null,
                'password'          => getenv('SMTP_PASSWORD') ?: null,
                'encryptionMethod'  => getenv('SMTP_ENCRYPTION') ?: null,
                'timeout'           => getenv('SMTP_TIMEOUT') ?: 10
            ];

            return MailerHelper::createMailer($settings);
        }
    ],
];
