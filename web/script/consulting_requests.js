var URL = "http://www.black-books.uk/library/";

/**
 * requete ajax pour la liste complète des livres
 * @return {undefined}
 */
function getBooks() {
    $.ajax({
        url: URL + "consulting/books",
        async: true,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            updateBooks(data);
        },
        error: function (error) {
            $("#return").text("error" + error);
        }

    });
}
;

/**
 * Methode appelée par @function getBooks() pour création de la vue en JS
 * On réaffiche tout a chaque retour
 * @param {type} data
 * @return {undefined}
 */
function updateBooks(data) {
    $("#list").empty();
    // Préparation de la table pour lister les bouquins
    var table = document.createElement("table");
    $("#list").append(table);
    // On place les titres de colones
    var entete = document.createElement("tr");
    $(entete).append($(document.createElement("th")).text("Titre").addClass("col-xs-2"));
    $(entete).append($(document.createElement("th")).text("ISBN").addClass("col-xs-1"));
    $(entete).append($(document.createElement("th")).text("Auteur").addClass("col-xs-2"));
    $(entete).append($(document.createElement("th")).text("Editeur").addClass("col-xs-2"));
    $(entete).append($(document.createElement("th")).text("Resumé").addClass("col-xs-5"));
    $(table).append(entete);
    //data est une liste d'objets ( voir la console et/ou les entités adéquates )
    $.each(data, function () {
        // eclatement des objets dans l'objet en cours
        var ligne = document.createElement("tr"); // chaque livre sur une ligne
        $(table).append(ligne).addClass("col-xs-12 livres");
        var book = this;
        var auteur = this.author;
        var edit = this.editeur;
        //on place tout à la volée et on y applique le contenu        
        $(ligne).append($(document.createElement("td")).text(book.titre));
        $(ligne).append($(document.createElement("td")).text(book.isbn));
        $(ligne).append($(document.createElement("td")).text(auteur.nom + " " + auteur.prenom));
        $(ligne).append($(document.createElement("td")).text(edit.maison));
        $(ligne).append($(document.createElement("td")).text(book.resume));
        //dans un premier temps on gère que le click sur la ligne
        //Après il semble bon de gerer les evenements sur les cellules
        //Genre click sur auteur : affiche detail auteur
        $(ligne).attr("id", book.id).click(function () {
            getExemplaire($(this).attr("id"));
        });
    });

}
var listOfStatus = [];
function getStatus() {
    if (listOfStatus.length === 0) {
        $.ajax({
            url: URL + "consulting/copies/status",
            async: false,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $.each(data, function () {
                    listOfStatus.push(this);
                });
            },
            error: function (error) {
                $("#return").text("error" + error);
            }

        });
    }
}
var listOfEtats = [];
function getEtats() {
    if (listOfEtats.length === 0) {
        $.ajax({
            url: URL + "consulting/copies/etats",
            async: false,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $.each(data, function () {
                    listOfEtats.push(this);
                });
            },
            error: function (error) {
                $("#return").text("error" + error);
            }

        });
    }
}
function getBook(id){
    $.ajax({
        url: URL + "consulting/books/" + id,
        async: false,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            CURRENT = data;
        },
        error: function (error) {
            $("#return").text("error" + error);
        }

    });
}
function getExemplaire(id) {
    getEtats();
    getStatus();
    getBook(id)
    $.ajax({
        url: URL + "consulting/books/" + id + "/copies",
        async: true,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            updateExemplaires(data);
        },
        error: function (error) {
            $("#return").text("error" + error);
        }

    });
}

function updateExemplaires(data) {
    $("#common-result").children().hide();
    $("#form_exemplaire").show('fast').children().children().text(CURRENT.titre);
    $("#copies").empty();
    $("#copies").append(getHeaderLine());
    $.each(data, function () {
        $("#copies").append(getCopyLine(this));
    });
    //ligne vide :
    $("#copies").append(getEmptyLine());
}



