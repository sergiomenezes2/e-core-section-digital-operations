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
                    $(".return-arrow").show();
                    } else {
                    $(".return-arrow").hide();
                    }
                }
            );
        }

        function animateBlocksOnVisibility() {
            const blocks = document.querySelectorAll(".content-info-fat");
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                    entry.target.classList.add("active");
                    }
                });
            });

            blocks.forEach((block) => {
                observer.observe(block);
            });
        }

        function backBtn() {
            $(".return-arrow").on("click", function () {
                $(".content-info-fat").slick("slickGoTo", 0);
            });
        }

        backBtn();
        toggleSlick();
        animateBlocksOnVisibility();
        $(window).on("resize", toggleSlick);
    });
})(jQuery);