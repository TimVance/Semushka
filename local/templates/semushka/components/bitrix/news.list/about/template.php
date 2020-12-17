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
?>

<section class="uk-section">
    <div class="uk-child-width-1-3@m key-value-list" uk-grid>
        <? foreach ($arResult["ITEMS"] as $item): ?>
            <?
            $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="key-value-list__item" id="<?=$this->GetEditAreaId($item['ID']);?>">
                <div class="key-value">
                    <div class="key-value__icon key-value__icon--box"></div>
                    <div class="key-value__title"><?=$item["NAME"]?></div>
                    <div class="key-value__text"><?=$item["PREVIEW_TEXT"]?></div>
                </div>
            </div>
        <? endforeach; ?>
    </div>
</section>