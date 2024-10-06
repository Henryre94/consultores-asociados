<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Report File</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-size: 12px;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .border-dashed-right {
            border-right: 4px dashed green;
        }

        .poblacion-etnica {
            color: black;
            font-size: 1.0rem;
        }

        .poblacion-etnica-valor {
            color: #4B5563;
            font-weight: bold;
            font-size: 1.0rem;
        }

        .poblacion-etnica-valor-tipo-vivienda {
            color: #4B5563;
            font-weight: bold;
            font-size: 1.5rem;
        }


        .graphic-container {
            width: 100%;

        }

        .bar-container {
            width: 100%;
            height: 30px;
            background-color: #e0e0e0;
            border-radius: 5px;
            overflow: hidden;
            position: relative;
        }

        .bar-container-second {
            width: 100%;
            height: 20px;
            background-color: white;
            border-radius: 5px;
            overflow: hidden;
            position: relative;
        }

        .bar-container-third {
            width: 100%;
            height: 15px;
            background-color: white;
            border-radius: 5px;
            overflow: hidden;
            position: relative;
        }

        .bar-fill {
            width: {{ $omisionCabeceraPercentage }}%;
            height: 100%;
            background-color: green;
        }

        td {
            padding: 0;
            /* Para eliminar espacio extra en las celdas */
        }

        .woman-fill-one {
            width: 95%;
            height: 100%;
            background-color: lightgreen;
        }

        .man-fill-one {
            width: 80%;
            height: 100%;
            background-color: green;
        }

        .woman-fill-two {
            width: 95%;
            height: 100%;
            background-color: lightgreen;
        }

        .man-fill-two {
            width: 80%;
            height: 100%;
            background-color: green;
        }

        .woman-fill-three {
            width: 95%;
            height: 100%;
            background-color: lightgreen;
        }

        .discapacidad-mental-fisica {
            width: 75%;
            height: 100%;
            background-color: green;
        }

        .discapacidad-mental {
            width: 80%;
            height: 100%;
            background-color: green;
        }

        .discapacidad-organica {
            width: 20%;
            height: 100%;
            background-color: green;
        }

        .discapacidad-sensorial {
            width: 45%;
            height: 100%;
            background-color: green;
        }

        .discapacidad-pluri {
            width: 67%;
            height: 100%;
            background-color: green;
        }

        .discapacidad-motora {
            width: 99%;
            height: 100%;
            background-color: green;
        }

        .discapacidad-nula {
            width: 10%;
            height: 100%;
            background-color: green;
        }
    </style>

</head>

<body class="container">
    <div>
        <div>
            <div>
                <table style="width: 100%; margin-bottom: 1rem;">
                    <tr>
                        <td style="text-align: center;">
                            @if (file_exists(public_path('storage/images/consultores_icon.jpg')))
                                <img src="storage/images/consultores_icon.jpg" alt="Consultores Asociados S.A.S. Logo"
                                    style="width: auto; height: 12rem;">
                            @else
                                <div></div>
                            @endif
                        </td>
                        <td style="text-align: center;">
                            @if (file_exists(public_path('storage/images/alcaldia_icon.jpg')))
                                <img src="storage/images/alcaldia_icon.jpg" alt="Mapa de la alcaldia"
                                    style="width: auto; height: 12rem;">
                            @else
                                <div></div>
                            @endif
                        </td>
                        <td style="text-align: center;">
                            @if (file_exists(public_path('storage/images/departamento_map.jpg')))
                                <img src="storage/images/departamento_map.jpg" alt="Mapa de la alcaldia"
                                    style="width: auto; height: 12rem;">
                            @else
                                <div></div>
                            @endif
                        </td>
                    </tr>
                </table>

                <div
                    style="text-align: center; font-size: 1.0rem; font-weight: bold; border-bottom: 1px solid black; padding: 0.5rem;">
                    Caracterización de Población Vulnerable
                    El Paso Departamento del Cesar 2024
                </div>

                <div style="font-size: 1.0rem; font-weight: bold; margin-bottom: 0.25rem;">
                    El Paso/Cesar
                </div>
            </div>
            <div>
                <table style="width: 100%; margin-top: 1rem; height: 200px;">
                    <tr>
                        <td style="padding: 0.5rem; width: 50%; ">
                            <div
                                style="text-align: center; font-size: 1.0rem; font-weight: bold; margin-bottom: 0.5rem;">
                                ¿Cuántos somos?
                            </div>
                            <table style="width: 100%; height: margin-top: 1rem; margin-bottom: 1rem;">
                                <tr>
                                    <td style="font-size: 1.0rem; font-weight: bold;">Población total censada:</td>
                                </tr>
                                <tr>
                                    <td style="border: 2px solid #4A5568; padding: 0.5rem; text-align: center;">
                                        <p style="font-size: 1.0rem; font-weight: bold; color: #4A5568;">
                                            {{ $count }}</p>
                                    </td>
                                </tr>
                            </table>

                            <table style="width: 100%; margin-bottom: 1rem;">
                                <tr>
                                    <td style="font-size: 1.0rem; font-weight: bold;">Población total ajustada por
                                        omisión:</td>
                                </tr>
                                <tr>
                                    <td style="border: 2px solid #4A5568; padding: 0.5rem; text-align: center;">
                                        <p style="font-size: 1.0rem; font-weight: bold; color: #4A5568;">
                                            {{ $omision }}</p>
                                    </td>
                                </tr>
                            </table>

                            <table style="width: 100%; margin-bottom: 1rem;">
                                <tr>
                                    <td style="width: 50%; text-align: center;">
                                        <table>
                                            <tr>
                                                <td rowspan="2" style="padding-right: 0.5rem;">
                                                    <img src="storage/images/woman.png" alt="Logo Mujer"
                                                        style="width: 3rem; height: 3rem; object-fit: cover; margin-bottom: 0.5rem;">
                                                </td>
                                                <td style="font-size: 1.0rem; color: #4A5568;">{{ $womenCount }}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 1.0rem;">Son mujeres</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="width: 50%; text-align: center;">
                                        <table>
                                            <tr>
                                                <td rowspan="2" style="padding-right: 0.5rem;">
                                                    <img src="storage/images/man.png" alt="Logo Hombre"
                                                        style="width: 3rem; height: 3rem; object-fit: cover; margin-bottom: 0.5rem;">
                                                </td>
                                                <td style="font-size: 1.0rem; color: #4A5568;">{{ $menCount }}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 1.0rem;">Son hombres</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>

                        <td style="padding: 0.5rem; width: 50%;">
                            <div
                                style="text-align: center; font-size: 1.0rem; font-weight: bold; margin-bottom: 0.5rem;">
                                Omisión total: 7,8%
                            </div>
                            <div
                                style="border: 2px dashed #A0AEC0; background-color: #EDF2F7; padding: 1rem; height: 20rem; text-align: center;">

                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <div>
                <table style="width: 100%; border-spacing: 1rem;">
                    <tr>
                        <td style="padding: 1rem; text-align: center; width: 50%;">
                            <div
                                style="border: 2px dashed #A0AEC0; background-color: #EDF2F7; padding: 1rem; height: 20rem;">
                                Adicionar gráfica
                            </div>
                            <div>Caracterización de Población Vulnerable 2024</div>
                        </td>
                        <td style="padding: 0.5rem; text-align: center; width: 50%;">
                            <div
                                style="border: 2px dashed #A0AEC0; background-color: #EDF2F7; padding: 1rem; height: 20rem;">
                                Adicionar gráfica
                            </div>
                            <div>Población Ajustada por Omisión 2024</div>
                        </td>
                    </tr>
                </table>
            </div>

            <div>
                <table style="width: 100%; height: 100%">
                    <tr>
                        <td style="padding: 0.5rem;">
                            <div style="font-size: 1.0rem; font-weight: bold;">
                                La población étnica en El Paso se autoreconoció como:
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 1rem;">
                            <table style="width: 100%; border-spacing: 1rem;">
                                <tr>
                                    <td style="text-align: center;">
                                        <p class="poblacion-etnica">Indígenas</p>
                                        <p class="poblacion-etnica-valor">{{ $percentageIndigena }}%</p>
                                    </td>
                                    <td style="text-align: center;">
                                        <p class="poblacion-etnica">ROM (Gitanos)</p>
                                        <p class="poblacion-etnica-valor">{{ $percentageGitanos }}%</p>
                                    </td>
                                    <td style="text-align: center; border-bottom: 2px solid #CBD5E0;">
                                        <p class="poblacion-etnica">Raizales</p>
                                        <p class="poblacion-etnica-valor">{{ $percentageRaizales }}%</p>
                                    </td>
                                    <td style="text-align: center; border-bottom: 2px solid #CBD5E0;">
                                        <p class="poblacion-etnica">Palenqueros</p>
                                        <p class="poblacion-etnica-valor">{{ $percentagePalenqueros }}%</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">
                                        <p class="poblacion-etnica">Afrocolombianos</p>
                                        <p class="poblacion-etnica-valor">{{ $percentageAfroColombiano }}%</p>
                                    </td>
                                    <td style="text-align: center;">
                                        <p class="poblacion-etnica">Ningún grupo étnico</p>
                                        <p class="poblacion-etnica-valor">{{ $percentageResto }}%</p>
                                    </td>
                                    <td colspan="2" style="text-align: left; padding-left: 1rem;">
                                        <p>1 del archipiélago de San Andrés y 1.193 Providencia</p>
                                        <p>2 de San Basilio</p>
                                        <p>3 negro(a), mulato(a), afrocolombiano(a) o afrodescendiente</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 1rem;">
                            Nota: el porcentaje de población (denominador) no incluye a las personas que no respondieron
                            esta pregunta, es decir, no incluye “sin información”. De un total de 34.620 personas
                            efectivamente censadas, 153 (0,4%) no respondieron esta pregunta de autorreconocimiento
                            (pertenencia étnica).
                        </td>
                    </tr>
                </table>
            </div>


            <div style="border-bottom: 2px solid #A0AEC0;">
                <table style="width: 100%; border-spacing: 1rem;">
                    <tr>
                        <td style="padding: 1rem; text-align: center">
                            <div
                                style="border: 2px dashed #A0AEC0; background-color: #EDF2F7; padding: 1rem; height: 20rem;">
                                Adicionar gráfica
                            </div>
                        </td>
                        <td style="padding: 1rem; text-align: center;">
                            <div class="graphic-container">

                                <table style="width: 100%; margin-top: 2rem; margin-bottom: 2rem;">
                                    <tr style="margin-bottom: 1rem">
                                        <td style="width: 20%">Discapacidad Mental - Discapacidad...</td>
                                        <td style="border-left: 2px solid gray; padding-left: 1rem">
                                            <div class="bar-container-third">
                                                <div class="discapacidad-mental-fisica"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>

                                <table style="width: 100%; margin-top: 2rem; margin-bottom: 2rem;">
                                    <tr style="margin-bottom: 1rem">
                                        <td style="width: 20%">Discapacidad Nula</td>
                                        <td style="border-left: 2px solid gray; padding-left: 1rem">
                                            <div class="bar-container-third">
                                                <div class="discapacidad-mental"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>

                                <table style="width: 100%; margin-top: 2rem; margin-bottom: 2rem;">
                                    <tr style="margin-bottom: 1rem">
                                        <td style="width: 20%">Discapacidad Orgánica</td>
                                        <td style="border-left: 2px solid gray; padding-left: 1rem">
                                            <div class="bar-container-third">
                                                <div class="discapacidad-organica"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>

                                <table style="width: 100%; margin-top: 2rem; margin-bottom: 2rem;">
                                    <tr style="margin-bottom: 1rem">
                                        <td style="width: 20%">Discapacidad Sensorial</td>
                                        <td style="border-left: 2px solid gray; padding-left: 1rem">
                                            <div class="bar-container-third">
                                                <div class="discapacidad-sensorial"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>

                                <table style="width: 100%; margin-top: 2rem; margin-bottom: 2rem;">
                                    <tr style="margin-bottom: 1rem">
                                        <td style="width: 20%">Pluridiscapacidad</td>
                                        <td style="border-left: 2px solid gray; padding-left: 1rem">
                                            <div class="bar-container-third">
                                                <div class="discapacidad-pluri"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>

                                <table style="width: 100%; margin-top: 2rem; margin-bottom: 2rem;">
                                    <tr style="margin-bottom: 1rem">
                                        <td style="width: 20%">Discapacidad Motora - Discapacidad..</td>
                                        <td style="border-left: 2px solid gray; padding-left: 1rem">
                                            <div class="bar-container-third">
                                                <div class="discapacidad-motora"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>

                                <table style="width: 100%; margin-top: 2rem; margin-bottom: 2rem;">
                                    <tr style="margin-bottom: 1rem">
                                        <td style="width: 20%">Discapacidad Nula</td>
                                        <td style="border-left: 2px solid gray; padding-left: 1rem">
                                            <div class="bar-container-third">
                                                <div class="discapacidad-nula"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>

                                <table style="width: 100%; margin-top: 2rem; margin-bottom: 2rem;">
                                    <tr>
                                        <td style="width: 20%">

                                        </td>
                                        <td style="width: 5%">
                                            0
                                        </td>
                                        <td>
                                            2000
                                        </td>
                                        <td>
                                            4000
                                        </td>
                                        <td>
                                            6000
                                        </td>
                                        <td>
                                            8000
                                        </td>
                                        <td>
                                            10000
                                        </td>
                                        <td>
                                            120000
                                        </td>
                                        <td>
                                            14000
                                        </td>
                                    </tr>
                                </table>

                                <table style="width: 100%; margin-top: 2rem; margin-bottom: 2rem;">
                                    <tr>
                                        <td>
                                            Cabecera Municipal
                                        </td>
                                        <td>
                                            La Loma
                                        </td>
                                        <td>
                                            Potrenillo
                                        </td>
                                        <td>
                                            Cuatro Vientos
                                        </td>
                                        <td>
                                            El Valito
                                        </td>
                                        <td>
                                            El carmen
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <div>
                <table style="width: 100%">
                    <tr>
                        <td style="font-size: 1.0rem; font-weight: bold; width: 70%;">
                            Alfabetismo: leer y escribir
                        </td>
                        <td style="text-align: center;">
                            <table style="width: 100%; border-spacing: 1rem;">
                                <tr>
                                    <td style="text-align: center;">
                                        <img src="storage/images/man.png" alt="Logo Hombre"
                                            style="width: 2rem; height: 2rem;">
                                    </td>
                                    <td style="text-align: center;">
                                        <img src="storage/images/woman.png" alt="Logo Mujer"
                                            style="width: 2rem; height: 2rem;">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center; padding-top: 1rem;">
                            <div
                                style="border: 2px dashed #A0AEC0; background-color: #EDF2F7; padding: 1rem; height: 20rem;">
                                Adicionar gráfica
                            </div>
                        </td>
                    </tr>
                </table>

                <table style="width: 100%; margin-top: 1rem;">
                    <tr>
                        <td style="font-size: 1.0rem; font-weight: bold; width: 70%;">
                            Asistencia escolar
                        </td>
                        <td style="text-align: center;">
                            <table style="width: 100%; border-spacing: 1rem;">
                                <tr>
                                    <td style="text-align: center;">
                                        <img src="storage/images/man.png" alt="Logo Hombre"
                                            style="width: 2rem; height: 2rem;">
                                    </td>
                                    <td style="text-align: center;">
                                        <img src="storage/images/woman.png" alt="Logo Mujer"
                                            style="width: 2rem; height: 2rem;">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        </td>
                        <div class="graphic-container">
                            <table style="width: 100%; margin-top: 2rem; margin-bottom: 2rem;">
                                <tr>
                                    <td style="width: 10%">

                                    </td>
                                    <td style="border-left: 2px solid gray; padding-left: 1rem">
                                        <div class="bar-container-second">
                                            <div class="man-fill-one"></div>
                                        </div>
                                    </td>
                                    <td style="width: 5%">
                                        5000
                                    </td>
                                </tr>

                                <tr>
                                    <td style="width: 5%">

                                    </td>
                                    <td style="border-left: 2px solid gray; padding-left: 1rem">
                                        19%
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 5%">
                                        65 y + años
                                    </td>
                                    <td style="border-left: 2px solid gray; padding-left: 1rem;">

                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 5%">

                                    </td>
                                    <td style="border-left: 2px solid gray; padding-left: 1rem">
                                        <div class="bar-container-second">
                                            <div class="woman-fill-one"></div>
                                        </div>
                                    </td>
                                    <td style="width: 5%">
                                        5000
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 5%">

                                    </td>
                                    <td style="border-left: 2px solid gray; padding-left: 1rem">
                                        19%
                                    </td>
                                </tr>
                            </table>

                            <table style="width: 100%; margin-top: 2rem; margin-bottom: 2rem;">
                                <tr style="margin-bottom: 1rem">
                                    <td style="width: 10%;"> </td>
                                    <td style="border-left: 2px solid gray; padding-left: 1rem">
                                        <div class="bar-container-second">
                                            <div class="man-fill-one"></div>
                                        </div>
                                    </td>
                                    <td style="width: 5%">
                                        5000
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 5%">

                                    </td>
                                    <td style="border-left: 2px solid gray; padding-left: 1rem">
                                        19%
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 5%">
                                        15-65 años
                                    </td>
                                    <td style="border-left: 2px solid gray; padding-left: 1rem;">

                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 5%; margin-bottom: 1rem"></td>
                                    <td style="border-left: 2px solid gray; padding-left: 1rem">
                                        <div class="bar-container-second">
                                            <div class="woman-fill-one"></div>
                                        </div>
                                    </td>
                                    <td style="width: 5%">
                                        5000
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 5%">

                                    </td>
                                    <td style="border-left: 2px solid gray; padding-left: 1rem">
                                        19%
                                    </td>
                                </tr>
                            </table>

                            <table style="width: 100%; margin-top: 2rem; margin-bottom: 2rem;">
                                <tr style="margin-bottom: 1rem">
                                    <td style="width: 10%"></td>
                                    <td style="border-left: 2px solid gray; padding-left: 1rem">
                                        <div class="bar-container-second">
                                            <div class="man-fill-one"></div>
                                        </div>
                                    </td>
                                    <td style="width: 5%">
                                        5000
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 5%">

                                    </td>
                                    <td style="border-left: 2px solid gray; padding-left: 1rem">
                                        19%
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 5%">
                                        5-14 años
                                    </td>
                                    <td style="border-left: 2px solid gray; padding-left: 1rem;">

                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 5%"></td>
                                    <td style="border-left: 2px solid gray; padding-left: 1rem">
                                        <div class="bar-container-second">
                                            <div class="woman-fill-one"></div>
                                        </div>
                                    </td>
                                    <td style="width: 5%">
                                        5000
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 5%">

                                    </td>
                                    <td style="border-left: 2px solid gray; padding-left: 1rem">
                                        19%
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </tr>
                </table>
            </div>

            <div style="margin-top: 2rem; border-bottom: 2px solid #A0AEC0; padding-bottom: 1rem">
                <table style="width: 100%">
                    <tr>
                        <td style="font-size: 1.0rem; font-weight: bold; margin-bottom: 0.5rem;">¿Dónde estamos?</td>
                    </tr>
                    <tr>
                        <td style="width: 60%; font-size: 1.0rem;">Población ajustada por omisión en cabecera
                            municipal: <span class="poblacion-etnica-valor"> 6.922</span></td>
                        <td><img src="storage/images/building.png" alt="Logo Hombre"
                                style="width: 3rem; height: 3rem; object-fit: cover; margin-bottom: 0.5rem;"></td>
                    </tr>
                    <tr>
                        <td style="width: 60%; font-size: 1.0rem;">Población ajustada por omisión en centros poblados y
                            rural disperso: <span class="poblacion-etnica-valor"> 30900</span></td>
                        <td><img src="storage/images/home.png" alt="Logo Hombre"
                                style="width: 3rem; height: 3rem; object-fit: cover; margin-bottom: 0.5rem;"></td>
                    </tr>
                </table>

                <table style="width: 100%">
                    <tr>
                        <td style="font-size: 1.0rem; font-weight: bold; margin-bottom: 0.5rem;">
                            Distribución por áreas geográficas
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="graphic-container">
                                <table style="width: 100%; margin-top: 1rem; margin-bottom: 1rem;">
                                    <tr>
                                        <td style="width: 20%"></td>
                                        <td style="font-size: 1.0rem; font-weight: bold; text-align: left;">
                                            {{ $omisionCabeceraPercentage }}% </td>
                                        <td style="font-size: 1.0rem; font-weight: bold; text-align: right;">
                                            {{ $omisionPobladoPercentage }}% </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 20%">

                                        </td>
                                        <td colspan="2">
                                            <div class="bar-container">
                                                <div class="bar-fill"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Cabeceras municipales</td>
                        <td>Centros poblados y rural</td>
                    </tr>
                </table>
            </div>

            <div>
                <table style="width: 100%">
                    <tr>
                        <td
                            style="font-size: 1.0rem; font-weight: bold; margin-bottom: 0.5rem; padding-bottom: 0.5rem">
                            Lugar de nacimiento</td>
                    </tr>
                    <tr>
                        <td>
                            <img src="storage/images/woman.png" alt="Logo Mujer"
                                style="width: 3rem; height: 3rem; object-fit: cover; margin-bottom: 0.5rem;">
                        </td>
                        <td>Otro Pais</td>
                        <td>Otro municipio</td>
                        <td>Este municipio</td>
                    </tr>
                    <tr>
                        <td>Mujeres</td>
                        <td class="poblacion-etnica-valor">1%</td>
                        <td class="poblacion-etnica-valor">1%</td>
                        <td class="poblacion-etnica-valor">1%</td>
                    </tr>
                    <tr>
                        <td>
                            <img src="storage/images/man.png" alt="Logo Mujer"
                                style="width: 3rem; height: 3rem; object-fit: cover; margin-bottom: 0.5rem;">
                        </td>
                        <td class="poblacion-etnica-valor">1%</td>
                        <td class="poblacion-etnica-valor">1%</td>
                        <td class="poblacion-etnica-valor">1%</td>
                    </tr>
                    <tr>
                        <td>Hombres</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>

            <div>
                <table style="width: 100%; margin-top: 1rem; height: 200px;">
                    <tr>
                        <td style="padding: 0.5rem; width: 30%; ">
                            <div style="font-size: 2.0rem; font-weight: bold; margin-bottom: 0.5rem;">
                                ¿Cómo vivimos?
                            </div>
                            <table>
                                <tr>
                                    <td>
                                        <table style="width: 100%; height: margin-top: 1rem; margin-bottom: 1rem;">
                                            <tr>
                                                <td style="font-size: 1.0rem; font-weight: bold;"><img
                                                        src="storage/images/building-apartments.png"
                                                        alt="Edificio Apartamentos"
                                                        style="width: 8rem; height: 8rem; object-fit: cover; margin-bottom: 0.5rem;">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="padding-left: 1rem;">
                                        <table style="width: 100%; margin-bottom: 1rem;">
                                            <tr>
                                                <td style="font-size: 2.0rem; font-weight: bold; padding: 1rem;">12.314
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p
                                                        style="font-size: 1.0rem; font-weight: bold; color: #4A5568; padding-left: 1rem;">
                                                        Total unidades de vivienda*
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 2.0rem; font-weight: bold;padding: 1rem;">8931
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p
                                                        style="font-size: 1.0rem; font-weight: bold; color: #4A5568; padding-left: 1rem;">
                                                        Total viviendas ocupadas con personal
                                                        presentes
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>

                        <td style="padding: 0.5rem; width: 50%;">
                            <div
                                style="text-align: center; font-size: 1.0rem; font-weight: bold; margin-bottom: 0.5rem;">
                                Uso de vivienda
                            </div>
                            <div
                                style="border: 2px dashed #A0AEC0; background-color: #EDF2F7; padding: 1rem; height: 20rem; text-align: center;">

                            </div>
                        </td>
                    </tr>
                </table>
            </div>


            <div>
                <table style="width: 100%; margin-top: 2rem; margin-bottom: 3rem">
                    <tr>
                        <td style="font-size: 1.0rem; font-weight: bold; margin-bottom: 0.5rem;">
                            Tipo de vivienda
                        </td>
                    </tr>
                </table>
                <table style="width: 100%; margin-bottom: 2rem;">
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td><img src="storage/images/house.png" alt="Logo Casa"
                                            style="width: 3rem; height: 3rem; object-fit: cover; margin-bottom: 0.5rem;">
                                    </td>
                                    <td style="padding-left: 0.5rem">
                                        <table>
                                            <tr>
                                                <td style="font-size: 1rem;">Casa</td>
                                            </tr>
                                            <tr>
                                                <td class="poblacion-etnica-valor-tipo-vivienda">10480</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table>
                                <tr>
                                    <td><img src="storage/images/building-apartments.png" alt="Logo Mujer"
                                            style="width: 3rem; height: 3rem; object-fit: cover; margin-bottom: 0.5rem;">
                                    </td>
                                    <td style="padding-left: 0.5rem">
                                        <table>
                                            <tr>
                                                <td style="font-size: 1rem;">Apartamento</td>
                                            </tr>
                                            <tr>
                                                <td class="poblacion-etnica-valor-tipo-vivienda">10480</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table>
                                <tr>
                                    <td><img src="storage/images/bed.png" alt="Logo Cama"
                                            style="width: 3rem; height: 3rem; object-fit: cover; margin-bottom: 0.5rem;">
                                    </td>
                                    <td style="padding-left: 0.5rem">
                                        <table>
                                            <tr>
                                                <td style="font-size: 1rem;">Cuarto</td>
                                            </tr>
                                            <tr>
                                                <td class="poblacion-etnica-valor-tipo-vivienda">10480</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table style="width: 100%;">
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td><img src="storage/images/casa-etnica.png" alt="Logo Mujer"
                                            style="width: 3rem; height: 3rem; object-fit: cover; margin-bottom: 0.5rem;">
                                    </td>
                                    <td style="padding-left: 0.5rem">
                                        <table>
                                            <tr>
                                                <td style="font-size: 1rem;">Casa etnica</td>
                                            </tr>
                                            <tr>
                                                <td class="poblacion-etnica-valor-tipo-vivienda">10480</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table>
                                <tr>
                                    <td><img src="storage/images/house.png" alt="Logo Mujer"
                                            style="width: 3rem; height: 3rem; object-fit: cover; margin-bottom: 0.5rem;">
                                    </td>
                                    <td style="padding-left: 0.5rem">
                                        <table>
                                            <tr>
                                                <td style="font-size: 1rem;">Otro</td>
                                            </tr>
                                            <tr>
                                                <td class="poblacion-etnica-valor-tipo-vivienda">10480</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 38%">
                        </td>
                    </tr>
                </table>
            </div>

            <div style="margin-top: 300px">
                <table style="width: 100%;">
                    <tr>
                        <td style="font-size: 1.0rem; font-weight: bold; margin-bottom: 0.5rem;">
                            Viviendas con acceso a servicios públicos
                        </td>
                        <td>
                            Nota: para los servicios de gas natural e internet se presentó 0,3%
                            y 0,3% de no información respectivamente
                        </td>
                    </tr>
                </table>
                <table style="width: 100%; margin-top: 1rem">
                    <tr>
                        <td>
                            <div
                                style="border: 2px dashed #A0AEC0; background-color: #EDF2F7; padding: 1rem; height: 20rem; text-align: center;">

                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <div style="margin-top: 5rem">
                <table style="margin-top: 1rem; width: 100%; padding-left: 1rem">
                    <tr>
                        <td style="width: 15%"></td>
                        <td class="poblacion-etnica-valor-tipo-vivienda">9518</td>
                    </tr>
                </table>
                <table style="margin-top: 1rem; width: 100%; padding-left: 1rem">
                    <tr>
                        <td style="width: 15%">
                            <table>
                                <tr>
                                    <td><img src="storage/images/house.png" alt="Logo Mujer"
                                            style="width: 3rem; height: 3rem; object-fit: cover; margin-bottom: 0.5rem;">
                                    </td>
                                    <td><img src="storage/images/family-four.png" alt="Logo Mujer"
                                            style="width: 3rem; height: 3rem; object-fit: cover; margin-bottom: 0.5rem;">
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table style="font-size: 1rem;">
                                <tr>
                                    <td>TOTAL HOGARES PARTICULARES</td>
                                </tr>
                                <tr>
                                    <td>
                                        Corresponde a los grupos de personas residentes en viviendas ocupadas con
                                        personas
                                        presentes
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            <div>
                <table style="width: 100%; margin-top:5rem; margin-bottom: 2rem">
                    <tr>
                        <td style="font-size: 1.0rem; font-weight: bold; margin-bottom: 0.5rem;">
                            Número de personas por hogar
                        </td>
                    </tr>
                </table>
                <table style="width: 100%; margin-bottom: 2rem;">
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td><img src="storage/images/woman.png" alt="Logo Mujer"
                                            style="width: 3rem; height: 3rem; object-fit: cover; margin-bottom: 0.5rem;">
                                    </td>
                                    <td style="padding-left: 1rem">
                                        <table>
                                            <tr class="poblacion-etnica-valor-tipo-vivienda">
                                                <td>11,6%</td>
                                            </tr>
                                            <tr>
                                                <td>UNA PERSONA</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table>
                                <tr>
                                    <td><img src="storage/images/woman-man.png" alt="Logo Pareja"
                                            style="width: 3rem; height: 3rem; object-fit: cover; margin-bottom: 0.5rem;">
                                    </td>
                                    <td style="padding-left: 1rem">
                                        <table>
                                            <tr class="poblacion-etnica-valor-tipo-vivienda">
                                                <td>11,6%</td>
                                            </tr>
                                            <tr>
                                                <td>DOS PERSONAS</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table>
                                <tr>
                                    <td><img src="storage/images/family-three.png" alt="Logo Familia 3"
                                            style="width: 3rem; height: 3rem; object-fit: cover; margin-bottom: 0.5rem;">
                                    </td>
                                    <td style="padding-left: 1rem">
                                        <table>
                                            <tr class="poblacion-etnica-valor-tipo-vivienda">
                                                <td>20,9%</td>
                                            </tr>
                                            <tr>
                                                <td>TRES PERSONAS</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table style="width: 100%; margin-bottom: 2rem;">
                    <tr>
                        <td style="width: 32%">
                            <table>
                                <tr>
                                    <td><img src="storage/images/family-four.png" alt="Logo Familia cuatro"
                                            style="width: 3rem; height: 3rem; object-fit: cover; margin-bottom: 0.5rem;">
                                    </td>
                                    <td style="padding-left: 1rem">
                                        <table>
                                            <tr class="poblacion-etnica-valor-tipo-vivienda">
                                                <td>11,6%</td>
                                            </tr>
                                            <tr>
                                                <td>CUATRO PERSONAS</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table>
                                <tr>
                                    <td><img src="storage/images/family-of-six-including-a-baby.png" alt="Logo Hombre"
                                            style="width: 3rem; height: 3rem; object-fit: cover; margin-bottom: 0.5rem;">
                                    </td>
                                    <td style="padding-left: 1rem">
                                        <table>
                                            <tr class="poblacion-etnica-valor-tipo-vivienda">
                                                <td>11,6%</td>
                                            </tr>
                                            <tr>
                                                <td>CINCO PERSONAS</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table>
                                <tr>
                                    <td><img src="storage/images/family-of-six-including-a-baby.png" alt="Logo Hombre"
                                            style="width: 3rem; height: 3rem; object-fit: cover; margin-bottom: 0.5rem;">
                                    </td>
                                    <td style="padding-left: 1rem">
                                        <table>
                                            <tr class="poblacion-etnica-valor-tipo-vivienda">
                                                <td>20,9%</td>
                                            </tr>
                                            <tr>
                                                <td>SEIS PERSONAS (+)</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
