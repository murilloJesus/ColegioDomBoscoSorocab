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
        @if ( isset($response) && $response)
        <div align=center>
            <h2 class="color-secundary">{{$response}}</h2>
        </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="content">
                    <form action="/message" method="POST">
                        @csrf
                        <div class="fields row">
                            <div class="field col-6 col-12-medium">
                                <label for="name">Nome</label>
                                <input type="text" name="name" id="name" placeholder="Nome">
                            </div>
                            <div class="field col-6 col-12-medium">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" placeholder="Email">
                            </div>
                            <div class="field col-6 col-12-medium">
                                <label for="phone">Telefones</label>
                                <input type="text" name="phone" id="phone" placeholder="Telefone">
                            </div>
                            <div class="field col-6 col-12-medium">
                                <label for="reason">Motivo do contato</label>
                                <select name="reason" id="reason">
                                    <option value="">Selecione..</option>
                                    <option value="Dúvidas">Dúvidas</option>
                                    <option value="Matrículas">Matrículas</option>
                                    <option value="Eventos">Eventos</option>
                                    <option value="Outros">Outros</option>
                                </select>
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

<header id="header">
    <div class="logo container">
        <div>
            <p>Visite!</p>
        </div>
    </div>
</header>

<section id="contato">
    <br>
    <div class="container">
        <a target="_blank" href="https://www.google.com/maps/place/Col%C3%A9gio+Dom+Bosco+Sorocaba/@-23.5113344,-47.5166556,15z/data=!4m5!3m4!1s0x0:0xcead8d2beee86f7a!8m2!3d-23.5113396!4d-47.5166518" class="image featured ease-image-content image-maps"></a>
    </div>
</section>

@endsection
