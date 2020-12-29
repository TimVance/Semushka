<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 **/

$this->setFrameMode(true);?>

<section class="uk-section">
    <div class="uk-position-relative uk-visible-toggle uk-dark slider" tabindex="-1" uk-slider>
        <div class="slider__header">
            <div class="slider__title">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "/local/templates/semushka/include/parts/detail_similar_title.php"
                    )
                );?>
            </div>
            <div class="uk-slidenav-container slider__container">
                <a href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                <a href="#" uk-slidenav-next uk-slider-item="next"></a>
            </div>
        </div>
        <ul class="uk-slider-items uk-child-width-1-3@m uk-child-width-1-2@s uk-grid slider__list">
            <?foreach ($arResult["ITEMS"] as $item):?>
                <?
                $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <li class="slider__item" id="<?=$this->GetEditAreaId($item['ID']);?>">
                    <article class="card">
                        <div class="card__image">
                            <div class="card__img">
                                <a href="<?=$item["DETAIL_PAGE_URL"]?>">
                                    <img src="<?=(!empty($item["PREVIEW_PICTURE"]) ? $item["PREVIEW_PICTURE"]["SRC"] : $this->GetFolder().'/images/line-empty.png')?>" alt="<?=$item["NAME"]?>">
                                </a>
                            </div>
                        </div>
                        <div class="card__body">
                            <? if (!empty($item["PROPERTIES"]["promo"]["VALUE"])): ?>
                                <div class="promo">Акция</div>
                            <? endif; ?>
                            <div class="card__title"><a href="<?=$item["DETAIL_PAGE_URL"]?>"><?=$item["NAME"]?></a></div>
                            <? if (!empty($item["PROPERTIES"]["type"]["VALUE"])): ?>
                                <div class="card__subtitle"><?=$item["PROPERTIES"]["type"]["VALUE"]?></div>
                            <? endif; ?>
                            <div class="card__info">
                                <? if (!empty($item["DISPLAY_PROPERTIES"]["time"]["VALUE"])): ?>
                                    <div class="card__info-row">
                                        <div class="card__info-title"><?=$item["DISPLAY_PROPERTIES"]["time"]["NAME"]?></div>
                                        <div class="card__info-note" uk-tooltip="title: <?=$item["DISPLAY_PROPERTIES"]["time"]["NAME"]?> <?=$item["DISPLAY_PROPERTIES"]["time"]["VALUE"]?>"><?=$item["DISPLAY_PROPERTIES"]["time"]["VALUE"]?></div>
                                    </div>
                                <? endif; ?>
                                <? if (!empty($item["PROPERTIES"]["city"]["VALUE_ENUM"])): ?>
                                    <div class="card__info-row">
                                        <div class="card__info-title"><?=$item["PROPERTIES"]["city"]["NAME"]?></div>
                                        <div class="card__info-note" uk-tooltip="title: <?=$item["PROPERTIES"]["city"]["NAME"]?> <?=$item["PROPERTIES"]["city"]["VALUE_ENUM"]?>"><?=$item["PROPERTIES"]["city"]["VALUE_ENUM"]?></div>
                                    </div>
                                <? endif; ?>
                                <? if (!empty($item["DISPLAY_PROPERTIES"]["price_per_kg"]["VALUE"])): ?>
                                    <div class="card__info-row">
                                        <div class="card__info-title"><?=$item["DISPLAY_PROPERTIES"]["price_per_kg"]["NAME"]?></div>
                                        <div class="card__info-note" uk-tooltip="title: <?=$item["DISPLAY_PROPERTIES"]["price_per_kg"]["NAME"]?> <?=$item["DISPLAY_PROPERTIES"]["price_per_kg"]["VALUE"]?>"><?=$item["DISPLAY_PROPERTIES"]["price_per_kg"]["VALUE"]?></div>
                                    </div>
                                <? endif; ?>
                                <? if (!empty($item["OFFERS"])): ?>
                                    <div class="card__info-row">
                                        <div class="card__info-title">Цена за упаковку</div>
                                        <div class="card__info-note js-section-price" uk-tooltip="title: Цена за упаковку <?=$item["OFFERS"][0]["PRICES"]["BASE"]["PRINT_VALUE"]?>"><?=$item["OFFERS"][0]["PRICES"]["BASE"]["PRINT_VALUE"]?></div>
                                    </div>
                                <? else: ?>
                                    <?
                                    if ($item["PROPERTIES"]["under_the_order"]["VALUE_XML_ID"] != "Y"):?>
                                        <div class="card__info-row">
                                            <div class="card__info-title">Цена за упаковку</div>
                                            <div class="card__info-note js-section-price" uk-tooltip="title: Цена за упаковку <?=$item["PRICES"]["BASE"]["PRINT_VALUE"]?>"><?=$item["PRICES"]["BASE"]["PRINT_VALUE"]?></div>
                                        </div>
                                    <? endif; ?>
                                <? endif; ?>
                                <? if (!empty($item["DISPLAY_PROPERTIES"]["price_per_kg_tn"]["VALUE"])): ?>
                                    <div class="card__info-row row24">
                                        <div class="card__info-title"><?=$item["DISPLAY_PROPERTIES"]["price_per_kg_tn"]["NAME"]?></div>
                                        <div class="card__info-note" uk-tooltip="title: <?=$item["DISPLAY_PROPERTIES"]["price_per_kg_tn"]["NAME"]?> <?=$item["DISPLAY_PROPERTIES"]["price_per_kg_tn"]["VALUE"]?>"><?=$item["DISPLAY_PROPERTIES"]["price_per_kg_tn"]["VALUE"]?></div>
                                    </div>
                                <? endif; ?>
                            </div>
                            <div class="card__footer-container">
                                <div class="card__footer similar" data-product-id="<?=$item["ID"]?>">
                                    <div class="card__footer-item">
                                        <a class="btn" href="<?$arResult["DETAIL_PAGE_URL"]?>">Подробнее</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </li>
            <? endforeach; ?>
        </ul>
    </div>
</section>
