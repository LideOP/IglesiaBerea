
<form action="{{route('register')}}" method="post">
        @csrf 
        <div class="card-body p-5">
            <div class="card p-2 mx-auto" style="width: 800px;">
    
                <x-adminlte-input  type="text" name="nombre" label="Nombre" placeholder="ingrese su nombre de usuario" label-class="text-lightblue" value="{{old('nombre')}}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user-circle text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>        
                
                <x-adminlte-input  type="email" name="correo" label="Correo" placeholder="user1@gmail.com" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-envelope text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                
                <x-adminlte-input  type="password" name="clave" label="Contraseña" placeholder="Ingrese su contraseña" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-key text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                
                <x-adminlte-input  type="password" name="clave" label="Confirmar contraseña" placeholder="ingrese la misma contraseña" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-check text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
        
                <x-adminlte-button style="width: 150px; height: 50px;" type="submit" label="Guardar" theme="info" icon="fas fa-save"/>
            </div>
        </div>
    </form>