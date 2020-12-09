<? if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>

<?php

/**
 * @global $APPLICATION
 */

?>

<!DOCTYPE html>
<html>
	<head>
        <?
        global $USER;
        use Bitrix\Main\Application;
        use Bitrix\Main\Page\Asset;
        use Bitrix\Main\Localization\Loc;
        Loc::loadMessages(__FILE__);
        $request = \Bitrix\Main\Context::getCurrent()->getRequest();
        ?>

		<?$APPLICATION->ShowHead();?>
		<title><?$APPLICATION->ShowTitle();?></title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
        <link rel="apple-touch-icon" sizes="76x76" href="./apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="./favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="./favicon-16x16.png">
        <link rel="manifest" href="./site.webmanifest">
        <link rel="mask-icon" href="./safari-pinned-tab.svg" color="#d2bea0">
        <meta name="msapplication-TileColor" content="#d2bea0">
        <meta name="theme-color" content="#d2bea0">

        <?
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH .'/vendor/uikit/css/uikit.min.css');
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH .'/vendor/fotorama/fotorama.css');
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH .'/vendor/fancybox/dist/jquery.fancybox.min.css');
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH .'/css/main.css');
        ?>
        <?
        CJSCore::Init(array("jquery"));
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/vendor/uikit/js/uikit.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/vendor/uikit/js/uikit-icons.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/vendor/fotorama/fotorama.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/vendor/fancybox/dist/jquery.fancybox.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/vendor/maskedinput/dist/jquery.maskedinput.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/main.js');
        ?>
	</head>
	<body<?=($USER->IsAdmin() ? ' class="admin"' : "")?>>
        <?$APPLICATION->ShowPanel();?>

        <? if ($request->get("opnmdl") == "1" && !$USER->IsAuthorized()): ?>
            <script>
                $(function() {
                    var modal = UIkit.modal("#user-modal");
                    modal.show();
                });
            </script>
        <? endif; ?>

        <? include "include/".LANGUAGE_ID."/header.php"; ?>