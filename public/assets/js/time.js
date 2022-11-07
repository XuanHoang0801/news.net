function date_time(){

    var h= new Date().getHours();
    var m = new Date().getMinutes();
    var s = new Date().getSeconds();

    var d = new Date().getDate();
    var t = new Date().getMonth()+1;
    var y = new Date().getFullYear();

    document.getElementById('hour').innerHTML = h;
    document.getElementById('minutes').innerHTML = m;
    document.getElementById('seconrd').innerHTML = s;
    document.getElementById('date').innerHTML = d;
    document.getElementById('month').innerHTML = t;
    document.getElementById('year').innerHTML = y;

    // document.getElementById('date').innerHTML = d;


}
var Dem_gio = setInterval(date_time, 1000);