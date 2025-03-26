<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&family=Hind+Madurai&family=Libre+Baskerville&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/styles.css">
    <title>TreeHugger Excursions</title>
</head>

<body>
    <header>
        <?php
        include "header.php"
        ?>
    </header>
    <main>
        <section>
            <div>
                <h2>Bienvenidos a TreeHugger Excursions:<br>Conectando con la Naturaleza de una Forma Única</h2>
                <div>
                    <h3>¿Qué es TreeHugger Excursions?</h3>
                    <p>TreeHugger Excursions es una experiencia única y revitalizante que te invita a desconectar del
                        ajetreo diario y reconectar con la naturaleza a través de la práctica de abrazar árboles,
                        también
                        conocida como arboterapia o silvoterapia. Ya sea que estés buscando una escapada individual para
                        recargar energías o una divertida y armoniosa actividad grupal, nuestras excursiones están
                        diseñadas
                        para ofrecerte una inmersión profunda en la paz y la serenidad de la naturaleza.</p>
                </div>
                <div class="arboles">
                    <img src="./img/arbol 1.jpg" alt="Arbol">

                    <img src="./img/arbol 2.jpg" alt="Arbol">

                    <img src="./img/arbol 3.jpg" alt="Arbol">
                </div>
        </section>
        <section id="queOfrecemos">
            <h3>¿Qué ofrecemos?</h3>
            <div class="box_index">
                <p><strong>Sesiones Individuales:</strong><br>Nuestras sesiones individuales son perfectas para
                    aquellos que buscan un momento de introspección y conexión personal con la naturaleza. Durante
                    estas sesiones, te llevamos a bosques tranquilos y te guiamos a través de técnicas de
                    respiración y meditación, mientras abrazas árboles y sientes la energía de la naturaleza
                    fluyendo a través de ti.</p>

                <a href="./comprar.php">
                    <button class="style_button">Comprar ahora</button></a>

            </div>
            <div class="box_index">
                <p><strong>Sesiones grupales (mínimo 3 personas):</strong><br> Nuestras sesiones grupales son ideales para
                    familias, amigos, o equipos de trabajo que desean fortalecer sus lazos mientras disfrutan de una
                    experiencia única y revitalizante. Ofrecemos un entorno de apoyo donde los participantes pueden
                    relajarse, comunicarse y abrazar árboles juntos.</p>

                <a href="./comprar.php">
                    <button class="style_button">Comprar ahora</button></a>
            </div>
        </section>
        <?php
        include "footer.php";
        ?>
</body>

</html>