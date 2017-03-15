var CURRENT = null;

$(document).ready(function(){
   $("#common-result").children().hide();
   
});

$("#getBooks").click(function(){
    $("#common-result").children().hide();
    $("#list").show('fast');
    getBooks();
});
$("#form_add_Book").click(function(){
    $("#common-result").children().hide();
    $("#form_book").show('fast');
});
$("#form_add_Exemplaire").click(function(){
    $("#common-result").children().hide();;
    $("#form_exemplaire").show('fast');
});