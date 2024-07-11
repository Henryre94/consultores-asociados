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
            <div class="flex justify-center items-center">
                <div class="mx-2">
                    <img src="images/icon.png" alt="Consultores Asociados S.A.S. Logo" class="w-32 h-auto">
                </div>
                <div>
                    <img src="images/map.png" alt="Consultores Asociados S.A.S. Logo" class="w-32 h-32">
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
                                <strong>Ficha No.: </strong>  327410
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
                                    <strong>Departamento : </strong> {{ $diligenciamiento->usuario_movil }}
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <strong>Municpio : </strong> CHIVOLO
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Centro Poblado : </strong> Cabecera Municipal
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Direccion : </strong> diagonal 2-204
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Barrio : </strong> santa catalina
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
                                    <strong>Primer Nombre : </strong> Olga
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Segundo Nombre:</strong> carolina
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Primer Apellido:</strong> pimienta
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Segundo Apellido: </strong> blanco
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Excepciones:</strong> Persona integrante del hogar
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Firma :</strong> Si
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Firma:</strong> Aqui imagen de la firma
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Correo Electronico:</strong> olgayeddy23@gmail.com
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Telefono de Contacto:</strong> 3014833079
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
                                <strong>Tipo de Vivienda: </strong> Apartamento
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Material predominante en los pisos: </strong> Baldosa, vinilo, tableta, ladrillo
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Material predominante de las paredes exteriores:  </strong> Bloque, ladrillo, piedra, madera pulida
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>¿Con cuales de los siguientes servicios públicos, privados o comunales cuenta la vivienda?: </strong> Energía Electrica -
                                Alcantarillado - Gas natural domiciliario - Recolección de Basuras - Acueducto                               
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>¿Con cuantos cuartos, excluyendo sala comedor, cuenta la vivienda? (excluida cocina, baños, garajes y cuartos
                                    destinados a negocio): </strong> 2

                        </tr>
                        <tr>
                            <td>
                                <strong>¿Cuántos grupos de personas que manejan su propio presupuesto (hogares)hay en esta vivienda?: </strong> 1
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
                                <strong>Hogar Numero: </strong> Apartamento
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>De: </strong> Baldosa, vinilo, tableta, ladrillo
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>La vivienda ocupada por este hogar es:  </strong> Bloque, ladrillo, piedra, madera pulida
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>¿Qué tipo de sanitario utiliza este hogar? </strong> Energía Electrica -
                                Alcantarillado - Gas natural domiciliario - Recolección de Basuras - Acueducto                               
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>El agua para el consumo o preparación de alimentos la obtienen principalmente de…:</strong> 2
                        </tr>
                        <tr>
                            <td>
                                <strong>¿El agua llega los siete dias de la semana?: </strong> 1
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>En los días que llega el agua, ¿el suministro es de 24 horas?: </strong> 1
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>¿Donde se encuentra el sanitario que usan las personas de este hogar?: </strong> 1
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>El sanitario que usan las personas de este hogar es: </strong> 1
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>El agua para beber principalmente:</strong> 1
                            </td>
                        </tr>
                        <tr>
                            <td><strong>¿Cómo eliminan principalmente la basura en este hogar?: </strong> La recogen los servicios de aseo</td>
                        </tr>
                        <tr>
                            <td><strong>¿El hogar tiene cocina?: </strong> NO</td>
                        </tr>
                        <tr>
                            <td><strong>La cocina o sitio para preparar los alimentos es: </strong> Compartido con hogares de la misma vivienda</td>
                        </tr>
                        <tr>
                            <td><strong>¿Qué energía o combustible utiliza principalmente este hogar para cocinar?: </strong> Ninguno (no cocinan)</td>
                        </tr>
                        <tr>
                            <td><strong>¿Cuáles de los siguientes bienes o servicios posee este hogar?: </strong> Ninguna de las Anteriores</td>
                        </tr>
                        <tr>
                            <td><strong>¿Cuál es el gasto mensual de este hogar en estos conceptos (estime un valor promedio mensual)?</strong></td>
                        </tr>
                        <tr>
                            <td><strong>Alimentación: </strong> 0</td>
                        </tr>
                        <tr>
                            <td><strong>Transporte (bus, servicio público, taxis): </strong> 0</td>
                        </tr>
                        <tr>
                            <td><strong>Educación (pensión, transporte escolar, alimentación escolar): </strong> 0</td>
                        </tr>
                        <tr>
                            <td><strong>Salud (medicamentos, citas médicas, copago, pago EPS): </strong> 0</td>
                        </tr>
                        <tr>
                            <td><strong>Servicios públicos (agua, luz, teléfono fijo, recolección de basuras, gas): </strong> 0</td>
                        </tr>
                        <tr>
                            <td><strong>Celular (plan-prepago): </strong> 0</td>
                        </tr>
                        <tr>
                            <td><strong>Arriendo, cuota de amortización o cuota de administración: </strong> 0</td>
                        </tr>
                        <tr>
                            <td><strong>Otros (diversión, esparcimiento, deudas, préstamos): </strong> 0</td>
                        </tr>
                        <tr>
                            <td><strong>Suma: </strong> 0</td>
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
                                <strong>¿Cuánto tiempo lleva habitando esta vivienda?:  </strong> Apartamento
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Durante el tiempo que lleva habitando su vivienda ha sido afectada por alguno de los siguientes eventos? (si el
                                    hogar ha sido afectado):  </strong> Baldosa, vinilo, tableta, ladrillo
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Total de personas con documento válido en el hogar:  </strong> Bloque, ladrillo, piedra, madera pulida
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
                            <td><strong>Apellidos Completos: </strong> pimienta blanco</td>
                        </tr>
                        <tr>
                            <td><strong>Nombres Completos: </strong> olga carolina</td>
                        </tr>
                        <tr>
                            <td><strong>Sexo: </strong> Mujer</td>
                        </tr>
                        <tr>
                            <td><strong>Tipo de documento de identidad Nacionales: </strong> Cedula de Ciudadanía</td>
                        </tr>
                        <tr>
                            <td><strong>Número de documento de identidad: </strong> 1079659854</td>
                        </tr>
                        <tr>
                            <td><strong>Fecha de Nacimiento: </strong> 23/03/1994</td>
                        </tr>
                        <tr>
                            <td><strong>Edad: </strong> 30</td>
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
                            <td><strong>¿Por enfermedad, accidente o de nacimiento tiene limitantes permanentes para?: </strong> Ninguna de las Anteriores</td>
                        </tr>
                        <tr>
                            <td><strong>¿Cuál de los siguientes regímenes de seguridad social en salud está afiliado como cotizante o beneficiario?: </strong> Subsidiado (EPS-S)</td>
                        </tr>
                        <tr>
                            <td><strong>En los últimos 30 días, ¿tuvo alguna enfermedad, accidente, problema odontológico, o algún problema de salud que no haya implicado hospitalización?: </strong> NO</td>
                        </tr>
                        <tr>
                            <td><strong>¿Acudió a una institución prestadora de servicios de salud, un médico general, especialista, odontólogo, terapeuta o profesional de la salud?: </strong> NO</td>
                        </tr>
                        <tr>
                            <td><strong>¿Lo atendieron?: </strong> NO</td>
                        </tr>
                        <tr>
                            <td><strong>Mujeres 8 años y más (aplica a mujeres entre 8 y 59 años)</strong></td>
                        </tr>
                        <tr>
                            <td><strong>¿Está embarazada?: </strong> NO</td>
                        </tr>
                        <tr>
                            <td><strong>¿Ha tenido hijos nacidos vivos?: </strong> NO</td>
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
                            <td><strong>¿Dónde o con quién permanece durante la mayor parte del tiempo entre semana?: </strong> En casa solo</td>
                        </tr>
                        <tr>
                            <td><strong>¿Recibe o toma desayuno o almuerzo donde permanece la mayor parte del tiempo entre semana?: </strong> SI</td>
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
                            <td><strong>¿Sabe leer y escribir?: </strong> SI</td>
                        </tr>
                        <tr>
                            <td><strong>¿Actualmente estudia (asiste a preescolar, colegio o universidad)?: </strong> NO</td>
                        </tr>
                        <tr>
                            <td><strong>¿Cuál es el nivel educativo más alto alcanzado y el último año o grado aprobado en ese nivel?: </strong> Básica secundaria (6.° - 9.°)</td>
                        </tr>
                        <tr>
                            <td><strong>¿Cotiza a un fondo de pensiones?: </strong> NO</td>
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
                            <td><strong>¿Cuál fue su actividad principal en el último mes?: </strong> Buscando trabajo</td>
                        </tr>
                        <tr>
                            <td><strong>En ese trabajo… es: </strong> Trabajador sin remuneración</td>
                        </tr>
                        <tr>
                            <td><strong>¿Recibe algún subsidio o ayudas del Estado?: </strong> Ninguno</td>
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
                            <td><strong>Pertenece a algun grupo poblacional vulnerable?:</strong> Ninguna de las anteriores</td>
                        </tr>
                        <tr>
                            <td><strong>¿Ha experimentado usted o algún miembro de su hogar alguna forma de discriminación en los últimos 12
                                meses? (racial, étnica, de género, orientación sexual, etc.):</strong>NO</td>
                        </tr>
                        <tr>
                            <td><strong>¿Ha sido víctima de violencia física, emocional o sexual en los últimos 12 meses?: </strong> NO</td>
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
                            <td><strong>Usted participo en las ultimas contiendas electorales?: </strong>Si</td>
                        </tr>
                        <tr>
                            <td><strong>¿En que lugar de Votación?: C</strong> Cabecera Municipal </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="width: auto; margin-top: 8px;">
                <table>
                    <tbody>
                        <tr>
                            <td><strong>Fecha diligenciamiento: </strong>7/2/2024 10:35:22 AM                            </td>
                        </tr>
                        <tr>
                            <td><strong>Usuario: </strong> CarlosAu </td>
                        </tr>
                        <tr>
                            <td><strong>Latitud: </strong> 10.0248183000 </td>
                        </tr>
                        <tr>
                            <td><strong>Longitud: </strong> -74.6311117000</td>
                        </tr>
                        <tr>
                            <td><strong>Fecha generación: </strong> 7/2/2024 3:38:29 PM </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</body>
</html>