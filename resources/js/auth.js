(function($) {
    $("#toggleIcon").on("click", function() {
        let x = $(".passwordfield").attr("type");
        if (x === "password") {
            $(".passwordfield").prop("type", "text");
            $("#hidePassword").hide();
            $("#showPassword").show();
        } else {
            $(".passwordfield").prop("type", "password");
            $("#showPassword").hide();
            $("#hidePassword").show();
        }
    });
})(jQuery);