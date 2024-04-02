@extends('layouts.layout_home')
<div class="container">
    @include('header')
    <div>
        <h3> Información del usuario</h1>
            <div class="row card card-body d-flex flex-column justify-content-center align-items-center">
                <div>
                    {{-- boton para regresar --}}
                    <a href="{{ route('home') }}" class="btn btn-primary">Regresar</a>
                </div>
                <div class="w-auto">
                    <img src={{ $user->picture->large }} class="rounded-circle" alt="Avatar" loading="lazy" />
                </div>
                <div class="w-100 text-center">
                    <h2>{{ $user->name->first . ' ' . $user->name->last }}</h2>
                    <p>{{ $user->email }}</p>
                    <p>{{ $user->phone }}</p>
                    <p>{{ $user->location->city . ', ' . $user->location->country }}</p>
                </div>
            </div>
    </div>
</div>
