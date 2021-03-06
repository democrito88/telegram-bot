@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}<br><br>

                    <form action="{{ route('mensagem') }}" method="POST">
                        @csrf
                        <label for="id">Escolha o destinatário</label>
                        <select name="id" class="form-control">
                            @foreach ($usuarios as $usuario)
                                <option value="{{ $usuario['id'] }}">{{ $usuario['name'] }}</option>
                            @endforeach
                        </select><br>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="mensagem" class="">Digite sua mensagem de texto</label>
                                <input class="form-control" type="text" name="mensagem" id="mensagem">
                            </div>
                            <div class="col-md-6">
                                <label for="imagem" class="">URL da imagem</label>
                                <input class="form-control" type="text" name="imagem" id="imagem">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="video" class="">URL do Video</label>
                                <input class="form-control" type="text" name="video" id="video">
                            </div>
                            <div class="col-md-6">
                                <label for="sticker" class="">URI do sticker</label>
                                <input class="form-control" type="text" name="sticker" id="sticker">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="document" class="">Documento</label>
                                <input class="form-control" type="text" name="documento" id="documento">
                            </div>
                            <div class="col-md-6">
                                <label for="legenda" class="">Legenda</label>
                                <input class="form-control" type="text" name="legenda" id="legenda">
                            </div>
                        </div>
                        <br>
                        <hr>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="latitude" class="">Latitude</label>
                                <input class="form-control" type="text" name="latitude" id="latitude">
                            </div>
                            <div class="col-md-6">
                                <label for="longitude" class="">Longitude</label>
                                <input class="form-control" type="text" name="longitude" id="longitude">
                            </div>
                        </div>
                        <br>
                        <hr>
                        <br>
                        <button class="btn btn-primary form-control" type="submit">Envie a mensagem!</button>
                    </form>
                    <br><br>
                    @isset($mensagemInfo)
                        <div class="alert alert-success">
                            <p>Mensagem enviada com sucesso!</p><br>
                            <b>Mensagem:</b><i>{{ $mensagemInfo['mensagem'] }}</i><br>
                            <b>Url da imagem:</b><i>{{ $mensagemInfo['imagem'] }}</i><br>
                            <b>Legenda da imagem:</b><i>{{ $mensagemInfo['legenda'] }}</i>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card-header">{{ __('Dashboard') }}</div>

            <div class="card-body">
                <form action="{{ route('email') }}" method="POST">
                    @csrf
                    <label for="email">Escolha o destinatário</label>
                    <select id="email" name="email" class="form-control">
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario['email'] }}">{{ $usuario['name'] }}</option>
                        @endforeach
                    </select><br><br>
                    <label for="assunto">Assunto</label>
                    <input name="assunto" type="text" id="assunto"><br>
                    <label for="conteudo">Mensagem</label>
                    <textarea id="conteudo" name="conteudo"></textarea><br>
                    <hr><br>
                    <button type="submit" class="btn btn-info">Enviar</button>
                </form>
                @isset($mensagemMail)
                    <div class="alert alert-success">
                        <h3>Email enviado com sucesso!</h3>
                    </div>
                @endisset
            </div>
        </div>
    </div>
</div>
@endsection
