<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)): ?>
    <ul class="top-nav__list first-open">
        <? foreach ($arResult as $item1): ?>
            <? if ($item1["LINK"] == '/catalog/'): ?>
                <li class="top-nav__item">
                    <a href="<?=$item1["LINK"]?>" class="top-nav__link">
                        <span uk-icon="menu"></span>
                        <span class="top-nav__parent"><?=$item1["TEXT"]?></span>
                    </a>
                    <div class="top-nav__childs">
                        <div class="uk-container">
                            <div class="main-nav">
                                <ul class="main-nav__list main-nav__list--lvl1">
                                    <? foreach ($item1["CHILDS"] as $item2): ?>
                                        <li class="main-nav__item main-nav__item--lvl1">
                                            <a href="<?=$item2["LINK"]?>" class="main-nav__link"><?=$item2["TEXT"]?></a>
                                            <? if (!empty($item2["CHILDS"])): ?>
                                                <div class="main-nav__childs">
                                                    <div class="uk-container">
                                                        <div class="main-nav__list-container main-nav__list-container--lvl2">
                                                            <ul class="main-nav__list main-nav__list--lvl2">
                                                                <? foreach ($item2["CHILDS"] as $item3): ?>
                                                                    <li class="main-nav__item main-nav__item--lvl2">
                                                                        <a href="<?=$item3["LINK"]?>" class="main-nav__link"><?=$item3["TEXT"]?></a>
                                                                        <? if (!empty($item3["CHILDS"])): ?>
                                                                            <div class="main-nav__childs">
                                                                                <div class="main-nav__list-container main-nav__list-container--lvl3">
                                                                                    <ul class="main-nav__list main-nav__list--lvl3">
                                                                                        <? foreach ($item3["CHILDS"] as $item4): ?>
                                                                                            <li class="main-nav__item main-nav__item--lvl3">
                                                                                                <a href="<?=$item4["LINK"]?>" class="main-nav__link"><?=$item4["TEXT"]?></a>
                                                                                            </li>
                                                                                        <? endforeach; ?>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        <? endif; ?>
                                                                    </li>
                                                                <? endforeach; ?>
                                                            </ul>
                                                        </div>
                                                        <div class="main-nav__image">
                                                            <div class="main-nav__img">
                                                                <? if (!empty($item2["IMAGE"])): ?>
                                                                    <img src="<?=$item2["IMAGE"]?>" alt="<?=$item2["TEXT"]?>">
                                                                <? endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <? endif; ?>
                                        </li>
                                    <? endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            <? else: ?>
                <li class="top-nav__item">
                    <a href="<?=$item1["LINK"]?>" class="top-nav__link">
                        <span><?=$item1["TEXT"]?></span>
                    </a>
                </li>
            <? endif; ?>
        <? endforeach; ?>
    </ul>
<? endif ?>