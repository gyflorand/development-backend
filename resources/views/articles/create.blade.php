@extends('layout')

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css" rel="stylesheet"/>
@endsection

@section('content')
	<?php
	/**
	 * @var \Illuminate\Support\MessageBag $errors
	 */
	?>
    <div id="wrapper">
        <div id="id" class="container">
            <h1 class="heading has-text-weight-bold is-size-4">New Article</h1>

            <form action="{{ route('articles.store') }}" method="POST">
                @csrf

                <div class="field">
                    <label class="label" for="title">Title</label>

                    <div class="control">
                        <input class="input @error('title') is-danger @enderror"
                               id="title"
                               name="title"
                               type="text"
                               value="{{ old('title') }}">
                        @error('title')
                        <p class="help is-danger">{{ $errors->first('title') }}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="excerpt">Excerpt</label>

                    <div class="control">
                        <textarea class="textarea @error('excerpt') is-danger @enderror"
                                  id="excerpt"
                                  name="excerpt"
                        >{{ old('excerpt') }}</textarea>
                    </div>

                    @error('excerpt')
                    <p class="help is-danger">{{ $errors->first('excerpt') }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label class="label" for="body">Body</label>

                    <div class="control">
                        <textarea class="textarea @error('body') is-danger @enderror"
                                  id="body"
                                  name="body"
                        >{{ old('body') }}</textarea>
                    </div>

                    @error('body')
                    <p class="help is-danger">{{ $errors->first('body') }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label class="label" for="tags">Tags</label>

                    <div class="select is-multiple control">
                        <select id="tags" name="tags[]" multiple>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    @error('tags')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection