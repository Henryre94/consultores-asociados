<x-filament-panels::page>



    <div class="flex-row justify-center items-center" style="font-family:Arial, Helvetica, sans-serif; font-size: 14px;">
        @if ($alert)
            <div class=" alert"
                style="
        background-color: #f8d7da; 
        color: #721c24; 
        border: 1px solid #f5c6cb; 
        padding: 20px; 
        margin-bottom: 15px; 
        position: fixed;
        top: 0;
        left: 30%;
        z-index: 1000; 
        border-radius: 5px;
        display: flex;
        align-items: center;">
                <div style="font-family:Arial, Helvetica, sans-serif">
                    <p>Por Favor aplicar algun valor a Departamento y/o Municipio. Ambos valores son necesarios para el
                        buen funcionamiento de la aplicacion</p>
                </div>
                <div>
                    <x-filament::icon-button icon="heroicon-m-x-mark" color="danger" wire:click="closeAlert">
                    </x-filament::icon-button>
                </div>
            </div>
        @endif
        <div>
            <div class="flex-row justify-center items-center mt-1 rounded p-1">
                @if ($configurations->count() === 0)
                <div class="p-6 max-w-lg mx-auto bg-white rounded-lg shadow-md space-y-6">
                    <div class="flex flex-col space-y-4">
                        <!-- Departamento Input -->
                        <div class="flex flex-col">
                            <label for="departamento" class="text-sm font-semibold text-gray-700 mb-2">Departamento</label>
                            <div class="relative">
                                <x-filament::input.wrapper>
                                    <x-filament::input id="departamento" type="text" wire:model="departamento" class="w-full" />
                                </x-filament::input.wrapper>
                            </div>
                        </div>
                
                        <!-- Municipio Input -->
                        <div class="flex flex-col">
                            <label for="municipio" class="text-sm font-semibold text-gray-700 mb-2">Municipio</label>
                            <div class="relative">
                                <x-filament::input.wrapper>
                                    <x-filament::input id="municipio" type="text" wire:model="municipio" class="w-full" />
                                </x-filament::input.wrapper>
                            </div>
                        </div>
                
                        <!-- Activar Logo de la Alcaldía -->
                        <div class="flex items-center space-x-2">
                            <x-filament::input.checkbox id="activateAlcaldiaLogo" wire:model="activateAlcaldiaLogo" class="h-4 w-4 text-blue-600" />
                            <label for="activateAlcaldiaLogo" class="text-sm text-gray-700">Activar Logo de la Alcaldía</label>
                        </div>
                
                        <!-- Activar Logo del Departamento -->
                        <div class="flex items-center space-x-2">
                            <x-filament::input.checkbox id="activateDepartamentoLogo" wire:model="activateDepartamentoLogo" class="h-4 w-4 text-blue-600" />
                            <label for="activateDepartamentoLogo" class="text-sm text-gray-700">Activar Logo del Departamento</label>
                        </div>
                    </div>
                    <div class="flex justify-end mt-1">
                        @if ($configurations->count() === 0)
                            <x-filament::button wire:click="saveConfiguration">
                                Guardar Configuracion
                            </x-filament::button>
                        @else
                            <div></div>
                        @endif
                    </div>
                </div>
                @else
                    <div></div>
                @endif
            </div>
        
            <div class="flex justify-center items-center mt-1">
                @if ($configurations->count() === 0)
                    <div></div>
                @else
                    <table class="divide-gray-200">
                        <thead class="bg-gray-200 text-left"
                            style="font-family: sans-serif; font-size: 14px; color: #000000;">
                            <tr>
                                <th class="px-6 py-3 ">Departamento</th>
                                <th class="px-6 py-3 ">Municipio</th>
                                <th class="px-6 py-3 ">Logo Departamento Activo</th>
                                <th class="px-6 py-3 ">Logo Alcaldia Activo</th>
                                <th class="px-6 py-3 ">Editar</th>

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($configurations as $configuration)
                                <tr style="font-family: sans-serif; font-size: 12px; color: #555;white-space: no-wrap;">
                                    <td class="px-6 py-4 ">{{ $configuration->departamento }}</td>
                                    <td class="px-6 py-4 ">{{ $configuration->alcaldia }}</td>
                                    <td class="px-6 py-4 ">
                                        @if ($configuration->departamento_logo_active === 1)
                                            Si
                                        @else
                                            No
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 ">
                                        @if ($configuration->alcaldia_logo_active === 1)
                                            Si
                                        @else
                                            No
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 ">
                                        <x-filament::button color="danger" wire:click="resetValues"
                                            style=" font-size: 12px; font-family: sans-serif; letter-spacing: 1px;">
                                            Resetear Valores
                                        </x-filament::button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>




</x-filament-panels::page>
