<?php
    $validated = get_transient('zippy_engage_site_validated');
    $date_validated = $validated ? new DateTime('@' . $validated) : null;

    $logo = zippy_engage_plugins_url('assets/img/engage_logo.png');
?>

<div class="wrap">
    <img src="<?php echo $logo;  ?>" style="max-width: 400px;">
    <?php if ($date_validated): ?>
        <div class="notice notice-success" style="max-width: 800px;">
            <p>Zippy Engage has been successfully connected to your site. Last checked on: <?php echo $date_validated->format('m/d/y'); ?></p>
        </div>
    <?php endif; ?>
        <div class="postbox" style="max-width: 800px;">
            <div class="inside">
                <h2>Conversations and Targeting</h2>
                <p>Your conversations can all be viewed and edited from your Zippy Engage dashboard.</p>
                <a class="button button-primary" target="_blank" href="https://zippyengage.com/dashboard">Access My Zippy Engage Dashboard</a>
                <a class="button" target="_blank" href="http://zippy-engage.helpscoutdocs.com/">Documentation</a>
            </div>
        </div>

</div>
