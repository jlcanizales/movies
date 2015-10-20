@extends('layouts.base')

@section('title', 'Welcome')


@section('content')
	<div class="form-search row">
		<div class="col-sm-6 col-sm-offset-3">
			<p class="text-center">Search for an actor by name:</p>
			{!! Form::open(array('url' => '/search', 'id'=>'movies-form')) !!}
				<div class="form-group">
					{!! Form::text('name', null, array("placeholder"=>"Name","class"=>"form-control")); !!}
				</div>
				<div class="form-group text-center">
					{!! Form::submit('Search',array("class"=>"btn btn-default")); !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
	@if(Session::has("actors"))
		@foreach($arctors=Session::get("actors") as $actor)
			<div class="row text-center">
				<div class="col-sm-6 col-sm-offset-3">
					<div class="row actor">
						<div class="col-sm-4">
							<a href="actor/{{$actor->id}}">
								@if(isset($actor->profile_path))
									<img class="photo img-responsive" src="http://image.tmdb.org/t/p/w500{{$actor->profile_path}}" alt="{{$actor->name}}">
								@endif
							</a>
						</div>
						<div class="col-sm-8 col-sm-offset-0">
							<a href="actor/{{$actor->id}}">
								<p>Name: {{$actor->name}}</p>
								<p>Popularity: {{$actor->popularity}}</p>
							</a>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	@endif
	@if(isset($data))
		@foreach($data as $movie)
			<div class="row text-center">
				<div class="col-sm-6 col-sm-offset-3">
					<div class="row movie">
						<div class="col-sm-4">
							@if(isset($movie->poster_path))
								<img class="photo img-responsive" src="http://image.tmdb.org/t/p/w500{{$movie->poster_path}}" alt="{{$movie->title}}">
							@endif
						</div>
						<div class="col-sm-8 col-sm-offset-0">
							<p>Title: {{$movie->title}}</p>
							<p>Original title: {{$movie->original_title}}</p>
							<p>Character: {{$movie->character}}</p>
							<p>Release date: {{$movie->release_date}}</p>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	@endif
@stop