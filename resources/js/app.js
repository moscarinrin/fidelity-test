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



/* Funciones para botones */

$(function () {
    $(".verTodo").click(function () {
        $.ajax({
            url: 'mi_url.php',
            type: 'POST',
            data: {
                parametro1: 'valor1',
                parametro2: 'valor2'
            },
            success: function (respuesta) {
                console.log(respuesta);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });
});
