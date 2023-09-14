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
    
    const date = new Date();

    let currentDay = String(date.getDate()).padStart(2, "0");
    let currentMonth = String(date.getMonth() + 1).padStart(2, "0");
    let currentYear = date.getFullYear();

    let currentDate = `${currentYear}-${currentMonth}-${currentDay}`;

    let calendar_events = [];
    $.ajax({
      url: "calendar_query.php?matricula="+document.getElementById("matricula_selected").value, // your php file
      type: "GET", // type of the HTTP request
      success: function (data) {
        let calendar_data = jQuery.parseJSON(data);
        console.log(calendar_data)
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
      },
    }).fail(function () {
      console.log("there is no data")
    }).always(function () {
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
      });
    });

  };

  return App;
})(App || {});