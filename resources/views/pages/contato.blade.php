@extends('layouts.front')

@section('content')

<header id="header">
    <div class="logo container">
        <div>
            <p>CONTATE-NOS</p>
        </div>
    </div>
</header>

<section id="contato">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="content">
                    <form>
                        <div class="fields row">
                            <div class="field col-6 col-12-medium">
                                <label for="name">Nome</label>
                                <input type="text" name="name" id="name" placeholder="Nome">
                            </div>
                            <div class="field col-6 col-12-medium">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" placeholder="Email">
                            </div>
                            <div class="field col-12">
                                <label for="message">Mensagem</label>
                                <textarea name="message" id="message" placeholder="Mensagem" rows="7"></textarea>
                            </div>
                        </div>
                        <div class="actions">
                            <input type="submit" value="Enviar mensagem" class="button alt">
                        </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
