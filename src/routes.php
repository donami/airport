<?php
// Routes

// Home route

$app->get('/', 'HomeController:index')->setName('home');

// Route for listing flights
$app->get('/travel/all', 'FlightController:index')->setName('travelAll');

// Route for single flight
$app->get('/travel/{id}', 'FlightController:single')->setName('travel');

// Route for displaying the booking form
$app->get('/travel/{id}/book', 'FlightController:book')->setName('travelBook');

// Post route for submitting booking
$app->post('/travel/{id}/book', 'FlightController:submitBooking')->setName('submitBooking');
