<? if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>


<?
// Top Banner
if (Cmodule::IncludeModule("iblock")) {
    $banner_element_id = 222;
    $banner_res = CIBlockElement::GetByID($banner_element_id);
    $banner_props = [];
    if ($banner = $banner_res->GetNextElement())
    {
        $banner_fields = $banner->GetFields();
        $banner_props = $banner->GetProperties();
    }
    if ($banner_fields["ACTIVE"] == "Y") {
        echo '<div class="top-banner" uk-toggle="target: #top-banner-modal">';
        if (!empty($banner_props)) {
            if (!empty($banner_props["file"]["VALUE"])) {
                $img = CFile::GetPath($banner_props["file"]["VALUE"]);
                if (!empty($img)) {
                    echo '<img class="pc-banner" src="' . $img . '">';
                }
            }
            if (!empty($banner_props["file_mobile"]["VALUE"])) {
                $img_mobile = CFile::GetPath($banner_props["file_mobile"]["VALUE"]);
                if (!empty($img_mobile)) {
                    echo '<img class="mobile-banner" src="' . $img_mobile . '">';
                }
            }
        }
        echo '</div>';
        // Modal - form
        ?>
        <div style="display: none" id="top-banner-modal" uk-modal>
            <div class="uk-modal-dialog uk-modal-body">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:form",
                    "callback",
                    Array(
                        "AJAX_MODE" => "Y",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "AJAX_OPTION_HISTORY" => "Y",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "N",
                        "CACHE_TIME" => "3600",
                        "CACHE_TYPE" => "A",
                        "CHAIN_ITEM_LINK" => "",
                        "CHAIN_ITEM_TEXT" => "",
                        "EDIT_ADDITIONAL" => "N",
                        "EDIT_STATUS" => "N",
                        "IGNORE_CUSTOM_TEMPLATE" => "N",
                        "NOT_SHOW_FILTER" => array("",""),
                        "NOT_SHOW_TABLE" => array("",""),
                        "RESULT_ID" => $_REQUEST[RESULT_ID],
                        "SEF_MODE" => "N",
                        "SHOW_ADDITIONAL" => "N",
                        "SHOW_ANSWER_VALUE" => "N",
                        "SHOW_EDIT_PAGE" => "N",
                        "SHOW_LIST_PAGE" => "N",
                        "SHOW_STATUS" => "N",
                        "SHOW_VIEW_PAGE" => "N",
                        "START_PAGE" => "new",
                        "SUCCESS_URL" => "",
                        "USE_EXTENDED_ERRORS" => "N",
                        "VARIABLE_ALIASES" => Array("action"=>"action"),
                        "WEB_FORM_ID" => "5"
                    )
                );?>
            </div>
        </div>
        <?php
    }
}
?>

<div class="header-wrapper">
    <header class="header" <?if ($APPLICATION->GetCurPage(false) !== "/personal/order/make/") echo "uk-sticky";?>>
        <div class="uk-container">
            <div class="header-container">
                <nav class="top-nav uk-visible@m">
                    <div class="top-nav__container">
                        <div class="logo">
                            <? if ($APPLICATION->GetCurPage(false) !== "/") echo '<a href="/">'; ?>
                                <?$APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    "",
                                    Array(
                                        "AREA_FILE_SHOW" => "file",
                                        "AREA_FILE_SUFFIX" => "inc",
                                        "EDIT_TEMPLATE" => "",
                                        "PATH" => "/local/templates/semushka/include/".LANGUAGE_ID."/parts/logo.php"
                                    )
                                );?>
                            <? if ($APPLICATION->GetCurPage(false) !== "/") echo '</a>'; ?>
                        </div>
                        <div class="top-nav__row">
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:menu",
                                "header",
                                array(
                                    "ALLOW_MULTI_SELECT" => "N",
                                    "CHILD_MENU_TYPE" => "header_catalog",
                                    "DELAY" => "N",
                                    "MAX_LEVEL" => "4",
                                    "MENU_CACHE_GET_VARS" => array(
                                    ),
                                    "MENU_CACHE_TIME" => "3600",
                                    "MENU_CACHE_TYPE" => "A",
                                    "MENU_CACHE_USE_GROUPS" => "Y",
                                    "ROOT_MENU_TYPE" => "header",
                                    "USE_EXT" => "Y",
                                    "COMPONENT_TEMPLATE" => "header"
                                ),
                                false, Array('HIDE_ICONS' => 'Y')
                            );?>
                        </div>
                    </div>
                </nav>
                <div class="header__mobile uk-hidden@m">
                    <div class="header__mobile-burger">
                        <button uk-toggle="target: #header-mobile" uk-navbar-toggle-icon type="button"></button>
                    </div>
                    <div class="header__mobile-logo logo">
                        <? if ($APPLICATION->GetCurPage(false) !== "/") echo '<a href="/">'; ?>
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/local/templates/semushka/include/".LANGUAGE_ID."/parts/logo.php"
                            )
                        );?>
                        <? if ($APPLICATION->GetCurPage(false) !== "/") echo '</a>'; ?>
                    </div>
                </div>
                <div id="header-mobile" uk-offcanvas>
                    <div class="uk-offcanvas-bar">
                        <form action="/catalog/" class="form form--mobile mobile-search-form">
                            <div class="uk-margin">
                                <div class="uk-inline form__item form__item--search">
                                    <input class="uk-form-icon uk-form-icon-flip form__icon" type="submit" value="">
                                    <input class="uk-input form__input" type="text" placeholder="Поиск" name="q">
                                </div>
                            </div>
                        </form>
                        <nav class="mobile-nav">
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:menu",
                                "header_mobile",
                                array(
                                    "ALLOW_MULTI_SELECT" => "N",
                                    "CHILD_MENU_TYPE" => "header_catalog",
                                    "DELAY" => "N",
                                    "MAX_LEVEL" => "4",
                                    "MENU_CACHE_GET_VARS" => array(
                                    ),
                                    "MENU_CACHE_TIME" => "3600",
                                    "MENU_CACHE_TYPE" => "A",
                                    "MENU_CACHE_USE_GROUPS" => "Y",
                                    "ROOT_MENU_TYPE" => "header",
                                    "USE_EXT" => "Y",
                                    "COMPONENT_TEMPLATE" => "header"
                                ),
                                false, Array('HIDE_ICONS' => 'Y')
                            );?>
                        </nav>
                    </div>
                </div>
                <div class="services-list">
                    <div class="services-list__item uk-visible@l top-header-tel">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/local/templates/semushka/include/phone.php"
                            )
                        );?>
                    </div>
                </div>
                <div class="services-list">
                    <div class="services-list__item uk-visible@s">
                        <div class="lang-selector">
                            <? if (LANGUAGE_ID == "ru"): ?>
                                <a href="<?=$APPLICATION->GetCurPageParam("lang_ui=en", ["lang_ui"], false);?>" class="lang-selector__text">EN</a>
                            <? else: ?>
                                <a href="<?=$APPLICATION->GetCurPageParam("lang_ui=ru", ["lang_ui"], false);?>" class="lang-selector__text">RU</a>
                            <? endif; ?>
                        </div>
                    </div>
                    <div class="services-list__item uk-visible@m">
                        <button uk-toggle="target: #header-search" class="services-list__icon services-list__icon--search" type="button"></button>
                        <div id="header-search" class="header-search" uk-offcanvas="overlay: true">
                            <div class="uk-offcanvas-bar">
                                <div class="uk-container uk-position-relative">
                                    <button class="uk-offcanvas-close" type="button" uk-close></button>
                                    <form action="/catalog/" class="form form--header-search">
                                        <div class="form__item">
                                            <input value="<?=$request->get("q");?>" name="q" class="uk-input form__input" type="text" placeholder="Поиск">
                                            <button class="btn form__btn">Найти</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="services-list__item">
                        <button uk-toggle="target: #receiver-modal" type="button" class="services-list__icon services-list__icon--receiver"></button>
                    </div>
                    <div class="services-list__item">
                        <? if ($USER->IsAuthorized()): ?>
                            <a class="services-list__icon services-list__icon--user" href="/personal/"></a>
                        <? else: ?>
                            <button uk-toggle="target: #user-modal" type="button" class="services-list__icon services-list__icon--user"></button>
                        <? endif; ?>
                    </div>
                    <div class="services-list__item" id="desktop-cart-wrapper">
                    <?$APPLICATION->IncludeComponent(
                        "gm:sale.basket.basket.line",
                        "main",
                        Array(
                            "HIDE_ON_BASKET_PAGES" => "N",
                            "PATH_TO_AUTHORIZE" => "",
                            "PATH_TO_BASKET" => SITE_DIR."personal/cart/",
                            "PATH_TO_ORDER" => SITE_DIR."personal/order/make/",
                            "PATH_TO_PERSONAL" => SITE_DIR."personal/",
                            "PATH_TO_PROFILE" => SITE_DIR."personal/",
                            "PATH_TO_REGISTER" => SITE_DIR."login/",
                            "POSITION_FIXED" => "N",
                            "SHOW_AUTHOR" => "N",
                            "SHOW_DELAY" => "N",
                            "SHOW_EMPTY_VALUES" => "Y",
                            "SHOW_IMAGE" => "Y",
                            "SHOW_NOTAVAIL" => "N",
                            "SHOW_NUM_PRODUCTS" => "Y",
                            "SHOW_PERSONAL_LINK" => "N",
                            "SHOW_PRICE" => "Y",
                            "SHOW_PRODUCTS" => "Y",
                            "SHOW_REGISTRATION" => "N",
                            "SHOW_SUMMARY" => "Y",
                            "SHOW_TOTAL_PRICE" => "N"
                        )
                    );?>
                    </div>
                </div>
            </div>
        </div>

    </header>
</div>
<?if ($APPLICATION->GetCurPage(false) !== "/" && ERROR_404 != "Y"): ?>
    <? $detail_page = false; ?>
    <? if (strpos($APPLICATION->GetCurPage(false), "/news/") !== false): ?>
        <? if ($APPLICATION->GetCurPage() !== "/news/index.php") $detail_page = true; ?>
    <? endif; ?>
    <? if (strpos($APPLICATION->GetCurPage(false), "/catalog/") !== false): ?>
        <? if ($APPLICATION->GetCurPage() !== "/catalog/index.php") $detail_page = true; ?>
    <? endif; ?>
    <? if (!$detail_page): ?>
    <div class="page-wrapper">
        <main class="content">
            <div class="page-title">
                <div class="uk-container">
                    <h1 class="uk-h2"><?$APPLICATION->ShowTitle(false);?></h1>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:breadcrumb",
                        "breadcrumb",
                        Array(
                            "PATH" => "",
                            "SITE_ID" => "s1",
                            "START_FROM" => "0"
                        )
                    );?>
                </div>
            </div>

            <section class="uk-margin">
                <div class="uk-container">
    <? endif; ?>
<? endif; ?>
