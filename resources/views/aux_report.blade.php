<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Report File</title>
    <style>
        body {
            font-family: font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-size: 12px;
            margin: 0;
            padding: 0;
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

        @media print {

            body,
            html {
                margin: 0;
                padding: 0;
                width: 100%;
                height: 100%;
            }

            /* Asegurar que el contenido se imprima sin márgenes */
            @page {
                margin: 0;
                size: A4;
                /* Tamaño de página A4 */
            }

            /* Asegurar que el gráfico se ajuste bien en la impresión */
            canvas {
                display: block;
                width: 100% !important;
                height: auto !important;
            }

            /* Ajustar el zoom para optimizar el tamaño de impresión */
            body {
                zoom: 90%;
                /* Ajuste del zoom para escalar bien en la hoja A4 */
            }

            /* Ocultar el botón de impresión al imprimir */
            button {
                display: none;
            }
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body class="container">
    <button onclick="window.print()"
        style="background-color: #28a745; /* Verde */
           color: white;
           padding: 10px 20px;
           font-size: 16px;
           border: none;
           border-radius: 5px;
           cursor: pointer;
           box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
           transition: background-color 0.3s ease, box-shadow 0.3s ease;">
        Imprimir Gráfico
    </button>
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
                                        <p style="font-size: 1.0rem; font-weight: bold; color: #4A5568;"></p>
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
                                        <p style="font-size: 1.0rem; font-weight: bold; color: #4A5568;"></p>
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
                                                <td style="font-size: 1.0rem; color: #4A5568;"></td>
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
                                                <td style="font-size: 1.0rem; color: #4A5568;"></td>
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
                                <canvas id="chartGruposEdad" style="width: 100%; height: 20rem;"></canvas>
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
                                <canvas id="piramide_uno" style="height: 20rem; width: 100%"></canvas>
                            </div>
                        </td>
                        <td style="padding: 0.5rem; text-align: center; width: 50%;">
                            <div
                                style="border: 2px dashed #A0AEC0; background-color: #EDF2F7; padding: 1rem; height: 20rem;">
                                <canvas id="piramide_dos" style="height: 20rem; width: 100%"></canvas>
                            </div>
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
                                        <p class="poblacion-etnica-valor">%</p>
                                    </td>
                                    <td style="text-align: center;">
                                        <p class="poblacion-etnica">ROM (Gitanos)</p>
                                        <p class="poblacion-etnica-valor">%</p>
                                    </td>
                                    <td style="text-align: center; border-bottom: 2px solid #CBD5E0;">
                                        <p class="poblacion-etnica">Raizales</p>
                                        <p class="poblacion-etnica-valor">%</p>
                                    </td>
                                    <td style="text-align: center; border-bottom: 2px solid #CBD5E0;">
                                        <p class="poblacion-etnica">Palenqueros</p>
                                        <p class="poblacion-etnica-valor">%</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">
                                        <p class="poblacion-etnica">Afrocolombianos</p>
                                        <p class="poblacion-etnica-valor">%</p>
                                    </td>
                                    <td style="text-align: center;">
                                        <p class="poblacion-etnica">Ningún grupo étnico</p>
                                        <p class="poblacion-etnica-valor">%</p>
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
                        <td style="padding: 1rem; text-align: center; width: 50%;">
                            <canvas id="tortaChart"
                                style="width: 100% !important; height: 20rem !important; display: inline;"></canvas>
                        </td>
                        <td style="padding: 1rem; text-align: center;">
                            <canvas id="chartCentrosPoblados" style="width: 100%; height: 20rem;"></canvas>
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
                                <canvas id="chartLeerEscribir"
                                    style="width: 100% !important; height: 20rem;"></canvas>
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

                        <td class="graphic-container">
                            <canvas id="chartAsistenciaEscolar"
                                style="height: 20rem !important; width: 100%;"></canvas>
                        </td>
                    </tr>
                </table>
            </div>

            <div style="margin-top: 2rem; border-bottom: 2px solid #A0AEC0; padding-bottom: 1rem; width: 100%;">
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
                                        <td style="font-size: 1.0rem; font-weight: bold; text-align: left;"> % </td>
                                        <td style="font-size: 1.0rem; font-weight: bold; text-align: right;"> % </td>
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
                                <canvas id="chartUsoVivienda" style="width: 100%; height: 20rem;"></canvas>
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
                                <canvas id="chartServiciosPublicos" style="width: 100%; height: 20rem;"></canvas>
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

    <script>
        //Grupos de edad chart
        const ctxGruposEdad = document.getElementById('chartGruposEdad').getContext('2d');
        const chartGruposEdad = new Chart(ctxGruposEdad, {
            type: 'bar',
            data: {
                labels: ['0-14 años', '15-59 años', '60 o más años'], // Grupos de edad
                datasets: [{
                        label: 'Caracterización',
                        data: [10000, 15000, 3000], // Datos de caracterización
                        backgroundColor: 'rgba(14,150,52,255)', // Color sólido
                    },
                    {
                        label: 'Población por Omisión',
                        data: [12000, 18000, 4000], // Datos de omisión
                        backgroundColor: 'rgba(131,199,152,255)', // Color con patrón o transparencia
                    }
                ]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Grandes Grupos de Edad'
                    }
                },
                scales: {
                    x: {
                        stacked: true // Apilar en el eje X
                    },
                    y: {
                        stacked: true, // Apilar en el eje Y
                        beginAtZero: true
                    }
                }
            }
        });
        // piramide uno
        const ctxPiramideUno = document.getElementById('piramide_uno').getContext('2d');
        const chartPiramideUno = new Chart(ctxPiramideUno, {
            type: 'bar',
            data: {
                labels: [
                    '90-94 años', '80-84 años', '70-74 años', '60-64 años',
                    '50-54 años', '40-44 años', '30-34 años', '20-24 años',
                    '10-14 años', '0-4 años'
                ],
                datasets: [{
                        label: 'Hombres',
                        data: [-2, -3, -5, -8, -10, -12, -14, -10, -8, -5],
                        backgroundColor: 'rgba(14,150,52,255)',
                    },
                    {
                        label: 'Mujeres',
                        data: [2, 3, 5, 8, 10, 12, 14, 10, 8, 5],
                        backgroundColor: 'rgba(131,199,152,255)',
                    }
                ]
            },
            options: {
                indexAxis: 'y', // Eje horizontal
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return Math.abs(value) + '%';
                            }
                        }
                    },
                    y: {
                        stacked: true
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Caracterización de Población Vulnerable 2024'
                    }
                }
            }
        });
        // piramide dos
        const ctxPiramideDos = document.getElementById('piramide_dos').getContext('2d');
        const chartPiramideDos = new Chart(ctxPiramideDos, {
            type: 'bar',
            data: {
                labels: [
                    '90-94 años', '80-84 años', '70-74 años', '60-64 años',
                    '50-54 años', '40-44 años', '30-34 años', '20-24 años',
                    '10-14 años', '0-4 años'
                ],
                datasets: [{
                        label: 'Hombres',
                        data: [-2, -3, -5, -8, -10, -12, -14, -10, -8, -5],
                        backgroundColor: 'rgba(14,150,52,255)',
                    },
                    {
                        label: 'Mujeres',
                        data: [2, 3, 5, 8, 10, 12, 14, 10, 8, 5],
                        backgroundColor: 'rgba(131,199,152,255)',
                    }
                ]
            },
            options: {
                indexAxis: 'y', // Eje horizontal
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return Math.abs(value) + '%';
                            }
                        }
                    },
                    y: {
                        stacked: true
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Caracterización de Población Vulnerable 2024'
                    }
                }
            }
        });

        // torta
        const ctxTortaChart = document.getElementById('tortaChart').getContext('2d');
        const chartTortaChart = new Chart(ctxTortaChart, {
            type: 'pie',
            data: {
                labels: [
                    'Discapacidad Nula',
                    'Discapacidad Motora - Discapacidad Sensorial',
                    'Pluridiscapacidad',
                    'Discapacidad Sensorial',
                    'Discapacidad Orgánica',
                    'Discapacidad Mental'
                ],
                datasets: [{
                    data: [52.39, 39.57, 5.07, 1.82, 0.79, 0.37],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 255, 102, 0.6)',
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(255, 205, 86, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 255, 102, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 205, 86, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(153, 102, 255, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: true,
                        position: 'left'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                const data = tooltipItem.raw;
                                return data + '%';
                            }
                        }
                    }
                }
            }
        });

        // centros poblados
        const ctxChartCentrosPoblados = document.getElementById('chartCentrosPoblados').getContext('2d');
        const chartChartCentrosPoblados = new Chart(ctxChartCentrosPoblados, {
            type: 'bar',
            data: {
                labels: [
                    'Discapacidad Mental',
                    'Discapacidad Orgánica',
                    'Discapacidad Sensorial',
                    'Pluridiscapacidad',
                    'Discapacidad Motora',
                    'Discapacidad Nula'
                ],
                datasets: [{
                        label: 'Cabecera Municipal',
                        data: [100, 12000, 400, 10, 300, 8000],
                        backgroundColor: 'rgba(0, 128, 0, 0.7)' // Verde oscuro
                    },
                    {
                        label: 'La Loma',
                        data: [50, 9000, 300, 5, 200, 7000],
                        backgroundColor: 'rgba(173, 255, 47, 0.7)' // Verde claro
                    },
                    {
                        label: 'Potrerillo',
                        data: [30, 8000, 200, 8, 150, 6000],
                        backgroundColor: 'rgba(34, 139, 34, 0.7)' // Otro tono de verde
                    },
                    {
                        label: 'Cuatro Vientos',
                        data: [25, 6000, 100, 4, 100, 5000],
                        backgroundColor: 'rgba(0, 250, 154, 0.7)' // Verde medio
                    },
                    {
                        label: 'El Vallito',
                        data: [20, 4000, 50, 2, 50, 3000],
                        backgroundColor: 'rgba(144, 238, 144, 0.7)' // Verde claro
                    },
                    {
                        label: 'El Carmen',
                        data: [15, 2000, 30, 1, 20, 1000],
                        backgroundColor: 'rgba(0, 255, 127, 0.7)' // Verde claro neón
                    }
                ]
            },
            options: {
                indexAxis: 'y',
                scales: {
                    x: {
                        stacked: true
                    },
                    y: {
                        stacked: true
                    }
                },
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // Leer escribir
        const ctx2ChartLeerEscribir = document.getElementById('chartLeerEscribir').getContext('2d');
        const chartChartLeerEscribir = new Chart(ctx2ChartLeerEscribir, {
            type: 'bar',
            data: {
                labels: ['Categoría 1', 'Categoría 2', 'Categoría 3',
                    'Categoría 4'
                ],
                datasets: [{
                        label: '5-14 años',
                        data: [5540, 5200, 5610, 5270],
                        backgroundColor: 'rgba(0, 128, 0, 0.8)'
                    },
                    {
                        label: '15-64 años',
                        data: [9523, 10187, 9267, 9939],
                        backgroundColor: 'rgba(0, 128, 0, 0.5)',
                        borderWidth: 1,
                        borderColor: 'rgba(0, 128, 0, 1)',
                        borderDash: [5, 5]
                    },
                    {
                        label: '65 y + años',
                        data: [467, 438, 777, 724],
                        backgroundColor: 'rgba(0, 128, 0, 0.3)',
                        borderWidth: 1,
                        borderColor: 'rgba(0, 128, 0, 1)',
                        borderDash: [10, 5]
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true // El eje Y comienza en 0
                    }
                },
                plugins: {
                    legend: {
                        position: 'bottom' // Leyenda en la parte inferior
                    }
                }
            }
        });

        // Asistencia escolar
        const ctxChartAsistenciaEscolar = document.getElementById('chartAsistenciaEscolar').getContext('2d');
        const chartChartAsistenciaEscolar = new Chart(ctxChartAsistenciaEscolar, {
            type: 'bar',
            data: {
                labels: ['65 y + años', '15-64 años', '5-14 años'], // Grupos de edad
                datasets: [{
                        label: 'Hombres',
                        data: [3, 1880, 5551], // Datos para hombres en cada grupo de edad
                        backgroundColor: 'rgba(0, 128, 0, 0.8)' // Color sólido para los hombres
                    },
                    {
                        label: 'Mujeres',
                        data: [2, 1538, 5915], // Datos para mujeres en cada grupo de edad
                        backgroundColor: 'rgba(0, 128, 0, 0.5)', // Color más claro para las mujeres
                        borderWidth: 1,
                        borderColor: 'rgba(0, 128, 0, 1)', // Bordes para mayor claridad
                        borderDash: [5, 5] // Patrón discontinuo (opcional)
                    }
                ]
            },
            options: {
                indexAxis: 'y', // Hace que el gráfico sea horizontal
                scales: {
                    x: {
                        beginAtZero: true // El eje X comienza en 0
                    }
                },
                plugins: {
                    legend: {
                        position: 'right' // La leyenda se coloca a la derecha
                    }
                }
            }
        });

        //Uso de vivienda
        const ctxChartUsoVivienda = document.getElementById('chartUsoVivienda').getContext('2d');
        const chartChartUsoVivienda = new Chart(ctxChartUsoVivienda, {
            type: 'bar',
            data: {
                labels: ['Residencial', 'No residencial', 'Mixto'],
                datasets: [{
                    label: 'Porcentaje de uso',
                    data: [74.1, 22.4, 3.5],
                    backgroundColor: [
                        'green', // Puedes cambiar el color si lo deseas
                        'green',
                        'green'
                    ],
                    borderColor: [
                        'green',
                        'green',
                        'green'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value + "%";
                            } // Añade el símbolo de porcentaje en el eje Y
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.raw + "%"; // Añade el símbolo de porcentaje en el tooltip
                            }
                        }
                    }
                }
            }
        });

        const ctxChartServiciosPublicos = document.getElementById('chartServiciosPublicos').getContext('2d');
        const chartChartServiciosPublicos = new Chart(ctxChartServiciosPublicos, {
            type: 'bar',
            data: {
                labels: ['Energía Eléctrica', 'Acueducto', 'Alcantarillado', 'Gas Natural',
                    'Recolección de Basuras', 'Internet'
                ],
                datasets: [{
                    label: 'Porcentaje de uso',
                    data: [98.7, 86.4, 72.8, 36.6, 61.1, 8.1],
                    backgroundColor: [
                        'green', 'green', 'green', 'green', 'green', 'green'
                    ],
                    borderColor: [
                        'green', 'green', 'green', 'green', 'green', 'green'
                    ],
                    borderWidth: 1,
                    // Para el patrón de puntos, podrías necesitar una librería externa para patrones
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value + "%";
                            } // Añade el símbolo de porcentaje en el eje Y
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.raw + "%"; // Añade el símbolo de porcentaje en el tooltip
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>

</html>
