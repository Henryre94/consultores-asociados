<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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

        th {
            padding: 8px;
            background-color: rgb(58, 147, 177);
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div >
            <div >
                <div style="text-align: center;">
                    <img src="{{ public_path('storage/images/consultores_icon.png') }}" alt="Consultores Asociados S.A.S. Logo" class="w-32 h-auto">
                    <img src="{{ public_path('storage/images/alcaldia_icon.jpg') }}" alt="Mapa del departamento" class="w-32 h-32">
                </div>

            </div>
            <div>
                <p style="text-align: center;">
                    CARACTERIZACIÓN PROBLACIONAL CHIBOLO - MAGDALENA 2024
                </p>
            </div>
            <div>
                <p>
                    Formulario FICHA DE CARACTERIZACIÓN POBLACIONAL - CHIBOLO
                </p>
            </div>
            <div style="width: auto; margin-top: 8px;">
                <table>
                    <thead style="background-color: gray; text-align: left; ">
                        <tr>
                            <th>USO Y TRATAMIENTO DE DATOS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <strong>La negativa de suministrar la totalidad de la información solicitada impedirá su registro en la base de datos
                                    Municipal. Los datos de carácter personal serán objeto de tratamiento por parte de la Alcaldía Municipal de
                                    Chibolo - Departamento del Magdalena de acuerdo con lo establecido en la Ley 1581 de 2012 y el Decreto 1377
                                    de 2013 o las normas que lo modifiquen. El Municipio actuará como responsable del tratamiento de datos
                                    personales, de acuerdo con la política de tratamiento de datos de la entidad. La información registrada en la
                                    caracterización de población y los datos personales serán utilizados para orientar las políticas sociales del
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
                                <strong>Foto Sticker: </strong>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Foto Unidad Residencial: </strong>                         
                            </td>
                        </tr>
       
                    </tbody>
                </table>
            </div>
            <div style="width: auto; margin-top: 8px;">
                    <table>
                        <thead style="background-color: gray; text-align: left; ">
                            <tr>
                                <th>SECCION A</th>
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
                                    <strong>Municpio : </strong> {{ $diligenciamiento->municipio }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Centro Poblado : </strong> {{ $diligenciamiento->centro_poblado }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Direccion : </strong> {{ $diligenciamiento->direccion }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Barrio : </strong> {{ $diligenciamiento->barrio }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                      <strong>Declaración juramentada: bajo la gravedad de juramento declaro que la información suministrada es verdadera
                                        y autorizo que sea verificada con otras fuentes de información y que se actualice de forma automática a través
                                        del cruce de registros administrativos u otras fuentes que la Alcaldia Municipal defina. Cualquier presunta
                                        falsedad identificada a través de cruces de bases de datos generará la exclusión del Sistema,
                                        independientemente de las acciones legales que haya lugar.</strong>
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
                                    <strong>Primer Apellido:</strong> {{ $diligenciamiento->primer_nombre }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Segundo Apellido: </strong> {{ $diligenciamiento->primer_apellido }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Excepciones:</strong> {{ $diligenciamiento->excepciones }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Firma :</strong> {{ $diligenciamiento->firma }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Firma:</strong> Aqui imagen de la firma
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Correo Electronico:</strong> {{ $diligenciamiento->correo_electronico }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Telefono de Contacto:</strong> {{ $diligenciamiento->telefono_contacto}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>
            <div style="width: auto; margin-top: 8px;">
                <table>
                    <thead style="background-color: gray; text-align: left; ">
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
                                <strong>Material predominante en los pisos: </strong> {{ $diligenciamiento->material_pisos }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Material predominante de las paredes exteriores:  </strong> {{ $diligenciamiento->material_paredes }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>¿Con cuales de los siguientes servicios públicos, privados o comunales cuenta la vivienda?: </strong> {{ $diligenciamiento->servicios_publicos }}                             
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>¿Con cuantos cuartos, excluyendo sala comedor, cuenta la vivienda? (excluida cocina, baños, garajes y cuartos
                                    destinados a negocio): </strong> {{ $diligenciamiento->cuartos }}

                        </tr>
                        <tr>
                            <td>
                                <strong>¿Cuántos grupos de personas que manejan su propio presupuesto (hogares)hay en esta vivienda?: </strong> {{ $diligenciamiento->grupos_presupuesto }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="width: auto; margin-top: 8px;">
                <table>
                    <thead style="background-color: gray; text-align: left; ">
                        <tr>
                            <th>Sección C. Datos del hogar (diligencie esta sección para cada uno de los hogares de la vivienda)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <strong>Hogar Numero: </strong> {{ $diligenciamiento->hogar_numero }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>De: </strong> {{ $diligenciamiento->hogar_numero }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>La vivienda ocupada por este hogar es:  </strong> {{ $diligenciamiento->vivienda_ocupada }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>¿Qué tipo de sanitario utiliza este hogar? </strong> {{ $diligenciamiento->sanitario_tipo }}                            
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>El agua para el consumo o preparación de alimentos la obtienen principalmente de…:</strong> {{ $diligenciamiento->agua_consumo }}
                        </tr>
                        <tr>
                            <td>
                                <strong>¿El agua llega los siete dias de la semana?: </strong>{{ $diligenciamiento->agua_7_dias }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>En los días que llega el agua, ¿el suministro es de 24 horas?: </strong> {{ $diligenciamiento->agua_24_horas }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>¿Donde se encuentra el sanitario que usan las personas de este hogar?: </strong> {{ $diligenciamiento->ubicacion_sanitario }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>El sanitario que usan las personas de este hogar es: </strong> {{ $diligenciamiento->tipo_sanitario }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>El agua para beber principalmente:</strong> {{ $diligenciamiento->agua_beber }}
                            </td>
                        </tr>
                        <tr>
                            <td><strong>¿Cómo eliminan principalmente la basura en este hogar?: </strong> {{ $diligenciamiento->eliminacion_basura }}</td>
                        </tr>
                        <tr>
                            <td><strong>¿El hogar tiene cocina?: </strong> {{ $diligenciamiento->tiene_cocina }}</td>
                        </tr>
                        <tr>
                            <td><strong>La cocina o sitio para preparar los alimentos es: </strong> {{ $diligenciamiento->ubicacion_cocina }}</td>
                        </tr>
                        <tr>
                            <td><strong>¿Qué energía o combustible utiliza principalmente este hogar para cocinar?: </strong> {{ $diligenciamiento->combustible_cocina }}</td>
                        </tr>
                        <tr>
                            <td><strong>¿Cuáles de los siguientes bienes o servicios posee este hogar?: </strong> Ninguna de las Anteriores</td>
                        </tr>
                        <tr>
                            <td><strong>¿Cuál es el gasto mensual de este hogar en estos conceptos (estime un valor promedio mensual)?</strong></td>
                        </tr>
                        <tr>
                            <td><strong>Alimentación: </strong> {{ $diligenciamiento->gasto_alimentacion }}</td>
                        </tr>
                        <tr>
                            <td><strong>Transporte (bus, servicio público, taxis): </strong> {{ $diligenciamiento->gasto_transporte }}</td>
                        </tr>
                        <tr>
                            <td><strong>Educación (pensión, transporte escolar, alimentación escolar): </strong> {{ $diligenciamiento->gasto_educacion }}</td>
                        </tr>
                        <tr>
                            <td><strong>Salud (medicamentos, citas médicas, copago, pago EPS): </strong> {{ $diligenciamiento->gasto_salud }}</td>
                        </tr>
                        <tr>
                            <td><strong>Servicios públicos (agua, luz, teléfono fijo, recolección de basuras, gas): </strong> {{ $diligenciamiento->gasto_servicios_publicos }}</td>
                        </tr>
                        <tr>
                            <td><strong>Celular (plan-prepago): </strong> {{ $diligenciamiento->gasto_celular }}</td>
                        </tr>
                        <tr>
                            <td><strong>Arriendo, cuota de amortización o cuota de administración: </strong> {{ $diligenciamiento->gasto_arriendo }}</td>
                        </tr>
                        <tr>
                            <td><strong>Otros (diversión, esparcimiento, deudas, préstamos): </strong> {{ $diligenciamiento->gasto_otros }}</td>
                        </tr>
                        <tr>
                            <td><strong>Suma: </strong> {{ $diligenciamiento->gasto_suma }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="width: auto; margin-top: 8px;">
                <table>
                    <thead style="background-color: gray; text-align: left; ">
                        <tr>
                            <th>Sección C. Datos del hogar (condiciones o factores relacionados con riesgo de desastres) </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <strong>¿Cuánto tiempo lleva habitando esta vivienda?:  </strong> {{ $diligenciamiento->tiempo_habitando }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Durante el tiempo que lleva habitando su vivienda ha sido afectada por alguno de los siguientes eventos? (si el
                                    hogar ha sido afectado):  </strong> {{ $diligenciamiento->eventos_afectado }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Total de personas con documento válido en el hogar:  </strong> {{ $diligenciamiento->total_documentos_validos }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="width: auto; margin-top: 8px;">
                <table>
                    <thead style="background-color: gray; text-align: left; ">
                        <tr>
                            <th>Sección D. Antecedentes sociodemográficos. Los miembros del hogar se diligencian en el mismo orden de las
                                variables de parentesco</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Número de Orden: </strong> 1</td>
                        </tr>
                        <tr>
                            <td><strong>Apellidos Completos: </strong> {{ $diligenciamiento->apellidos_completos }}</td>
                        </tr>
                        <tr>
                            <td><strong>Nombres Completos: </strong> {{ $diligenciamiento->nombres_completos }}</td>
                        </tr>
                        <tr>
                            <td><strong>Sexo: </strong> {{ $diligenciamiento->sexo }}</td>
                        </tr>
                        <tr>
                            <td><strong>Tipo de documento de identidad Nacionales: </strong> {{ $diligenciamiento->tipo_documento_nacionales }}</td>
                        </tr>
                        <tr>
                            <td><strong>Número de documento de identidad: </strong> {{ $diligenciamiento->numero_documento }}</td>
                        </tr>
                        <tr>
                            <td><strong>Fecha de Nacimiento: </strong> {{ $diligenciamiento->fecha_nacimiento }}</td>
                        </tr>
                        <tr>
                            <td><strong>Edad: </strong> {{ $diligenciamiento->edad }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="width: auto; margin-top: 8px;">
                <table>
                    <thead style="background-color: gray; text-align: left; ">
                        <tr>
                            <th>Sección E. Salud y fecundidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Número de Orden: </strong> 1</td>
                        </tr>
                        <tr>
                            <td><strong>¿Por enfermedad, accidente o de nacimiento tiene limitantes permanentes para?: </strong> {{ $diligenciamiento->limitantes_permanentes }}</td>
                        </tr>
                        <tr>
                            <td><strong>¿Cuál de los siguientes regímenes de seguridad social en salud está afiliado como cotizante o beneficiario?: </strong> {{ $diligenciamiento->regimen_salud }}</td>
                        </tr>
                        <tr>
                            <td><strong>En los últimos 30 días, ¿tuvo alguna enfermedad, accidente, problema odontológico, o algún problema de salud que no haya implicado hospitalización?: </strong> {{ $diligenciamiento->problema_salud_30_dias }}</td>
                        </tr>
                        <tr>
                            <td><strong>¿Acudió a una institución prestadora de servicios de salud, un médico general, especialista, odontólogo, terapeuta o profesional de la salud?: </strong> {{ $diligenciamiento->acudio_servicios_salud }}</td>
                        </tr>
                        <tr>
                            <td><strong>¿Lo atendieron?: </strong> {{ $diligenciamiento->fue_atendido }}</td>
                        </tr>
                        <tr>
                            <td><strong>Mujeres 8 años y más (aplica a mujeres entre 8 y 59 años)</strong></td>
                        </tr>
                        <tr>
                            <td><strong>¿Está embarazada?: </strong> {{ $diligenciamiento->embarazada }}</td>
                        </tr>
                        <tr>
                            <td><strong>¿Ha tenido hijos nacidos vivos?: </strong> {{ $diligenciamiento->hijos_vivos }}</td>
                    </tbody>
                </table>
            </div>
            <div style="width: auto; margin-top: 8px;">
                <table>
                    <thead style="background-color: gray; text-align: left; ">
                        <tr>
                            <th>Sección F. Atención a menores de 5 años</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Atención a menores de 5 años: </strong> 1</td>
                        </tr>
                        <tr>
                            <td><strong>¿Dónde o con quién permanece durante la mayor parte del tiempo entre semana?: </strong> {{ $diligenciamiento->donde_permanece_semana }}</td>
                        </tr>
                        <tr>
                            <td><strong>¿Recibe o toma desayuno o almuerzo donde permanece la mayor parte del tiempo entre semana?: </strong> {{ $diligenciamiento->desayuno_almuerzo }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="width: auto; margin-top: 8px;">
                <table>
                    <thead style="background-color: gray; text-align: left; ">
                        <tr>
                            <th>Sección G. Educación - Persona de 5 años y más</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Número de Orden: </strong> 1</td>
                        </tr>
                        <tr>
                            <td><strong>¿Sabe leer y escribir?: </strong> {{ $diligenciamiento->sabe_leer_escribir }}</td>
                        </tr>
                        <tr>
                            <td><strong>¿Actualmente estudia (asiste a preescolar, colegio o universidad)?: </strong> {{ $diligenciamiento->actualmente_estudia }}</td>
                        </tr>
                        <tr>
                            <td><strong>¿Cuál es el nivel educativo más alto alcanzado y el último año o grado aprobado en ese nivel?: </strong> {{ $diligenciamiento->nivel_educativo }}</td>
                        </tr>
                        <tr>
                            <td><strong>¿Cotiza a un fondo de pensiones?: </strong> {{ $diligenciamiento->cotiza_pensiones }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="width: auto; margin-top: 8px;">
                <table>
                    <thead style="background-color: gray; text-align: left; ">
                        <tr>
                            <th>Sección H. Ocupación e Ingresos - Persona de 8 años y más</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Número de Orden: </strong> 1</td>
                        </tr>
                        <tr>
                            <td><strong>¿Cuál fue su actividad principal en el último mes?: </strong> {{ $diligenciamiento->actividad_principal }}</td>
                        </tr>
                        <tr>
                            <td><strong>En ese trabajo… es: </strong> {{ $diligenciamiento->condicion_trabajo }}</td>
                        </tr>
                        <tr>
                            <td><strong>¿Recibe algún subsidio o ayudas del Estado?: </strong> {{ $diligenciamiento->recibe_subsidio }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="width: auto; margin-top: 8px;">
                <table>
                    <thead style="background-color: gray; text-align: left; ">
                        <tr>
                            <th>Sección I. Vulnerabilidad Social</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Número de Orden: </strong> 1</td>
                        </tr>
                        <tr>
                            <td><strong>Pertenece a algun grupo poblacional vulnerable?:</strong> {{ $diligenciamiento->grupo_vulnerable }}</td>
                        </tr>
                        <tr>
                            <td><strong>¿Ha experimentado usted o algún miembro de su hogar alguna forma de discriminación en los últimos 12
                                meses? (racial, étnica, de género, orientación sexual, etc.):</strong>{{ $diligenciamiento->experimento_discriminacion }}</td>
                        </tr>
                        <tr>
                            <td><strong>¿Ha sido víctima de violencia física, emocional o sexual en los últimos 12 meses?: </strong> {{ $diligenciamiento->victima_violencia }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="width: auto; margin-top: 8px;">
                <table>
                    <thead style="background-color: gray; text-align: left; ">
                        <tr>
                            <th>Información Adicional</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Usted participo en las ultimas contiendas electorales?: </strong>{{ $diligenciamiento->participo_elecciones }}</td>
                        </tr>
                        <tr>
                            <td><strong>¿En que lugar de Votación?: C</strong> {{ $diligenciamiento->lugar_votacion }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="width: auto; margin-top: 8px;">
                <table>
                    <tbody>
                        <tr>
                            <td><strong>Fecha diligenciamiento: </strong>{{ $diligenciamiento->fecha_diligenciamiento }}</td>
                        </tr>
                        <tr>
                            <td><strong>Usuario: </strong> {{ $diligenciamiento->usuario_movil }}</td>
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
            <img src="{{ public_path('storage/images/alcaldia_icon.jpg') }}" alt="Mapa del departamento" class="w-32 h-32">
        </div>
</body>
</html>