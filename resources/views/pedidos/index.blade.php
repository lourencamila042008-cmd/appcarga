<x-guest-layout>
<form method="POST" action="{{ url('pedidos') }}">
        @csrf
         <div>
            <x-input-label for="vehiculo" :value="__('vehiculo')" />
        <select name="vehiculo" id="vehiculo" required>
         <option value="0">seleccione el tipo de vehiculo</option>
          <option value="1">automovil particular</option>
             <option value="2">camion</option>
              <option value="3">mula</option>
               <option value="4">motocicleta</option>
                <option value="5">automovil particular</option>
                 <option value="6">motocarro</option>
        </select>
        </div>

        <div>
             <div>
            <x-input-label for="paquete" :value="__('paquete')" />
        <select name="paquete" id="paquete" required>
         <option value="0">seleccione el tipo de paquete</option>
            <option value="1">pequeño</option>
             <option value="2">mediano</option>
              <option value="3">grande</option>
        </select>
        </div>
        
        <div>
            <x-input-label for="paradas" :value="__('paradas')" />
            <x-text-input id="paradas" class="block mt-1 w-full" type="text" name="paradas" :value="old('paradas')" required autofocus autocomplete="paradas" />
            <x-input-error :messages="$errors->get('paradas')" class="mt-2" />
        </div>

          <div>
            <x-input-label for="direccion" :value="__('direccion')" />
            <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" required autofocus autocomplete="direccion" />
            <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
        </div><br>

           <div>
            <x-primary-button class="ms-4">
                {{ __('cargar pedido') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
