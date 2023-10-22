import "./bootstrap";

let currentTheme = localStorage.getItem("theme");
let currentAnimationFrame = null;
let endX = 0;
let endY = 0;
let _x = 0;
let _y = 0;
let delay = 25;

$(document).ready(function () {
    // Theme function
    if (!localStorage.getItem("theme")) {
        localStorage.setItem("theme", "dark");
    }

    $("#toggleThemeBtn").click(function () {
        if (currentTheme == "light") {
            currentTheme = "dark";
            localStorage.setItem("theme", "dark");
            $("body").addClass("dark");
            $("body").removeClass("light");
        } else {
            currentTheme = "light";
            localStorage.setItem("theme", "light");
            $("body").addClass("light");
            $("body").removeClass("dark");
        }

        updateNavbrand();
        updateScrollbar();
    });

    $(document).on("mouseenter", "a", function () {
        $(".cursor").addClass("over");
        console.log("I entered");

        console.log("THIS", $(this));
    });
    $(document).on("mouseleave", "a", function () {
        $(".cursor").removeClass("over");
        console.log("I left\n");
    });

    $(document).on("mousemove", function (event) {
        const { pageX, pageY } = event;
        endX = pageX;
        endY = pageY;

        const cursorDot = document.getElementById("cursorDot");

        cursorDot.style.top = `${endY}px`;
        cursorDot.style.left = `${endX}px`;

        if (currentAnimationFrame) {
            cancelAnimationFrame(currentAnimationFrame);
        }

        updateCursorOutline();
    });
});

function updateNavbrand(theme) {
    if (theme == "dark") {
        $("#navbrandImage").attr("src", `{{ asset('img/mk_logo_white.png') }}`);
    } else {
        $("#navbrandImage").attr("src", `{{ asset('img/mk_logo_black.png') }}`);
    }
}

function updateScrollbar(theme) {
    if (theme == "dark") {
        document.body.style.scrollbarFaceColor = "red";
        document.body.style.scrollbarArrowColor = "colorname";
        document.body.style.scrollbarTrackColor = "blue";
    } else {
        document.body.style.scrollbarFaceColor = "blue";
        document.body.style.scrollbarArrowColor = "colorname";
        document.body.style.scrollbarTrackColor = "red";
    }
}

function updateCursorOutline() {
    const cursorDotOutline = document.getElementById("cursorDotOutline");

    _x += (endX - _x) / delay;
    _y += (endY - _y) / delay;

    const positionInfo = cursorDotOutline.getBoundingClientRect();
    const body = document.body;
    const html = document.documentElement;
    const windowHeight = Math.max(
        body.scrollHeight,
        body.offsetHeight,
        html.clientHeight,
        html.scrollHeight,
        html.offsetHeight
    );
    if (endX + positionInfo.width / 2 > window.innerWidth) {
        _x = window.innerWidth - cursorDotOutline.offsetWidth / 2;
    }

    if (endY + positionInfo.height / 2 > windowHeight) {
        _y = windowHeight - cursorDotOutline.offsetHeight / 2;
    }

    // if (parseInt(_x) != endX) {
    //     console.log("X:", _x, endX);
    // }
    // if (parseInt(_y) != endY) {
    //     console.log("X:", _y, endY);
    // }

    cursorDotOutline.style.top = `${_y}px`;
    cursorDotOutline.style.left = `${_x}px`;

    currentAnimationFrame = window.requestAnimationFrame(updateCursorOutline);
}
