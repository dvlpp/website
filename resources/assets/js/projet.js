//$(".js-projet").click(function (e) {
//    e.stopPropagation();
//
//    if (isSmartphone()) {
//        return true;
//    }
//
//    var $bloc = $(this).parent();
//
//    if ($bloc.hasClass("opened")) {
//        return true;
//    }
//
//    e.preventDefault();
//
//    fermerFiches();
//
//    $bloc.addClass("opened");
//
//    var $fiche = $("." + $(this).data("target"));
//
//    $fiche.css("top", $bloc.position().top + $bloc.outerHeight() + 2);
//
//    $fiche.slideDown();
//});
//
//$(".js-fiche-close").click(function (e) {
//    fermerFiches();
//});
//
//$('html').click(function () {
//    fermerFiches();
//});
//
//$('.js-fiche').click(function (e) {
//    e.stopPropagation();
//});
//
//function fermerFiches() {
//    $(".js-fiche").slideUp("fast");
//    $(".js-projet").parent().removeClass("opened");
//}
//
//function isSmartphone() {
//    return $("#XS:visible").length;
//}
//
//$(window).resize(function () {
//    fermerFiches();
//});