
function eventHandlerEtat(object) {
    $(object).change(function () {
        var idCopy = $(this).parent().parent().attr("id");
        var idValue = $(this).children("option:selected").val();
        $.ajax({
            url: URL + "administration/copies/" + idCopy,
            async: false,
            type: 'PUT',
            data: {
                "etat": idValue
            },
            success: function (data) {
            },
            error: function (error) {
                alert(error);
            }

        });
    });
}
function eventHandlerStatus(object) {
    $(object).change(function () {
        var idCopy = $(this).parent().parent().attr("id");
        var idValue = $(this).children("option:selected").val();
        $.ajax({
            url: URL + "administration/copies/" + idCopy,
            async: false,
            type: 'PUT',
            data: {
                "status": idValue
            },
            success: function (data) {
            },
            error: function (error) {
                alert(error);
            }

        });
    });
}
function eventHandlerPrice(object) {
    $(object).change(function () {
        var idCopy = $(this).parent().parent().attr("id");
        var idValue = $(this).val();
        $.ajax({
            url: URL + "administration/copies/" + idCopy,
            async: false,
            type: 'PUT',
            data: {
                "price": idValue
            },
            success: function (data) {
            },
            error: function (error) {
                alert(error);
            }

        });
    });
}
function eventHandlerAdd(object) {
    
    $(object).click(function () {
        var ligne = $(this).parent().parent();
        var id_cell = $(ligne).children("td")[0];
        var etat_cell = $(ligne).children("td")[1];
        var status_cell = $(ligne).children("td")[2];
        var price_cell = $(ligne).children("td")[3];
        $.ajax({
            url: URL + "administration/books/"+ CURRENT.id +"/copy",
            async: false,
            type: 'POST',
            data: {
                "etat": $(etat_cell).children().val(),
                "status": $(status_cell).children().val(),
                "price": $(price_cell).children().val()
            },
            success: function (data) {
                $(id_cell).children().text(data.id);
                $(price_cell).val(data.price);
                $(ligne).attr("id",data.id);
                addEvents(ligne);
            },
            error: function (error) {
                alert(error);
            }

        });
    });
}