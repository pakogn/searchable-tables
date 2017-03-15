@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['method' => 'GET']) !!}
                <div class="row">
                    <div class="col-md-1">
                        <div class="form-group">
                            {!! Form::select('limit', ['10' => '10', '15' => '15', '20' => '20', $posts->total() => 'Todos'], $posts->perPage(), ['class' => 'form-control', 'onchange' => 'this.form.submit()', 'data-width' => '100%']) !!}
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
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="inputer">
                                <div class="input-wrapper">
                                    {!! Form::select('post_categories[]', $postCategories, request('post_categories'), ['multiple', 'class' => 'form-control select2', 'data-width' => '100%']) !!}
                                </div>
                            </div>
                        </div><!--.form-group-->
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="inputer">
                                <div class="input-wrapper">
                                    {!! Form::text('date_range', request('date_range', "01/01/1900 - " . dateToday('d/m/Y')), ['class' => 'form-control daterange-picker']) !!}
                                </div>
                            </div>
                        </div><!--.form-group-->
                    </div>
                    <div class="col-md-2">  
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Buscar</button>
                            <a href="{{ route('posts.index') }}" class="btn btn-purple">Ver todos</a>
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
                            <th class="col-md-3">Title</th>
                            <th class="col-md-7">Body</th>
                            <th class="col-md-1">Category</th>
                            <th class="col-md-1">Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->body }}</td>
                                <td>{{ $post->category->label }}</td>
                                <td>{{ $post->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pull-left">
                {{ $posts->total() }} Posts
            </div>
            <div class="pull-right">
                {!! $posts->render() !!}
            </div>
        </div>
    </div>
@stop
