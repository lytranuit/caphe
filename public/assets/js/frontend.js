$(document).ready(function() {
    $(".btn-toggle-list-nav").click(function(e) {
        e.preventDefault();
        console.log("click");
        $(".site-header__nav").toggleClass("is-actived");
    })
})