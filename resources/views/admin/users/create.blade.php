@extends('adminlte::page')

@section('title', 'users')

@section('content_header')
    <h1>Crear Ususario</h1>
@stop

@section('content')
    <p>Ingrese los Datos</p>
    <div class="card">
        @php
            if(session()){
                if(session('message')=='ok'){
                    echo'<x-adminlte-alert class="bg-teal text-uppercase" icon="fa fa-lg fa-thumbs-up" title="Done" dismissable>
                            registrado con exito..!
                        </x-adminlte-alert>';   
                }
            }
        @endphp
    </div>
    
    <form action="{{route('admin.users.store')}}" method="post">
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
                
                <x-adminlte-input  type="email" name="email" label="Correo" placeholder="user1@gmail.com" label-class="text-lightblue"  value="{{old('email')}}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-envelope text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                
                <x-adminlte-input  type="password" name="password" id="password" label="Contraseña" placeholder="Ingrese su contraseña" label-class="text-lightblue"  value="{{old('password')}}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-key text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                
                <x-adminlte-input  type="password" name="password_confirmation" id="password_confirmation" label="Confirmar contraseña" placeholder="ingrese la misma contraseña" label-class="text-lightblue">
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
    
@stop 