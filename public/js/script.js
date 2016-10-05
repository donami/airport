$(document).ready(function() {
  $('.ui.dropdown').dropdown();

  $('#selectedSeatType').on('change', function() {
    var selectedValue = $('#selectedSeatType').val();
    var price = 0;

    $('#price-1').removeClass('blue inverted');
    $('#price-1').removeClass('blue inverted');
    $('#price-1').removeClass('blue inverted');

    switch (selectedValue) {
      case '1':
          $('#price-1').addClass('blue inverted');
          price = $('#standardPriceCoach').val();
        break;
      case '2':
          $('#price-2').addClass('blue inverted');
          price = $('#standardPriceBusiness').val();
        break;

      case '3':
          $('#price-3').addClass('blue inverted');
          price = $('#standardPriceFirstClass').val();
        break;
      default:
        price = 0;
    }

    if (price > 0) {
      $('#total-price').html('<h3>Total</h3>Ticket price: ' + price + ' SEK');
      $('#total-price').show();
    }
  });

});
