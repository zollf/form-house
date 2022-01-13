<?php

namespace formhouse\formhouse;

use formhouse\formhouse\models\Settings;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\web\UrlManager;
use craft\events\RegisterUrlRulesEvent;

use yii\base\Event;

/**
 * Class FormHouse
 *
 * @author    Dylan Kennedy, Jake Helfrich
 * @package   FormHouse
 * @since     0.0.1
 *
 * @property Settings $settings
 * @method Settings getSettings()
 */
class FormHouse extends Plugin
{
    /**
     * @var FormHouse
     */
    public static $plugin;

    /**
     * @var string
     */
    public $schemaVersion = '1.0.0';

    /**
     * @var bool
     */
    public $hasCpSettings = true;

    /**
     * @var bool
     */
    public $hasCpSection = true;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Event::on(
            UrlManager::class,
            UrlManager::EVENT_REGISTER_SITE_URL_RULES,
            function (RegisterUrlRulesEvent $event) {
                // $event->rules['siteActionTrigger1'] = 'form-house/forms';
            }
        );

        Event::on(
            UrlManager::class,
            UrlManager::EVENT_REGISTER_CP_URL_RULES,
            function (RegisterUrlRulesEvent $event) {
                $event->rules['form-house'] = 'form-house/forms';
            }
        );
    }

    public function getCpNavItem()
    {
        $item = parent::getCpNavItem();
        $item['subnav'] = [
            'forms' => ['label' => 'Forms', 'url' => 'form-house/'],
            'fields' => ['label' => 'Fields', 'url' => 'form-house/fields'],
            'submissions' => ['label' => 'Submissions', 'url' => 'form-house/submissions'],
        ];

        return $item;
    }

    /**
     * @inheritdoc
     */
    protected function createSettingsModel()
    {
        return new Settings();
    }

    /**
     * @inheritdoc
     */
    protected function settingsHtml(): string
    {
        return Craft::$app->view->renderTemplate(
            'form-house/settings',
            [
                'settings' => $this->getSettings()
            ]
        );
    }
}
