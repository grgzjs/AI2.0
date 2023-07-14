/*!
 * Maisonnette-admin v1.3.2
 * https://foxythemes.net
 *
 * Copyright (c) 2019 Foxy Themes
 */

var App = (function () {
  // 'use strict';
  App.pageCalendar = function(){

    /* initialize the external events
    -----------------------------------------------------------------*/

    // $('#external-events .fc-event').each(function() {

    //   // store data so the calendar knows to render an event upon drop
    //   $(this).data('event', {
    //     title: $.trim($(this).text()), // use the element's text as the event title
    //     stick: true // maintain when user navigates (see docs on the renderEvent method)
    //   });

    //   // make the event draggable using jQuery UI
    //   $(this).draggable({
    //     zIndex: 999,
    //     revert: true,      // will cause the event to go back to its
    //     revertDuration: 0  //  original position after the drag
    //   });

    // });


    /* initialize the calendar
    -----------------------------------------------------------------*/

    // let mysql = require('mysql');
    // let con = mysql.createConnection({
    //   host: "208.109.21.16",
    //   user: "w3ezyugzcrtk",
    //   password: "Charter1221!",
    //   database: "YouAirCharter"
    // });
    // con.connect(function(err) {
    //   if (err) throw err;
    //   con.query("SELECT fecha, origen, destino FROM invoice_detail", function (err, result, fields) {
    //     if (err) throw err;
    //     console.log(result);
    //   });
    // });

    const date = new Date();

    let currentDay= String(date.getDate()).padStart(2, '0');
    let currentMonth = String(date.getMonth()+1).padStart(2,"0");
    let currentYear = date.getFullYear();

    let currentDate = `${currentYear}-${currentMonth}-${currentDay}`;

    // console.log("The current date is " + currentDate); 

    $('#calendar').fullCalendar({
      header: {
        left: 'title',
        center: '',
        right: 'month,agendaWeek,agendaDay, today, prev,next',
      },
      defaultDate: currentDate,
      editable: true,
      eventLimit: true,
      droppable: true, // this allows things to be dropped onto the calendar
      drop: function() {
        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove();
        }
      },
      events: [
        {
          title: 'All Day Event',
          start: '2017-02-01'
        },
        {
          title: 'Long Event',
          start: '2017-02-07',
          end: '2017-02-10'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2017-02-09T16:00:00'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2017-02-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2017-02-11',
          end: '2017-02-13'
        },
        {
          title: 'Meeting',
          start: '2017-02-12T10:30:00',
          end: '2017-02-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2017-02-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2017-02-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2017-02-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2017-02-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2017-02-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2017-02-28'
        }
      ]
    });

  };

  return App;
})(App || {});