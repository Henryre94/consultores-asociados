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
                @if ($configurations[0]->alcaldia_logo_active === 1 && $alcaldiaLogoExist )
                    <img src="{{ $alcaldiaPath }}" alt="Logo acaldia" class="h-32 w-auto"> 
                @elseif ($configurations[0]->alcaldia_logo_active === 1 && !$alcaldiaLogoExist)
                <div style="border: 2px solid lightgray; padding: 40px;">
                    <p style="color: rgb(177, 177, 177); padding: 5px;">Por Favor ir a la seccion Logos y cargue el logo de la alcadia/municipio deseado</p>
                </div>
                @elseif ($configurations[0]->alcaldia_logo_active === 0)
                <div></div>
                @endif
            </div>
        </div>
        <div class="flex justify-center items-center mt-2">
            @if ($configurations[0]->departamento_logo_active === 1 && $mapExist )
                <img src="{{ $mapPath }}" alt="Logo acaldia" class="h-32 w-auto"> 
            @elseif ($configurations[0]->departamento_logo_active === 1 && !$mapExist)
                <div style="border: 2px solid lightgray; padding: 40px;">
                    <p style="color: rgb(177, 177, 177); padding: 5px;">Por Favor ir a la seccion Logos y cargue el logo del Departamento deseado</p>
                </div>
            @elseif ($configurations[0]->departamento_logo_active === 0)
                <div></div>
            @endif
        </div>
    </div>
</x-filament-panels::page>
