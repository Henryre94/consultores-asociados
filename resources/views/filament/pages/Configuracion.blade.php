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
        <div class="flex-row justify-center ">
            <div class="rounded p-1" style="background-color: rgb(231, 139, 139);">
                <p>
                    <strong>Por favor, proporcione los siguientes valores para comenzar la configuración de la
                        aplicación:</strong>
                </p>

                <hr>

                <p>
                    <strong>Departamento:</strong>
                    <br>
                    Departamento en el cual se están diligenciando los documentos. Este valor aparecerá en la generación
                    de los PDFs. Si no se proporciona, el campo quedará en blanco.
                </p>

                <hr>

                <p>
                    <strong>Municipio:</strong>
                    <br>
                    Municipio en el cual se están diligenciando los documentos. Este valor aparecerá en la generación de
                    los PDFs. Si no se proporciona, el campo quedará en blanco.
                </p>

                <hr>

                <p>
                    <strong>Activar Logo del Departamento:</strong>
                    <br>
                    Opción para habilitar el logo en la página de bienvenida. No afecta la generación de los archivos
                    PDF.
                </p>

                <hr>

                <p>
                    <strong>Activar Logo de la Alcaldía:</strong>
                    <br>
                    Opción para habilitar el logo en la página de bienvenida. No afecta la generación de los PDFs. (El
                    logo debe ser cargado en el panel Logos para que aparezca en la creación de los PDFs. Si no se
                    proporciona, no aparecerá.)
                </p>

            </div>
            <div class="flex-row justify-center items-center mt-1 rounded p-1"
                style="background-color: rgb(205, 205, 205)">
                @if ($configurations->count() === 0)
                    <div class="p-1">
                        <label>Departamento</label>
                        <div style="width: 200px">
                            <x-filament::input.wrapper>
                                <x-filament::input type="text" wire:model="departamento" />
                            </x-filament::input.wrapper>
                        </div>
                    </div>
                    <hr>
                    <div class="p-1">
                        <label>Municipio</label>
                        <div style="width: 200px">
                            <x-filament::input.wrapper>
                                <x-filament::input type="text" wire:model="municipio" />
                            </x-filament::input.wrapper>
                        </div>
                    </div>
                    <hr>
                    <div class="mt-1 mb-1">

                        <div class="p-1">
                            <label>
                                <x-filament::input.checkbox wire:model="activateAlcaldiaLogo" />

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
                                <x-filament::input.checkbox wire:model="activateDepartamentoLogo" />
                                <span>
                                    Activar Logo del Departamento
                                </span>
                            </label>
                        </div>
                    </div>
                @else
                    <div></div>
                @endif
                <div class="mt-1">
                    @if ($configurations->count() === 0)
                        <x-filament::button wire:click="saveConfiguration">
                            Guardar Configuracion
                        </x-filament::button>
                    @else
                        <div></div>
                    @endif

                </div>
            </div>
            <div class="flex justify-center items-center mt-1">
                @if ($configurations->count() === 0)
                    <div></div>
                @else
                    <table class="divide-gray-400">
                        <thead class="bg-gray-200 text-left"
                            style="font-family: sans-serif; font-size: 16px; color: #000000;">
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
                                <tr style="font-family: sans-serif; font-size: 14px; color: #555;white-space: no-wrap;">
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
