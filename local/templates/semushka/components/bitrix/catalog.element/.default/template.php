<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true);

$this->AddEditAction($arResult['ID'], $arResult['EDIT_LINK'], CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "ELEMENT_EDIT"));
$this->AddDeleteAction($arResult['ID'], $arResult['DELETE_LINK'], CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

?>


<article class="product-detail" id="<?= $this->GetEditAreaId($arResult['ID']); ?>">
    <div class="uk-child-width-1-2@s" uk-grid>
        <div class="product-detail__item">
            <div
                    class="fotorama"
                    data-width="100%"
                    data-ratio="800/600"
                    data-allowfullscreen="native"
                    data-nav="thumbs"
                    data-fit="contain"
                    data-loop="true"
                    data-keyboard="true"
            >
                <?
                if (!empty($arResult["PROPERTIES"]["photo"]["VALUE"])) {
                    foreach ($arResult["PROPERTIES"]["photo"]["VALUE"] as $photo) {
                        $image = CFile::GetPath($photo);
                        if (!empty($image))
                            echo '<img src="' . $image . '" alt="' . $arResult["NAME"] . '">';
                    }
                } else {
                    echo '<img src="' . $this->GetFolder() . '/images/no_photo.jpg" alt="' . $arResult["NAME"] . '" />';
                }
                ?>
            </div>
        </div>
        <div class="product-detail__item js-product-detail__item" data-product-id="<?= $arResult["ID"] ?>">
            <div class="product-detail__header">
                <h1 class="uk-h2"><?= $arResult["NAME"] ?></h1>
            </div>
            <div class="product-detail__body">
                <div class="product-detail__info">
                    <? foreach ($arResult["DISPLAY_PROPERTIES"] as $prop): ?>
                        <div class="product-detail__info-row">
                            <div class="product-detail__info-title"><?= $prop["NAME"] ?></div>
                            <div class="product-detail__info-note"
                                 uk-tooltip="title: <?= $prop["VALUE"] ?>"><?= $prop["VALUE"] ?></div>
                        </div>
                    <? endforeach; ?>
                </div>
            </div>
            <div class="product-detail__price">
                <? if ($arResult["PROPERTIES"]["under_the_order"]["VALUE_XML_ID"] != "Y"): ?>
                    <?= (!empty($arResult["PRICES"]["BASE"]["VALUE"]) ? $arResult["PRICES"]["BASE"]["PRINT_VALUE"] : "") ?>
                <? endif; ?>
            </div>
            <div class="product-detail__footer">
                <div class="product-detail__footer-item">
                    <form class="product-detail__tools">
                        <label for="select" class="select product-detail__select" uk-tooltip="title: Фасовка">
                            <? if (empty($arResult["PROPERTIES"]["weight"]["VALUE"])) $arResult["PROPERTIES"]["weight"]["VALUE"] = 0; ?>
                            <span data-num="<?= $arResult["PROPERTIES"]["weight"]["VALUE"] ?>"><?= $arResult["PROPERTIES"]["weight"]["VALUE"] ?></span>&nbsp;кг
                        </label>
                        <div class="product-detail__count">
                            <div class="count-tools js-product-quantity">
                                <a class="count-tools__arrow-minus js-product-quantity__arrow-minus"> — </a>
                                <input class="count-tools__num js-product-quantity__num input-num" type="number"
                                       value="1"/>
                                <a class="count-tools__arrow-plus js-product-quantity__arrow-plus"> + </a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="product-detail__footer-item">
                    <button class="btn js-add-detail-product" type="button">
                        <span class="button_title">
                            <?=($arResult["PROPERTIES"]["under_the_order"]["VALUE_XML_ID"] == "Y" ? "Под заказ" : "Купить")?>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <section class="uk-section">
        <ul class="tabs" uk-tab>
            <li><a href="#">О продукции</a></li>
        </ul>

        <ul class="uk-switcher uk-margin">
            <li><?= $arResult["DETAIL_TEXT"] ?></li>
        </ul>
    </section>
    <? if (!empty($arResult["PROPERTIES"]["certificates"]["IMAGES"])): ?>
        <section class="uk-section">
            <h2 class="uk-h2">Сертификаты</h2>
            <div class="uk-child-width-1-4@s uk-child-width-1-2 product-detail__lightbox sertificate-list" uk-grid>
                <? foreach ($arResult["PROPERTIES"]["certificates"]["IMAGES"] as $sertificate): ?>
                    <div class="sertificate-list__item">
                        <div class="sertificate-list__body">
                            <div class="sertificate-list__image">
                                <a class="uk-inline" href="<?= $sertificate ?>" data-fancybox="gallery">
                                    <?
                                    $format = explode(".", $sertificate);
                                    if ($format[1] == "pdf"):?>
                                        <img src="<?= $this->GetFolder() . '/images/pdf.png' ?>" alt="<?= $arResult["NAME"] ?>">
                                    <? else: ?>
                                        <img src="<?= $sertificate ?>" alt="<?= $arResult["NAME"] ?>">
                                    <? endif; ?>
                                </a>
                            </div>
                            <div class="sertificate-list__info">
                                <a href="<?= $sertificate ?>" download class="sertificate-list__text">Скачать</a>
                                <a href="<?= $sertificate ?>" download class="sertificate-list__download"></a>
                            </div>
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
        </section>
    <? endif; ?>
    <? $APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"detail_similar_category", 
	array(
		"ACTION_VARIABLE" => "action",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BACKGROUND_IMAGE" => "-",
		"BASKET_URL" => "/personal/basket.php",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPATIBLE_MODE" => "Y",
		"CONVERT_CURRENCY" => "N",
		"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
		"DETAIL_URL" => "",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_COMPARE" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"FILTER_NAME" => "arrFilter",
		"HIDE_NOT_AVAILABLE" => "Y",
		"HIDE_NOT_AVAILABLE_OFFERS" => "Y",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "catalog",
		"INCLUDE_SUBSECTIONS" => "Y",
		"LINE_ELEMENT_COUNT" => "3",
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"OFFERS_LIMIT" => "5",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "18",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"SECTION_CODE" => "",
		"SECTION_ID" => "",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SEF_MODE" => "N",
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SHOW_ALL_WO_SECTION" => "Y",
		"SHOW_PRICE_COUNT" => "1",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"COMPONENT_TEMPLATE" => "detail_similar_category"
	),
	false
); ?>
    <? $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "detail_news",
        array(
            "ACTIVE_DATE_FORMAT"              => "d.m.Y",
            "ADD_SECTIONS_CHAIN"              => "N",
            "AJAX_MODE"                       => "N",
            "AJAX_OPTION_ADDITIONAL"          => "",
            "AJAX_OPTION_HISTORY"             => "N",
            "AJAX_OPTION_JUMP"                => "N",
            "AJAX_OPTION_STYLE"               => "Y",
            "CACHE_FILTER"                    => "N",
            "CACHE_GROUPS"                    => "Y",
            "CACHE_TIME"                      => "36000000",
            "CACHE_TYPE"                      => "A",
            "CHECK_DATES"                     => "Y",
            "DETAIL_URL"                      => "",
            "DISPLAY_BOTTOM_PAGER"            => "Y",
            "DISPLAY_DATE"                    => "Y",
            "DISPLAY_NAME"                    => "Y",
            "DISPLAY_PICTURE"                 => "Y",
            "DISPLAY_PREVIEW_TEXT"            => "Y",
            "DISPLAY_TOP_PAGER"               => "N",
            "FIELD_CODE"                      => array(
                0 => "",
                1 => "",
            ),
            "FILTER_NAME"                     => "",
            "HIDE_LINK_WHEN_NO_DETAIL"        => "N",
            "IBLOCK_ID"                       => "2",
            "IBLOCK_TYPE"                     => "content",
            "INCLUDE_IBLOCK_INTO_CHAIN"       => "N",
            "INCLUDE_SUBSECTIONS"             => "Y",
            "MESSAGE_404"                     => "",
            "NEWS_COUNT"                      => "20",
            "PAGER_BASE_LINK_ENABLE"          => "N",
            "PAGER_DESC_NUMBERING"            => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL"                  => "N",
            "PAGER_SHOW_ALWAYS"               => "N",
            "PAGER_TEMPLATE"                  => ".default",
            "PAGER_TITLE"                     => "Новости",
            "PARENT_SECTION"                  => "",
            "PARENT_SECTION_CODE"             => "",
            "PREVIEW_TRUNCATE_LEN"            => "",
            "PROPERTY_CODE"                   => array(
                0 => "",
                1 => "",
            ),
            "SET_BROWSER_TITLE"               => "N",
            "SET_LAST_MODIFIED"               => "N",
            "SET_META_DESCRIPTION"            => "N",
            "SET_META_KEYWORDS"               => "N",
            "SET_STATUS_404"                  => "N",
            "SET_TITLE"                       => "N",
            "SHOW_404"                        => "N",
            "SORT_BY1"                        => "ACTIVE_FROM",
            "SORT_BY2"                        => "SORT",
            "SORT_ORDER1"                     => "DESC",
            "SORT_ORDER2"                     => "ASC",
            "STRICT_SECTION_CHECK"            => "N",
            "COMPONENT_TEMPLATE"              => "detail_news"
        ),
        false
    ); ?>
</article>