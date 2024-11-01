<?php

class ZippyEngageCore
{
    public $scriptUrl;

    public function __construct()
    {
        $this->scriptUrl = 'https://cdn.zippyengage.com/script.js';

        add_action('plugins_loaded', array($this, 'setup'));
    }

    public function setup()
    {
        $this->addActions();
        $this->addFilters();
    }


    private function addActions()
    {
        add_action('wp_footer', array($this, 'renderScript'));
        add_action('admin_menu', array($this, 'registerToolsPage'));

        if (is_admin() && !$this->siteIsValidated()) {
            add_action('admin_notices', array($this, 'renderAdminNotice'));
        }
    }

    public function registerToolsPage()
    {
        add_submenu_page('tools.php', 'Zippy Engage', 'Zippy Engage', 'manage_options', 'zippy-engage', array($this, 'renderToolsPage'));
    }

    public function renderToolsPage()
    {
        require_once(zippy_engage_root_dir() . '/views/Admin.php');
    }

    private function siteIsValidated()
    {
        if (!get_transient('zippy_engage_site_validated')) {
            return $this->validateSite();
        }

        return true;
    }

    private function validateSite()
    {
        if (ZippyEngageApi::validateSite()) {
            $date = new DateTime();
            set_transient('zippy_engage_site_validated', $date->format('U'), 12 * HOUR_IN_SECONDS);

            return true;
        }

        return false;
    }

    private function addFilters()
    {
    }

    public function renderScript()
    {
        require 'script.php';
    }

    public function renderAdminNotice()
    {
        $class = 'notice notice-error';
        $message = 'It looks like you\'ve activated the Zippy Engage plugin, but you have not authorized this site. <a href="http://zippy-engage.helpscoutdocs.com/article/196-updating-your-site-name-and-url" target="_blank">Click here to learn how</a>.';

        echo sprintf('<div class="%s"><p>%s</p></div>', $class, $message);
    }
}
