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

<div class="card-list uk-child-width-1-3@l uk-child-width-1-2 uk-grid-column-small" uk-grid>
    <?foreach ($arResult["ITEMS"] as $item):?>
        <?
        $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="card-list__item" id="<?=$this->GetEditAreaId($item['ID']);?>">
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
                        <div class="card__footer" data-product-id="<?=$item["ID"]?>">
                            <div class="card__footer-item">
                                <form class="card__tools">
                                    <? if(!empty($item["OFFERS"])): ?>
                                        <label for="select<?=$item["ID"]?>" class="select card__select">
                                            <input class="select__toggle select__toggle--select" type="radio" name="list" value="not_changed" id="select<?=$item["ID"]?>">
                                            <div class="select__list js-select-offer-section">
                                            <? $i = 0; ?>
                                            <? foreach($item["OFFERS"] as $offer): ?>
                                                <input <? if ($i == 0) { echo 'checked'; $i++; }?> data-price="<?=$offer["PRICES"]["BASE"]["PRINT_VALUE"]?>" class="select__toggle" type="radio" name="list" value="<?=$offer["ID"]?>" id="list[<?=$offer["ID"]?>]">
                                                <label class="select__label" for="list[<?=$offer["ID"]?>]"><?= $offer["PROPERTIES"]["FORMAT"]["VALUE"] ?></label>
                                            <? endforeach; ?>
                                                <span class="select__placeholder">Вес</span>
                                            </div>
                                        </label>
                                    <? else: ?>
                                        <div class="select card__select" uk-tooltip="title: Фасовка">
                                            <? if (empty($item["PROPERTIES"]["weight"]["VALUE"])) $item["PROPERTIES"]["weight"]["VALUE"] = 0; ?>
                                            <span data-num="<?=$item["PROPERTIES"]["weight"]["VALUE"]?>"><?=$item["PROPERTIES"]["weight"]["VALUE"]?></span>&nbsp;кг
                                        </div>
                                    <? endif; ?>
                                    <div class="card__count">
                                        <div class="count-tools js-product-quantity">
                                            <span class="count-tools__arrow-minus js-product-quantity__arrow-minus"> — </span>
                                            <input class="count-tools__num js-product-quantity__num input-num" type="number" value="1" />
                                            <span class="count-tools__arrow-plus js-product-quantity__arrow-plus"> + </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card__footer-item">
                                <button
                                        data-name="<?=$item["NAME"]?>"
                                        <?=($item["PROPERTIES"]["under_the_order"]["VALUE_XML_ID"] == "Y" ? 'uk-toggle="target: #delay-modal"' : "")?>
                                        class="btn <?=($item["PROPERTIES"]["under_the_order"]["VALUE_XML_ID"] == "Y" ? "js-delay-section-product" : "js-add-section-product")?>"
                                        type="button">
                                    <span><?=($item["PROPERTIES"]["under_the_order"]["VALUE_XML_ID"] == "Y" ? "Под заказ" : "Купить")?></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    <? endforeach; ?>
</div>
<?=$arResult['NAV_STRING']?>
