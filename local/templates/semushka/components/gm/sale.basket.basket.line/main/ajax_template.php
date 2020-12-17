<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

$this->IncludeLangFile('template.php');

$cartId = $arParams['cartId'];

require(realpath(dirname(__FILE__)).'/top_template.php');

if ($arParams["SHOW_PRODUCTS"] == "Y" && ($arResult['NUM_PRODUCTS'] > 0 || !empty($arResult['CATEGORIES']['DELAY'])))
{
?>
	<div data-role="basket-item-list" class="bx-basket-item-list basket basket-desktop" uk-dropdown="mode: hover">
        <div class="basket__dropdown">
            <div class="basket__container">
                <div class="basket__body">
                    <div class="basket__list">
                        <?if ($arParams["POSITION_FIXED"] == "Y"):?>
                            <div id="<?=$cartId?>status" class="bx-basket-item-list-action" onclick="<?=$cartId?>.toggleOpenCloseCart()"><?=GetMessage("TSB1_COLLAPSE")?></div>
                        <?endif?>

                        <div id="<?=$cartId?>products" class="bx-basket-item-list-container">
                            <?foreach ($arResult["CATEGORIES"] as $category => $items):
                                if (empty($items))
                                    continue;
                                ?>
                                <div style="display: none" class="bx-basket-item-list-item-status"><?=GetMessage("TSB1_$category")?></div>
                                <?foreach ($items as $v):?>
                                    <div class="bx-basket-item-list-item basket__item">
                                        <div class="basket-card">
                                            <div class="bx-basket-item-list-item-img basket-card__image">
                                                <?if ($arParams["SHOW_IMAGE"] == "Y" && $v["PICTURE_SRC"]):?>
                                                    <?if($v["DETAIL_PAGE_URL"]):?>
                                                        <a href="<?=$v["DETAIL_PAGE_URL"]?>"><img src="<?=$v["PICTURE_SRC"]?>" alt="<?=$v["NAME"]?>"></a>
                                                    <?else:?>
                                                        <img src="<?=$v["PICTURE_SRC"]?>" alt="<?=$v["NAME"]?>" />
                                                    <?endif?>
                                                <?endif?>
                                            </div>
                                            <div class="basket-card__body">
                                                <div class="bx-basket-item-list-item-name basket-card__title">
                                                    <?if ($v["DETAIL_PAGE_URL"]):?>
                                                        <a href="<?=$v["DETAIL_PAGE_URL"]?>"><?=$v["NAME"]?></a>
                                                    <?else:?>
                                                        <?=$v["NAME"]?>
                                                    <?endif?>
                                                </div>
                                                <?if (true):/*$category != "SUBSCRIBE") TODO */?>
                                                    <div class="bx-basket-item-list-item-price-block basket-card__footer">
                                                        <div class="basket-card__info">
                                                            <?if ($arParams["SHOW_PRICE"] == "Y"):?>
                                                                <div class="bx-basket-item-list-item-price basket-card__price"><strong><?=$v["PRICE_FMT"]?></strong></div>
                                                                <?if ($v["FULL_PRICE"] != $v["PRICE_FMT"]):?>
                                                                    <div class="basket-card__discount bx-basket-item-list-item-price-old"><?=$v["FULL_PRICE"]?></div>
                                                                <?endif?>
                                                            <?endif?>
                                                            <?if ($arParams["SHOW_SUMMARY"] == "Y"):?>
                                                                <div class="basket-card__count">x <strong><?=$v["QUANTITY"]?></strong> <?=$v["MEASURE_NAME"]?></div>
                                                                <div class="bx-basket-item-list-item-price-summ basket-card__total">
                                                                    <strong><?=$v["SUM"]?></strong>
                                                                </div>
                                                            <?endif?>
                                                        </div>
                                                    </div>
                                                <?endif?>
                                            </div>
                                            <div class="basket-card__delete bx-basket-item-list-item-remove" onclick="removeItemCart(<?=$v['ID']?>)" title="<?=GetMessage("TSB1_DELETE")?>"><span uk-icon="close"></span></div>
                                        </div>
                                    </div>
                                <?endforeach?>
                            <?endforeach?>
                        </div>
                    </div>
                </div>
                <div class="basket__footer">
                    <div class="basket__price">
                        <div class="basket__price-total">
                            <span>Итого</span> <?=number_format($arResult["TOTAL_PRICE"], 0, "", " ")?> Р
                        </div>
                    </div>
                    <div class="basket__tools">
                        <div class="basket__delete">
                            <button class="btn btn--link" onclick="clearCart();">
                                <span uk-icon="close"></span>
                                <span>очистить корзину</span>
                            </button>
                        </div>
                        <?if ($arParams["PATH_TO_ORDER"] && $arResult["CATEGORIES"]["READY"]):?>
                            <div class="bx-basket-item-list-button-container basket__add">
                                <a href="<?=$arParams["PATH_TO_ORDER"]?>" class="btn btn-primary"><?=GetMessage("TSB1_2ORDER")?></a>
                            </div>
                        <?endif?>
                    </div>
                </div>
            </div>
        </div>
	</div>

	<script>
		BX.ready(function(){
			<?=$cartId?>.fixCart();
		});
	</script>
<?
}