<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <link rel="stylesheet" href="CalculadoraCSS.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Handjet:wght@200;300;400&family=Pixelify+Sans&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="sombra">CALCULADORA</h1>
        <form onsubmit="event.preventDefault();">
            <fieldset class="sombra">
                <legend>Finn El Humano CALCULATOR</legend>
                <div class="entradas">
                    <input class="pantalla" type="text" id="pantalla" readonly>
                    <button name="numero" value="1" onclick="marca(this.value)">1</button>
                    <button name="numero" value="2" onclick="marca(this.value)">2</button>
                    <button name="numero" value="3" onclick="marca(this.value)">3</button>
                    <button name="operador" type="button" onclick="realizarOperacion('/')">/</button>
                    <button name="numero" value="4" onclick="marca(this.value)">4</button>
                    <button name="numero" value="5" onclick="marca(this.value)">5</button>
                    <button name="numero" value="6" onclick="marca(this.value)">6</button>
                    <button name="operador" type="button" onclick="realizarOperacion('*')">x</button>
                    <button name="numero" value="7" onclick="marca(this.value)">7</button>
                    <button name="numero" value="8" onclick="marca(this.value)">8</button>
                    <button name="numero" value="9" onclick="marca(this.value)">9</button>
                    <button name="operador" type="button" onclick="realizarOperacion('-')">-</button>
                    <button name="numero" value="0" onclick="marca(this.value)">0</button>
                    <button class="igual" type="submit" onclick="realizarOperacion('=')">=</button>
                    <button name="operador" type="button" onclick="realizarOperacion('+')">+</button>
                    <button class="C" name="reset" type="reset" onclick="limpiarPantalla()">C</button>
                </div>
            </fieldset>
        </form>
    </div>
</body>
<script>
    let numeros = [];
    let numeros2 = [];
    let operador = '';
    let resultado = 0;

    function marca(valor) {
        if (operador === '') {
            numeros.push(valor);
        } else {
            numeros2.push(valor);
        }

        let pantalla = document.getElementById('pantalla');
        pantalla.value += valor;
    }

    function realizarOperacion(op) {
    let pantalla = document.getElementById('pantalla');
    let expresion = pantalla.value;

    if (op === '=') {
        resultado = evaluarExpresion(expresion);
        pantalla.value = resultado;
    } else {
        pantalla.value += op;
    }
}

function evaluarExpresion(expresion) {
    try {
        return eval(expresion);
    } catch (error) {
        console.log('Error en la expresión:', error);
        return 'Error';
    }
}
</script>
</html>