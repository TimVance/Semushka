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
    <h2 class="uk-h2"><?=$arResult["NAME"]?></h2>
    <div class="uk-child-width-1-4@s uk-child-width-1-2 product-detail__lightbox sertificate-list" uk-grid>
        <? foreach ($arResult["ITEMS"] as $item): ?>
            <? if (empty($item["PREVIEW_PICTURE"]["SRC"]) && empty($item["DETAIL_PICTURE"]["SRC"])) continue; ?>
            <?
            $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="sertificate-list__item" id="<?=$this->GetEditAreaId($item['ID']);?>">
                <div class="sertificate-list__body">
                    <div class="sertificate-list__image">
                        <a class="uk-inline" href="<?=$item["DETAIL_PICTURE"]["SRC"]?>" data-fancybox="gallery">
                            <img src="<?=$item["PREVIEW_PICTURE"]["SRC"]?>" alt="">
                        </a>
                    </div>
                    <div class="sertificate-list__info">
                        <span class="sertificate-list__text"><?=$item["NAME"]?></span>
                        <a href="#" class="sertificate-list__download"></a>
                    </div>
                </div>
            </div>
        <? endforeach; ?>
    </div>
</section>