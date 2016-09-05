@extends('layouts.app')

@section('title', trans('selection.title'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{trans('selection.app_to_use_question')}}</div>

                <div class="panel-body">
                    <form method="post" action="/select_app">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="option">Aplicações</label>
                            <select name="route" id="option" class="form-control">
                                <option disabled selected>Selecione</option>
                                <option value="/admin">Administração</option>
                                <option value="/company">Empresas</option>
                                <option value="/employ">Funcionários</option>
                            </select>
                        </div>
                        <button class="btn btn-success btn-lg pull-right">Ir para o painel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
