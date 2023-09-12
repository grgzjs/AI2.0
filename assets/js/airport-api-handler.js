// air route calculation
const settings = {
    async: true,
    crossDomain: true,
    url: 'https://greatcirclemapper.p.rapidapi.com/airports/route/SABE-SADF/510',
    method: 'GET',
    headers: {
        'content-type': 'text/html;charset=UTF-8',
        vary: 'Accept-Encoding',
        'X-RapidAPI-Key': '7ca5fcbf98mshc6c382d596c1447p14f6d8jsnb1ee6e285853',
        'X-RapidAPI-Host': 'greatcirclemapper.p.rapidapi.com'
    }
};

$.ajax(settings).done(function (response) {
    console.log(response);
    console.log("hi2");
});

console.log("hi1");

// airport read
// const settings = {
//     async: true,
//     crossDomain: true,
//     url: 'https://greatcirclemapper.p.rapidapi.com/airports/read/KSFO',
//     method: 'GET',
//     headers: {
//         'X-RapidAPI-Key': '3217e98b95msh319d86444fb2968p1a406ejsn155727688e77',
//         'X-RapidAPI-Host': 'greatcirclemapper.p.rapidapi.com'
//     }
// };

// $.ajax(settings).done(function (response) {
//     console.log(response);
// });