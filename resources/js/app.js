require('./bootstrap');

/* Slider */
$(function () {
    var min = $('#slider').data('min');
    var max = $('#slider').data('max');

    $("#slider").slider({
        
        range: true,
        min: min,
        max: max,
        values: [min, max],
        slide: function (event, ui) {
            $("#slider-value-min").text(ui.values[0]);
            $("#slider-value-max").text(ui.values[1]);
        }
    });
    $("#slider-value-min").text($("#slider").slider("values", 0));
    $("#slider-value-max").text($("#slider").slider("values", 1));
});

$(".filtrarPuntos").on("click", function() {
    var minPuntos = $("#slider").slider("values", 0);
    var maxPuntos = $("#slider").slider("values", 1);

    
    $(".premio").each(function() {
        var puntos = $(this).attr("attr_puntos");
        if (puntos >= minPuntos && puntos <= maxPuntos) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
});


$('#filtrarCatalogo').change(function() {
    var catalogoSelected = $(this).val();
   
    $(".premio").each(function() {
        var catalogoId = $(this).attr("attr_cata_id");
        if (catalogoId === catalogoSelected) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
  });

$('#filtrarCategoria').change(function() {
    var categoriaSelected = $(this).val();
    $(".premio").each(function() {
        let categoriaId = $(this).attr("attr_cate_id");
        if (categoriaId == categoriaSelected) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
  });


  $("#verTodo").on("click", function() {
    $(".premio").each(function() {
       
            $(this).show();
    
    });
});




