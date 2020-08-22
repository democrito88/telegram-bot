@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}<br><br>

                    <form class="form-container" action="{{ route('mensagem') }}" method="POST">
                        @csrf
                        <label for="mensagem" class="">Digite sua mensagem de texto</label>
                        <input class="form-control" type="text" name="mensagem" id="mensagem"><br><br>
                        <label for="imagem" class="">URL da imagem</label>
                        <input class="form-control" type="text" name="imagem" id="imagem"><br><br>
                        <label for="legenda" class="">Legenda</label>
                        <input class="form-control" type="text" name="legenda" id="legenda"><br><br>
                        <button class="btn btn-primary form-control" type="submit">Envie a mensagem!</button>
                    </form>
                    <br><br>
                    @isset($mensagem)
                        <div class="alert alert-success">
                            <p>Mensagem enviada com sucesso!</p><br>
                            <b>Mensagem:</b><i>{{ $mensagem }}</i><br>
                            <b>Url da imagem:</b><i>{{ $imagem }}</i><br>
                            <b>Legenda da imagem:</b><i>{{ $legendaImagem }}</i>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
