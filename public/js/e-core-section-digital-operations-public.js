(function ($) {
    "use strict";

    $(function () {
        function toggleSlick() {
            const $element = $(".content-info-fat");

            if ($(window).width() < 750) {
                if (!$element.hasClass("slick-initialized")) {
                    $element.slick({
                        dots: false,
                        arrows: false,
                        infinite: false,
                        speed: 300,
                        centerMode: true,
                        slidesToShow: 1,
                        centerPadding: "0",
                        variableWidth: true,
                    });
                }
            } else {
                if ($element.hasClass("slick-initialized")) {
                    $element.slick("unslick");
                }
            }

            $(".content-info-fat").on(
                "beforeChange",
                function (event, slick, currentSlide, nextSlide) {
                    if (nextSlide < currentSlide) {
                        $(slick.$slides[currentSlide - 1]).css("opacity", 1);
                    }
                    $(slick.$slides[currentSlide + 1])
                        .find("p")
                        .css("color", "#fff");
                }
            );

            $(".content-info-fat").on(
                "afterChange",
                function (event, slick, currentSlide) {
                    if (currentSlide > 0) {
                        $(slick.$slides[currentSlide - 1]).css("opacity", 0);
                        $(slick.$slides[currentSlide + 1])
                            .find("p")
                            .css("color", "transparent");
                    } else {
                        $(slick.$slides[currentSlide]).css("opacity", 1);
                        $(slick.$slides[currentSlide + 1]).css("opacity", 1);
                    }

                    if (currentSlide === slick.$slides.length - 1) {
                        $("#arrow-back").css("display", 'block');
                        $("#arrow-back").css("opacity", 1);
                    } else {
                        $("#arrow-back").css("opacity", 0);
                        $("#arrow-back").css("display", 'none');
                    }
                }
            );
        }

        function animateBlocksOnVisibility() {
            const blocks = $(".content-info-fat");
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        if ($(window).width() < 750) {
                            fadeInAndOut("#arrow-start");
                        }
                        entry.target.classList.add("active");
                    }
                });
            });

            blocks.each((index, block) => {
                observer.observe(block);
            });
        }

        function backBtn() {
            $("#arrow-back").on("click", function () {
                $(".content-info-fat").slick("slickGoTo", 0);
                $("#arrow-back").css('opacity', '0');
                $("#arrow-back").css("display", 'none');
            });
        }

        function fadeInAndOut(ref) {
            var element = $(ref);
            element.css("opacity", 1);

            if (ref === "#arrow-start") {
                setTimeout(function () {
                    element.css("opacity", 0);
                }, 3000);

                setTimeout(function () {
                    element.css("display", "none");
                }, 4000);
            }
        }

        backBtn();
        toggleSlick();
        animateBlocksOnVisibility();
        $(window).on("resize", toggleSlick);
    });
})(jQuery);