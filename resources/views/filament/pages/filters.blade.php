<x-filament-panels::page>

    <div class="overflow-hidden shadow-xl sm:rounded-lg p-1 rounded bg-white  "
        style="font-family:Arial, Helvetica, sans-serif">
        @if ($openAlert)

            <div class=" alert"
            style="
            background-color: #f8d7da; 
            color: #721c24; 
            border: 1px solid #f5c6cb; 
            padding: 20px; 
            margin-bottom: 15px; 
            position: fixed;
            top: 0;
            left: 35%;
            z-index: 1000; 
            border-radius: 5px;
            display: flex;
            align-items: center;"
            >
                <div style="font-family:Arial, Helvetica, sans-serif">
                    @if ($noFilterApplied)
                        <p>Por Favor seleccione filtros para iniciar la busqueda.</p>
                    @elseif ($loadingPdf)
                        <p>Tener en cuenta que el proceso de generacion de PDF puede durar unos segundos.</p>
                    @else
                        <p>El filtro que ha escogido ya ha sido seleccionado.</p>
                    @endif
                </div>
                <div>
                    <x-filament::icon-button icon="heroicon-m-x-mark" color="danger" wire:click="closeAlert">
                    </x-filament::icon-button>
                </div>
            </div>
        @endif
        <div class="flex justify-end mb-2 ">
            <div>
                <div class="mb-2 flex justify-end">
                    <x-filament::button wire:click="getFilteredData" color="info" class="me-1"
                        style=" font-size: 12px; letter-spacing: 1px;">
                        Aplicar filtros
                    </x-filament::button>
                    <x-filament::button wire:click="resetFilterData" color="info" class="me-1"
                        style=" font-size: 12px; letter-spacing: 1px;">
                        Eliminar filtros
                    </x-filament::button>
                    <x-filament::button wire:click="generateGraphics" color="info" class="me-1"
                        style=" font-size: 12px;  letter-spacing: 1px;">
                        Generar Graficas
                    </x-filament::button>

                </div>

                <div class= "p-1">
                    @if (!empty($selectedColums) && !empty($filterValues) && count($selectedColums) === count($filterValues))
                        <div class="bg-gray-200 p-1 rounded">
                            <table class="text-left"
                                style="width: 100%; border-collapse: collapse; font-size: 12px; color: #555;">
                                <thead>
                                    <tr>
                                        <th class="p-1"></th>
                                        <th class="p-1">Tipo de filtro</th>
                                        <th class="p-1">Valor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($selectedColums as $index => $selectedColum)
                                        <tr>

                                            <td class="p-1">
                                                <div class="flex justify-center items-center">
                                                    <x-filament::icon-button
                                                        wire:click="removeFilter({{ $index }})" color="danger"
                                                        icon="heroicon-s-minus" size="xs">

                                                        </x-filament::button>
                                                </div>
                                            </td>
                                            <td class="p-1">
                                                @if ($selectedColum === 'edad')
                                                    {{ $selectedColum }} {{ $conditions[$index] }}
                                                @else
                                                    {{ $selectedColum }}
                                                @endif
                                            </td>
                                            <td class="p-1">{{ $filterValues[$index] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p style="font-size: 16px; color: #555;">No hay filtros aplicados o se
                            esta procesando un filtro</p>
                    @endif
                </div>
            </div>
        </div>

        <div>
            <div class="flex justify-between px-4 py-3 sm:px-6 rounded mb-2 bg-gray-200">
                <div class="flex flex-row ">
                    @if (!$choosedFilter)
                        <div>
                            <x-filament::input.wrapper style="background-color: rgb(245, 245, 245);">
                                <x-filament::input.select wire:model="selectedOption"
                                    wire:change="choosedFilterFunction"
                                    style="color: #0a0101; font-size: 14px; letter-spacing: 1px;">
                                    <option style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                        value="">Seleccione un filtro</option>
                                    <option style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                        value="grupo_vulnerable">Tipo de Vulnerabilidad</option>
                                    <option style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                        value="tipo_discapacidad">Tipo de discapacidad</option>
                                    <option style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                        value="edad">Edad</option>
                                    <option style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                        value="sexo">Genero</option>
                                    <option style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                        value="ficha_no">Ficha No.</option>
                                    <option style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                        value="centro_poblado">Centro Poblado</option>
                                    <option style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                        value="departamento">Departamento</option>
                                    <option style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                        value="municipio">Municipio</option>
                                    <option style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                        value="tipo_vivienda">Tipo de Vivienda</option>
                                </x-filament::input.select>
                            </x-filament::input.wrapper>
                        </div>
                    @else
                        <div class="flex">
                            <div class="me-1">
                                <x-filament::input.wrapper style="background-color: rgb(245, 245, 245);">
                                    <x-filament::input id="selectedFilter" value="{{ $selectedOption }}"
                                        style="color: #0a0101 ; font-size: 14px; letter-spacing: 1px;" />
                                </x-filament::input.wrapper>
                            </div>
                            <div class="me-1">
                                @if ($selectedOption === 'ficha_no.')
                                    <x-filament::input.wrapper style="background-color: rgb(245, 245, 245);">
                                        <x-filament::input type="number" wire:model="inputValue"
                                            style="color: #0a0101; font-size: 14px; letter-spacing: 1px;" />
                                    </x-filament::input.wrapper>
                                @elseif ($selectedOption === 'edad')
                                    <div class="flex">
                                        <div class="me-1">
                                            <x-filament::input.wrapper style="background-color: rgb(245, 245, 245);">
                                                <x-filament::input.select wire:model="condition"
                                                    style="color: #0a0101; font-size: 14px; letter-spacing: 1px;">
                                                    <option
                                                        style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                                        value="">Seleccione una condicion</option>
                                                    <option
                                                        style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                                        value="=">igual a</option>
                                                    <option
                                                        style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                                        value=">">Mayor</option>
                                                    <option
                                                        style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                                        value="<">Menor</option>
                                                    <option
                                                        style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                                        value=">=">Mayor o igual</option>
                                                    <option
                                                        style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                                        value="<=">Menor o igual</option>
                                                </x-filament::input.select>
                                            </x-filament::input.wrapper>
                                        </div>
                                        <div class="me-1">
                                            <x-filament::input.wrapper style="background-color: rgb(245, 245, 245);">
                                                <x-filament::input type="number" wire:model="inputValue"
                                                    style="color: #0a0101; font-size: 14px; letter-spacing: 1px;" />
                                            </x-filament::input.wrapper>
                                        </div>
                                    </div>
                                @elseif ($selectedOption === 'sexo')
                                    <x-filament::input.wrapper style="background-color: rgb(245, 245, 245);">
                                        <x-filament::input.select wire:model="inputValue"
                                            style="color: #0a0101; font-size: 14px; letter-spacing: 1px;">
                                            <option style="background-color: rgb(245, 245, 245);font-size: 12px;"
                                                value="">Seleccione una condicion</option>
                                            <option style="background-color: rgb(245, 245, 245);  font-size: 12px;"
                                                value="Hombre">Hombre</option>
                                            <option style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                                value="Mujer">Mujer</option>
                                        </x-filament::input.select>
                                    </x-filament::input.wrapper>
                                @elseif ($selectedOption === 'tipo_vivienda')
                                    <x-filament::input.wrapper style="background-color: rgb(245, 245, 245);">
                                        <x-filament::input.select wire:model="inputValue"
                                            style="color: #0a0101; font-size: 14px; letter-spacing: 1px;">
                                            <option style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                                value="">Seleccione una condicion</option>
                                            <option style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                                value="Casa">Casa</option>
                                            <option style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                                value="Apartamente">Apartamento</option>
                                            <option style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                                value="Cuarto">Cuarto</option>
                                            <option style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                                value="Otro tipo de vivienda">Otro</option>
                                            <option style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                                value="Vivienda indigena">Vivienda indigena</option>
                                        </x-filament::input.select>
                                    </x-filament::input.wrapper>
                                @elseif ($selectedOption === 'grupo_vulnerable')
                                    <x-filament::input.wrapper style="background-color: rgb(245, 245, 245);">
                                        <x-filament::input.select wire:model="inputValue"
                                            style="color: #0a0101; font-size: 14px; letter-spacing: 1px;">
                                            <option style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                                value="">Seleccione una condicion</option>
                                            <option style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                                value="Indigenas">Indigenas</option>
                                            <option style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                                value="Afrocolombiano">Afrocolombiano</option>
                                            <option style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                                value="Rrom y Población LGTBI">Rrom y Población LGTBI</option>
                                            <option style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                                value="Reinsertado">Reinsertado</option>
                                            <option style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                                value="Desplazado por la Violencia">Desplazado por la Violencia
                                            </option>
                                            <option style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                                value="Desplazado por desastres naturales">Desplazado por desastres
                                                naturales</option>
                                            <option style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                                value="Adulto Mayor">Adulto Mayor</option>
                                            <option style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                                value="Madre cabeza de familia">Madre cabeza de familia</option>
                                            <option style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                                value="Poblacion Migrante">Poblacion Migrante</option>
                                            <option style="background-color: rgb(245, 245, 245); font-size: 12px;"
                                                value="Niños y Adolescentes">Niños y Adolescentes</option>
                                            <option style="background-color: rgb(245, 245, 245);font-size: 12px;"
                                                value="Expresidiario">Expresidiario</option>
                                        </x-filament::input.select>
                                    </x-filament::input.wrapper>
                                @else
                                    <x-filament::input.wrapper style="background-color: rgb(245, 245, 245);">
                                        <x-filament::input type="text" wire:model="inputValue"
                                            style="color: #0a0101;font-size: 14px; letter-spacing: 1px;" />
                                    </x-filament::input.wrapper>
                                @endif
                            </div>
                            <div>
                                <x-filament::button wire:click="resetFilter" color="success">
                                    <x-heroicon-c-plus class="w-5 h-5" />
                                </x-filament::button>
                            </div>
                            <div class="ms-1">
                                <x-filament::button wire:click="resetValues" color="danger">
                                    <x-heroicon-c-minus class="w-5 h-5" />
                                </x-filament::button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>



            <!-- Table section -->



            <div class="flex justify-center" style="width: 100%; overflow-x: auto; max-height: 1000px;">
                @if ($diligenciamientos === null)
                    <div class="p-3" style="font-size: 16px; color: #555;">
                        No hay Diligenciamientos correspondientes a los filtros aplicados
                    </div>
                @else
                    <table class="divide-gray-400">
                        <thead class="bg-gray-200 text-left" style=" font-size: 16px; color: #000000;">
                            <tr>
                                <th class="px-6 py-3 ">Ficha No.</th>
                                <th class="px-6 py-3 ">Nombres</th>
                                <th class="px-6 py-3 ">Apellidos</th>
                                <th class="px-6 py-3 ">Departamento</th>
                                <th class="px-6 py-3 ">Edad</th>
                                <th class="px-6 py-3 ">Genero</th>
                                <th class="px-6 py-3 ">Accion</th>

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($diligenciamientos as $diligenciamiento)
                                <tr style="font-size: 14px; color: #555;white-space: no-wrap;">
                                    <td class="px-6 py-4 ">{{ $diligenciamiento->ficha_no }}</td>
                                    <td class="px-6 py-4 ">{{ $diligenciamiento->primer_nombre }}</td>
                                    <td class="px-6 py-4 ">{{ $diligenciamiento->segundo_nombre }}</td>
                                    <td class="px-6 py-4 ">{{ $diligenciamiento->departamento }}</td>
                                    <td class="px-6 py-4 ">{{ $diligenciamiento->edad }}</td>
                                    <td class="px-6 py-4 ">{{ $diligenciamiento->sexo }}</td>
                                    <td class="px-6 py-4 ">
                                        <x-filament::button color="danger" tag="a"
                                            href="{{ route('generate-pdf', ['diligenciamiento' => $diligenciamiento->id, 'configuration' => $configurations[0]]) }}"
                                            target="_blank" style=" font-size: 12px; letter-spacing: 1px;">
                                            Generate PDF
                                        </x-filament::button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
        @if ($showGraphics)
            <div style="margin-top: 150px">
                @livewire(\App\Filament\Widgets\PieChart::class, ['data' => $diligenciamientos])
                @livewire(\App\Filament\Widgets\BarChart::class, ['data' => $diligenciamientos])
            </div>
        @else
            <div></div>
        @endif

    </div>
</x-filament-panels::page>
