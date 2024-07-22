<x-filament-panels::page>



<div class="flex-row justify-center items-center" style="font-family:Arial, Helvetica, sans-serif; font-size: 14px;">
    <div class="flex-row justify-center ">
        <div class="rounded p-1" style="background-color: rgb(231, 139, 139);">
            <p>
                <strong>Por favor, proporcione los siguientes valores para comenzar la configuración de la aplicación:</strong>
            </p>
            
            <hr>
            
            <p>
                <strong>Departamento:</strong> 
                <br>
                Departamento en el cual se están diligenciando los documentos. Este valor aparecerá en la generación de los PDFs. Si no se proporciona, el campo quedará en blanco.
            </p>
            
            <hr>
            
            <p>
                <strong>Municipio:</strong> 
                <br>
                Municipio en el cual se están diligenciando los documentos. Este valor aparecerá en la generación de los PDFs. Si no se proporciona, el campo quedará en blanco.
            </p>
            
            <hr>
            
            <p>
                <strong>Activar Logo del Departamento:</strong> 
                <br>
                Opción para habilitar el logo en la página de bienvenida. No afecta la generación de los archivos PDF.
            </p>
            
            <hr>
            
            <p>
                <strong>Activar Logo de la Alcaldía:</strong> 
                <br>
                Opción para habilitar el logo en la página de bienvenida. No afecta la generación de los PDFs. (El logo debe ser cargado en el panel Logos para que aparezca en la creación de los PDFs. Si no se proporciona, no aparecerá.)
            </p>
            
        </div>
        <div class="flex-row justify-center items-center mt-1 rounded p-1" style="background-color: rgb(205, 205, 205)">
            <div class="p-1">
                <label>Departamento</label>
                <div style="width: 200px">
                <x-filament::input.wrapper>
                    <x-filament::input
                        type="text"
                        wire:model="departamento"
                    />
                </x-filament::input.wrapper>
                </div>
            </div>
            <hr>
            <div class="p-1">
                <label >Municipio</label>
                <div style="width: 200px">
                <x-filament::input.wrapper>
                    <x-filament::input
                        type="text"
                        wire:model="municipio"
                    />
                </x-filament::input.wrapper>
                </div>
            </div>
            <hr>
            <div class="mt-1 mb-1">
                <div class="p-1">
                    <label>
                        <x-filament::input.checkbox wire:model="activateAlcaldiaLogo"  />
                     
                        <span>
                            Activar Logo de la Alcaldia
                        </span>
                    </label>
                </div>
            </div>
            <hr>
            <div class="mt-1">
                <div class="p-1">
                    <label>
                        <x-filament::input.checkbox wire:model="activateDepartamentoLogo"  />
                     
                        <span>
                            Activar Logo del Departamento
                        </span>
                    </label>
                </div>
            </div>
            <div class="mt-1">
                @if ($configurations[0]->status_complete === 1)
                <x-filament::button wire:click="saveConfiguration">
                    Adicionar valores nuevos
                </x-filament::button>
                @else
                <x-filament::button wire:click="saveConfiguration">
                    Guardar Configuracion
                </x-filament::button>
                @endif
            </div>
        </div>
        <div class="flex justify-center items-center mt-1">
            <table>
                <thead class="bg-gray-300 text-left" style="font-family: sans-serif; font-size: 16px; color: #000000;">
                    <tr>
                        <th  class="px-6 py-3 ">Departamento</th>
                        <th  class="px-6 py-3 ">Municipip</th>
                        <th  class="px-6 py-3 ">Logo Alcaldia Activo</th>
                        <th  class="px-6 py-3 ">Logo Departamento Activo</th>

                        
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($configurations as $configuration)
                        <tr style="font-family: sans-serif; font-size: 14px; color: #555;white-space: no-wrap;">
                            <td class="px-6 py-4 ">{{ $configuration->departamento }}</td>
                            <td class="px-6 py-4 ">{{ $configuration->alcaldia }}</td>
                            <td class="px-6 py-4 ">{{ $configuration->alcaldia_logo_active }}</td>
                            <td class="px-6 py-4 ">{{ $configuration->departamento_logo_active }}</td>
                            <td class="px-6 py-4 "> 
                            </td>
                            
                        </tr>        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>




</x-filament-panels::page>
