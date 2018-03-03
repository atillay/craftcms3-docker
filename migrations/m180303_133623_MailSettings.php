<?php

namespace craft\contentmigrations;

use Craft;
use craft\db\Migration;
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
        $settings = new MailSettings();

        $settings->fromEmail = 'admin@craft.local';
        $settings->fromName = 'CraftCMS';
        $settings->transportType = 'craft\mail\transportadapters\Smtp';
        $settings->transportSettings = [
            'host'              => 'maildev',
            'port'              => 25,
            'useAuthentication' => false,
            'username'          => null,
            'password'          => null,
            'encryptionMethod'  => null,
            'timeout'           => 10
        ];

        Craft::$app->getSystemSettings()->saveSettings('email', $settings->toArray());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180303_133623_MailSettings cannot be reverted, visit /admin/settings/email to modify.\n";
        return false;
    }
}
