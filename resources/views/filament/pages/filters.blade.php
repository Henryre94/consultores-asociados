<x-filament-panels::page>

    <div class="overflow-hidden shadow-xl sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <p class="mt-1 max-w-2xl text-white">Lista de todos los dilengenciamientos en el sistema</p>
        </div>
        <div>
            <div class="flex justify-between  px-4 py-3 sm:px-6 bg-gray-400 rounded mb-2 ">
                <div class="flex ">
                    @if (!$choosedFilter)
                    <div class="py-2">
                        <x-filament::input.wrapper>
                         <x-filament::input.select wire:model="selectedOption" wire:change="choosedFilterFunction">
                            <option value="">Seleccione un filtro</option>
                            <option value="grupo_vulnerable">Tipo de Vulnerabilidad</option>
                            <option value="tipo_discapacidad">Tipo de discapacidad</option>
                            <option value="edad">Edad</option>
                            <option value="sexo">Genero</option>
                            <option value="ficha_no.">Ficha No.</option>
                            <option value="centro_poblado">Ubicacion o Centro Poblado</option>
                            <option value="tipo_vivienda">Tipo de Vivienda</option>
                        </x-filament::input.select>
                        </x-filament::input.wrapper>
                    </div>
                    @else
                    <x-filament::input.wrapper>
                                <x-filament::input
                                    id="selectedFilter"
                                    value="{{ $selectedOption }}"
                                />
                    </x-filament::input.wrapper>
                         @if ($selectedOption === "edad" || $selectedOption === "ficha_no."  )
                            <x-filament::input.wrapper>
                                <x-filament::input
                                    type="number"
                                    wire:model="inputValue"
                                    wire:change="setFilter"
                                />
                            </x-filament::input.wrapper>
                        @else
                        <x-filament::input.wrapper>
                            <x-filament::input
                                type="text"
                                wire:model="inputValue"
                                wire:change="setFilter"
                            />
                        </x-filament::input.wrapper>
                         @endif
                    <x-filament::button icon="heroicon-c-plus" wire:click="resetFilter">
                        
                    </x-filament::button>
                    @endif
                </div>
                
                <x-filament::button wire:click="getFilteredData" >
                  Aplicar filtros
                </x-filament::button>
                <div class="bg-gray-200 rounded p-2 flex justify-center items-center"> 
                    @forelse ($filterValues as $filterValue)
                        <li> {{ $filterValue }}</li>
                    @empty
                        <span class="font-medium text-gray-700">No hay filtros aplicados</span>
                    @endforelse
                </div>

                <div class="bg-gray-200 rounded p-2 flex justify-center items-center"> 
                    @forelse ($selectedColums as $selectedColum)
                        <li> {{ $selectedColum }}</li>
                    @empty
                        <span class="font-medium text-gray-700">No hay filtros aplicados</span>
                    @endforelse
                </div>
            </div>

            <!-- Table section -->

            

            <div class="flex justify-center items-center overflow-x-auto rounded">
                @if ($diligenciamientos === null)
                <div class="p-3">
                    No hay Diligenciameintos
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
