function tabs(a) {
    var b = $(a).parent().index("li");
    $(a).parent().parent().find("li a").removeClass("selected");
    $(a).addClass("selected");
    $(".tab-content").hide();
    $(".tab-content").eq(b).show()
}