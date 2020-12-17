<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));


$this->AddEditAction($arResult['SECTION']['ID'], $arResult['SECTION']['EDIT_LINK'], $strSectionEdit);
$this->AddDeleteAction($arResult['SECTION']['ID'], $arResult['SECTION']['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
?>

<div uk-grid class="catalog uk-grid-small uk-child-width-1-3@m uk-child-width-1-2">
    <? $first = true; ?>
    <? foreach ($arResult["SECTIONS"] as $section): ?>
        <? if ($section["DEPTH_LEVEL"] == 1): ?>
        <? if (!$first): ?>
                        </ul>
                    </div>
                </div>
            </div>
        <? endif; ?>
        <div class="catalog__item">
            <div class="catalog__card">
                <div class="catalog__image">
                    <div class="catalog__img">
                        <img src="<?=(!empty($section["PICTURE"]["SRC"]) ? $section["PICTURE"]["SRC"] : $this->GetFolder().'/images/line-empty.png')?>" alt="<?=$section["NAME"]?>">
                    </div>
                </div>
                <div class="catalog__body">
                    <a href="<?=$section["SECTION_PAGE_URL"]?>" class="catalog__title"><?=$section["NAME"]?></a>
                    <ul class="catalog__list">
        <? else: ?>
            <li class="catalog__list-item">
                <a href="<?=$section["SECTION_PAGE_URL"]?>" class="catalog__list-link"><?=$section["NAME"]?></a>
            </li>
        <? endif; $first = false; ?>
    <? endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
