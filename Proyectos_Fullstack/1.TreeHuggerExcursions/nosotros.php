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
    <link rel="stylesheet" href="./css/styles.css">
    <title>Conoce nosotros</title>
</head>

<body>
    <header>
        <?php
        include "header.php"
        ?>
    </header>
    <main>
        <div id="servicios">
            <h3>¿Por qué elegir nuestros servicios extras?</h3>
            <p>Agregar estos servicios a tu excursión no solo mejora tu experiencia, sino que también te proporciona
                un nivel adicional de personalización y confort. El <strong>Picnic Natural</strong> te permite
                disfrutar de una comida nutritiva en un entorno incomparable. El <strong>Kit de Bienestar
                    Natural</strong> extiende los beneficios de tu experiencia más allá del bosque. El
                <strong>Transporte Ecológico</strong> asegura que tu viaje sea conveniente y respetuoso con el medio
                ambiente. Y la <strong>Sesión de Fotos Profesional</strong> te da la oportunidad de preservar y
                compartir tus recuerdos.
                Cada uno de estos servicios está diseñado para complementar la práctica de abrazar árboles,
                proporcionando una experiencia holística que nutre tu cuerpo, mente y espíritu. En TreeHugger
                Excursions, nos esforzamos por ofrecerte no solo una escapada, sino una transformación completa,
                conectándote profundamente con la naturaleza y contigo mismo.
            </p>
        </div>
        <h3>¿Por qué TreeHugger Excursions?</h3>
        <div class="caja_nosotros" id="nosotros">

            <div>
                <img class="img_nosotros" src="./img/conexion.jpg" alt="Arbol">
                <p><strong>Conexión Profunda con la Naturaleza:</strong><br>
                    Abrazar árboles es una práctica que ayuda
                    a reducir el estrés, mejorar el estado de ánimo y aumentar la sensación de bienestar general.
                </p>
            </div>
            <div>
                <img class="img_nosotros" src="./img/arbol_children.jpg" alt="Arbol">
                <p><strong>Actividades para Todos:</strong></p>
                <p>sea que vengas solo o en grupo, nuestras excursiones
                    están diseñadas para todas las edades y niveles de experiencia.</p>
            </div>
            <div>
                <img class="img_nosotros" src="./img/autobus_eco.jpg" alt="Arbol">
                <p><strong>Enfoque Ecológico:</strong></p>
                <p>Nos comprometemos a proteger el medio ambiente y todas
                    nuestras actividades y servicios se realizan de manera sostenible.</p>
            </div>
            <div>
                <img class="img_nosotros" src="./img/arbol 1.jpg" alt="Arbol">
                <p><strong>Servicios Personalizados:</strong></p>
                <p>Ofrecemos una variedad de servicios adicionales para
                    personalizar tu experiencia y hacerla aún más especial.</p>
            </div>
        </div>
        <a href="./index.php">
            <button class="style_button">Volver</button></a>
    </main>

    <?php
    include "footer.php";
    ?>

</body>

</html>