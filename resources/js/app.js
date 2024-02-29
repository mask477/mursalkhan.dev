import "./bootstrap";

let currentTheme = localStorage.getItem("theme");
let outerlineAnimationFrame = null;
let innerlineAnimationFrame = null;
let endX = 0;
let endY = 0;
let _ox = 0;
let _oy = 0;
let _ix = 0;
let _iy = 0;
let delay = 25;

$(document).ready(function () {
    console.log("CURRENT TEHEME:", currentTheme);
    if (!localStorage.getItem("theme")) {
        localStorage.setItem("theme", "dark");
        currentTheme = "dark";
    }
    setCurrentTheme();

    $("#toggleThemeBtn").click(function () {
        if (currentTheme == "dark") {
            currentTheme = "light";
            localStorage.setItem("theme", "light");
        } else {
            currentTheme = "dark";
            localStorage.setItem("theme", "dark");
        }
        setCurrentTheme();
    });

    ["a", ".link", "button"].map((tag) => {
        $(document).on("mouseenter", tag, function () {
            $(".cursor").addClass("over");
        });
        $(document).on("mouseleave", tag, function () {
            $(".cursor").removeClass("over");
        });
    });

    ["h1", "h2", "h3", "h4", "h5"].map((tag) => {
        $(document).on("mouseenter", tag, function () {
            if (!$(this).hasClass("no-highlight")) {
                $(".cursor").addClass("over-heading");
            }
        });
        $(document).on("mouseleave", tag, function () {
            if (!$(this).hasClass("no-highlight")) {
                $(".cursor").removeClass("over-heading");
            }
        });
    });
    ["p", "label", "input"].map((tag) => {
        $(document).on("mouseenter", tag, function () {
            $(".cursor").addClass("over-text");
        });
        $(document).on("mouseleave", tag, function () {
            $(".cursor").removeClass("over-text");
        });
    });

    [".gridcell"].map((tag) => {
        $(document).on("mouseenter", tag, function () {
            $(".cursor").addClass("over-gridcell");
        });
        $(document).on("mouseleave", tag, function () {
            $(".cursor").removeClass("over-gridcell");
        });
    });

    $(document).on("mousemove", function (event) {
        const { pageX, pageY } = event;
        endX = pageX;
        endY = pageY;

        const cursorDot = document.getElementById("cursorDot");
        const cursorGradient = document.getElementById("cursorGradient");

        cursorDot.style.top = `${endY}px`;
        cursorDot.style.left = `${endX}px`;
        let themeColor =
            currentTheme == "dark"
                ? "rgba(249, 247, 246, 0.1)"
                : "rgba(0,0,0,0.2)";
        const cursorBg = `background: radial-gradient(600px at ${endX}px ${endY}px, ${themeColor}, transparent 100%);`;
        cursorGradient.style = cursorBg;

        if (outerlineAnimationFrame) {
            cancelAnimationFrame(outerlineAnimationFrame);
        }
        updateCursorOutline();

        if (innerlineAnimationFrame) {
            cancelAnimationFrame(innerlineAnimationFrame);
        }
        updateCursorInnerline();
    });

    $(".tab-list-item").on("click", function () {
        $(".tab-list-item").each(function () {
            $(this).removeClass("active");
        });

        $(this).addClass("active");
    });
});

function setCurrentTheme() {
    if (currentTheme == "dark") {
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
}

function updateNavbrand(theme) {
    if (theme == "dark") {
        $("#navbrandImage").attr("src", `{{ asset('img/mk_logo_white.png') }}`);
    } else {
        $("#navbrandImage").attr("src", `{{ asset('img/mk_logo_black.png') }}`);
    }
}

function updateCursorOutline() {
    const cursorDotOutline = document.getElementById("cursorDotOutline");

    _ox += (endX - _ox) / delay;
    _oy += (endY - _oy) / delay;

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
        _ox = window.innerWidth - cursorDotOutline.offsetWidth / 2;
    }

    if (endY + positionInfo.height / 2 > windowHeight) {
        _oy = windowHeight - cursorDotOutline.offsetHeight / 2;
    }

    cursorDotOutline.style.top = `${_oy}px`;
    cursorDotOutline.style.left = `${_ox}px`;

    outerlineAnimationFrame = window.requestAnimationFrame(updateCursorOutline);
}

function updateCursorInnerline() {
    const cursorDotInnerline = document.getElementById("cursorDotInnerline");

    _ix += (endX - _ix) / (delay / 2);
    _iy += (endY - _iy) / (delay / 2);

    const positionInfo = cursorDotInnerline.getBoundingClientRect();
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
        _ix = window.innerWidth - cursorDotInnerline.offsetWidth / 2;
    }

    if (endY + positionInfo.height / 2 > windowHeight) {
        _iy = windowHeight - cursorDotInnerline.offsetHeight / 2;
    }

    cursorDotInnerline.style.top = `${_iy}px`;
    cursorDotInnerline.style.left = `${_ix}px`;

    innerlineAnimationFrame = window.requestAnimationFrame(
        updateCursorInnerline
    );
}

function closeProjectSidebar() {
    const aside = $("aside.fade-in-left");

    if (aside) {
        $(aside).removeClass("fade-in-left");
        $(aside).addClass("fade-out-left");
        $(".sidebar-modal div.overlay").addClass("fade-out");
        setTimeout(() => {
            $(".sidebar-modal").remove();
        }, 500);
    }
}
