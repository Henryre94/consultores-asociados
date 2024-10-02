<!DOCTYPE html>

<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Pdf-file</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 12px;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .info-block p {
            margin: 5px 0;
        }

        table {
            width: 100%;
        }

        td {
            padding: 8px;
            border: 1px solid rgb(191, 191, 191);
            border-collapse: collapse;
        
        }

        thead {
            padding: 8px;
            background-color: rgb(58, 147, 177);
            border-radius: 5px;

        }




    </style>
</head>



<body style="font-family:Arial, Helvetica, sans-serif">
    <div class="container">
        <div>
            <div>
                <div style="text-align: center;">
                    @if (public_path('storage/images/consultores_icon.jpg'))
                        <img src="{{ public_path('storage/images/consultores_icon.jpg') }}"
                            alt="Consultores Asociados S.A.S. Logo" class="w-32 h-auto">
                    @else
                        <div></div>
                    @endif
                    @if (file_exists(public_path('storage/images/alcaldia_icon.jpg')))
                        <img src="{{ public_path('storage/images/alcaldia_icon.jpg') }}" alt="Mapa de la alcaldia"
                            class="w-32 h-32">
                    @else
                        <div></div>
                    @endif

                </div>

            </div>
            <div>
                <p style="text-align: center;">
                    CARACTERIZACIÓN PROBLACIONAL {{ $configuration->alcaldia }} - {{ $configuration->departamento }}
                    2024
                </p>
            </div>
            <div>
                <p>
                    Formulario FICHA DE CARACTERIZACIÓN POBLACIONAL - {{ $configuration->alcaldia }}
                </p>
            </div>
            <div style="width: auto; margin-top: 8px;">
                <table>
                    <thead >
                        <tr>
                            <th>USO Y TRATAMIENTO DE DATOS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <strong>La negativa de suministrar la totalidad de la información solicitada impedirá su
                                    registro en la base de datos
                                    Municipal. Los datos de carácter personal serán objeto de tratamiento por parte de
                                    la Alcaldía Municipal de
                                    {{ $configuration->alcaldia }} - Departamento del {{ $configuration->departamento }} de acuerdo con lo establecido en la Ley 1581 de
                                    2012 y el Decreto 1377
                                    de 2013 o las normas que lo modifiquen. El Municipio actuará como responsable del
                                    tratamiento de datos
                                    personales, de acuerdo con la política de tratamiento de datos de la entidad. La
                                    información registrada en la
                                    caracterización de población y los datos personales serán utilizados para orientar
                                    las políticas sociales del
                                    Municipio.
                                </strong>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Ficha No.: </strong> {{ $diligenciamiento->ficha_no }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Foto Sticker:</strong>
                                <div style="text-align: center;">
                                    @if (strpos($diligenciamiento->foto_sticker, 'https://') !== false)
                                        <img src="{{ $diligenciamiento->foto_sticker }}" alt="Foto Sticker"
                                            class="w-64 h-64">
                                    @elseif ($diligenciamiento->foto_sticker === null)
                                        <div></div>
                                    @else
                                        <img src="{{ public_path('storage/') . $diligenciamiento->foto_sticker }}"
                                            alt="Foto del sticler" class="w-64 h-64">
                                    @endif
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Foto Unidad Residencial: </strong>
                                <div style="text-align: center;">
                                    @if (strpos($diligenciamiento->foto_unidad_residencial, 'https://') !== false)
                                        <img src="{{ $diligenciamiento->foto_unidad_residencial }}" alt="Foto de Unidad residencial"
                                            class="w-64 h-64">
                                    @elseif ($diligenciamiento->foto_unidad_residencial === "N/A")
                                        <div></div>
                                    @else
                                        '<img src="{{ public_path('storage/') . $diligenciamiento->foto_unidad_residencial }}"
                                            alt="Foto del sticler" class="w-64 h-64">'
                                    @endif
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div style="width: auto; margin-top: 8px; ">
                <table>
                    <thead >
                        <tr>
                            <th>SECCIÓN A</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <strong>Departamento : </strong> {{ $diligenciamiento->departamento }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Municipio : </strong> {{ $diligenciamiento->municipio }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Centro Poblado : </strong> {{ $diligenciamiento->centro_poblado }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Dirección : </strong> {{ $diligenciamiento->direccion }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Barrio : </strong> {{ $diligenciamiento->barrio }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Declaración juramentada: </strong>
                                {{ $diligenciamiento->declaracion_juramentada }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Primer Nombre : </strong> {{ $diligenciamiento->primer_nombre }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Segundo Nombre:</strong> {{ $diligenciamiento->segundo_nombre }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Primer Apellido:</strong> {{ $diligenciamiento->primer_apellido }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Segundo Apellido: </strong> {{ $diligenciamiento->segundo_apellido }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Excepciones:</strong> {{ $diligenciamiento->excepciones }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Firma :</strong>
                                @if ($diligenciamiento->firma === 1)
                                    SI
                                @else
                                    NO
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Firma:</strong>
                                <div style="text-align: center;">
                                    @if (strpos($diligenciamiento->firma_link, 'https://') !== false)
                                        <img src="{{ $diligenciamiento->firma_link }}" alt="Foto Sticker"
                                            class="w-64 h-64">
                                    @elseif ($diligenciamiento->foto_unidad_residencial === "N/A")
                                        <div></div>
                                    @else
                                        <img src="{{ public_path('storage/') . $diligenciamiento->firma_link }}"
                                            alt="Foto del sticler" class="w-64 h-64">
                                    @endif
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Correo Electrónico:</strong> {{ $diligenciamiento->correo_electronico }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Teléfono de Contacto:</strong> {{ $diligenciamiento->telefono_contacto }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div style="width: auto; margin-top: 8px;">
                <table>
                    <thead >
                        <tr>
                            <th>Sección B. Datos de la Vivienda</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <strong>Tipo de Vivienda: </strong> {{ $diligenciamiento->tipo_vivienda }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Material predominante en los pisos: </strong>
                                {{ $diligenciamiento->material_pisos }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Material predominante de las paredes exteriores: </strong>
                                {{ $diligenciamiento->material_paredes }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>¿Con cuáles de los siguientes servicios públicos, privados o comunales cuenta la
                                    vivienda?:<</strong> {{ $diligenciamiento->servicios_publicos }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>¿Con cuántos cuartos, excluyendo sala comedor, cuenta la vivienda? (excluida
                                    cocina, baños, garajes y cuartos
                                    destinados a negocio): </strong> {{ $diligenciamiento->cuartos }}

                        </tr>
                        <tr>
                            <td>
                                <strong>¿Cuántos grupos de personas que manejan su propio presupuesto (hogares) hay en
                                    esta vivienda?: </strong> {{ $diligenciamiento->grupos_presupuesto }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="width: auto; margin-top: 8px;">
                <table>
                    <thead >
                        <tr>
                            <th>Sección C. Datos del hogar (diligencie esta sección para cada uno de los hogares de la
                                vivienda)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <strong>Hogar Número: </strong> {{ $diligenciamiento->hogar_numero }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>De: </strong> {{ $diligenciamiento->hogar_numero }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>La vivienda ocupada por este hogar es: </strong>
                                {{ $diligenciamiento->vivienda_ocupada }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>¿Qué tipo de sanitario utiliza este hogar? </strong>
                                {{ $diligenciamiento->sanitario_tipo }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>El agua para el consumo o preparación de alimentos la obtienen principalmente
                                    de…:</strong> {{ $diligenciamiento->agua_consumo }}
                        </tr>
                        <tr>
                            <td>
                                <strong>¿El agua llega los siete días de la semana?:</strong>
                                @if ($diligenciamiento->agua_7_dias === 1)
                                    SÍ
                                @else
                                    NO
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>En los días que llega el agua, ¿el suministro es de 24 horas?: </strong>
                                @if ($diligenciamiento->agua_24_hora === 1)
                                    SÍ
                                @else
                                    NO
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>¿Dónde se encuentra el sanitario que usan las personas de este hogar?:</strong>
                                {{ $diligenciamiento->ubicacion_sanitario }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>El sanitario que usan las personas de este hogar es: </strong>
                                {{ $diligenciamiento->tipo_sanitario }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>El agua para beber principalmente:</strong> {{ $diligenciamiento->agua_beber }}
                            </td>
                        </tr>
                        <tr>
                            <td><strong>¿Cómo eliminan principalmente la basura en este hogar?: </strong>
                                {{ $diligenciamiento->eliminacion_basura }}</td>
                        </tr>
                        <tr>
                            <td><strong>¿El hogar tiene cocina?: </strong>
                                @if ($diligenciamiento->tiene_cocina === 1)
                                    SÍ
                                @else
                                    NO
                                @endif
                        </tr>
                        <tr>
                            <td><strong>La cocina o sitio para preparar los alimentos es: </strong>
                                {{ $diligenciamiento->ubicacion_cocina }}</td>
                        </tr>
                        <tr>
                            <td><strong>¿Qué energía o combustible utiliza principalmente este hogar para cocinar?:
                                </strong> {{ $diligenciamiento->combustible_cocina }}</td>
                        </tr>
                        <tr>
                            <td><strong>¿Cuáles de los siguientes bienes o servicios posee este hogar?: </strong>
                                {{ $diligenciamiento->bienes_servicios }}</td>
                        </tr>
                        <tr>
                            <td><strong>¿Cuál es el gasto mensual de este hogar en estos conceptos (estime un valor
                                    promedio mensual)?</strong></td>
                        </tr>
                        <tr>
                            <td><strong>Alimentación: </strong> {{ $diligenciamiento->gasto_alimentacion }}</td>
                        </tr>
                        <tr>
                            <td><strong>Transporte (bus, servicio público, taxis): </strong>
                                {{ $diligenciamiento->gasto_transporte }}</td>
                        </tr>
                        <tr>
                            <td><strong>Educación (pensión, transporte escolar, alimentación escolar): </strong>
                                {{ $diligenciamiento->gasto_educacion }}</td>
                        </tr>
                        <tr>
                            <td><strong>Salud (medicamentos, citas médicas, copago, pago EPS): </strong>
                                {{ $diligenciamiento->gasto_salud }}</td>
                        </tr>
                        <tr>
                            <td><strong>Servicios públicos (agua, luz, teléfono fijo, recolección de basuras, gas):
                                </strong> {{ $diligenciamiento->gasto_servicios_publicos }}</td>
                        </tr>
                        <tr>
                            <td><strong>Celular (plan-prepago): </strong> {{ $diligenciamiento->gasto_celular }}</td>
                        </tr>
                        <tr>
                            <td><strong>Arriendo, cuota de amortización o cuota de administración: </strong>
                                {{ $diligenciamiento->gasto_arriendo }}</td>
                        </tr>
                        <tr>
                            <td><strong>Otros (diversión, esparcimiento, deudas, préstamos): </strong>
                                {{ $diligenciamiento->gasto_otros }}</td>
                        </tr>
                        <tr>
                            <td><strong>Suma: </strong> {{ $diligenciamiento->gasto_suma }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="width: auto; margin-top: 8px;">
                <table>
                    <thead >
                        <tr>
                            <th>Sección C. Datos del hogar (condiciones o factores relacionados con riesgo de desastres)
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <strong>¿Cuánto tiempo lleva habitando esta vivienda?: </strong>
                                {{ $diligenciamiento->tiempo_habitando }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Durante el tiempo que lleva habitando su vivienda, ¿ha sido afectada por alguno de
                                    los siguientes eventos? (si el hogar ha sido afectado): </strong> {{ $diligenciamiento->eventos_afectado }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Total de personas con documento válido en el hogar: </strong>
                                {{ $diligenciamiento->total_documentos_validos }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="width: auto; margin-top: 8px;">
                <table>
                    <thead >
                        <tr>
                            <th>Sección D. Antecedentes sociodemográficos. Los miembros del hogar se diligencian en el mismo orden de las variables de parentesco</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="background-color: gray;"><strong>Número de Orden: </strong> 1</td>
                        </tr>
                        <tr>
                            <td><strong>Apellidos Completos: </strong> {{ $diligenciamiento->apellidos_completos }}
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Nombres Completos: </strong> {{ $diligenciamiento->nombres_completos }}</td>
                        </tr>
                        <tr>
                            <td><strong>Sexo: </strong> {{ $diligenciamiento->sexo }}</td>
                        </tr>
                        <tr>
                            <td><strong>Tipo de documento de identidad Nacionales: </strong>
                                {{ $diligenciamiento->tipo_documento_nacionales }}</td>
                        </tr>
                        <tr>
                            <td><strong>Número de documento de identidad: </strong>
                                {{ $diligenciamiento->numero_documento }}</td>
                        </tr>
                        <tr>
                            <td><strong>Fecha de Nacimiento: </strong> {{ $diligenciamiento->fecha_nacimiento }}</td>
                        </tr>
                        <tr>
                            <td><strong>Edad: </strong> {{ $diligenciamiento->edad }}</td>
                        </tr>
                        @foreach ($diligenciamientos as $member)
                            <tr>
                                <td style="background-color: gray;"><strong>Número de Orden: </strong> {{ $loop->iteration + 1 }}</td>
                            </tr>
                            <tr>
                                <td><strong>Apellidos Completos: </strong> {{ $member->apellidos_completos }}
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Nombres Completos: </strong> {{ $member->nombres_completos }}</td>
                            </tr>
                            <tr>
                                <td><strong>Sexo: </strong> {{ $member->sexo }}</td>
                            </tr>
                            <tr>
                                <td><strong>Tipo de documento de identidad Nacionales: </strong>
                                    {{ $member->tipo_documento_nacionales }}</td>
                            </tr>
                            <tr>
                                <td><strong>Número de documento de identidad: </strong>
                                    {{ $member->numero_documento }}</td>
                            </tr>
                            <tr>
                                <td><strong>Fecha de Nacimiento: </strong> {{ $member->fecha_nacimiento }}</td>
                            </tr>
                            <tr>
                                <td><strong>Edad: </strong> {{ $member->edad }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div style="width: auto; margin-top: 8px;">
                <table>
                    <thead >
                        <tr>
                            <th>Sección E. Salud y fecundidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="background-color: gray;"><strong>Número de Orden: </strong> 1</td>
                        </tr>
                        <tr>
                            <td><strong>¿Por enfermedad, accidente o de nacimiento tiene limitantes permanentes para?:
                                </strong> {{ $diligenciamiento->limitantes_permanentes }}</td>
                        </tr>
                        <tr>
                            <td><strong>¿Cuál de los siguientes regímenes de seguridad social en salud está afiliado
                                    como cotizante o beneficiario?: </strong> {{ $diligenciamiento->regimen_salud }}
                            </td>
                        </tr>
                        <tr>
                            <td><strong>En los últimos 30 días, ¿tuvo alguna enfermedad, accidente, problema
                                    odontológico, o algún problema de salud que no haya implicado hospitalización?:
                                </strong> {{ $diligenciamiento->problema_salud_30_dias }}</td>
                        </tr>
                        <tr>
                            <td><strong>¿Acudió a una institución prestadora de servicios de salud, un médico general,
                                    especialista, odontólogo, terapeuta o profesional de la salud?: </strong>
                                {{ $diligenciamiento->acudio_servicios_salud }}</td>
                        </tr>
                        <tr>
                            <td><strong>¿Lo atendieron?: </strong>
                                @if ($diligenciamiento->fue_atendido === 1)
                                    SÍ
                                @else
                                    NO
                                @endif
                            </td>
                        </tr>
                        @foreach ($diligenciamientos as $member)
                        <tr>
                            <td style="background-color: gray;"><strong>Número de Orden: </strong> {{ $loop->iteration + 1 }}</td>
                        </tr>
                        <tr>
                            <td><strong>¿Por enfermedad, accidente o de nacimiento tiene limitantes permanentes para?:
                                </strong> {{ $member->limitantes_permanentes }}</td>
                        </tr>
                        <tr>
                            <td><strong>¿Cuál de los siguientes regímenes de seguridad social en salud está afiliado
                                    como cotizante o beneficiario?: </strong> {{ $member->regimen_salud }}
                            </td>
                        </tr>
                        <tr>
                            <td><strong>En los últimos 30 días, ¿tuvo alguna enfermedad, accidente, problema
                                    odontológico, o algún problema de salud que no haya implicado hospitalización?:
                                </strong> {{ $member->problema_salud_30_dias }}</td>
                        </tr>
                        <tr>
                            <td><strong>¿Acudió a una institución prestadora de servicios de salud, un médico general,
                                    especialista, odontólogo, terapeuta o profesional de la salud?: </strong>
                                {{ $member->acudio_servicios_salud }}</td>
                        </tr>
                        <tr>
                            <td><strong>¿Lo atendieron?: </strong>
                                @if ($member->fue_atendido === 1)
                                    SÍ
                                @else
                                    NO
                                @endif
                            </td>
                        </tr>
                        @endforeach
                            @if ($diligenciamiento->aplica_mujeres_8_59 === 1)
                                <tr>
                                    <td style="background-color: gray;"><strong>Número de Orden: </strong> 1</td>
                                </tr>
                                <tr>
                                    <td><strong>Mujeres 8 años y más (aplica a mujeres entre 8 y 59 años): </strong>
                                        @if ($diligenciamiento->aplica_mujeres_8_59 === 1)
                                            Si
                                        @else
                                            No
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>¿Está embarazada?: </strong>
                                        @if ($diligenciamiento->embarazada === 1)
                                            SÍ
                                        @else
                                            NO
                                        @endif
                                </tr>
                                <tr>
                                    <td><strong>¿Ha tenido hijos nacidos vivos?: </strong> {{ $diligenciamiento->hijos_vivos }}
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>¿Recibe o toma desayuno o almuerzo donde permanece la mayor parte del tiempo
                                            entre semana?: </strong>
                                        @if ($diligenciamiento->donde_permanece_semana === 1)
                                            SÍ
                                        @else
                                            NO
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @foreach ($diligenciamientos as $membersGroup)
                            @if ($member->aplica_mujeres_8_59 === 1)
                                <tr>
                                    <td style="background-color: gray;"><strong>Número de Orden: </strong>{{ $loop->iteration + 1 }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Mujeres 8 años y más (aplica a mujeres entre 8 y 59 años): </strong>
                                        @if ($member->aplica_mujeres_8_59 === 1)
                                            SÍ
                                        @else
                                            SÍ
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>¿Está embarazada?: </strong>
                                        @if ($member->embarazada === 1)
                                            SÍ
                                        @else
                                            NO
                                        @endif
                                </tr>
                                <tr>
                                    <td><strong>¿Ha tenido hijos nacidos vivos?: </strong> {{ $member->hijos_vivos }}
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>¿Recibe o toma desayuno o almuerzo donde permanece la mayor parte del tiempo
                                            entre semana?: </strong>
                                        @if ($member->donde_permanece_semana === 1)
                                            SÍ
                                        @else
                                            NO
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div style="width: auto; margin-top: 8px;">
                @if ($diligenciamiento->edad < 5)
                    <table>
                        <thead >
                            <tr>
                                <th>Sección F. Atención a menores de 5 años</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="background-color: gray;"><strong>Número de Orden: </strong> 1</td>
                            </tr>
                            <tr>
                                <td><strong>Atención a menores de 5 años: </strong> 1</td>
                            </tr>
                            <tr>
                                <td><strong>¿Dónde o con quién permanece durante la mayor parte del tiempo entre semana?:
                                    </strong> {{ $diligenciamiento->donde_permanece_semana }}</td>
                            </tr>
                            <tr>
                                <td><strong>¿Recibe o toma desayuno o almuerzo donde permanece la mayor parte del tiempo
                                        entre semana?: </strong>
                                    @if ($diligenciamiento->donde_permanece_semana === 1)
                                        SÍ
                                    @else
                                        NO
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                @endif
                @foreach ($diligenciamientos as $member)
                    @if ($member->edad < 5)
                        <table>
                            <thead >
                                <tr>
                                    <th>Sección F. Atención a menores de 5 años</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="background-color: gray;"><strong>Número de Orden: </strong>{{ $loop->iteration + 1 }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Atención a menores de 5 años: </strong> 1</td>
                                </tr>
                                <tr>
                                    <td><strong>¿Dónde o con quién permanece durante la mayor parte del tiempo entre semana?:
                                        </strong> {{ $diligenciamiento->donde_permanece_semana }}</td>
                                </tr>
                                <tr>
                                    <td><strong>¿Recibe o toma desayuno o almuerzo donde permanece la mayor parte del tiempo
                                            entre semana?: </strong>
                                        @if ($diligenciamiento->donde_permanece_semana === 1)
                                            SÍ
                                        @else
                                            NO
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                @endforeach
            </div>
            <div style="width: auto; margin-top: 8px;">
                @if ($diligenciamiento->edad >= 5)
                <table>
                    <thead >
                        <tr>
                            <th>Sección G. Educación - Persona de 5 años y más</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="background-color: gray;"><strong>Número de Orden: </strong> 1</td>
                        </tr>
                        <tr>
                            <td><strong>¿Sabe leer y escribir?: </strong>
                                @if ($diligenciamiento->sabe_leer_escribir === 1)
                                    SÍ
                                @else
                                    NO
                                @endif
                        </tr>
                        <tr>
                            <td><strong>¿Actualmente estudia (asiste a preescolar, colegio o universidad)?: </strong>
                                @if ($diligenciamiento->actualmente_estudia === 1)
                                    SÍ
                                @else
                                    NO
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><strong>¿Cuál es el nivel educativo más alto alcanzado y el último año o grado aprobado
                                    en ese nivel?: </strong> {{ $diligenciamiento->nivel_educativo }}</td>
                        </tr>
                        <tr>
                            <td><strong>¿Cotiza a un fondo de pensiones?: </strong>
                                @if ($diligenciamiento->cotiza_pensiones === 1)
                                    SÍ
                                @else
                                    NO
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
                @endif
                @foreach ($diligenciamientos as $member)
                    @if ($member->edad >= 5)
                        <table>
                            <thead >
                                <tr>
                                    <th>Sección G. Educación - Persona de 5 años y más</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="background-color: gray;"><strong>Número de Orden: </strong>{{ $loop->iteration + 1 }}</td>
                                </tr>
                                <tr>
                                    <td><strong>¿Sabe leer y escribir?: </strong>
                                        @if ($member->sabe_leer_escribir === 1)
                                            SÍ
                                        @else
                                            NO
                                        @endif
                                </tr>
                                <tr>
                                    <td><strong>¿Actualmente estudia (asiste a preescolar, colegio o universidad)?: </strong>
                                        @if ($member->actualmente_estudia === 1)
                                            SÍ
                                        @else
                                            NO
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>¿Cuál es el nivel educativo más alto alcanzado y el último año o grado aprobado
                                            en ese nivel?: </strong> {{ $member->nivel_educativo }}</td>
                                </tr>
                                <tr>
                                    <td><strong>¿Cotiza a un fondo de pensiones?: </strong>
                                        @if ($member->cotiza_pensiones === 1)
                                            SÍ
                                        @else
                                            NO
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                @endforeach
                
            </div>
            <div style="width: auto; margin-top: 8px;">
                <table>
                    <thead >
                        <tr>
                            <th>Sección H. Ocupación e Ingresos - Persona de 8 años y más</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="background-color: gray;"><strong>Número de Orden: </strong> 1</td>
                        </tr>
                        <tr>
                            <td><strong>¿Cuál fue su actividad principal en el último mes?: </strong>
                                {{ $diligenciamiento->actividad_principal }}</td>
                        </tr>
                        <tr>
                            <td><strong>En ese trabajo… es: </strong> {{ $diligenciamiento->condicion_trabajo }}</td>
                        </tr>
                        <tr>
                            <td><strong>¿Recibe algún subsidio o ayudas del Estado?: </strong>
                                {{ $diligenciamiento->recibe_subsidio }}</td>
                        </tr>
                        @foreach ($diligenciamientos as $member)
                            <tr>
                                <td style="background-color: gray;"><strong>Número de Orden: </strong>{{ $loop->iteration + 1 }}</td>
                            </tr>
                            <tr>
                                <td><strong>¿Cuál fue su actividad principal en el último mes?: </strong>
                                    {{ $member->actividad_principal }}</td>
                            </tr>
                            <tr>
                                <td><strong>En ese trabajo… es: </strong> {{ $member->condicion_trabajo }}</td>
                            </tr>
                            <tr>
                                <td><strong>¿Recibe algún subsidio o ayudas del Estado?: </strong>
                                    {{ $member->recibe_subsidio }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div style="width: auto; margin-top: 8px;">
                <table>
                    <thead >
                        <tr>
                            <th>Sección I. Vulnerabilidad Social</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="background-color: gray;"><strong>Número de Orden: </strong> 1</td>
                        </tr>
                        <tr>
                            <td><strong>Pertenece a algun grupo poblacional vulnerable?:</strong>
                                {{ $diligenciamiento->grupo_vulnerable }}</td>
                        </tr>
                        <tr>
                            <td><strong>¿Ha experimentado usted o algún miembro de su hogar alguna forma de
                                    discriminación en los últimos 12
                                    meses? (racial, étnica, de género, orientación sexual, etc.):</strong>
                                @if ($diligenciamiento->experimento_discriminacion === 1)
                                    SÍ
                                @else
                                    NO
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><strong>¿Ha sido víctima de violencia física, emocional o sexual en los últimos 12
                                    meses?: </strong>
                                @if ($diligenciamiento->victima_violencian === 1)
                                    SÍ
                                @else
                                    NO
                                @endif
                            </td>
                        </tr>
                        @foreach ($diligenciamientos as $member)
                            <tr>
                                <td style="background-color: gray;"><strong>Número de Orden: </strong>{{ $loop->iteration + 1 }} </td>
                            </tr>
                            <tr>
                                <td><strong>Pertenece a algun grupo poblacional vulnerable?:</strong>
                                    {{ $member->grupo_vulnerable }}</td>
                            </tr>
                            <tr>
                                <td><strong>¿Ha experimentado usted o algún miembro de su hogar alguna forma de
                                        discriminación en los últimos 12
                                        meses? (racial, étnica, de género, orientación sexual, etc.):</strong>
                                    @if ($member->experimento_discriminacion === 1)
                                        SÍ
                                    @else
                                        NO
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>¿Ha sido víctima de violencia física, emocional o sexual en los últimos 12
                                        meses?: </strong>
                                    @if ($member->victima_violencian === 1)
                                        SÍ
                                    @else
                                        NO
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
            <div style="width: auto; margin-top: 8px;">
                <table>
                    <thead >
                        <tr>
                            <th>Información Adicional</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Usted participo en las ultimas contiendas electorales?: </strong>
                                @if ($diligenciamiento->participo_elecciones === 1)
                                    SÍ
                                @else
                                    NO
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><strong>¿En que lugar de Votación?: C</strong> {{ $diligenciamiento->lugar_votacion }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="width: auto; margin-top: 8px;">
                <table>
                    <tbody>
                        <tr>
                            <td><strong>Fecha diligenciamiento:
                                </strong>{{ $diligenciamiento->fecha_diligenciamiento }}</td>
                        </tr>
                        <tr>
                            <td><strong>Usuario: </strong> {{ $diligenciamiento->user_id }}</td>
                        </tr>
                        <tr>
                            <td><strong>Latitud: </strong> {{ $diligenciamiento->gps_latitude }}</td>
                        </tr>
                        <tr>
                            <td><strong>Longitud: </strong> {{ $diligenciamiento->gps_longitude }}</td>
                        </tr>
                        <tr>
                            <td><strong>Fecha generación: </strong> {{ $diligenciamiento->fecha_operacion }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div style="text-align: left;">
            @if (file_exists(public_path('storage/images/alcaldia_icon.jpg')))
                <img src="{{ public_path('storage/images/alcaldia_icon.jpg') }}" alt="Mapa de la alcaldia"
                    class="w-32 h-32">
            @else
                <div></div>
            @endif
        </div>
</body>

</html>
