<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>


<?php

/**
 * @global $arResult
 */


$newResult = [];
$parent = '';
foreach ($arResult as $i => $item) {
    if ($item["DEPTH_LEVEL"] == 1) {
        if (!empty($item["IS_PARENT"])) {
            $newResult[$i] = $item;
            $parent1        = $i;
        } else {
            $newResult[$i] = $item;
        }
    }
    elseif ($item["DEPTH_LEVEL"] == 2) {
        if (!empty($item["IS_PARENT"])) {
            $newResult[$parent1]["CHILDS"][$i] = $item;
            $parent2        = $i;
        } else $newResult[$parent1]["CHILDS"][$i]["CHILDS"] = $item;

        $code = str_replace(["catalog", "/"], '', $item["LINK"]);
        if (!empty($code)) {
            CModule::IncludeModule("iblock");
            $seciton_res = CIBlockSection::GetList([], ["CODE" => $code], false, ["ID", "PICTURE"]);
            while ($section = $seciton_res->GetNext()) {
                if (!empty($section["PICTURE"])) {
                    $newResult[$parent1]["CHILDS"][$i]["IMAGE"] = CFile::GetPath($section["PICTURE"]);
                }
            }
        }
    }
    elseif ($item["DEPTH_LEVEL"] == 3) {
        if (!empty($item["IS_PARENT"])) {
            $newResult[$parent1]["CHILDS"][$parent2]["CHILDS"][$i] = $item;
            $parent3        = $i;
        } else $newResult[$parent1]["CHILDS"][$parent2]["CHILDS"][$i] = $item;
    }
    elseif ($item["DEPTH_LEVEL"] == 4) {
        if (!empty($item["IS_PARENT"])) {
            $newResult[$parent1]["CHILDS"][$parent2]["CHILDS"][$parent3]["CHILDS"][$i] = $item;
            $parent4        = $i;
        } else $newResult[$parent1]["CHILDS"][$parent2]["CHILDS"][$parent3]["CHILDS"][$i] = $item;
    }
}

$arResult = $newResult;