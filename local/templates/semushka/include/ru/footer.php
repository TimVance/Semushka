<? if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>

<?if ($APPLICATION->GetCurPage(false) !== "/"): ?>
    <? $detail_page = false; ?>
    <? if (strpos("/news/", $APPLICATION->GetCurPage(false) !== false)): ?>
        <? if ($APPLICATION->GetCurPage() !== "/news/index.php") $detail_page = true; ?>
    <? endif; ?>
    <? if (!$detail_page): ?>
                    </div>
                </section>
            </main>
        </div>
    <? endif; ?>
<? endif; ?>
<footer class="footer">
    <div class="uk-container">
        <div class="footer__list uk-grid-small" uk-grid>
            <?$APPLICATION->IncludeComponent(
                "bitrix:menu",
                "footer",
                Array(
                    "ALLOW_MULTI_SELECT" => "N",
                    "CHILD_MENU_TYPE" => "left",
                    "DELAY" => "N",
                    "MAX_LEVEL" => "1",
                    "MENU_CACHE_GET_VARS" => array(""),
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_TYPE" => "A",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "ROOT_MENU_TYPE" => "left",
                    "USE_EXT" => "Y"
                ), false, Array('HIDE_ICONS' => 'Y')
            );?>
            <div class="footer__item uk-width-1-4@m">
                <div class="logo">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "/local/templates/semushka/include/".LANGUAGE_ID."/parts/logo.php"
                        )
                    );?>
                </div>
                <div class="footer-tel">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "/local/templates/semushka/include/phone.php"
                        )
                    );?>
                </div>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "/local/templates/semushka/include/".LANGUAGE_ID."/parts/policy.php"
                    )
                );?>
                <div>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "/local/templates/semushka/include/".LANGUAGE_ID."/parts/copyright.php"
                        )
                    );?>
                </div>
            </div>
        </div>
        <div class="copyright">
            <?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                Array(
                    "AREA_FILE_SHOW" => "file",
                    "AREA_FILE_SUFFIX" => "inc",
                    "EDIT_TEMPLATE" => "",
                    "PATH" => "/local/templates/semushka/include/".LANGUAGE_ID."/parts/requisites.php"
                )
            );?>
        </div>
    </div>
</footer>
<div id="receiver-modal" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <?$APPLICATION->IncludeComponent(
            "bitrix:form",
            "callback",
            Array(
                "AJAX_MODE" => "Y",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "Y",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "N",
                "CACHE_TIME" => "3600",
                "CACHE_TYPE" => "A",
                "CHAIN_ITEM_LINK" => "",
                "CHAIN_ITEM_TEXT" => "",
                "EDIT_ADDITIONAL" => "N",
                "EDIT_STATUS" => "N",
                "IGNORE_CUSTOM_TEMPLATE" => "N",
                "NOT_SHOW_FILTER" => array("",""),
                "NOT_SHOW_TABLE" => array("",""),
                "RESULT_ID" => $_REQUEST[RESULT_ID],
                "SEF_MODE" => "N",
                "SHOW_ADDITIONAL" => "N",
                "SHOW_ANSWER_VALUE" => "N",
                "SHOW_EDIT_PAGE" => "N",
                "SHOW_LIST_PAGE" => "N",
                "SHOW_STATUS" => "N",
                "SHOW_VIEW_PAGE" => "N",
                "START_PAGE" => "new",
                "SUCCESS_URL" => "",
                "USE_EXTENDED_ERRORS" => "N",
                "VARIABLE_ALIASES" => Array("action"=>"action"),
                "WEB_FORM_ID" => "1"
            )
        );?>
    </div>
</div>
<div id="delay-modal" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <?$APPLICATION->IncludeComponent(
            "bitrix:form",
            "callback",
            Array(
                "AJAX_MODE" => "Y",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "Y",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "N",
                "CACHE_TIME" => "3600",
                "CACHE_TYPE" => "A",
                "CHAIN_ITEM_LINK" => "",
                "CHAIN_ITEM_TEXT" => "",
                "EDIT_ADDITIONAL" => "N",
                "EDIT_STATUS" => "N",
                "IGNORE_CUSTOM_TEMPLATE" => "N",
                "NOT_SHOW_FILTER" => array("",""),
                "NOT_SHOW_TABLE" => array("",""),
                "RESULT_ID" => $_REQUEST[RESULT_ID],
                "SEF_MODE" => "N",
                "SHOW_ADDITIONAL" => "N",
                "SHOW_ANSWER_VALUE" => "N",
                "SHOW_EDIT_PAGE" => "N",
                "SHOW_LIST_PAGE" => "N",
                "SHOW_STATUS" => "N",
                "SHOW_VIEW_PAGE" => "N",
                "START_PAGE" => "new",
                "SUCCESS_URL" => "",
                "USE_EXTENDED_ERRORS" => "N",
                "VARIABLE_ALIASES" => Array("action"=>"action"),
                "WEB_FORM_ID" => "6"
            )
        );?>
    </div>
</div>
<div id="user-modal" uk-modal>
    <div class="uk-modal-dialog uk-modal-body modal-user-auth">
        <?$APPLICATION->IncludeComponent("bitrix:system.auth.form", "authform", Array(
            "FORGOT_PASSWORD_URL" => "",	// Страница забытого пароля
            "PROFILE_URL" => "",	// Страница профиля
            "REGISTER_URL" => "",	// Страница регистрации
            "SHOW_ERRORS" => "Y",	// Показывать ошибки
        ),
            false
        );?>
    </div>
</div>
<div class="notice-add-cart">
    Товар добавлен в корзину!
    <br>
    <a href="/personal/cart/">Оформить заказ</a>
</div>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
 
   ym(65405407, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/65405407" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
