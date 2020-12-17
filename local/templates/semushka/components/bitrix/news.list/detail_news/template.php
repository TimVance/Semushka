<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/** @var array $arResult */
/** @global CMain $APPLICATION */

$this->setFrameMode(true);

$chunks = [];
if (!empty($arResult["ITEMS"])) {
    $chunks = array_chunk($arResult["ITEMS"], 4);
}
?>


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
                        "PATH" => "/local/templates/semushka/include/parts/detail_news_title.php"
                    )
                );?>
            </div>
            <div class="uk-slidenav-container slider__container">
                <a href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                <a href="#" uk-slidenav-next uk-slider-item="next"></a>
            </div>
        </div>
        <ul class="uk-slider-items uk-child-width-1-1 uk-grid slider__list">
            <? foreach ($chunks as $chunk): ?>
                <li class="slider__item">
                    <div class="uk-child-width-1-2@s news-list news-list--small" uk-grid>
                        <? foreach ($chunk as $item): ?>
                            <?
                            $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
                            $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                            ?>
                            <div class="news-list__item" id="<?=$this->GetEditAreaId($item['ID']);?>">
                                <article class="news-item">
                                    <div class="news-item__image">
                                        <a href="#" class="news-item__link">
                                            <div class="news-item__img">
                                                <img src="<?=(!empty($item["PREVIEW_PICTURE"]) ? $item["PREVIEW_PICTURE"]["SRC"] : $this->GetFolder().'/images/line-empty.png')?>" alt="<?=$item["NAME"]?>"/>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="news-item__body">
                                        <a href="<?=$item["DETAIL_PAGE_URL"]?>" class="news-item__title"><?=$item["NAME"]?></a>
                                        <div class="news-item__date news-detail-date">
                                            <span uk-icon="clock"></span>
                                            <time><?=FormatDateFromDB($item["DATE_CREATE"], 'SHORT')?></time>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        <? endforeach; ?>
                    </div>
                </li>
            <? endforeach; ?>
        </ul>
    </div>
</section>