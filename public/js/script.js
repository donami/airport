$(document).ready(function() {
  $('.ui.dropdown').dropdown();

  var scrollTo = function(elem) {
    $('html, body').animate({
        scrollTop: $(elem).offset().top
    }, 500);
  };

  var addMessage = function(type, title, message) {
    $('#message').html('');

    $('#message')
      .addClass('ui ' + type + ' message')
      .append('<div class="header">' + title + '</div>')
      .append('<p>' + message + '</p>');
  };

  $('#formBooking').on('submit', function(event) {
    var aircraft = $('#data').data('aircraft');
    var prices = $('#data').data('prices');
    var bookedSeats = $('#data').data('booked-seats');
    var selectedSeatType = $('#selectedSeatType').val();
    var maxSeats = 0;
    var price = 0;
    var availableSeats = 0;
    var error;

    $(this).find(':input[type=text]').each(function() {
      var input = $(this);
      if (!input.val().length) {
        error = 'You can not leave any of the mandatory fields empty';
      }
    });

    if (error) {
      addMessage('negative', 'Error', error);

      scrollTo('#header');

      return false;
    }

    switch (selectedSeatType) {
      case '1':
        maxSeats = aircraft.CoachSeats;
        price = prices.Coach;
        availableSeats = maxSeats - bookedSeats[1];
        break;
      case '2':
        maxSeats = aircraft.BusinessSeats;
        price = prices.Business;
        availableSeats = maxSeats - bookedSeats[2];
        break;
      case '3':
        maxSeats = aircraft.FirstClassSeats;
        price = prices.FirstClass;
        availableSeats = maxSeats - bookedSeats[3];
        break;

      default:

    }

    // Make sure that there are available seats of the seat type
    if (availableSeats <= 0) {
      // Should not be allowed to book
      addMessage('negative', 'We are sorry', 'There is no available seats of the seat type you chose');
      scrollTo('#header');

      return false;
    }

    $(this).submit();
    return false;
  });

  $('#selectedSeatType').on('change', function() {
    var selectedValue = $('#selectedSeatType').val();
    var prices = $('#data').data('prices');
    var price = 0;

    $('#price-1').removeClass('blue inverted');
    $('#price-2').removeClass('blue inverted');
    $('#price-3').removeClass('blue inverted');


    switch (selectedValue) {
      case '1':
          $('#price-1').addClass('blue inverted');
          price = prices.Coach;
        break;
      case '2':
          $('#price-2').addClass('blue inverted');
          price = prices.Business;
        break;

      case '3':
          $('#price-3').addClass('blue inverted');
          price = prices.FirstClass;
        break;
      default:
        price = 0;
    }

    if (price > 0) {
      // Enable submit button
      $('#formSubmitButton').prop('disabled', false);

      $('#total-price').html('<h3>Total</h3>Ticket price: ' + price + ' SEK');
      $('#total-price').show();
    }
  });

});
