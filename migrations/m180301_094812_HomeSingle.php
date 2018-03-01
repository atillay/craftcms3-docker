<?php

namespace craft\contentmigrations;

use Craft;
use craft\db\Migration;
use craft\models\Section;
use craft\models\Section_SiteSettings;

/**
 * m180301_094812_HomeSingle migration.
 */
class m180301_094812_HomeSingle extends Migration
{
    const HOME_HANDLE = 'home';

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        /** @var Section $section */
        $section = new Section();

        $section->name = 'home';
        $section->handle = self::HOME_HANDLE;
        $section->type = Section::TYPE_SINGLE;
        $section->enableVersioning = true;
        $section->propagateEntries = true;

        $allSiteSettings = [];

        foreach (Craft::$app->getSites()->getAllSites() as $site) {

            /** @var Section_SiteSettings $siteSettings */
            $siteSettings = new Section_SiteSettings();
            $siteSettings->siteId = $site->id;
            $siteSettings->hasUrls = true;
            $siteSettings->uriFormat = '__home__';
            $siteSettings->template = 'home';

            $allSiteSettings[$site->id] = $siteSettings;
        }

        $section->setSiteSettings($allSiteSettings);

        return Craft::$app->getSections()->saveSection($section);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        /** @var Section $section */
        $sectionId = Craft::$app->getSections()->getSectionByHandle(self::HOME_HANDLE)->id;

        return Craft::$app->getSections()->deleteSectionById($sectionId);
    }
}
