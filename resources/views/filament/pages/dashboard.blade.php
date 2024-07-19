<x-filament-panels::page>
    <div class="flex-row justify-center items-center">
        <div class="flex justify-center items-center">
            <h1 class="text-2xl font-bold text-gray-700 mb-6">Bienvenidos a ComProfiler tu sistema de administracion de diligenciamientos</h1>
        </div>
        <div class="flex justify-center mt-2">
            <div class="flex justify-center items-center me-1">
                <img src="{{ $consultoresLogo }}" alt="Consultores Asociados S.A.S. Logo" class="h-32 w-auto"> 
            </div>
            <div class="flex justify-center items-center">
                @if (!$alcaldiaLogoExist)
                <div class="flex justify-center items-center border-2 border-gray-200 h-32 p-4 rounded">
                    <p style="color:lightgray">Por favor agregar logo de la alcaldia</p>
                </div>
                 @else
                    <img src="{{ $alcaldiaPath }}" alt="Logo acaldia" class="h-32 w-auto"> 
                @endif
            </div>
        </div>
        <div class="flex justify-center items-center mt-2">
            @if (!$mapExist)
                <div class="flex justify-center items-center border-2 border-gray-200 h-32 p-4 rounded">
                    <p style="color:lightgray">Por favor agregar mapa del departamento</p>
                </div>
             @else
                 <img src="{{ $mapPath }}" alt="Mapa Departamento" class="h-32 w-auto"> 
            @endif
        </div>
    </div>
</x-filament-panels::page>
