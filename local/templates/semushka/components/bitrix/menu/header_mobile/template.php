<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
    <ul class="mobile-nav__list mobile-nav__list--lvl1">
        <? foreach ($arResult as $item1): ?>
            <? if ($item1["LINK"] == '/catalog/'): ?>
                <? foreach ($item1["CHILDS"] as $item2): ?>
                    <li uk-accordion="multiple: true;" class="mobile-nav__item mobile-nav__item--lvl1">
                        <div class="mobile-nav__item-container">
                            <a href="<?=$item2["LINK"]?>" class="mobile-nav__title active"><?=$item2["TEXT"]?></a>
                            <span class="uk-accordion-title active"></span>
                            <div class="uk-accordion-content mobile-nav__body">
                                <ul class="mobile-nav__list mobile-nav__list--lvl2">
                                    <? foreach ($item2["CHILDS"] as $item3): ?>
                                        <li uk-accordion="multiple: true;" class="mobile-nav__item mobile-nav__item--lvl2">
                                            <div class="mobile-nav__item-container">
                                                <a href="<?=$item3["LINK"]?>" class="mobile-nav__title"><?=$item3["TEXT"]?></a>
                                                <? if (!empty($item3["CHILDS"])): ?>
                                                    <span class="uk-accordion-title"></span>
                                                <? endif; ?>
                                                <div class="uk-accordion-content mobile-nav__body">
                                                    <ul class="mobile-nav__list mobile-nav__list--lvl3">
                                                        <? foreach ($item3["CHILDS"] as $item4): ?>
                                                            <li class="mobile-nav__item mobile-nav__item--lvl3">
                                                                <div class="mobile-nav__item-container">
                                                                    <a href="<?=$item4["LINK"]?>" class="mobile-nav__title"><?=$item4["TEXT"]?></a>
                                                                </div>
                                                            </li>
                                                        <? endforeach; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    <? endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </li>
                <? endforeach; ?>
            <? endif; ?>
        <? endforeach; ?>
    </ul>
    <ul class="mobile-nav__list mobile-nav__list--lvl1 uk-margin-medium">
        <? foreach ($arResult as $item1): ?>
            <? if ($item1["LINK"] == '/catalog/') continue; ?>
            <li class="mobile-nav__item mobile-nav__item--lvl1">
                <div class="mobile-nav__item-container">
                    <a class="mobile-nav__title" href="<?=$item1["LINK"]?>"><?=$item1["TEXT"]?></a>
                </div>
            </li>
        <? endforeach; ?>
    </ul>
<?endif?>
