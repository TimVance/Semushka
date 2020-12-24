<?php

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
define("STOP_STATISTICS", true);

/**
 * @global $APPLICATION
 */


$APPLICATION->RestartBuffer();

use \Bitrix\Main\Context;
use \Bitrix\Sale;
use \Bitrix\Currency\CurrencyManager;


$request = Context::getCurrent()->getRequest();
$data    = get_object_vars(json_decode($request["data"]));

if (!empty($data['action'])) {
    if ($data['action'] == 'add' && !empty($data["product_id"])) {

        Bitrix\Main\Loader::includeModule("sale");
        Bitrix\Main\Loader::includeModule("catalog");

        $productId = intval($data["product_id"]);
        $quantity  = intval($data["quantity"]);
        $basket    = Sale\Basket::loadItemsForFUser(Sale\Fuser::getId(), Context::getCurrent()->getSite());
        if ($item = $basket->getExistsItem('catalog', $productId)) {
            $item->setField('QUANTITY', $item->getQuantity() + $quantity);
        } else {
            $item = $basket->createItem('catalog', $productId);
            $item->setFields(array(
                'QUANTITY'               => $quantity,
                'CURRENCY'               => CurrencyManager::getBaseCurrency(),
                'LID'                    => Context::getCurrent()->getSite(),
                'PRODUCT_PROVIDER_CLASS' => 'CCatalogProductProvider',
            ));
        }
        $basket->save();
    } elseif ($data['action'] == 'delete' && !empty($data["product_id"])) {

        Bitrix\Main\Loader::includeModule("sale");
        Bitrix\Main\Loader::includeModule("catalog");

        $productId = intval($data["product_id"]);

        $basket = Sale\Basket::loadItemsForFUser(Sale\Fuser::getId(), Context::getCurrent()->getSite());
        $basket->getItemById($productId)->delete();
        $basket->save();
    } elseif ($data['action'] == 'clear') {

        Bitrix\Main\Loader::includeModule("sale");
        Bitrix\Main\Loader::includeModule("catalog");

        CSaleBasket::DeleteAll(CSaleBasket::GetBasketUserID());
    }
}

$APPLICATION->IncludeComponent(
    "gm:sale.basket.basket.line",
    "main",
    array(
        "HIDE_ON_BASKET_PAGES" => "N",
        "PATH_TO_AUTHORIZE"    => "",
        "PATH_TO_BASKET"       => SITE_DIR . "personal/cart/",
        "PATH_TO_ORDER"        => SITE_DIR . "personal/order/make/",
        "PATH_TO_PERSONAL"     => SITE_DIR . "personal/",
        "PATH_TO_PROFILE"      => SITE_DIR . "personal/",
        "PATH_TO_REGISTER"     => SITE_DIR . "login/",
        "POSITION_FIXED"       => "N",
        "SHOW_AUTHOR"          => "N",
        "SHOW_DELAY"           => "N",
        "SHOW_EMPTY_VALUES"    => "Y",
        "SHOW_IMAGE"           => "Y",
        "SHOW_NOTAVAIL"        => "N",
        "SHOW_NUM_PRODUCTS"    => "Y",
        "SHOW_PERSONAL_LINK"   => "N",
        "SHOW_PRICE"           => "Y",
        "SHOW_PRODUCTS"        => "Y",
        "SHOW_REGISTRATION"    => "N",
        "SHOW_SUMMARY"         => "Y",
        "SHOW_TOTAL_PRICE"     => "N"
    )
);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_after.php");
?>