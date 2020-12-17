<?

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @var $arResult
 */

use Bitrix\Main,
    Bitrix\Main\Localization\Loc,
    Bitrix\Main\Page\Asset;

Loc::loadMessages(__FILE__);

?>

<div class="personal-order-list">
    <div class="personal-order-row">
        <div class="id">№</div>
        <div class="date">Дата</div>
        <div class="price">Сумма</div>
        <div class="repeat"></div>
    </div>
    <? foreach ($arResult["ORDERS"] as $order): ?>
        <div data-id="<?=$order["ORDER"]["ID"]?>" class="personal-order-row">
            <div class="id"><?=$order["ORDER"]["ID"]?></div>
            <div class="date"><?=$order["ORDER"]["DATE_INSERT_FORMATED"]?></div>
            <div class="price">
                <?=$order["ORDER"]["FORMATED_PRICE"]?>
                <? if (!empty(count($order["BASKET_ITEMS"]))) echo '<i></i>'; ?>
            </div>
            <div class="repeat"><a href="<?=htmlspecialcharsbx($order["ORDER"]["URL_TO_COPY"])?>">
                    повторить
                </a></div>
            <div class="personal-order-basket-items">
                <div class="personal-order-basket-item">
                    <div class="personal-order-basket-item-id">ID</div>
                    <div class="personal-order-basket-item-name">Наименование</div>
                    <div class="personal-order-basket-item-count"></div>
                    <div class="personal-order-basket-item-price">Цена</div>
                </div>
                <? foreach ($order["BASKET_ITEMS"] as $item): ?>
                    <div class="personal-order-basket-item">
                        <div class="personal-order-basket-item-id"><?=$item["ID"];?></div>
                        <div class="personal-order-basket-item-name"><?=$item["NAME"];?></div>
                        <div class="personal-order-basket-item-count"><?=$item["QUANTITY"];?> <?=$item["MEASURE_NAME"]?></div>
                        <div class="personal-order-basket-item-price">
                            <? if (!empty($item["PRICE"])) echo number_format($item["PRICE"], 0, "", " "); ?>
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
        </div>
    <? endforeach; ?>
</div>
