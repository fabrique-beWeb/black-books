

function getHeaderLine() {
    var entete = document.createElement("tr");
    $(entete).append($(document.createElement("th")).text("id").addClass("col-xs-1"));
    $(entete).append($(document.createElement("th")).text("etat").addClass("col-xs-3"));
    $(entete).append($(document.createElement("th")).text("status").addClass("col-xs-3"));
    $(entete).append($(document.createElement("th")).text("prix").addClass("col-xs-3"));
    $(entete).append($(document.createElement("th")).text("").addClass("col-xs-2"));
    return entete;
}
function getEmptyLine() {
    //ligne vide :
    var ligne = document.createElement("tr");
    $("#copies").append(ligne);
    var selId = $(document.createElement("label")).text("").addClass("col-xs-12");
    $(ligne).append($(document.createElement("td")).append(selId));
    var selEtat = document.createElement("select");
    $(ligne).append($(document.createElement("td")).append($(selEtat).addClass("col-xs-12")));
    $.each(listOfEtats, function () {
        var opt = $(document.createElement("option")).val(this.id).text(this.description);
        $(selEtat).append(opt);
    });
    var selStatus = document.createElement("select");
    $(ligne).append($(document.createElement("td")).append($(selStatus).addClass("col-xs-12")));
    $.each(listOfStatus, function () {
        var opt = $(document.createElement("option")).val(this.id).text(this.status);
        $(selStatus).append(opt);
    });
    var selPrice = $(document.createElement("input")).attr("type", "number").val(this.prix);
    $(ligne).append($(document.createElement("td")).append($(selPrice).addClass("col-xs-12")));
    
    var actionButton = $(document.createElement("button")).text("ajouter").addClass("col-xs-12");
    $(ligne).append(getCell().append(actionButton));
    eventHandlerAdd(actionButton);
    return ligne;
}
function getCopyLine(copy) {
    var ligne = $(document.createElement("tr")).attr("id", copy.id);
    var copyEtat = copy.etat;
    var copyStatus = copy.status;

    $(ligne).append(getCell().append($(document.createElement("label")).text(copy.id).addClass("col-xs-12")));

    var selEtat = getSelecteurEtat(copyEtat).addClass("col-xs-12");
    $(ligne).append(getCell().append(selEtat));
    eventHandlerEtat(selEtat);

    var selStatus = getSelecteurStatus(copyStatus).addClass("col-xs-12");
    $(ligne).append(getCell().append(selStatus));
    eventHandlerStatus(selStatus);
    
    var selPrice = getInputPrice(copy).addClass("col-xs-12");
    $(ligne).append(getCell().append(selPrice));
    eventHandlerPrice(selPrice);
    
    var actionButton = $(document.createElement("button")).text("supprimer").addClass("col-xs-12");
    $(ligne).append(getCell().append(actionButton));

    return ligne;
}

function getSelecteurEtat(copyEtat) {
    var selEtat = document.createElement("select");
    $.each(listOfEtats, function () {
        var opt = $(document.createElement("option")).val(this.id).text(this.description);
        if (copyEtat.id === this.id) {
            $(opt).attr("selected", "selected");
        }
        $(selEtat).append(opt);
    });
    
    return $(selEtat);
}
function getSelecteurStatus(copyStatus) {
    var selStatus = document.createElement("select");
    $.each(listOfStatus, function () {
        var opt = $(document.createElement("option")).val(this.id).text(this.status);
        if (copyStatus.id === this.id) {
            $(opt).attr("selected", "selected");
        }
        $(selStatus).append(opt);
    });
    return $(selStatus);
}
function getInputPrice(copy) {
    var selPrice = $(document.createElement("input")).attr("type", "number").val(copy.prix);
    return $(selPrice);
}

function getCell() {
    return $(document.createElement("td"));
}




function addEvents(line){
    var cells = $(line).children();
    eventHandlerEtat($(cells[1]).children());
    eventHandlerStatus($(cells[2]).children());
    eventHandlerPrice($(cells[3]).children());
    $(cells[4]).children().text("supprimer");
    getEmptyLine();
}