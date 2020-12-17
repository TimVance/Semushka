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