<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arResult */
$this->setFrameMode(true);
?>

<div class="page-wrapper">
    <? if (!empty($arResult["DETAIL_PICTURE"]["SRC"])): ?>
        <div class="page-top page-top--news" style="background-image: url('<?=$arResult["DETAIL_PICTURE"]["SRC"]?>');"></div>
    <? endif; ?>
    <div class="content">
        <div class="uk-container">
            <article class="news-detail">
                <div class="news-detail">
                    <h1 class="uk-h2"><?=$arResult["NAME"]?></h1>
                    <div class="news-detail-date">
                        <span uk-icon="clock" class="uk-icon"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="clock"><circle fill="none" stroke="#000" stroke-width="1.1" cx="10" cy="10" r="9"></circle><rect x="9" y="4" width="1" height="7"></rect><path fill="none" stroke="#000" stroke-width="1.1" d="M13.018,14.197 L9.445,10.625"></path></svg></span>
                        <time><?=FormatDateFromDB($arResult["DATE_CREATE"], 'SHORT')?></time>
                    </div>
                    <div class="uk-column-1-2@m news-detail-text"
                         <?=$arResult["DETAIL_TEXT"]?>
                    </div>
                </div>
            </article>
        </div>
    </main>
</div>