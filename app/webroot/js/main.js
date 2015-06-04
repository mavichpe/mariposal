/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function closeNav() {
    $("body").addClass("hide_nav");
    localStorage.setItem("hidenav", true);
}
function showMenu() {
    $("body").removeClass("hide_nav");
    localStorage.setItem("hidenav", false);
}

function clearForm() {
    $("#search-box").val("");
    $("#search-box").closest("form").submit();
}
$(function () {
    var hidenav = localStorage.getItem("hidenav");
    if (typeof hidenav == "undefined") {
        showMenu();
    } else if (hidenav == "true") {
        closeNav();
    }

});


