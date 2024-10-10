<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Report File</title>
    <style>
        body {
            font-family: 'Open Sans', 'Segoe UI', Roboto, "Helvetica Neue", Arial, sans-serif;
            font-size: 14px;
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
            font-size: 1.3rem;
        }

        .poblacion-etnica-valor {
            color: #4B5563;
            font-weight: bold;
            font-size: 1.3rem;
        }

        .poblacion-etnica-valor-tipo-vivienda {
            color: #4B5563;
            font-weight: bold;
            font-size: 1.3rem;
        }


        .graphic-container {
            width: 100%;

        }

        .bar-container {
            width: 100%;
            height: 20px; /* Ajusta la altura según necesites */
            background-color: #E2E8F0; /* Color de fondo de la barra */
            border-radius: 5px; /* Esquinas redondeadas */
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
            width: {{ $omisionCabeceraPercentage }}%; /* Asegúrate de que se ajuste dinámicamente */
            height: 100%;
            background-color: green; /* Color de la barra de progreso */
            border-radius: 5px; /* Esquinas redondeadas */
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

            .bar-fill {
                background-color: green !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .bar-container {
                background-color: #E2E8F0; /* Color de fondo de la barra */
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

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
                    style="text-align: center; font-size: 1.5rem; font-weight: bold; border-bottom: 1px solid black; padding: 0.5rem;">
                    Caracterización de Población Vulnerable
                    {{$municipio}} Departamento del {{$departamento}} 2024
                </div>

                <div style="text-align: center; font-size: 1.5rem; font-weight: bold; margin-bottom: 0.25rem;">
                  {{$departamento}}  / {{$municipio}}
                </div>
            </div>
            <div>
                <table style="width: 100%; margin-top: 1rem; height: 200px;">
                    <tr>
                        <td style="padding: 0.5rem; width: 50%; ">
                            <div
                                style="text-align: center; font-size: 1.5rem; font-weight: bold; margin-bottom: 0.5rem;">
                                ¿Cuántos somos?
                            </div>
                            <table style="width: 100%; height: margin-top: 1rem; margin-bottom: 1rem;">
                                <tr>
                                    <td style="font-size: 1.0rem; font-weight: bold;">Población total censada:</td>
                                </tr>
                                <tr>
                                    <td style="border: 2px solid #4A5568; padding: 0.5rem; text-align: center;">
                                        <p style="font-size: 1.0rem; font-weight: bold; color: #4A5568;">{{ $count }}</p>
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
                                        <p style="font-size: 1.0rem; font-weight: bold; color: #4A5568;"> {{ $omision }}</p>
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
                                                <td style="font-size: 1.0rem; color: #4A5568;">{{$womenCount}}</td>
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
                                                <td style="font-size: 1.0rem; color: #4A5568;">{{$menCount}}</td>
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
                                style="text-align: center; font-size: 1.3rem; font-weight: bold; margin-bottom: 0.5rem;">
                                Omisión total: {{ $omisionPorcentaje }}%
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
                            <div style="text-align: center; font-size: 1.2rem; font-weight: bold;">           
                                LA POBLACIÓN ÉTNICA EN CHIVOLO SE AUTORECONOCIÓ COMO:
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
                            esta pregunta, es decir, no incluye “sin información”. De un total de {{ $count }} personas
                            efectivamente censadas, {{$noAutoreconocimiento}} ({{$percentageNoAutoreconocimiento}}%) no respondieron esta pregunta de autorreconocimiento
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
                                style="width: 100% !important; height: 12rem !important; display: inline;"></canvas>
                        </td>
                        <td style="padding: 1rem; text-align: center;">
                            <canvas id="chartCentrosPoblados" style="width: 100%; height: 12rem;"></canvas>
                        </td>
                    </tr>
                </table>
            </div>

            <div>
                <table style="width: 100%">
                    <tr>
                        <td style="font-size: 1.2rem; font-weight: bold; width: 90%; text-align: center; padding-left:100px">
                            ALFABETISMO: LEER Y ESCRIBIR
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
                                style="border: 2px dashed #A0AEC0; background-color: #EDF2F7; padding: 1rem; height: 15rem;">
                                <canvas id="chartLeerEscribir"
                                    style="width: 100% !important; height: 15rem;"></canvas>
                            </div>
                        </td>
                    </tr>
                </table>

                <table style="width: 100%; margin-top: 1rem;">
                    <tr>
                        <td style="font-size: 1.2rem; font-weight: bold; width: 60%; text-align: center; padding-left:100px">
                            ASISTENCIA ESCOLAR
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
                                style="height: 15rem !important; width: 100%;"></canvas>
                        </td>
                    </tr>
                </table>
            </div>

            <div style="margin-top: 5rem;margin-bottom: 2rem; border-bottom: 2px solid #A0AEC0; padding-bottom: 1rem; width: 100%;">
                <table style="width: 100%">
                    <tr>
                        <td style="font-size: 1.2rem; font-weight: bold; margin-bottom: 0.5rem;text-align: right">¿DÓNDE ESTAMOS?</td>
                    </tr>
                    <tr >
                        <td style="width: 60%; font-size: 1.0rem;">Población ajustada por omisión en cabecera
                            municipal: <span class="poblacion-etnica-valor"> {{ $omisionCabecera }}</span></td>
                        <td><img src="storage/images/building.png" alt="Logo Hombre"
                                style="width: 3rem; height: 3rem; object-fit: cover; margin-bottom: 0.5rem;"></td>
                    </tr>
                    <tr>
                        <td style="width: 60%; font-size: 1.0rem;">Población ajustada por omisión en centros poblados y
                            rural disperso: <span class="poblacion-etnica-valor">  {{ $omisionPoblado }}</span></td>
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
                <table style="width: 100%; border-spacing: 0 10px;">
                    <tr>
                        <td style="font-size: 1.8rem; font-weight: bold; margin-bottom: 0.5rem; padding-bottom: 0.5rem; text-align: center;" colspan="4">
                            Lugar de nacimiento
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 25%;">
                            <img src="storage/images/woman.png" alt="Logo Mujer"
                                style="width: 3rem; height: 3rem; object-fit: cover; margin-bottom: 0.5rem;">
                        </td>
                        <td>Otro País</td>
                        <td>Otro municipio</td>
                        <td>Este municipio</td>
                    </tr>
                    <tr>
                        <td>Mujeres</td>
                        <td class="poblacion-etnica-valor">{{$otroPaisMujer}}%</td>
                        <td class="poblacion-etnica-valor">{{$otroMunicipioMujer}}%</td>
                        <td class="poblacion-etnica-valor">{{$esteMunicipioMujer}}%</td>
                    </tr>
                    <tr>
                        <td>
                            <img src="storage/images/man.png" alt="Logo Hombre"
                                style="width: 3rem; height: 3rem; object-fit: cover; margin-bottom: 0.5rem;">
                        </td>
                        <td class="poblacion-etnica-valor">{{$otroPaisHombre}}%</td>
                        <td class="poblacion-etnica-valor">{{$otroMunicipioHombre}}%</td>
                        <td class="poblacion-etnica-valor">{{$esteMunicipioHombre}}%</td>
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
                <table style="width: 100%; margin-top: 2rem; height: 100px;">
                    <tr>
                        <td style="padding: 0.5rem; width: 30%; ">
                            <div style="font-size: 1.8rem; font-weight: bold; margin-bottom: 0.5rem;">
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
                                                <td style="font-size: 2.0rem; font-weight: bold; padding: 1rem;">{{$totalUnidadesVivienda}}
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
                                                <td style="font-size: 2.0rem; font-weight: bold;padding: 1rem;">{{$totalUnidadesViviendaOcupadas}}
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
                                style="border: 2px dashed #A0AEC0; background-color: #EDF2F7; padding: 1rem; height: 12rem; text-align: center;">
                                <canvas id="chartUsoVivienda" style="width: 100%; height: 12rem;"></canvas>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>


            <div>
                <table style="width: 100%;; margin-bottom: 3rem">
                    <tr>
                        <td style="font-size: 1.8rem; font-weight: bold; margin-bottom: 0.5rem; text-align: center">
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
                                                <td class="poblacion-etnica-valor-tipo-vivienda">{{$tipoViviendaCasa}}</td>
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
                                                <td class="poblacion-etnica-valor-tipo-vivienda">{{$tipoViviendaApartamento}}</td>
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
                                                <td class="poblacion-etnica-valor-tipo-vivienda">{{$tipoViviendaCuarto}}</td>
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
                        <td style="width:28%">
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
                                                <td class="poblacion-etnica-valor-tipo-vivienda">{{$tipoViviendaIndigena}}</td>
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
                                                <td class="poblacion-etnica-valor-tipo-vivienda">{{$tipoViviendaOtro}}</td>
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

            <div style="margin-top: 50px">
                <table style="width: 100%;">
                    <tr>
                        <td style="font-size: 1.3rem; font-weight: bold; margin-bottom: 0.5rem;">
                            VIVIENDAS CON ACCESO A SERVICIOS PÚBLICOS
                        </td>
                        <td>
                            Nota: para los servicios de gas natural e internet se presentó {{$servicioPublicoGasPorcentaje}}%
                            y {{$servicioPublicoInternetPorcentaje}}% de no información respectivamente
                        </td>
                    </tr>
                </table>
                <table style="width: 100%; margin-top: 1rem">
                    <tr>
                        <td>
                            <div
                                style="border: 2px dashed #A0AEC0; background-color: #EDF2F7; padding: 1rem; height: 12rem; text-align: center;">
                                <canvas id="chartServiciosPublicos" style="width: 100%; height: 12rem;"></canvas>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <div >
                <table style="margin-top: 1rem; width: 100%; padding-left: 1rem">
                    <tr>
                        <td style="width: 15%"></td>
                        <td class="poblacion-etnica-valor-tipo-vivienda">{{$totalHogaresParticulares}}</td>
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
                <table style="width: 100%; margin-top:1rem; margin-bottom: 2rem; padding-top: 1rem">
                    <tr>
                        <td style="font-size: 1.5rem; font-weight: bold; margin-bottom: 0.5rem; text-align: center">
                            NÚMERO DE PERSONAS POR HOGAR
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
                                                <td>{{$totalPersonas1Porcentaje}}%</td>
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
                                                <td>{{$totalPersonas2Porcentaje}}%</td>
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
                                                <td>{{$totalPersonas3Porcentaje}}%</td>
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
                                                <td>{{$totalPersonas4Porcentaje}}%</td>
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
                                                <td>{{$totalPersonas5Porcentaje}}%</td>
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
                                                <td>{{$totalPersonas6Porcentaje}}%</td>
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
        let grupoOmision1 = @json($omisionEdadGrupo1);
        let grupoOmision2 = @json($omisionEdadGrupo2);
        let grupoOmision3 = @json($omisionEdadGrupo3);
        let caracterizacionGrupo1 = @json($caracterizacionGrupo1);
        let caracterizacionGrupo2 = @json($caracterizacionGrupo2);
        let caracterizacionGrupo3 = @json($caracterizacionGrupo3);
        const ctxGruposEdad = document.getElementById('chartGruposEdad').getContext('2d');
        const chartGruposEdad = new Chart(ctxGruposEdad, {
            type: 'bar',
            data: {
                labels: ['0-14 años', '15-59 años', '60 o más años'], // Grupos de edad
                datasets: [{
                        label: 'Caracterización',
                        data: [caracterizacionGrupo1, caracterizacionGrupo2, caracterizacionGrupo3], // Datos de caracterización
                        backgroundColor: 'rgba(14,150,52,255)', // Color sólido
                    },
                    {
                        label: 'Población por Omisión',
                        data: [grupoOmision1, grupoOmision2, grupoOmision3], // Datos de omisión
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
        let caracterizacionGrupoArbolHombre1 = @json($caracterizacionGrupoArbolHombre1);
        let caracterizacionGrupoArbolMujer1 = @json($caracterizacionGrupoArbolMujer1);
        let caracterizacionGrupoArbolHombre2 = @json($caracterizacionGrupoArbolHombre2);
        let caracterizacionGrupoArbolMujer2 = @json($caracterizacionGrupoArbolMujer2);
        let caracterizacionGrupoArbolHombre3 = @json($caracterizacionGrupoArbolHombre3);
        let caracterizacionGrupoArbolMujer3 = @json($caracterizacionGrupoArbolMujer3);
        let caracterizacionGrupoArbolHombre4 = @json($caracterizacionGrupoArbolHombre4);
        let caracterizacionGrupoArbolMujer4 = @json($caracterizacionGrupoArbolMujer4);
        let caracterizacionGrupoArbolHombre5 = @json($caracterizacionGrupoArbolHombre5);
        let caracterizacionGrupoArbolMujer5 = @json($caracterizacionGrupoArbolMujer5);
        let caracterizacionGrupoArbolHombre6 = @json($caracterizacionGrupoArbolHombre6);
        let caracterizacionGrupoArbolMujer6 = @json($caracterizacionGrupoArbolMujer6);
        let caracterizacionGrupoArbolHombre7 = @json($caracterizacionGrupoArbolHombre7);
        let caracterizacionGrupoArbolMujer7 = @json($caracterizacionGrupoArbolMujer7);
        let caracterizacionGrupoArbolHombre8 = @json($caracterizacionGrupoArbolHombre8);
        let caracterizacionGrupoArbolMujer8 = @json($caracterizacionGrupoArbolMujer8);
        let caracterizacionGrupoArbolHombre9= @json($caracterizacionGrupoArbolHombre9);
        let caracterizacionGrupoArbolMujer9 = @json($caracterizacionGrupoArbolMujer9);

        const ctxPiramideUno = document.getElementById('piramide_uno').getContext('2d');
        const chartPiramideUno = new Chart(ctxPiramideUno, {
            type: 'bar',
            data: {
                labels: [
                    '80 o mas años', '70-74 años', '60-64 años',
                    '50-54 años', '40-44 años', '30-34 años', '20-24 años',
                    '10-14 años', '0-4 años'
                ],
                datasets: [{
                        label: 'Hombres',
                        data: [
                            -caracterizacionGrupoArbolHombre9,
                            -caracterizacionGrupoArbolHombre8,
                            -caracterizacionGrupoArbolHombre7,
                            -caracterizacionGrupoArbolHombre6,
                            -caracterizacionGrupoArbolHombre5,
                            -caracterizacionGrupoArbolHombre4,
                            -caracterizacionGrupoArbolHombre3,
                            -caracterizacionGrupoArbolHombre2,
                            -caracterizacionGrupoArbolHombre1,
                        ],
                        backgroundColor: 'rgba(14,150,52,255)',
                    },
                    {
                        label: 'Mujeres',
                        data: [
                            caracterizacionGrupoArbolMujer9,
                            caracterizacionGrupoArbolMujer8,
                            caracterizacionGrupoArbolMujer7,
                            caracterizacionGrupoArbolMujer6,
                            caracterizacionGrupoArbolMujer5,
                            caracterizacionGrupoArbolMujer4,
                            caracterizacionGrupoArbolMujer3,
                            caracterizacionGrupoArbolMujer2,
                            caracterizacionGrupoArbolMujer1],
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
        let omisionEdadGrupoArbolHombre1 = @json($omisionEdadGrupoArbolHombre1);
        let omisionEdadGrupoArbolHombre2 = @json($omisionEdadGrupoArbolHombre2);
        let omisionEdadGrupoArbolHombre3 = @json($omisionEdadGrupoArbolHombre3);
        let omisionEdadGrupoArbolHombre4 = @json($omisionEdadGrupoArbolHombre4);
        let omisionEdadGrupoArbolHombre5 = @json($omisionEdadGrupoArbolHombre5);
        let omisionEdadGrupoArbolHombre6 = @json($omisionEdadGrupoArbolHombre6);
        let omisionEdadGrupoArbolHombre7 = @json($omisionEdadGrupoArbolHombre7);
        let omisionEdadGrupoArbolHombre8 = @json($omisionEdadGrupoArbolHombre8);
        let omisionEdadGrupoArbolHombre9 = @json($omisionEdadGrupoArbolHombre9);
        let omisionEdadGrupoArbolMujer1 = @json($omisionEdadGrupoArbolMujer1);
        let omisionEdadGrupoArbolMujer2 = @json($omisionEdadGrupoArbolMujer2);
        let omisionEdadGrupoArbolMujer3 = @json($omisionEdadGrupoArbolMujer3);
        let omisionEdadGrupoArbolMujer4 = @json($omisionEdadGrupoArbolMujer4);
        let omisionEdadGrupoArbolMujer5 = @json($omisionEdadGrupoArbolMujer5);
        let omisionEdadGrupoArbolMujer6 = @json($omisionEdadGrupoArbolMujer6);
        let omisionEdadGrupoArbolMujer7 = @json($omisionEdadGrupoArbolMujer7);
        let omisionEdadGrupoArbolMujer8 = @json($omisionEdadGrupoArbolMujer8);
        let omisionEdadGrupoArbolMujer9 = @json($omisionEdadGrupoArbolMujer9);

        const ctxPiramideDos = document.getElementById('piramide_dos').getContext('2d');
        const chartPiramideDos = new Chart(ctxPiramideDos, {
            type: 'bar',
            data: {
                labels: [
                    '80-84 años', '70-74 años', '60-64 años',
                    '50-54 años', '40-44 años', '30-34 años', '20-24 años',
                    '10-14 años', '0-4 años'
                ],
                datasets: [{
                        label: 'Hombres',
                        data: [
                            -omisionEdadGrupoArbolHombre9,
                            -omisionEdadGrupoArbolHombre8,
                            -omisionEdadGrupoArbolHombre7,
                            -omisionEdadGrupoArbolHombre6,
                            -omisionEdadGrupoArbolHombre5,
                            -omisionEdadGrupoArbolHombre4,
                            -omisionEdadGrupoArbolHombre3,
                            -omisionEdadGrupoArbolHombre2,
                            -omisionEdadGrupoArbolHombre1
                            ],
                        backgroundColor: 'rgba(14,150,52,255)',
                    },
                    {
                        label: 'Mujeres',
                        data: [
                            omisionEdadGrupoArbolMujer9,
                            omisionEdadGrupoArbolMujer8,
                            omisionEdadGrupoArbolMujer7,
                            omisionEdadGrupoArbolMujer6,
                            omisionEdadGrupoArbolMujer5,
                            omisionEdadGrupoArbolMujer4,
                            omisionEdadGrupoArbolMujer3,
                            omisionEdadGrupoArbolMujer2,
                            omisionEdadGrupoArbolMujer1
                        ],
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
                        text: 'Población Ajustada por Omisión 2024'
                    }
                }
            }
        });

        let discapacidadNula = @json($caracterizacionDiscapacidadNula);
        let discapacidadMultiple = @json($caracterizacionPluridiscapacidad);
        let discapacidadMotoraSensorial = @json($caracterizacionDiscapacidadMotoraSensorial);
        let discapacidadOrganica = @json($caracterizacionDiscapacidadOrganica);
        let discapacidadSensorial = @json($caracterizacionDiscapacidadSensorial);
        let discapacidadMental = @json($caracterizacionDiscapacidadMental);

    

        const ctxTortaChart = document.getElementById('tortaChart').getContext('2d');
        const chartTortaChart = new Chart(ctxTortaChart, {
            type: 'pie',
            data: {
                labels: [
                    'Discapacidad Nula: ' + discapacidadNula + '%',
                    'Discapacidad Motora/Sensorial: ' + discapacidadMotoraSensorial + '%',
                    'Pluridiscapacidad: '  + discapacidadMultiple + '%',
                    'Discapacidad Sensorial: ' + discapacidadSensorial + '%' ,
                    'Discapacidad Orgánica: ' + discapacidadOrganica + '%',
                    'Discapacidad Mental: ' + discapacidadMental + '%'
                ],
                datasets: [{
                    data: [discapacidadNula,discapacidadMotoraSensorial, discapacidadMultiple,discapacidadSensorial,  discapacidadOrganica, discapacidadMental],
                    backgroundColor: [
                        'rgba(0, 128, 0, 0.7)',
                        'rgba(173, 255, 47, 0.7)',
                        'rgba(34, 139, 34, 0.7)',
                        'rgba(0, 250, 154, 0.7)',
                        'rgba(144, 238, 144, 0.7)',
                        'rgba(0, 255, 127, 0.7)'
                    ],
                    borderColor: [
                        'rgba(0, 128, 0, 0.7)',
                        'rgba(173, 255, 47, 0.7)',
                        'rgba(34, 139, 34, 0.7)',
                        'rgba(0, 250, 154, 0.7)',
                        'rgba(144, 238, 144, 0.7)',
                        'rgba(0, 255, 127, 0.7)'
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
                    },
                }
            }
        });

        // centros poblados
        let caracterizacionDiscapacidadNulaPorCentroPoblado = @json($caracterizacionDiscapacidadNulaPorCentroPoblado);
        let caracterizacionDiscapacidadMentalPorCentroPoblado = @json($caracterizacionDiscapacidadMentalPorCentroPoblado);
        let caracterizacionDiscapacidadMultiplePorCentroPoblado = @json($caracterizacionDiscapacidadMultiplePorCentroPoblado);
        let caracterizacionDiscapacidadMotoraPorCentroPoblado = @json($caracterizacionDiscapacidadMotoraPorCentroPoblado);
        let caracterizacionDiscapacidadSensorialPorCentroPoblado = @json($caracterizacionDiscapacidadSensorialPorCentroPoblado);
        let caracterizacionDiscapacidadOrganicaPorCentroPoblado = @json($caracterizacionDiscapacidadOrganicaPorCentroPoblado);

        let centrosPoblados = @json($centrosPoblados);



        let caracterizacionesPorTipo = {
            'Discapacidad Mental': caracterizacionDiscapacidadMentalPorCentroPoblado,
            'Discapacidad Orgánica': caracterizacionDiscapacidadOrganicaPorCentroPoblado,
            'Discapacidad Sensorial': caracterizacionDiscapacidadSensorialPorCentroPoblado,
            'Pluridiscapacidad': caracterizacionDiscapacidadMultiplePorCentroPoblado,
            'Discapacidad Motora': caracterizacionDiscapacidadMotoraPorCentroPoblado,
            'Discapacidad Nula': caracterizacionDiscapacidadNulaPorCentroPoblado
        };

        let tiposDiscapacidad = [
            'Discapacidad Mental',
            'Discapacidad Orgánica',
            'Discapacidad Sensorial',
            'Pluridiscapacidad',
            'Discapacidad Motora',
            'Discapacidad Nula'
        ];

        // Función para generar los datos de cada centro poblado dinámicamente
        function getDataForCentroPoblado(centroPoblado) {
            return tiposDiscapacidad.map(tipo => {
                let discapacidadData = caracterizacionesPorTipo[tipo];
                return discapacidadData[centroPoblado] || 0;
            });
        }

        let datasets = centrosPoblados.map((centroPoblado, index) => {
            // Colores dinámicos para cada dataset
            let backgroundColors = [
                'rgba(0, 128, 0, 0.7)',
                'rgba(173, 255, 47, 0.7)',
                'rgba(34, 139, 34, 0.7)',
                'rgba(0, 250, 154, 0.7)',
                'rgba(144, 238, 144, 0.7)',
                'rgba(0, 255, 127, 0.7)'
            ];
            
            return {
                label: centroPoblado,
                data: getDataForCentroPoblado(centroPoblado),
                backgroundColor: backgroundColors[index] // Asignar un color diferente a cada centro poblado
            };
        });

        const ctxChartCentrosPoblados = document.getElementById('chartCentrosPoblados').getContext('2d');
        const chartChartCentrosPoblados = new Chart(ctxChartCentrosPoblados, {
            type: 'bar',
            data: {
                labels: tiposDiscapacidad,
                datasets: datasets
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

        let caracterizacionLeerHombreSiGrupo1 = @json($caracterizacionLeerHombreSiGrupo1);
        let caracterizacionLeerHombreNoGrupo1 = @json($caracterizacionLeerHombreNoGrupo1);
        let caracterizacionLeerMujerSiGrupo1 = @json($caracterizacionLeerMujerSiGrupo1);
        let caracterizacionLeerMujerNoGrupo1 = @json($caracterizacionLeerMujerNoGrupo1);

        let caracterizacionLeerHombreSiGrupo2 = @json($caracterizacionLeerHombreSiGrupo2);
        let caracterizacionLeerHombreNoGrupo2 = @json($caracterizacionLeerHombreNoGrupo2);
        let caracterizacionLeerMujerSiGrupo2 = @json($caracterizacionLeerMujerSiGrupo2);
        let caracterizacionLeerMujerNoGrupo2 = @json($caracterizacionLeerMujerNoGrupo2);


        let caracterizacionLeerHombreSiGrupo3 = @json($caracterizacionLeerHombreSiGrupo3);
        let caracterizacionLeerHombreNoGrupo3 = @json($caracterizacionLeerHombreNoGrupo3);
        let caracterizacionLeerMujerSiGrupo3 = @json($caracterizacionLeerMujerSiGrupo3);
        let caracterizacionLeerMujerNoGrupo3 = @json($caracterizacionLeerMujerNoGrupo3);




        const ctx2ChartLeerEscribir = document.getElementById('chartLeerEscribir').getContext('2d');
        const chartChartLeerEscribir = new Chart(ctx2ChartLeerEscribir, {
            type: 'bar',
            data: {
                labels: ['5-14 años', '15-64 años', '65 o mas años'
                ],
                datasets: [{
                        label: 'SI HOMBRE',
                        data: [caracterizacionLeerHombreSiGrupo1, caracterizacionLeerHombreSiGrupo2, caracterizacionLeerHombreSiGrupo3],
                        backgroundColor: 'rgba(0, 128, 0, 0.8)'
                    },
                    {
                        label: 'SI MUJER',
                        data: [caracterizacionLeerMujerSiGrupo1, caracterizacionLeerMujerSiGrupo2, caracterizacionLeerMujerSiGrupo3],
                        backgroundColor: 'rgba(0, 128, 0, 0.5)',
                        borderWidth: 1,
                        borderColor: 'rgba(0, 128, 0, 1)',
                        borderDash: [5, 5]
                    },
                    {
                        label: 'NO HOMBRE',
                        data: [caracterizacionLeerHombreNoGrupo1, caracterizacionLeerHombreNoGrupo2, caracterizacionLeerHombreNoGrupo3],
                        backgroundColor: 'rgba(0, 128, 0, 0.3)',
                        borderWidth: 1,
                        borderColor: 'rgba(0, 128, 0, 1)',
                        borderDash: [10, 5]
                    },
                    {
                        label: 'NO MUJER',
                        data: [caracterizacionLeerMujerNoGrupo1, caracterizacionLeerMujerNoGrupo2, caracterizacionLeerMujerNoGrupo3],
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


        let caracterizacionEscolarHombreSiGrupo1 = @json($caracterizacionEscolarHombreSiGrupo1);
        let caracterizacionEscolarMujerSiGrupo1 = @json($caracterizacionEscolarMujerSiGrupo1);

        let caracterizacionEscolarHombreSiGrupo2 = @json($caracterizacionEscolarHombreSiGrupo2);
        let caracterizacionEscolarMujerSiGrupo2 = @json($caracterizacionEscolarMujerSiGrupo2);

        let caracterizacionEscolarHombreSiGrupo3 = @json($caracterizacionEscolarHombreSiGrupo3);
        let caracterizacionEscolarMujerSiGrupo3 = @json($caracterizacionEscolarMujerSiGrupo3);

        const ctxChartAsistenciaEscolar = document.getElementById('chartAsistenciaEscolar').getContext('2d');
        const chartChartAsistenciaEscolar = new Chart(ctxChartAsistenciaEscolar, {
            type: 'bar',
            data: {
                labels: ['65 y + años', '15-64 años', '5-14 años'], // Grupos de edad
                datasets: [{
                        label: 'Hombres',
                        data: [caracterizacionEscolarHombreSiGrupo1, caracterizacionEscolarHombreSiGrupo2, caracterizacionEscolarHombreSiGrupo3], // Datos para hombres en cada grupo de edad
                        backgroundColor: 'rgba(0, 128, 0, 0.8)' // Color sólido para los hombres
                    },
                    {
                        label: 'Mujeres',
                        data: [caracterizacionEscolarMujerSiGrupo1, caracterizacionEscolarMujerSiGrupo2, caracterizacionEscolarMujerSiGrupo3], // Datos para mujeres en cada grupo de edad
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

        let porcentajeViviendasResidencial = @json($totalResidencial);
        let porcentajeViviendasNoResidencial = @json($totalNoResidencial);
        let porcentajeViviendasMixta = @json($totalMixto);



        const ctxChartUsoVivienda = document.getElementById('chartUsoVivienda').getContext('2d');
        const chartChartUsoVivienda = new Chart(ctxChartUsoVivienda, {
            type: 'bar',
            data: {
                labels: ['Residencial', 'No residencial', 'Mixto'],
                datasets: [{
                    label: 'Porcentaje de uso',
                    data: [porcentajeViviendasResidencial, porcentajeViviendasNoResidencial, porcentajeViviendasMixta],
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

        let servicioPublicoGasPorcentaje = @json($servicioPublicoGasPorcentaje);
        let servicioPublicoElectricoPorcentaje = @json($servicioPublicoElectricoPorcentaje);
        let servicioPublicoAlcantarilladoPorcentaje = @json($servicioPublicoAlcantarilladoPorcentaje);
        let servicioPublicoAcueductoPorcentaje = @json($servicioPublicoAcueductoPorcentaje);
        let servicioPublicoBasurasPorcentaje = @json($servicioPublicoBasurasPorcentaje);
        let servicioPublicoInternetPorcentaje = @json($servicioPublicoInternetPorcentaje);

        


        const ctxChartServiciosPublicos = document.getElementById('chartServiciosPublicos').getContext('2d');
        const chartChartServiciosPublicos = new Chart(ctxChartServiciosPublicos, {
            type: 'bar',
            data: {
                labels: [
                    'Energía Eléctrica: ' + servicioPublicoElectricoPorcentaje +'%', 
                    'Acueducto: ' + servicioPublicoAcueductoPorcentaje +'%', 
                    'Alcantarillado: ' + servicioPublicoAlcantarilladoPorcentaje +'%', 
                    'Gas Natural: ' + servicioPublicoGasPorcentaje +'%',
                    'Recolección de Basuras: ' + servicioPublicoBasurasPorcentaje +'%', 
                    'Internet: ' + servicioPublicoInternetPorcentaje +'%'
                ],
                datasets: [{
                    label: 'Porcentaje de uso',
                    data: [servicioPublicoElectricoPorcentaje, servicioPublicoAcueductoPorcentaje, servicioPublicoAlcantarilladoPorcentaje, servicioPublicoGasPorcentaje, servicioPublicoBasurasPorcentaje, servicioPublicoInternetPorcentaje],
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
