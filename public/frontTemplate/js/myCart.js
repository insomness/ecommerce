// custom script
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

// ajax loading image
$(document).on({
    ajaxStart: function() {
        $("body").addClass("loading");
    },

    ajaxStop: function() {
        $("body").removeClass("loading");
    }
});
