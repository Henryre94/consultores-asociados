<x-filament-panels::page>
            <div class=" mt-1 rounded p-1 w-full">
                <div class="w-full p-6 mx-auto bg-white rounded-lg shadow-md space-y-6">
                    <div class="flex flex-col space-y-4 w-full">
                    <form method="GET" action="{{ route('generate-report') }}" target="_blank">
                        <div class="flex justify-center items-center">
                            <div class="mb-2 w-1/2 border-b border-gray-300 py-2">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Población ajustada por omisión</h3>
                                    <div class="flex flex-col mb-2">
                                        <label for="omision" class="text-sm font-semibold text-gray-700 mb-1">Población total ajustada por omisión</label>
                                        <x-filament::input.wrapper>
                                            <x-filament::input id="omision" type="number" name="omision" wire:model.defer="omision" class="w-full" />
                                        </x-filament::input.wrapper>
                                    </div>

                                    <div class="flex flex-col mb-2">
                                        <label for="omisionCabecera" class="text-sm font-semibold text-gray-700 mb-1">Población ajustada por omisión en cabecera municipal</label>
                                        <x-filament::input.wrapper>
                                            <x-filament::input id="omisionCabecera" type="number" name="omisionCabecera" wire:model.defer="omisionCabecera" class="w-full" />
                                        </x-filament::input.wrapper>
                                    </div>

                                    <div class="flex flex-col mb-2">
                                        <label for="omisionPoblado" class="text-sm font-semibold text-gray-700 mb-1">Población ajustada por omisión en centros poblados y rural disperso</label>
                                        <x-filament::input.wrapper>
                                            <x-filament::input id="omisionPoblado" type="number" name="omisionPoblado" wire:model.defer="omisionPoblado" class="w-full" />
                                        </x-filament::input.wrapper>
                                    </div>

                                    <div class="flex flex-col mb-2">
                                        <label for="omisionPoblado" class="text-sm font-semibold text-gray-700 mb-1">Omision Porcentaje:</label>
                                        <x-filament::input.wrapper>
                                            <x-filament::input id="omisionPorcentaje" type="number" name="omisionPorcentaje" wire:model.defer="omisionPorcentaje" class="w-full" />
                                        </x-filament::input.wrapper>
                                    </div>

                                    <div class="flex flex-col mb-2">
                                        <label for="omisionPoblado" class="text-sm font-semibold text-gray-700 mb-1">Personas que no respondondieron a la pregunta de autoreconocimiento:</label>
                                        <x-filament::input.wrapper>
                                            <x-filament::input id="omisionPorcentaje" type="number" name="noAutoreconocimiento" wire:model.defer="noAutoreconocimiento" class="w-full" />
                                        </x-filament::input.wrapper>
                                    </div>
                            </div>
                        </div>
                        <div class="flex justify-center items-center">
                            <div class="mb-4 w-1/2 border-b border-gray-300 py-2">
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Omisión por grupos de edad</h3>

                                @php
                                    $gruposEdad = [
                                        '0-14' => 'omisionEdadGrupo1',
                                        '15-59' => 'omisionEdadGrupo2',
                                        '60 o más' => 'omisionEdadGrupo3'
                                    ];
                                @endphp

                                @foreach ($gruposEdad as $grupo => $nombre)
                                <div class="flex flex-col mb-2">
                                    <label for="{{ $nombre }}" class="text-sm font-semibold text-gray-700 mb-1">Omisión total {{ $grupo }}</label>
                                    <x-filament::input.wrapper>
                                        <x-filament::input id="{{ $nombre }}" type="text" name="{{ $nombre }}" wire:model.defer="{{ $nombre }}" class="w-full" />
                                    </x-filament::input.wrapper>
                                </div>
                                @endforeach
                            </div>

                        </div>

                        
                        <div class="flex flex-row gap-x-6">
                            <div class="mb-4 flex-1">
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Omisión por género y grupo de edad</h3>
                                @php
                                    $gruposGenero = [
                                        '0-4' => ['Mujer' => 'omisionEdadGrupoArbolMujer1', 'Hombre' => 'omisionEdadGrupoArbolHombre1'],
                                        '10-14' => ['Mujer' => 'omisionEdadGrupoArbolMujer2', 'Hombre' => 'omisionEdadGrupoArbolHombre2'],
                                        '20-24' => ['Mujer' => 'omisionEdadGrupoArbolMujer3', 'Hombre' => 'omisionEdadGrupoArbolHombre3'],
                                        '30-34' => ['Mujer' => 'omisionEdadGrupoArbolMujer4', 'Hombre' => 'omisionEdadGrupoArbolHombre4'],
                                        '40-44' => ['Mujer' => 'omisionEdadGrupoArbolMujer5', 'Hombre' => 'omisionEdadGrupoArbolHombre5'],
                                        '50-54' => ['Mujer' => 'omisionEdadGrupoArbolMujer6', 'Hombre' => 'omisionEdadGrupoArbolHombre6'],
                                        '60-64' => ['Mujer' => 'omisionEdadGrupoArbolMujer7', 'Hombre' => 'omisionEdadGrupoArbolHombre7'],
                                        '70-74' => ['Mujer' => 'omisionEdadGrupoArbolMujer8', 'Hombre' => 'omisionEdadGrupoArbolHombre8'],
                                        '80 o mas' => ['Mujer' => 'omisionEdadGrupoArbolMujer9', 'Hombre' => 'omisionEdadGrupoArbolHombre9'],
                                        
                                    ];
                                @endphp

                                @foreach ($gruposGenero as $grupo => $generos)
                                    <div class="mb-2">
                                        <p class="font-semibold text-sm text-gray-700 mb-1">Omisión total {{ $grupo }}:</p>
                                        <div class="grid grid-cols-2 gap-2">
                                            @foreach ($generos as $genero => $nombre)
                                            <div class="flex flex-col">
                                                <label for="{{ $nombre }}" class="text-sm font-semibold text-gray-700 mb-1">{{ $genero }}</label>
                                                <x-filament::input.wrapper>
                                                    <x-filament::input id="{{ $nombre }}" type="text" name="{{ $nombre }}" wire:model.defer="{{ $nombre }}" class="w-full" />
                                                </x-filament::input.wrapper>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="mb-4 flex-1">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Unidades de vivienda</h3>

                                    <div class="flex flex-col mb-2">
                                        <label for="totalUnidadesVivienda" class="text-sm font-semibold text-gray-700 mb-1">Total unidades de vivienda</label>
                                        <x-filament::input.wrapper>
                                            <x-filament::input id="totalUnidadesVivienda" type="text" name="totalUnidadesVivienda" wire:model.defer="totalUnidadesVivienda" class="w-full" />
                                        </x-filament::input.wrapper>
                                    </div>

                                    <div class="flex flex-col mb-2">
                                        <label for="totalUnidadesViviendaOcupadas" class="text-sm font-semibold text-gray-700 mb-1">Total viviendas ocupadas</label>
                                        <x-filament::input.wrapper>
                                            <x-filament::input id="totalUnidadesViviendaOcupadas" type="text" name="totalUnidadesViviendaOcupadas" wire:model.defer="totalUnidadesViviendaOcupadas" class="w-full" />
                                        </x-filament::input.wrapper>
                                    </div>
                                </div>
                                <div>
                                
                                    <div class="mb-4">
                                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Tipos de vivienda</h3>

                                        <div class="flex flex-col mb-2">
                                            <label for="totalResidencial" class="text-sm font-semibold text-gray-700 mb-1">Residencial</label>
                                            <x-filament::input.wrapper>
                                                <x-filament::input id="totalResidencial" type="float" name="totalResidencial" wire:model.defer="totalResidencial" class="w-full" />
                                            </x-filament::input.wrapper>
                                        </div>

                                        <div class="flex flex-col mb-2">
                                            <label for="totalNoResidencial" class="text-sm font-semibold text-gray-700 mb-1">No residencial</label>
                                            <x-filament::input.wrapper>
                                                <x-filament::input id="totalNoResidencial" type="float" name="totalNoResidencial" wire:model.defer="totalNoResidencial" class="w-full" />
                                            </x-filament::input.wrapper>
                                        </div>

                                        <div class="flex flex-col mb-2">
                                            <label for="totalMixto" class="text-sm font-semibold text-gray-700 mb-1">Mixto</label>
                                            <x-filament::input.wrapper>
                                                <x-filament::input id="totalMixto" type="float" name="totalMixto" wire:model.defer="totalMixto" class="w-full" />
                                            </x-filament::input.wrapper>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                
                                    <div class="mb-4">
                                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Lugar de nacimiento</h3>

                                        <div class="flex flex-col mb-2">
                                            <label for="totalResidencial" class="text-sm font-semibold text-gray-700 mb-1">Otro Pais Mujer:</label>
                                            <x-filament::input.wrapper>
                                                <x-filament::input id="totalResidencial" type="float" name="otroPaisMujer" wire:model.defer="otroPaisMujer" class="w-full" />
                                            </x-filament::input.wrapper>
                                        </div>

                                        <div class="flex flex-col mb-2">
                                            <label for="totalResidencial" class="text-sm font-semibold text-gray-700 mb-1">Otro Pais Hombre:</label>
                                            <x-filament::input.wrapper>
                                                <x-filament::input id="totalResidencial" type="float" name="otroPaisHombre" wire:model.defer="otroPaisHombre" class="w-full" />
                                            </x-filament::input.wrapper>
                                        </div>

                                        <div class="flex flex-col mb-2">
                                            <label for="totalResidencial" class="text-sm font-semibold text-gray-700 mb-1">Otro Municipio Mujer:</label>
                                            <x-filament::input.wrapper>
                                                <x-filament::input id="totalResidencial" type="float" name="otroMunicipioMujer" wire:model.defer="otroMunicipioMujer" class="w-full" />
                                            </x-filament::input.wrapper>
                                        </div>

                                        <div class="flex flex-col mb-2">
                                            <label for="totalResidencial" class="text-sm font-semibold text-gray-700 mb-1">Otro Municipio Hombre:</label>
                                            <x-filament::input.wrapper>
                                                <x-filament::input id="totalResidencial" type="float" name="otroMunicipioHombre" wire:model.defer="otroMunicipioHombre" class="w-full" />
                                            </x-filament::input.wrapper>
                                        </div>

                                        <div class="flex flex-col mb-2">
                                            <label for="totalNoResidencial" class="text-sm font-semibold text-gray-700 mb-1">Este municipio Mujer:</label>
                                            <x-filament::input.wrapper>
                                                <x-filament::input id="totalNoResidencial" type="float" name="esteMunicipioMujer" wire:model.defer="esteMunicipioHombre" class="w-full" />
                                            </x-filament::input.wrapper>
                                        </div>

                                        <div class="flex flex-col mb-2">
                                            <label for="totalMixto" class="text-sm font-semibold text-gray-700 mb-1">Este municipio Hombre:</label>
                                            <x-filament::input.wrapper>
                                                <x-filament::input id="totalMixto" type="float" name="esteMunicipioHombre" wire:model.defer="esteMunicipioHombre" class="w-full" />
                                            </x-filament::input.wrapper>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                
                                    <div class="mb-4">
                                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Total hogares</h3>

                                        <div class="flex flex-col mb-2">
                                            <label for="totalResidencial" class="text-sm font-semibold text-gray-700 mb-1">Particulares:</label>
                                            <x-filament::input.wrapper>
                                                <x-filament::input id="totalResidencial" type="number" name="totalHogaresParticulares" wire:model.defer="totalHogaresParticulares" class="w-full" />
                                            </x-filament::input.wrapper>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                
                                <div class="mb-4">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-2">La población étnica:</h3>

                                    <div class="flex flex-col mb-2">
                                        <label for="totalResidencial" class="text-sm font-semibold text-gray-700 mb-1">Indigenas:</label>
                                        <x-filament::input.wrapper>
                                            <x-filament::input id="totalResidencial" type="float" name="indigenas" wire:model.defer="indigenas" class="w-full" />
                                        </x-filament::input.wrapper>
                                    </div>

                                    <div class="flex flex-col mb-2">
                                        <label for="totalResidencial" class="text-sm font-semibold text-gray-700 mb-1">ROM(Gitanos):</label>
                                        <x-filament::input.wrapper>
                                            <x-filament::input id="totalResidencial" type="float" name="gitanos" wire:model.defer="gitanos" class="w-full" />
                                        </x-filament::input.wrapper>
                                    </div>

                                    <div class="flex flex-col mb-2">
                                        <label for="totalResidencial" class="text-sm font-semibold text-gray-700 mb-1">Raizales:</label>
                                        <x-filament::input.wrapper>
                                            <x-filament::input id="totalResidencial" type="float" name="raizales" wire:model.defer="raizales" class="w-full" />
                                        </x-filament::input.wrapper>
                                    </div>

                                    <div class="flex flex-col mb-2">
                                        <label for="totalResidencial" class="text-sm font-semibold text-gray-700 mb-1">Palenqueros:</label>
                                        <x-filament::input.wrapper>
                                            <x-filament::input id="totalResidencial" type="float" name="palenqueros" wire:model.defer="palenqueros" class="w-full" />
                                        </x-filament::input.wrapper>
                                    </div>

                                    <div class="flex flex-col mb-2">
                                        <label for="totalNoResidencial" class="text-sm font-semibold text-gray-700 mb-1">Afrocolombianos:</label>
                                        <x-filament::input.wrapper>
                                            <x-filament::input id="totalNoResidencial" type="float" name="afrocolombiano" wire:model.defer="afrocolombiano" class="w-full" />
                                        </x-filament::input.wrapper>
                                    </div>

                                    <div class="flex flex-col mb-2">
                                        <label for="totalMixto" class="text-sm font-semibold text-gray-700 mb-1">Ningún grupo étnico:</label>
                                        <x-filament::input.wrapper>
                                            <x-filament::input id="totalMixto" type="float" name="ningunoEtnico" wire:model.defer="ningunoEtnico" class="w-full" />
                                        </x-filament::input.wrapper>
                                    </div>
                                </div>


                                <div class="mb-4">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Servicios Publicos</h3>

                                    <div class="flex flex-col mb-2">
                                        <label for="totalResidencial" class="text-sm font-semibold text-gray-700 mb-1">Energía Electrica:</label>
                                        <x-filament::input.wrapper>
                                            <x-filament::input id="totalResidencial" type="float" name="servicioElectrico" wire:model.defer="servicioElectrico" class="w-full" />
                                        </x-filament::input.wrapper>
                                    </div>

                                    <div class="flex flex-col mb-2">
                                        <label for="totalResidencial" class="text-sm font-semibold text-gray-700 mb-1">Alcantarillado:</label>
                                        <x-filament::input.wrapper>
                                            <x-filament::input id="totalResidencial" type="float" name="servicioAlcantarillado" wire:model.defer="servicioAlcantarillado" class="w-full" />
                                        </x-filament::input.wrapper>
                                    </div>

                                    <div class="flex flex-col mb-2">
                                        <label for="totalResidencial" class="text-sm font-semibold text-gray-700 mb-1">Acueducto:</label>
                                        <x-filament::input.wrapper>
                                            <x-filament::input id="totalResidencial" type="float" name="servicioAcueducto" wire:model.defer="servicioAcueducto" class="w-full" />
                                        </x-filament::input.wrapper>
                                    </div>

                                    <div class="flex flex-col mb-2">
                                        <label for="totalNoResidencial" class="text-sm font-semibold text-gray-700 mb-1">Recoleccion de Basuras:</label>
                                        <x-filament::input.wrapper>
                                            <x-filament::input id="totalNoResidencial" type="float" name="servicioBasuras" wire:model.defer="servicioBasuras" class="w-full" />
                                        </x-filament::input.wrapper>
                                    </div>

                                    <div class="flex flex-col mb-2">
                                        <label for="totalMixto" class="text-sm font-semibold text-gray-700 mb-1">Gas Natural:</label>
                                        <x-filament::input.wrapper>
                                            <x-filament::input id="totalMixto" type="float" name="servicioGas" wire:model.defer="servicioGas" class="w-full" />
                                        </x-filament::input.wrapper>
                                    </div>

                                    <div class="flex flex-col mb-2">
                                        <label for="totalMixto" class="text-sm font-semibold text-gray-700 mb-1">Internet:</label>
                                        <x-filament::input.wrapper>
                                            <x-filament::input id="totalMixto" type="float" name="servicioInternet" wire:model.defer="servicioInternet" class="w-full" />
                                        </x-filament::input.wrapper>
                                    </div>
                                </div>
                            </div>


                            </div>
                         </div>

                        

                    
                        



                        <div class="flex justify-end mt-4">
                            <x-filament::button type="submit">Generar Reporte</x-filament::button>
                        </div>
                    </form>
            </div>
</x-filament-panels::page>
