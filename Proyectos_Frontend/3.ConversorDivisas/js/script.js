var euro = 1;
var dolar = euro * 1.07;
var peseta = euro * 166;


function covertir() {

    var importe = document.getElementById("importe").value;
    var origen = document.getElementById("origen").value;
    var destino = document.getElementById("destino").value;

    if ((origen == "euro") && (destino == "dolar")) {
        resultadoConversion = importe * 1.07;
        document.getElementById("resultadoConversion").innerHTML = "Importe total: " + resultadoConversion.toFixed(2);
    } else if ((origen == "euro") && (destino == "peseta")) {
        resultadoConversion = importe * 166, 38;
        document.getElementById("resultadoConversion").innerHTML = "Importe total: " + resultadoConversion.toFixed(2);
    } else if ((origen == "dolar") && (destino == "peseta")) {
        resultadoConversion = importe * 155;
        document.getElementById("resultadoConversion").innerHTML = "Importe total: " + resultadoConversion.toFixed(2);
    } else if ((origen == "dolar") && (destino == "euro")) {
        resultadoConversion = importe * 0.93;
        document.getElementById("resultadoConversion").innerHTML = "Importe total: " + resultadoConversion.toFixed(2);
    } else if ((origen == "peseta") && (destino == "dolar")) {
        resultadoConversion = importe * 0.0064;
        document.getElementById("resultadoConversion").innerHTML = "Importe total: " + resultadoConversion.toFixed(2);
    } else if ((origen == "peseta") && (destino == "euro")) {
        resultadoConversion = importe * 0.006;
        document.getElementById("resultadoConversion").innerHTML = "Importe total: " + resultadoConversion.toFixed(2);
    } else { document.getElementById("resultadoConversion").innerHTML = "Elija divisas distintas!" }
}