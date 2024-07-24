**ComProfiler**

Un software para la optimización de la generación y mantenimiento de diligenciamientos.

### Módulos Incluidos en la Versión 1.0.0:

- **Módulo de Diligenciamientos**: Incluye los métodos CRUD (Crear, Editar, Borrar y Ver). También permite la importación de archivos Excel.
- **Módulo de Filtros**: Responsable de filtrar los diligenciamientos según los parámetros definidos por el usuario. Además, facilita la creación de archivos PDF y la generación de gráficos (torta y barras).
- **Módulo de Administración de Usuarios**: Accesible únicamente para usuarios con el rol "superAdmin". Este módulo gestiona a los usuarios de la aplicación.
- **Módulo de Logos**: Permite la carga de logos en la aplicación, los cuales se utilizan en diversas secciones del proyecto.
- **Módulo de Configuración**: Proporciona información básica necesaria para el óptimo funcionamiento de la aplicación.

### Techstack

- **Framework**: PHP 8.3, Laravel y Filamentphp 3.0
- **Bibliotecas**: TailwindCSS

### Descripción Técnica del Proyecto

#### Vistas

Filamentphp, a través de los recursos, maneja gran parte del aspecto de la UI. Los recursos y vistas generados por Filamentphp incluyen:

- **Diligenciamientos**: Vista y Componentes.
- **Logos**: Vista y Componentes.
- **Usuarios**: Vista y Componentes.
- **Roles**: Vista y Componentes.

También hay vistas personalizadas desarrolladas por el equipo, que incluyen contenido HTML, CSS y JS:

- **Configuración**: Vista y Componentes.
- **Dashboard**: Vista y Componentes.
- **Filtros**: Vista y Componentes.
- **PDF_view**: Vista no accesible al usuario, pero necesaria para la creación de los PDFs.

### Sección de Documentación de Desarrollo

Esta sección está destinada a facilitar el trabajo y la comprensión de cualquier desarrollador que trabaje en el proyecto.

#### Funciones

Los recursos creados con Filamentphp asumen la responsabilidad del funcionamiento y métodos CRUD. Las vistas personalizadas contienen sus propias funciones originales, desarrolladas por el equipo de desarrollo.

**Configuración**
- `saveConfiguration()`: Guarda los valores en la base de datos. Cuando se cumplen las condiciones, ejecuta un método GET para obtener los valores guardados de la base de datos.
- `resetValues()`: Elimina todas las entradas de la tabla `Configuracion` de la base de datos.
- `closeAlert()`: Cierra cualquier alerta generada al intentar guardar los datos.

**Dashboard**
- `mount()`: Al cargar la vista, obtiene la información de configuración mediante un método GET. Dependiendo de las condiciones y valores agregados, muestra los logos deseados y el formato de la vista adecuado.
- `getTitle()`: Cambia el título que se muestra en la vista.

**Filtros**
- `shouldRegisterNavigation()`: Verifica que los parámetros de configuración de la base de datos estén presentes antes de permitir el uso del módulo.
- `mount()`: Obtiene los parámetros de configuración de la base de datos y ejecuta el módulo mostrando alertas informativas según sea necesario.
- `choosedFilterFunction()`: Asegura que los filtros han sido seleccionados correctamente mediante el uso de un valor booleano.
- `resetFilter()`: Añade los valores a la lista de filtros y restablece los valores de entrada a su estado original para permitir la selección de filtros adicionales.
- `resetFilterData()`: Elimina todos los parámetros de búsqueda para reiniciar el proceso desde cero.
- `removeFilter($index)`: Elimina un filtro previamente seleccionado del array de filtros.
- `generateGraphics()`: Genera gráficos de pastel y de barras basados en la información filtrada.
- `getFilteredData()`: Utiliza el array de filtros seleccionados para formar una consulta (query) a la base de datos con todos los parámetros deseados.
- `generateModal()`: Abre las alertas informativas.
- `closeModal()`: Cierra las alertas informativas.

