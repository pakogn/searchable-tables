@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['method' => 'GET']) !!}
                <div class="row">
                    <div class="col-md-1">
                        <div class="form-group">
                            {!! Form::select('limit', ['10' => '10', '15' => '15', '20' => '20', $postCategories->total() => 'Todos'], $postCategories->perPage(), ['class' => 'form-control', 'onchange' => 'this.form.submit()', 'data-width' => '100%']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="inputer">
                                <div class="input-wrapper">
                                    {!! Form::text('q', request('q'), ['class' => 'form-control', 'placeholder' => 'Buscar...']) !!}
                                </div>
                            </div>
                        </div><!--.form-group-->
                    </div>
                    <div class="col-md-3 col-md-offset-4">  
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Buscar</button>
                            <a href="{{ route('posts.categories.index') }}" class="btn btn-purple">Ver todos</a>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed clickable-rows">
                    <thead>
                        <tr>
                            <th class="col-md-12">Label</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($postCategories as $postCategory)
                            <tr>
                                <td>{{ $postCategory->label }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pull-left">
                {{ $postCategories->total() }} Posts
            </div>
            <div class="pull-right">
                {!! $postCategories->render() !!}
            </div>
        </div>
    </div>
@stop
