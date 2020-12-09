<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Такой страницы не существует");?>

<div class="page-wrapper">
    <main class="content">
        <div class="uk-container uk-text-center">
            <h2 class="uk-h2">Такой страницы не существует</h2>
            <p><a href="/" class="link">Вернуться на главную</a></p>
            <div class="uk-margin-large"><img src="<?=SITE_TEMPLATE_PATH?>/images/404.svg" alt="404"></div>
        </div>
    </main>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>