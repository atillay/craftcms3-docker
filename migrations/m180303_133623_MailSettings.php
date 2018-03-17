<?php

namespace craft\contentmigrations;

use Craft;
use craft\db\Migration;
use craft\mail\transportadapters\Sendmail;
use craft\mail\transportadapters\Smtp;
use craft\models\MailSettings;

/**
 * m180303_133623_MailSettings migration.
 */
class m180303_133623_MailSettings extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        /** @var MailSettings $settings */
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

        return Craft::$app->getSystemSettings()->saveSettings('email', $settings->toArray());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        /** @var MailSettings $settings */
        $settings = Craft::$app->getSystemSettings()->getEmailSettings();

        $settings->transportType = Sendmail::class;
        $settings->transportSettings = null;

        return Craft::$app->getSystemSettings()->saveSettings('email', $settings->toArray());
    }
}
