function megyek() {
    $.post(
        "lekerdezes.inc.php",
        {"op" : "megyek"},
        function(data) {
            //$("#orszagselect").html('<option value="0">Válasszon ...</option>');
            $("<option>").val("0").text("Válasszon ...").appendTo("#megyekselect");
            var lista = data.lista;
            for(i=0; i<lista.length; i++)
                //$("#orszagselect").append('<option value="'+lista[i].id+'">'+lista[i].nev+'</option>');
                $("<option>").val(lista[i].id).text(lista[i].nev).appendTo("#megyekselect");
        },
        "json"                                                    
    );
};

function varosok() {
    $("#varosselect").html("");
    $("#evselect").html("");
    $(".adat").html("");
    var megyeid = $("#megyekselect").val();
    if (megyeid != 0) {
        $.post(
            "lekerdezes.inc.php",
            {"op" : "varos", "id" : megyeid},
            function(data) {
                $("#varosselect").html('<option value="0">Válasszon ...</option>');
                var lista = data.lista;
                for(i=0; i<lista.length; i++)
                    $("#varosselect").append('<option value="'+lista[i].id+'">'+lista[i].nev+'</option>');
            },
            "json"                                                    
        );
    }
}

function evek() {
    $("#evselect").html("");
    $(".adat").html("");
    var varosid = $("#varosselect").val();
    if (varosid != 0) {
        $.post(
            "lekerdezes.inc.php",
            {"op" : "nev", "id" : varosid},
            function(data) {
                $("#evselect").html('<option value="0">Válasszon ...</option>');
                var lista = data.lista;
                for(i=0; i<lista.length; i++)
                    $("#evselect").append('<option value="'+lista[i].id+'">'+lista[i].nev+'</option>');
            },
            "json"                                                    
        );
    }
}

function ev() {
    $(".adat").html("");
    var evid = $("#evselect").val();
    if (evid != 0) {
        $.post(
            "lekerdezes.inc.php",
            {"op" : "info", "id" : evid},
            function(data) {
                $("#ev").text(data.ev);
                $("#osszesen").text(data.osszesen);
            },
            "json"                                                    
        );
    }
}

$(document).ready(function() {
   megyek();
   
   $("#megyekselect").change(varosok);
   $("#varosselect").change(evek);
   $("#evselect").change(ev);
   
   $(".adat").hover(function() {
        $(this).css({"color" : "white", "background-color" : "black"});
    }, function() {
        $(this).css({"color" : "black", "background-color" : "white"});
    });
});
/*$(document).ready(function () {
    // Betölti a megyék listáját
    loadData('megye', null, 'megyeselect');

    // Megye változás eseménykezelő
    $('#megyeselect').change(function () {
        var megyeId = $(this).val();
        loadData('varos', megyeId, 'varosselect');
    });

    // Város változás eseménykezelő
    $('#varosselect').change(function () {
        var varosId = $(this).val();
        loadData('intezmeny', varosId, 'evselect');
    });

    // Intézmény változás eseménykezelő
    $('#evselect').change(function () {
        var evId = $(this).val();
        loadData('info', evId);
    });

    function loadData(operation, id, targetSelect) {
        $.ajax({
            type: "POST",
            url: "Controller.php",
            data: { op: operation, id: id },
            dataType: "json",
            success: function (data) {
                console.log(data);
                updateUI(data, targetSelect);
            },
            error: function (error) {
                console.error("Error:", error);
            }
        });
    }

    function updateUI(data, targetSelect) {
        // Frissíti a UI-t az adatok alapján
        if (targetSelect) {
            $('#' + targetSelect).empty();
            $.each(data.lista, function (index, item) {
                $('#' + targetSelect).append($('<option>', {
                    value: item.id,
                    text: item.nev
                }));
            });
        } else {
            // TODO: Implement UI update for other elements
            // Például: $('#nev').text(data.megyenev);
            //       vagy más HTML elemek frissítése az adatok alapján
        }
    }
});*/
