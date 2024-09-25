<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <title>Report File</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <style>
        body {
            font-family: 	font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
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

        .poblacion-etnica{
            color: black; 
            font-size: 1.0rem; 
        }

        .poblacion-etnica-valor{
            color: #4B5563; 
            font-weight: bold;
            font-size: 1.0rem; 
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
                                    <img src="storage/images/consultores_icon.jpg" alt="Consultores Asociados S.A.S. Logo" style="width: 8rem; height: auto;">
                                @else
                                    <div></div>
                                @endif
                            </td>
                            <td style="text-align: center;">
                                @if (file_exists(public_path('storage/images/alcaldia_icon.jpg')))
                                    <img src="storage/images/alcaldia_icon.jpg" alt="Mapa de la alcaldia" style="width: 8rem; height: auto;">
                                @else
                                    <div></div>
                                @endif
                            </td>
                            <td style="text-align: center;">
                                @if (file_exists(public_path('storage/images/departamento_map.jpg')))
                                    <img src="storage/images/departamento_map.jpg" alt="Mapa de la alcaldia" style="width: 8rem; height: auto;">
                                @else
                                    <div></div>
                                @endif
                            </td>
                        </tr>
                    </table>

                    <div style="text-align: center; font-size: 1.0rem; font-weight: bold; border-bottom: 1px solid black; padding: 0.5rem;">
                        Caracterización de Población Vulnerable
                        El Paso Departamento del Cesar 2024
                    </div>

                    <div style="font-size: 1.0rem; font-weight: bold; margin-bottom: 0.25rem;">
                        Municipio/Departamento
                    </div>
                </div>

                <div>
                    <table style="width: 100%; margin-top: 1rem; height: 200px;">
                        <tr>
                            <td style="padding: 0.5rem; width: 50%; ">
                                <div style="text-align: center; font-size: 1.0rem; font-weight: bold; margin-bottom: 0.5rem;">
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
                                        <td style="font-size: 1.0rem; font-weight: bold;">Población total ajustada por omisión:</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 2px solid #4A5568; padding: 0.5rem; text-align: center;">
                                            <p style="font-size: 1.0rem; font-weight: bold; color: #4A5568;">37.531</p>
                                        </td>
                                    </tr>
                                </table>

                                <table style="width: 100%; margin-bottom: 1rem;">
                                    <tr>
                                        <td style="width: 50%; text-align: center;">
                                            <table>
                                                <tr>
                                                    <td rowspan="2" style="padding-right: 0.5rem;">
                                                        <img src="storage/images/woman.png" alt="Logo Mujer" style="width: 3rem; height: 3rem; object-fit: cover; margin-bottom: 0.5rem;">
                                                    </td>
                                                    <td style="font-size: 1.0rem; color: #4A5568;">37.531</td>
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
                                                        <img src="storage/images/man.png" alt="Logo Hombre" style="width: 3rem; height: 3rem; object-fit: cover; margin-bottom: 0.5rem;">
                                                    </td>
                                                    <td style="font-size: 1.0rem; color: #4A5568;">37.531</td>
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
                                <div style="text-align: center; font-size: 1.0rem; font-weight: bold; margin-bottom: 0.5rem;">
                                    Omisión total: 7,8%
                                </div>
                                <div style="border: 2px dashed #A0AEC0; background-color: #EDF2F7; padding: 1rem; height: 20rem; text-align: center;">
                                    Adicionar gráfica
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                
                <div>
                    <table style="width: 100%; border-spacing: 1rem;">
                        <tr>
                            <td style="padding: 1rem; text-align: center; width: 50%;">
                                <div style="border: 2px dashed #A0AEC0; background-color: #EDF2F7; padding: 1rem; height: 20rem;">
                                    Adicionar gráfica
                                </div>
                                <div>Caracterización de Población Vulnerable 2024</div>
                            </td>
                            <td style="padding: 0.5rem; text-align: center; width: 50%;">
                                <div style="border: 2px dashed #A0AEC0; background-color: #EDF2F7; padding: 1rem; height: 20rem;">
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
                                        <p class="poblacion-etnica-valor">0.3</p>
                                    </td>
                                    <td style="text-align: center;">
                                        <p class="poblacion-etnica">ROM (Gitanos)</p>
                                        <p class="poblacion-etnica-valor">0.3</p>
                                    </td>
                                    <td style="text-align: center; border-bottom: 2px solid #CBD5E0;">
                                        <p class="poblacion-etnica">Raizales</p>
                                        <p class="poblacion-etnica-valor">0.3</p>
                                    </td>
                                    <td style="text-align: center; border-bottom: 2px solid #CBD5E0;">
                                        <p class="poblacion-etnica">Palenqueros</p>
                                        <p class="poblacion-etnica-valor">0.3</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">
                                        <p class="poblacion-etnica">Afrocolombianos</p>
                                        <p class="poblacion-etnica-valor">0.3</p>
                                    </td>
                                    <td style="text-align: center;">
                                        <p class="poblacion-etnica">Indígenas</p>
                                        <p class="poblacion-etnica-valor">0.3</p>
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
                            Nota: el porcentaje de población (denominador) no incluye a las personas que no respondieron esta pregunta, es decir, no incluye “sin información”. De un total de 34.620 personas efectivamente censadas, 153 (0,4%) no respondieron esta pregunta de autorreconocimiento (pertenencia étnica).
                        </td>
                    </tr>
                </table>
            </div>

            <div>
                <table style="width: 100%; border-spacing: 1rem;">
                    <tr>
                        <td style="padding: 1rem; text-align: center;">
                            <div style="border: 2px dashed #A0AEC0; background-color: #EDF2F7; padding: 1rem; height: 20rem;">
                                Adicionar gráfica
                            </div>
                        </td>
                        <td style="padding: 1rem; text-align: center;">
                            <div style="border: 2px dashed #A0AEC0; background-color: #EDF2F7; padding: 1rem; height: 20rem;">
                                Adicionar gráfica
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <div>
                <table style="width: 100%;">
                    <tr>
                        <td style="font-size: 1.0rem; font-weight: bold; width: 70%;">
                            Alfabetismo: leer y escribir
                        </td>
                        <td style="text-align: center;">
                            <table style="width: 100%; border-spacing: 1rem;">
                                <tr>
                                    <td style="text-align: center;">
                                        <img src="storage/images/man.png" alt="Logo Hombre" style="width: 2rem; height: 2rem;">
                                    </td>
                                    <td style="text-align: center;">
                                        <img src="storage/images/woman.png" alt="Logo Mujer" style="width: 2rem; height: 2rem;">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center; padding-top: 1rem;">
                            <div style="border: 2px dashed #A0AEC0; background-color: #EDF2F7; padding: 1rem; height: 20rem;">
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
                                        <img src="storage/images/man.png" alt="Logo Hombre" style="width: 2rem; height: 2rem;">
                                    </td>
                                    <td style="text-align: center;">
                                        <img src="storage/images/woman.png" alt="Logo Mujer" style="width: 2rem; height: 2rem;">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center; padding-top: 1rem;">
                            <div style="border: 2px dashed #A0AEC0; background-color: #EDF2F7; padding: 1rem; height: 20rem;">
                                Adicionar gráfica
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>