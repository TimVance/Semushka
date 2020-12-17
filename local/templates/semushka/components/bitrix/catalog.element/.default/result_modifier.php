<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @global $arResult
 */

foreach ($arResult["PROPERTIES"]["certificates"]["VALUE"] as $certificate) {
    $arResult["PROPERTIES"]["certificates"]["IMAGES"][] = CFile::GetPath($certificate);
}