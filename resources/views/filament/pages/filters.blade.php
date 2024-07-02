<x-filament-panels::page>

    <div class="overflow-hidden shadow-xl sm:rounded-lg">
        <div class="flex justify-end mb-2">
            <div>
                <div class="mb-2">
                    <x-filament::button wire:click="getFilteredData" color="info" style="font-family: Arial, sans-serif; font-size: 16px; font-weight: bold;">
                        Aplicar filtros
                    </x-filament::button>
                    <x-filament::button wire:click="resetFilterData" color="info" style="font-family: Arial, sans-serif; font-size: 16px; font-weight: bold;">
                        Eliminar filtros
                    </x-filament::button>
                </div>
                <div>
                @if (empty($selectedColums) || empty($filterValues))   
                 <div></div>   
                @else
                <div class="flex justify-between rounded bg-white p-2 ">
                    <div class="me-1">
                        @foreach ($this->selectedColums as $selectedColum)
                        <p style="color: #0a0101; font-family: Arial, sans-serif; font-size: 16px; font-weight: bold;"> {{ $selectedColum }}:</p>
                        @endforeach
                    </div>
                    
                    <div >
                        @foreach ($this->filterValues as $filterValue)
                        <p style="color: #0a0101; font-family: Arial, sans-serif; font-size: 16px; font-weight: bold;"> {{  $filterValue }} </p>
                        @endforeach
                    </div>
                </div>
                @endif
                </div>
            </div>
        </div>
        
        <div>
            <div class="flex justify-between px-4 py-3 sm:px-6 rounded mb-2 bg-gray-300">
                <div class="flex flex-row ">
                    @if (!$choosedFilter)
                    <div>
                        <x-filament::input.wrapper style="background-color: rgb(245, 245, 245);">
                         <x-filament::input.select wire:model="selectedOption" wire:change="choosedFilterFunction" style="color: #0a0101; font-family: Arial, sans-serif; font-size: 16px; font-weight: bold;">
                            <option style="background-color: rgb(245, 245, 245); font-family: Arial, sans-serif; font-size: 12px;" value="">Seleccione un filtro</option>
                            <option style="background-color: rgb(245, 245, 245); font-family: Arial, sans-serif; font-size: 12px;" value="grupo_vulnerable">Tipo de Vulnerabilidad</option>
                            <option style="background-color: rgb(245, 245, 245); font-family: Arial, sans-serif; font-size: 12px;" value="tipo_discapacidad">Tipo de discapacidad</option>
                            <option style="background-color: rgb(245, 245, 245); font-family: Arial, sans-serif; font-size: 12px;" value="edad">Edad</option>
                            <option style="background-color: rgb(245, 245, 245); font-family: Arial, sans-serif; font-size: 12px;" value="sexo">Genero</option>
                            <option style="background-color: rgb(245, 245, 245); font-family: Arial, sans-serif; font-size: 12px;" value="ficha_no.">Ficha No.</option>
                            <option style="background-color: rgb(245, 245, 245); font-family: Arial, sans-serif; font-size: 12px;" value="centro_poblado">Ubicacion o Centro Poblado</option>
                            <option style="background-color: rgb(245, 245, 245); font-family: Arial, sans-serif; font-size: 12px;" value="tipo_vivienda">Tipo de Vivienda</option>
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
                                    style="color: #0a0101 ; font-family: Arial, sans-serif; font-size: 16px; font-weight: bold;"
                                />
                            </x-filament::input.wrapper>
                        </div>
                        <div class="me-1">
                            @if ($selectedOption === "edad" || $selectedOption === "ficha_no."  )
                                <x-filament::input.wrapper style="background-color: rgb(245, 245, 245);">
                                 <x-filament::input
                                   type="number"
                                   wire:model="inputValue"
                                   wire:change="setFilter"
                                   style="color: #0a0101; font-family: Arial, sans-serif; font-size: 16px; font-weight: bold;"
                                />
                                </x-filament::input.wrapper>
                            @else
                            <x-filament::input.wrapper style="background-color: rgb(245, 245, 245);">
                                <x-filament::input
                                    type="text"
                                    wire:model="inputValue"
                                    wire:change="setFilter"
                                    style="color: #0a0101; font-family: Arial, sans-serif; font-size: 16px; font-weight: bold;"
                                 />
                            </x-filament::input.wrapper>
                            @endif
                        </div>
                        <div>
                        <x-filament::button icon="heroicon-c-plus" icon-position="after" wire:click="resetFilter" color="info" style="font-family: Arial, sans-serif; font-size: 16px; font-weight: bold;">
                            Addicionar otro filtro
                        </x-filament::button>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Table section -->

            

            <div class="flex justify-center items-center overflow-x-auto rounded">
                @if ($diligenciamientos === null)
                <div class="p-3" style="font-family: Arial, sans-serif; font-size: 24px; font-weight: bold;">
                    No hay Diligenciamientos correspondientes a los filtros aplicados
                </div>
            @else
            <table class="min-w-full w-full divide-y divide-gray-200">
                <thead class="bg-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-m font-black text-white uppercase tracking-wider">Nombre</th>
                        <th scope="col" class="px-6 py-3 text-left text-m font-black text-white uppercase tracking-wider">Departamento</th>
                        <th scope="col" class="px-6 py-3 text-left text-m font-black text-white uppercase tracking-wider">Municipio</th>
                        <th scope="col" class="px-6 py-3 text-left text-m font-black text-white uppercase tracking-wider">Edad</th>
                        <th scope="col" class="px-6 py-3 text-left text-m font-black text-white uppercase tracking-wider">Discapacidad</th>
                        <th scope="col" class="px-6 py-3 text-left text-m font-black text-white uppercase tracking-wider">Vulnerabilidad</th>
                        <th scope="col" class="px-6 py-3 text-left text-m font-black text-white uppercase tracking-wider">Ficha No.</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($diligenciamientos as $diligenciamiento)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-500 uppercase tracking-wider">{{ $diligenciamiento->usuario_movil }}</td>
                            <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-500 uppercase tracking-wider">{{ $diligenciamiento->departamento }}</td>
                            <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-500 uppercase tracking-wider">{{ $diligenciamiento->municipio }}</td>
                            <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-500 uppercase tracking-wider">{{ $diligenciamiento->edad }}</td>
                            <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-500 uppercase tracking-wider">{{ $diligenciamiento->tipo_discapacidad }}</td>
                            <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-500 uppercase tracking-wider">{{ $diligenciamiento->grupo_vulnerable }}</td>
                            <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-500 uppercase tracking-wider">{{ $diligenciamiento->ficha_no }}</td>
                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">No hay diligenciamientos correspondientes a los filtros aplicados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            @endif 
            </div>
        </div>
    </div>
</x-filament-panels::page>
