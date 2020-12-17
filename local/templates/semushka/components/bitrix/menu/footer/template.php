<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

<? $first = true; ?>
<? foreach ($arResult as $item): ?>
    <? if ($item["IS_PARENT"] == 1): ?>
        <? if (!$first): ?>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        <? endif; ?>
        <div class="footer__item uk-width-1-4@m">
            <ul uk-accordion>
                <li>
                    <a class="uk-accordion-title footer__item-title" href="<?=$item["LINK"]?>"><?=$item["TEXT"]?></a>
                    <div class="uk-accordion-content">
                        <a href="<?=$item["LINK"]?>" class="footer__item-title"><?=$item["TEXT"]?></a>
                        <div class="footer__item-body">
                            <ul class="footer__item-list">
    <? else: ?>
        <li><a href="<?=$item["LINK"]?>" class="link"><?=$item["TEXT"]?></a></li>
        <? $first = false; ?>
    <? endif; ?>
<? endforeach; ?>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
<?endif?>