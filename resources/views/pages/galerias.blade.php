@extends('layouts.front')

@section('content')
    <header id="header">
        <div class="logo container">
            <div>
                <p>Galerias</p>
            </div>
        </div>
    </header>


    <section class="box blog">
        <div class="container">
            {{-- GALERIA DE FOTOS --}}
            <galeria></galeria>
        </div>
    </section>

@endsection
