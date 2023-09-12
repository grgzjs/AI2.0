/*!
 * Maisonnette-admin v1.3.2
 * https://foxythemes.net
 *
 * Copyright (c) 2019 Foxy Themes
 */

var App = (function () {
  // 'use strict';
  App.pageCalendar = function( ){

    /* initialize the external events
    -----------------------------------------------------------------*/

    $('#external-events .fc-event').each(function() {

      // store data so the calendar knows to render an event upon drop
      $(this).data('event', {
        title: $.trim($(this).text()), // use the element's text as the event title
        stick: true // maintain when user navigates (see docs on the renderEvent method)
      });

      // make the event draggable using jQuery UI
      $(this).draggable({
        zIndex: 999,
        revert: true,      // will cause the event to go back to its
        revertDuration: 0  //  original position after the drag
      });

    });


    /* initialize the calendar
    -----------------------------------------------------------------*/

    let event_colors = [
      '#3B8EA5',
      '#837569',
      '#443850',
      '#DC493A',
      '#4392F1',
      '#58355E',
      '#D38B5D',
      '#273B09',
      '#E8871E',
      '#81726A',
      '#2D728F',
      '#95A472',
      '#918EF4',
      '#368F8B',
      '#A33B20',
      '#FC7A1E',
      '#F24C00',
      '#5F1A37',
      '#776885',
      '#603140',
      '#957964',
      '#2E294E',
      '#1B998B'
    ];
    let amount_of_colors = event_colors.length;
    
    let calendar_data = undefined;
    $.ajax({
      url: "calendar_query.php", // your php file
      type: "GET", // type of the HTTP request
      success: function (data) {
        calendar_data = jQuery.parseJSON(data);
        console.log(calendar_data)
        calendar_events = []
        let i = -1;
        let prev_quote = -1;
        calendar_data.forEach(element => {
          if (prev_quote != element[2]) {
            i++;
          }
          console.log(prev_quote + " " + element[2])
          
          if (i > amount_of_colors) {
            i = 0;
          }

          calendar_events.push({
            title: element[0],
            start: element[1],
            color: event_colors[i]
          })

          prev_quote = element[2]
        });
        console.log("un console log")
        console.log(calendar_events);

        const date = new Date();

        let currentDay = String(date.getDate()).padStart(2, "0");
        let currentMonth = String(date.getMonth() + 1).padStart(2, "0");
        let currentYear = date.getFullYear();

        let currentDate = `${currentYear}-${currentMonth}-${currentDay}`;

        $('#calendar').fullCalendar({
          header: {
            left: 'title',
            center: '',
            right: 'month,agendaWeek,agendaDay, today, prev,next',
          },
          defaultDate: currentDate,
          editable: false,
          eventLimit: true,
          droppable: false,
          displayEventTime : false,
          events: calendar_events
          // events: [
          //   {
          //     title: 'All Day Event',
          //     start: '2017-02-01'
          //   },
          //   {
          //     title: 'Long Event',
          //     start: '2017-02-07',
          //     end: '2017-02-10'
          //   },
          //   {
          //     id: 999,
          //     title: 'Repeating Event',
          //     start: '2017-02-09T16:00:00'
          //   },
          //   {
          //     id: 999,
          //     title: 'Repeating Event',
          //     start: '2017-02-16T16:00:00'
          //   },
          //   {
          //     title: 'Conference',
          //     start: '2017-02-11',
          //     end: '2017-02-13'
          //   },
          //   {
          //     title: 'Meeting',
          //     start: '2017-02-12T10:30:00',
          //     end: '2017-02-12T12:30:00'
          //   },
          //   {
          //     title: 'Lunch',
          //     start: '2017-02-12T12:00:00'
          //   },
          //   {
          //     title: 'Meeting',
          //     start: '2017-02-12T14:30:00'
          //   },
          //   {
          //     title: 'Happy Hour',
          //     start: '2017-02-12T17:30:00'
          //   },
          //   {
          //     title: 'Dinner',
          //     start: '2017-02-12T20:00:00'
          //   },
          //   {
          //     title: 'Birthday Party',
          //     start: '2017-02-13T07:00:00'
          //   },
          //   {
          //     title: 'Click for Google',
          //     url: 'http://google.com/',
          //     start: '2017-02-28'
          //   }
          // ]
        });
      },
    });

  };

  return App;
})(App || {});