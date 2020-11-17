//pour effet scroll navbar

window.onscroll = function() {scrolled()};

function scrolled() {
    if (document.body.scrollTop > 450 || document.documentElement.scrollTop > 450) {
        document.getElementById("mainNav").style.backgroundColor = "rgba(0,0,0,0.13)";
        document.getElementById("mainNav").style.transition = "background-color 1s";
    }

    else {
        document.getElementById("mainNav").style.backgroundColor = "rgba(0,0,0,0)";
        document.getElementById("mainNav").style.transition = "background-color 1s"
    }
}



