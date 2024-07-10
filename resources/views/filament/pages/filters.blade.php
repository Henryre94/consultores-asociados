<x-filament-panels::page>

    <div class="overflow-hidden shadow-xl sm:rounded-lg p-1 rounded bg-gray-200  ">
        <div class="flex justify-end mb-2 ">
            <div>
                <div class="mb-2 flex justify-between">
                    <x-filament::button wire:click="getFilteredData" color="info" class="me-1" style=" font-size: 12px; font-family: sans-serif; letter-spacing: 1px;">
                        Aplicar filtros
                    </x-filament::button>
                    <x-filament::button wire:click="resetFilterData" color="info" class="me-1" style=" font-size: 12px; font-family: sans-serif; letter-spacing: 1px;">
                        Eliminar filtros
                    </x-filament::button>
                    <x-filament::button  color="danger" style=" font-size: 12px; font-family: sans-serif; letter-spacing: 1px;">
                        Generar PDF
                    </x-filament::button>
                </div>
                <div class= "p-1">
                    @if (!empty($selectedColums) && !empty($filterValues) && count($selectedColums) === count($filterValues))
                    <div class="bg-gray-400 p-1 rounded">
                        <table class="text-left" style="width: 100%; border-collapse: collapse; font-family: sans-serif; font-size: 12px; color: #555;">
                            <thead>
                                <tr>
                                    <th class="p-1"></th>
                                    <th class="p-1">Tipo de filtro</th>
                                    <th class="p-1">Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($selectedColums as $index => $selectedColum)
                                    <tr >
    
                                    <td  class="p-1">
                                        <div class="flex justify-center items-center">
                                            <x-filament::icon-button wire:click="removeFilter({{ $index }})" color="danger" icon="heroicon-s-minus" size="xs" >
                                                    
                                            </x-filament::button>
                                        </div>
                                    </td >
                                        <td class="p-1">{{ $selectedColum }}</td>
                                        <td class="p-1">{{ $filterValues[$index] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p style="font-family: sans-serif; font-size: 16px; color: #555;">No hay filtros aplicados o se esta procesando un filtro</p>
                @endif
                </div>
            </div>
        </div>
        
        <div>
            <div class="flex justify-between px-4 py-3 sm:px-6 rounded mb-2 bg-gray-400">
                <div class="flex flex-row ">
                    @if (!$choosedFilter)
                    <div>
                        <x-filament::input.wrapper style="background-color: rgb(245, 245, 245);">
                         <x-filament::input.select wire:model="selectedOption" wire:change="choosedFilterFunction" style="color: #0a0101; font-family: sans-serif; font-size: 14px; letter-spacing: 1px;">
                            <option style="background-color: rgb(245, 245, 245); font-family: sans-serif; font-size: 12px;" value="">Seleccione un filtro</option>
                            <option style="background-color: rgb(245, 245, 245); font-family: sans-serif; font-size: 12px;" value="grupo_vulnerable">Tipo de Vulnerabilidad</option>
                            <option style="background-color: rgb(245, 245, 245); font-family: sans-serif; font-size: 12px;" value="tipo_discapacidad">Tipo de discapacidad</option>
                            <option style="background-color: rgb(245, 245, 245); font-family: sans-serif; font-size: 12px;" value="edad">Edad</option>
                            <option style="background-color: rgb(245, 245, 245); font-family: sans-serif; font-size: 12px;" value="sexo">Genero</option>
                            <option style="background-color: rgb(245, 245, 245); font-family: sans-serif; font-size: 12px;" value="ficha_no.">Ficha No.</option>
                            <option style="background-color: rgb(245, 245, 245); font-family: sans-serif; font-size: 12px;" value="centro_poblado">Centro Poblado</option>
                            <option style="background-color: rgb(245, 245, 245); font-family: sans-serif; font-size: 12px;" value="departamento">Departamento</option>
                            <option style="background-color: rgb(245, 245, 245); font-family: sans-serif; font-size: 12px;" value="municipio">Municipio</option>
                            <option style="background-color: rgb(245, 245, 245); font-family: sans-serif; font-size: 12px;" value="tipo_vivienda">Tipo de Vivienda</option>
                        </x-filament::input.select>
                        </x-filament::input.wrapper>
                    </div>
                    @else
                    <div class="flex">
                        <div class="me-1">
                            <x-filament::input.wrapper style="background-color: rgb(245, 245, 245);">
                                <x-filament::input
                                    id="selectedFilter"
                                    value="{{ $selectedOption }}"
                                    style="color: #0a0101 ; font-family: sans-serif; font-size: 14px; letter-spacing: 1px;"
                                />
                            </x-filament::input.wrapper>
                        </div>
                        <div class="me-1">
                            @if ($selectedOption === "edad" || $selectedOption === "ficha_no."  )
                                <x-filament::input.wrapper style="background-color: rgb(245, 245, 245);">
                                 <x-filament::input
                                   type="number"
                                   wire:model="inputValue"
                                   style="color: #0a0101; font-family: sans-serif; font-size: 14px; letter-spacing: 1px;"
                                />
                                </x-filament::input.wrapper>
                            @else
                            <x-filament::input.wrapper style="background-color: rgb(245, 245, 245);">
                                <x-filament::input
                                    type="text"
                                    wire:model="inputValue"
                                    style="color: #0a0101; font-family: sans-serif; font-size: 14px; letter-spacing: 1px;"
                                 />
                            </x-filament::input.wrapper>
                            @endif
                        </div>
                        <div>
                        <x-filament::button wire:click="resetFilter" color="success" >
                            <x-heroicon-c-plus class="w-5 h-5" />
                        </x-filament::button>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Table section -->

            

            <div class="flex justify-center items-center overflow-x-auto rounded">
                @if ($diligenciamientos === null)
                <div class="p-3" style="font-family: sans-serif; font-size: 16px; color: #555;">
                    No hay Diligenciamientos correspondientes a los filtros aplicados
                </div>
            @else
            <table class="divide-gray-200">
                <thead class="bg-gray-400 text-left" style="font-family: sans-serif; font-size: 16px; color: #ffffff;">
                    <tr>
                        <th  class="px-6 py-3 ">Nombre</th>
                        <th  class="px-6 py-3 ">Edad</th>
                        <th  class="px-6 py-3 ">Genero</th>
                        <th  class="px-6 py-3 ">Departamentos</th>
                        <th  class="px-6 py-3 ">Discapacidad</th>
                        <th  class="px-6 py-3 ">Vulnerabilidad</th>
                        <th  class="px-6 py-3 ">Ficha No.</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($diligenciamientos as $diligenciamiento)
                        <tr style="font-family: sans-serif; font-size: 14px; color: #555;">
                            <td class="px-6 py-4 ">{{ $diligenciamiento->usuario_movil }}</td>
                            <td class="px-6 py-4 ">{{ $diligenciamiento->edad }}</td>
                            <td class="px-6 py-4 ">{{ $diligenciamiento->sexo }}</td>
                            <td class="px-6 py-4 ">{{ $diligenciamiento->departamento }}</td>
                            <td class="px-6 py-4 ">{{ $diligenciamiento->tipo_discapacidad }}</td>
                            <td class="px-6 py-4 ">{{ $diligenciamiento->grupo_vulnerable }}</td>
                            <td class="px-6 py-4 ">{{ $diligenciamiento->ficha_no }}</td>
                        </tr>        
                    @endforeach
                </tbody>
            </table>
            @endif 
            </div>
        </div>
    </div>
</x-filament-panels::page>
