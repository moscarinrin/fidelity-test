require('./bootstrap');

/* Slider */
  $(function() {
    $("#slider").slider({
      range: true,
      min: 48,
      max: 68521,
      values: [48, 68521],
      slide: function(event, ui) {
        $("#slider-value-min").text(ui.values[0]);
        $("#slider-value-max").text(ui.values[1]);
      }
    });
    $("#slider-value-min").text($("#slider").slider("values", 0));
    $("#slider-value-max").text($("#slider").slider("values", 1));
  });
