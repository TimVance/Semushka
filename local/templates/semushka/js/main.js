$(function () {
    (function quantityProducts() {
        $(".js-product-quantity").each(function () {
            let $quantityNum = $(this).find($(".js-product-quantity__num"));
            let $quantityArrowMinus = $(this).find($(".js-product-quantity__arrow-minus"));
            let $quantityArrowPlus = $(this).find($(".js-product-quantity__arrow-plus"));
            let $quantityWrapper = $(this).closest(".card__tools").find(".card__select span");

            $quantityArrowMinus.click(function () {
                if ($quantityNum.val() > 1) {
                    $quantityNum.val(+$quantityNum.val() - 1).change();
                }
            });
            $quantityArrowPlus.click(function () {
                $quantityNum.val(+$quantityNum.val() + 1).change();
            });

            /*
            $quantityNum.change(function () {
                let sum = parseFloat($quantityWrapper.data("num")) * parseFloat($quantityNum.val());
                if (sum >= 1000) $quantityWrapper.text(">999");
                else $quantityWrapper.text(sum);

            });
             */

        })
    })();
    $('body').addClass('load');
    if ($("body").hasClass("admin")) {
        let height = $("#bx-panel").height();
        $("#header-search").css("top", height);
    }
    if ($(".top-banner")) {
        $(".page-wrapper").addClass("margin0");
    }
    $('#bx-soa-properties input[name="ORDER_PROP_3"], #callback_inputmask, #order_inputmask').mask("+7 999 999-99-99");

    $('.js-delay-section-product').click(function (e) {
        e.preventDefault();
        let el = $(this);
        let name = el.data("name");
        $("#delay-modal #js-delay-good").val(name);
    });

    $(".header-search .uk-offcanvas-bar").show();

    // Dadata

    $(".dadata-fio, .dadata-mail, .dadata-city, .dadata-address, .dadata-org").attr("autocomplete", "off").after('<div class="suggestions"></div>');

    $(".dadata-fio").keyup(function () {
        let container = $(this).parent().find(".suggestions");
        var url = "https://suggestions.dadata.ru/suggestions/api/4_1/rs/suggest/fio";
        var token = "a5fdf1a31e7595344ef834a8a4e4f1fd358832d6";
        var query = $(this).val();
        var options = {
            method: "POST",
            mode: "cors",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "Authorization": "Token " + token
            },
            body: JSON.stringify({query: query})
        }
        fetch(url, options)
            .then(response => response.text())
            .then(result => {
                let count = 5;
                container.html('');
                let arrResult = JSON.parse(result);
                arrResult.suggestions.forEach(function(el) {
                    if (count > 0) {
                        container.append('<span class="suggestions-item">' + el.value + '</span>');
                        count--;
                    }
                });
            })
            .catch(error => console.log("error", error));
    });

    $(".dadata-mail").keyup(function () {
        let container = $(this).parent().find(".suggestions");
        var url = "https://suggestions.dadata.ru/suggestions/api/4_1/rs/suggest/email";
        var token = "a5fdf1a31e7595344ef834a8a4e4f1fd358832d6";
        var query = $(this).val();
        var options = {
            method: "POST",
            mode: "cors",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "Authorization": "Token " + token
            },
            body: JSON.stringify({query: query})
        }
        fetch(url, options)
            .then(response => response.text())
            .then(result => {
                let count = 5;
                container.html('');
                let arrResult = JSON.parse(result);
                console.log(arrResult);
                arrResult.suggestions.forEach(function(el) {
                    if (count > 0) {
                        container.append('<span class="suggestions-item">' + el.value + '</span>');
                        count--;
                    }
                });
            })
            .catch(error => console.log("error", error));
    });

    $(".dadata-city").keyup(function () {
        let container = $(this).parent().find(".suggestions");
        var url = "https://suggestions.dadata.ru/suggestions/api/4_1/rs/suggest/address";
        var token = "a5fdf1a31e7595344ef834a8a4e4f1fd358832d6";
        var query = $(this).val();
        var options = {
            method: "POST",
            mode: "cors",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "Authorization": "Token " + token
            },
            body: JSON.stringify({query: query, from_bound: {'value': "city"}, to_bound: {'value': "city"}})
        }
        fetch(url, options)
            .then(response => response.text())
            .then(result => {
                let count = 5;
                container.html('');
                let arrResult = JSON.parse(result);
                console.log(arrResult);
                arrResult.suggestions.forEach(function(el) {
                    if (count > 0) {
                        container.append('<span class="suggestions-item">' + el.value + '</span>');
                        count--;
                    }
                });
            })
            .catch(error => console.log("error", error));
    });

    $(".dadata-address").keyup(function () {
        let container = $(this).parent().find(".suggestions");
        var url = "https://suggestions.dadata.ru/suggestions/api/4_1/rs/suggest/address";
        var token = "a5fdf1a31e7595344ef834a8a4e4f1fd358832d6";
        var query = $(this).val();
        var options = {
            method: "POST",
            mode: "cors",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "Authorization": "Token " + token
            },
            body: JSON.stringify({query: query})
        }
        fetch(url, options)
            .then(response => response.text())
            .then(result => {
                let count = 5;
                container.html('');
                let arrResult = JSON.parse(result);
                console.log(arrResult);
                arrResult.suggestions.forEach(function(el) {
                    if (count > 0) {
                        container.append('<span class="suggestions-item">' + el.value + '</span>');
                        count--;
                    }
                });
            })
            .catch(error => console.log("error", error));
    });

    $(".dadata-org").keyup(function () {
        let container = $(this).parent().find(".suggestions");
        var url = "https://suggestions.dadata.ru/suggestions/api/4_1/rs/suggest/party";
        var token = "a5fdf1a31e7595344ef834a8a4e4f1fd358832d6";
        var query = $(this).val();
        var options = {
            method: "POST",
            mode: "cors",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "Authorization": "Token " + token
            },
            body: JSON.stringify({query: query})
        }
        fetch(url, options)
            .then(response => response.text())
            .then(result => {
                let count = 5;
                container.html('');
                let arrResult = JSON.parse(result);
                console.log(arrResult);
                arrResult.suggestions.forEach(function(el) {
                    if (count > 0) {
                        container.append('<span class="suggestions-item">' + el.value + '</span>');
                        count--;
                    }
                });
            })
            .catch(error => console.log("error", error));
    });

    $(document).on("click", ".suggestions-item", function () {
        $(this).closest(".uk-form-controls").find("input").val($(this).text());
        $(this).parent().html("");
    });

    $(document).on('click', function (e) {
        var el = $(".suggestions");
        if ($(e.target).closest(el).length) return;
        $(".suggestions").html("");
    });

    $(".js-select-offer-section input").change(function () {
        let el = $(this);
        let price = $(".js-select-offer-section input:checked").data("price");
        el.closest(".card__body").find(".js-section-price").text(price);
    });

    $(".js-select-offer-detail input").change(function () {
        let price = $(".js-select-offer-detail input:checked").data("price");
        $(".js-detail-price-text").text(price);
    });

});

BX.addCustomEvent('onAjaxSuccess', function () {
    $('#callback_inputmask').mask("+7 999 999-99-99");
    $('#order_inputmask').mask("+7 999 999-99-99");
});

// Cart add

// Detail
window.onload = () => {
    let button_detail = document.querySelector('.js-add-detail-product');
    if (button_detail) {
        button_detail.addEventListener('click', (event) => {
            let parent = button_detail.closest('.js-product-detail__item');
            let product_id = parseInt(parent.getAttribute('data-product-id'));
            let quantity = parseInt(parent.querySelector('.js-product-quantity__num').value);
            let offer_list = document.querySelector(".js-select-offer-detail");
            if (offer_list != null) {
                let offer = offer_list.querySelector("input:checked");
                if (offer != null) product_id = offer.value;
                else {
                    alert('Необходимо выбрать вес!');
                    return false;
                }
            }
            if (!sendRequest(product_id, quantity)) alert('Произошла ошибка');
        });
    }

    let buttons_section = document.querySelectorAll('.js-add-section-product');
    if (buttons_section) {
        buttons_section.forEach(function (el) {
            el.addEventListener('click', (event) => {
                let parent = el.closest('.card__footer');
                let product_id = parseInt(parent.getAttribute('data-product-id'));
                let quantity = parseInt(parent.querySelector('.js-product-quantity__num').value);
                let offer_list = parent.querySelector(".js-select-offer-section");
                if (offer_list != null) {
                    console.log(offer_list);
                    let offer = offer_list.querySelector("input:checked");
                    if (offer != null) product_id = offer.value;
                    else {
                        alert('Необходимо выбрать вес!');
                        return false;
                    }
                }
                if (!sendRequest(product_id, quantity)) alert('Произошла ошибка');
            });
        });
    }

    // Video
    $(".page-top__btn").click(function () {
        $(".main-video").fadeIn('slow').trigger("play");
        $(this).remove();
    });

    // Menu first hover
    $(".main-nav__item--lvl1").hover(function () {
        $(".top-nav__list").removeClass("first-open");
    }, function () {
        $(".top-nav__list").addClass("first-open");
    });

}
// Detail

function sendRequest(product_id, quantity) {
    let params = {
        'product_id': product_id,
        'quantity': quantity,
        'action': 'add'
    };
    let data = new FormData();
    data.append('data', JSON.stringify(params));

    fetch("/local/templates/semushka/ajax/addProduct.php",
        {
            method: "post",
            body: data
        })
        .then(response => {
            if (response.status !== 200) {
                return Promise.reject();
            }
            return response.text();
        })
        .then(function (data) {
            let cart = document.querySelector("#desktop-cart-wrapper");
            cart.innerHTML = data;
            let notice = document.querySelector(".notice-add-cart");
            notice.classList.add("active");
            setTimeout(() => notice.classList.remove("active"), 3000);
        })
        .catch(() => console.log('Ошибка'))
    return true;
}

// Cart add

// Cart Del
function removeItemCart(id) {
    if (confirm("Удалить товар из корзины?")) {
        let params = {
            'product_id': id,
            'action': 'delete'
        };
        let data = new FormData();
        data.append('data', JSON.stringify(params));

        fetch("/local/templates/semushka/ajax/addProduct.php",
            {
                method: "post",
                body: data
            })
            .then(response => {
                if (response.status !== 200) {
                    return Promise.reject();
                }
                return response.text();
            })
            .then(function (data) {
                let cart = document.querySelector("#desktop-cart-wrapper");
                cart.innerHTML = data;
            })
            .catch(() => console.log('Ошибка'))
        return true;
    }
}
// Cart Del

// Cart clear
function clearCart() {
    if (confirm("Очистить корзину?")) {
        let params = {
            'action': 'clear'
        };
        let data = new FormData();
        data.append('data', JSON.stringify(params));

        fetch("/local/templates/semushka/ajax/addProduct.php",
            {
                method: "post",
                body: data
            })
            .then(response => {
                if (response.status !== 200) {
                    return Promise.reject();
                }
                return response.text();
            })
            .then(function (data) {
                let cart = document.querySelector("#desktop-cart-wrapper");
                cart.innerHTML = data;
            })
            .catch(() => console.log('Ошибка'))
        return true;
    }
}
// Cart clear