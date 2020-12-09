<h2>Начните работать с нами</h2>
<div class="select-type-form">
    <form>
        <label>
            <input type="radio" name="select-type-form" value="F" checked>
            <span></span>
            Физическое лицо
        </label>
        <label>
            <input type="radio" name="select-type-form" value="U">
            <span></span>
            Юридическое лицо
        </label>
    </form>
</div>
<div class="form-fiz-wrapper">
<?$APPLICATION->IncludeComponent(
    "bitrix:form",
    "form-work-with",
    Array(
        "AJAX_MODE" => "Y",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "A",
        "CHAIN_ITEM_LINK" => "",
        "CHAIN_ITEM_TEXT" => "",
        "EDIT_ADDITIONAL" => "N",
        "EDIT_STATUS" => "Y",
        "IGNORE_CUSTOM_TEMPLATE" => "N",
        "NOT_SHOW_FILTER" => array("", ""),
        "NOT_SHOW_TABLE" => array("", ""),
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
        "VARIABLE_ALIASES" => Array(
            "action" => "action"
        ),
        "WEB_FORM_ID" => "3"
    )
);?>
</div>
<div class="form-ur-wrapper" style="display: none">
<?$APPLICATION->IncludeComponent(
    "bitrix:form",
    "form-work-with",
    Array(
        "AJAX_MODE" => "Y",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "A",
        "CHAIN_ITEM_LINK" => "",
        "CHAIN_ITEM_TEXT" => "",
        "EDIT_ADDITIONAL" => "N",
        "EDIT_STATUS" => "Y",
        "IGNORE_CUSTOM_TEMPLATE" => "N",
        "NOT_SHOW_FILTER" => array("", ""),
        "NOT_SHOW_TABLE" => array("", ""),
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
        "VARIABLE_ALIASES" => Array(
            "action" => "action"
        ),
        "WEB_FORM_ID" => "4"
    )
);?>
</div>
<script>
    $(".select-type-form input").change(function () {
        if ($(this).val() == "F") {
            $(".form-fiz-wrapper").show();
            $(".form-ur-wrapper").hide();
        }
        else {
            $(".form-fiz-wrapper").hide();
            $(".form-ur-wrapper").show();
        }
    });
</script>