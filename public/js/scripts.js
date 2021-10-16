var position = $(window).scrollTop();

$(window).scroll(function () {
    var scroll = $(window).scrollTop();

    if (scroll > position) {
        $("header").addClass("header-none");
        $(".pcb-breadcrumb").css("padding-top", "120px").css("transition", "all 0.5s linear");
    } else {
        if (scroll < position - 30 || scroll == 0) {
            $("header").removeClass("header-none");
            $(".pcb-breadcrumb").css("padding-top", "200px");
        }
    }
    position = scroll;
});


if ('serviceWorker' in navigator) {
    window.addEventListener('load', function () {
        navigator.serviceWorker.register(pcb_pwa.url)
            .then(function (registration) { console.log('PCB-PWA service worker ready'); registration.update(); })
            .catch(function (error) { console.log('Registration failed with ' + error); });
    });
}


$('.disabled').click(function (e) {
    e.preventDefault();
})


var checkbox = document.querySelector('input[name=theme]');

checkbox.addEventListener('change', function () {
    if (this.checked) {
        trans()
        document.documentElement.setAttribute('data-theme', 'dark')
        alert('Paint is still wet :( We will launch it soon.')
        location.reload()
    } else {
        trans()
        document.documentElement.setAttribute('data-theme', 'light')
    }
})

let trans = () => {
    document.documentElement.classList.add('transition');
    window.setTimeout(() => {
        document.documentElement.classList.remove('transition')
    }, 1000)
}


var position = $(window).scrollTop();

$(window).scroll(function () {
    var scroll = $(window).scrollTop();

    if (scroll > position) {
        $("header").addClass("header-none");
        $(".pcb-breadcrumb").css("padding-top", "120px").css("transition", "all 0.5s linear");
    } else {
        if (scroll < position - 30 || scroll == 0) {
            $("header").removeClass("header-none");
            $(".pcb-breadcrumb").css("padding-top", "200px");
        }
    }
    position = scroll;
});


$(document).ready(function () {

    $('.accordion .according-section').click(function () {

        if ($(this).hasClass("faq-active")) {
            $(this).removeClass('faq-active');
            $(this).next('.content').slideToggle('medium', function () {
                $(this).next('.content').css({ 'display': 'none' });
            });
        }
        else {
            $(this).addClass('faq-active');
            $(this).next('.content').slideToggle('medium', function () {
                $(this).next('.content').css({ 'display': 'block' });
            });
        }

    });

});

var lazyLoadInstance = new LazyLoad({
    // Your custom settings go here
});

function gdpr(accept) {
    $(document).ready(function () {
        $.ajax({
            url: 'https://pcbuilder.net/list/gdpr',
            type: 'get',
            async: false,
            data: { gdpr: accept },
            success: function (data) {
                location.reload();
            }
        });
    });

}


function selectText(containerid, copyid) {

    var copyText = document.getElementsByClassName(copyid)[0];
    copyStringToClipboard(copyText.innerHTML);

    if (document.selection) { // IE
        var range = document.body.createTextRange();
        range.moveToElementText(document.getElementById(containerid));
        range.select();
    } else if (window.getSelection) {
        var range = document.createRange();
        range.selectNode(document.getElementById(containerid));
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(range);
    }
}

$(function () {
    $('.example-popover').popover({
        container: 'body'
    })
})

$(document).ready(function () {
    const clearHistoryBtn = `
        <span>All records will be removed</span>
        <button type="button" class="confirm-clear-history btn btn-sm btn-danger" onclick="alert('event raised from yes button');">Yes</button>
        <button type="button" class="btn btn-sm btn-link" onclick="alert('event raised from no button');">No</button>
    `;

    $('.example-popover').popover({
        placement: 'bottom',
        html: true,
        title: 'You are cleaning the history',
        content: clearHistoryBtn
    });
});

function copyStringToClipboard(str) {
    // Create new element
    var el = document.createElement('textarea');
    // Set value (string to be copied)
    el.value = str;
    // Set non-editable to avoid focus and move outside of view
    el.setAttribute('readonly', '');
    el.style = { position: 'absolute', left: '-9999px' };
    document.body.appendChild(el);
    // Select text inside element
    el.select();
    // Copy text to clipboard
    document.execCommand('copy');
    // Remove temporary element
    document.body.removeChild(el);
}


$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});


$(".copy-link").click(function () {
    $('.copy-link').attr('title', 'Copied!');
    $('.copy-link').tooltip("hide");
    $('.copy-link').attr('data-original-title', 'Copied!');
    $('.copy-link').tooltip("show");


    setTimeout(function () {
        $('.copy-link').mouseleave(function () {
            $('.copy-link').attr('title', 'Copy Link!');
            $('.copy-link').tooltip("hide");
            $('.copy-link').attr('data-original-title', 'Copy Link!');
        }
        ).mouseleave();
    }, 2000);
});

$(document).ready(function () {
    var pageWidth = $(window).width();
    if (pageWidth <= 768) {
        $('.menu').click(function () {
            //If Navbar is Already Opened
            if ($(this).hasClass("opened")) {
                $("header .logo").animate({ "margin-left": 0 }, 500);
                //$("header .logo").fadeIn();
                $(".login").fadeIn();
                $(".search").fadeIn();
            }
            else {
                $(".login").fadeOut();
                $(".search").fadeOut();
            }
        });

        $(".access-my-profile").click(function () {

            if (!$("#my-profile").hasClass("show")) {
                $(".login").fadeOut();
                $(".search").fadeOut();
            }
        });

        $('.search').click(function () {

            if (!$("#my-search").hasClass("show")) {

                $("header .logo").animate({ "margin-left": -90 }, 500);
                //$("header .logo").fadeOut();
                $(".login").fadeOut();
            };

        });

    }

});

$(document).ready(function () {
    /* Navbar Section */

    $('.menu').click(function () {

        //If Navbar is Already Opened
        if ($(this).hasClass("opened")) {



            $(this).removeClass('opened');
            $(this).addClass('collapsed');
            $('#my-nav').slideUp('slow', function () {
                $('#my-nav').removeClass('show');
            });

            $('#my-search').slideUp('slow', function () {
                $('#my-search').removeClass('show');
            });

            $('#my-profile').slideUp('slow', function () {
                $('#my-profile').removeClass('show');
            });
        }
        else {


            if ($("#my-profile").hasClass("show")) {
                $('#my-profile').slideToggle('medium', function () {
                    $("#my-profile").removeClass("show");
                    $("#my-profile").css({ 'display': 'none' });
                });
            }
            if ($("#my-search").hasClass("show")) {
                $('#my-search').slideToggle('medium', function () {
                    $("#my-search").removeClass("show");
                    $("#my-search").css({ 'display': 'none' });
                });
            }


            $(this).addClass('opened');
            $(this).removeClass('collapsed');

            $('#my-nav').slideToggle('slow', function () {
                $('#my-nav').addClass('show');
                $("#my-profile").removeClass("show");
            });

        }
    });






    /* Profile Section */


    $(".access-my-profile").click(function () {

        if ($("#my-profile").hasClass("show")) {


            $('#my-profile').slideToggle('medium', function () {
                $("#my-profile").removeClass("show");
                $("#my-profile").css({ 'display': 'none' });
                $(".menu").removeClass('opened');
                $(".menu").addClass('collapsed');

            });

        }
        else {

            $(".menu").addClass('opened');
            $(".menu").removeClass('collapsed');


            if ($("#my-nav").hasClass("show")) {
                $('#my-nav').slideToggle('medium', function () {
                    $("#my-nav").removeClass("show");
                    $("#my-nav").css({ 'display': 'none' });
                });
            }
            if ($("#my-search").hasClass("show")) {
                $('#my-search').slideToggle('medium', function () {
                    $("#my-search").removeClass("show");
                    $("#my-search").css({ 'display': 'none' });
                });
            }


            $('#my-profile').slideToggle('medium', function () {
                $('#my-profile').addClass('show');
                $("#my-profile").css({ 'display': 'block' });
            });

        }
    });




    /*Search */

    $('.search').click(function () {


        if ($("#my-search").hasClass("show")) {


        }
        else {



            $(".menu").addClass('opened');
            $(".menu").removeClass('collapsed');


            if ($("#my-profile").hasClass("show")) {
                $('#my-profile').slideToggle('medium', function () {
                    $("#my-profile").removeClass("show");
                    $("#my-profile").css({ 'display': 'none' });
                });
            }

            if ($("#my-nav").hasClass("show")) {
                $('#my-nav').slideToggle('medium', function () {
                    $("#my-nav").removeClass("show");
                    $("#my-nav").css({ 'display': 'none' });
                });
            }

            $('#my-search').slideToggle('medium', function () {
                $('#my-search').addClass('show');
                $("#my-search").css({ 'display': 'block' });
            });




            function delay(fn, ms) {
                let timer = 0
                return function (...args) {
                    clearTimeout(timer)
                    timer = setTimeout(fn.bind(this, ...args), ms || 0)
                }
            }

            // Example usage:

            $('#search').keyup(delay(function (e) {
                // Get input value on change
                var inputVal = $(this).val();
                if (inputVal.length) {
                    $.get("search.html", { s: inputVal }).done(function (data) {
                        // Display the returned data in browser
                        $(".mega-search").html(data);
                    });
                } else {

                    $(".mega-search").empty();
                    $(".mega-search").html('<a class="search-for">Please Search a Term...</a>');
                }
            }, 300));




        }
    });
});



function changecountry(value) {
    $(document).ready(function () {
        $.ajax({
            url: 'https://pcbuilder.net/list/change-currency',
            type: 'get',
            async: false,
            data: { currency: value }, //$('form#myForm').serialize(),
            success: function (data) {
                //window.location = 'https://pcbuilder.net/list/';
                location.reload();
            }
        });
    });
}



function setid2(product, component) {

    $(document).ready(function () {
        $.ajax({
            url: 'https://pcbuilder.net/list/add-product',
            type: 'get',
            async: false,
            data: { product: component, id: product }, //$('form#myForm').serialize(),
            success: function (data) {
                window.location = 'list/index.html';
            }
        });
    });

}

function newList() {
    $(document).ready(function () {
        $("#newList").addClass("disabled");
        $("#newList").attr("disabled", "disabled").off('click');

        $.ajax({
            url: 'https://pcbuilder.net/list/new-list',
            type: 'get',
            async: false,
            data: { delete: true },
            success: function (data) {
                window.location = 'list/index.html';
            }
        });
    });
}


function markup(type) {
    $(document).ready(function () {
        $.ajax({
            url: 'https://pcbuilder.net/list/markup',
            type: 'get',
            async: false,
            data: { markup: type }, //$('form#myForm').serialize(),
            success: function (data) {
                copyStringToClipboard(data);
                $('#' + type).attr('title', 'Markup Copied!');
                $('#' + type).tooltip("hide");
                $('#' + type).attr('data-original-title', 'Markup Copied!');
                $('#' + type).tooltip("show");


                setTimeout(function () {

                    $('#' + type).mouseleave(function () {

                        $('#' + type).attr('title', 'Copy ' + type.toLowerCase().replace(/\b[a-z]/g, function (letter) { return letter.toUpperCase(); }) + ' Markup!');
                        $('#' + type).tooltip("hide");
                        $('#' + type).attr('data-original-title', 'Copy ' + type.toLowerCase().replace(/\b[a-z]/g, function (letter) { return letter.toUpperCase(); }) + ' Markup!');
                    }
                    ).mouseleave();


                }, 2000);
            }
        });

    });
}
