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
    <title>Configura Grupal</title>
</head>

<body>
    <header>
        <?php
        include "header.php"
        ?>
    </header>
    <main>
        <div>
            <h2>configura tu compra grupal:</h2>
            <form action="formularioGrupo.php" method="post">
                <div class="configura_compra">
                    <div>
                        <label for="personas">Tamaño del Grupo:</label>
                        <input type="number" id="personas" name="personas" min="3" required>
                    </div>
                    <div>
                        <label for="periodo">Duración de la Sesión (en horas):</label>
                        <input type="number" id="periodo" name="periodo" min="1" placeholder="mínimo: 1h" required>
                    </div>
                </div>
                <div>
                    <label>
                        <h3>Añadir servicios extras:</h3>
                        <p>Para enriquecer aún más tu experiencia en TreeHugger Excursions, ofrecemos una variedad de servicios
                            adicionales diseñados para mejorar tu conexión con la naturaleza y hacer que tu aventura sea
                            inolvidable. Cada uno de estos servicios ha sido cuidadosamente pensado para añadir un toque
                            especial a tu experiencia de abrazar árboles:
                        </p>
                    </label>
                    <input type="checkbox" name="picnic" id="picnic" value="picnic">
                    <label for="picnic">
                        <div class="box_calcular">
                            <h3><b>1. Picnic Natural (15€ por persona):</b></h3>
                            <p><b>Un festín en la naturaleza!</b> Imagina terminar tu sesión de arboterapia con un delicioso picnic en medio del bosque. Nuestro <strong>Picnic Natural</strong> incluye una selección de productos locales y orgánicos,
                                cuidadosamente preparados para ofrecerte una comida saludable y sabrosa. Desde frutas frescas y
                                jugosas hasta quesos artesanales y panes recién horneados, cada bocado te conectará aún más con la
                                tierra. Es la manera perfecta de recargar energías y prolongar la serenidad que has encontrado entre
                                los árboles.</p>
                        </div>
                    </label>
                    <input type="checkbox" name="kitNatural" id="kitNatural" value="kitNatural">
                    <label for="kitNatural">
                        <div class="box_calcular">
                            <h3><b>2. Kit de bienestar natural (40€ por persona):</b></h3>
                            <p><b>LLeva la paz contigo!</b> Nuestro <strong>Kit de bienestar natural</strong> es una forma maravillosa de continuar sintiendo los
                                beneficios de tu experiencia con TreeHugger Excursions en casa. Este kit especial incluye aceites
                                esenciales que capturan la esencia del bosque, infusiones de hierbas seleccionadas por sus
                                propiedades relajantes, y productos de cuidado personal naturales que nutren tu piel y tu espíritu.
                                Es el regalo perfecto para ti mismo o para alguien especial, y una manera de recordar siempre la paz
                                y el bienestar que encontraste en la naturaleza.</p>
                        </div>
                    </label>
                    <input type="checkbox" name="transporte" id="transporte" value="transporte">
                    <label for="transporte">
                        <div class="box_calcular">
                            <h3><b>3. Transporte ecológico ida y vuelta: (20€ por persona):</b></h3>
                            <p><b>Comodidad y compromiso ambiental!</b> Al bosque y volver a casa de manera respetuosa con el medio ambiente es fácil con nuestro
                                <strong>Transporte Ecológico</strong>. Te recogemos y te llevamos de vuelta en vehículos ecológicos, reduciendo tu huella de carbono y asegurando que tu experiencia sea completamente verde desde el principio hasta el final. Este servicio no solo añade comodidad, sino que también refleja nuestro compromiso con la sostenibilidad y el cuidado del planeta.
                            </p>
                        </div>
                    </label>
                    <input type="checkbox" name="foto" id="foto" value="foto">
                    <label for="foto">
                        <div class="box_calcular">
                            <h3><b>4. Sesión de fotos profesional: (150€ por sesión):</b></h3>
                            <p><b>Captura momentos inolvidables!</b> La serenidad del bosque, la conexión profunda con la naturaleza y los momentos de alegría compartida
                                son recuerdos que querrás atesorar para siempre. Con nuestra Sesión de <strong>Fotos Profesional</strong>, un fotógrafo experimentado capturará esos momentos especiales mientras abrazas árboles y disfrutas del entorno natural. Estas fotos no solo serán un testimonio visual de
                                tu experiencia, sino también una hermosa forma de compartirla con amigos y familiares.
                            </p>
                        </div>
                    </label>
                    <div>
                        <button class="style_button" type="submit">Calcular Precio</button>
                    </div>
                </div>
            </form>
        </div>

        <a href="./comprar.php">
            <button class="style_button">Volver</button></a>
    </main>

    <?php
    include "footer.php";
    ?>

</body>

</html>