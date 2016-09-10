@extends('layouts.app')
@section('title')
    Quotes
@endsection

@section('content')
    <div class="main">
        <section class="quotes">
            <h1>Latest Quotes</h1>
            <article class="quote">
                <div class="delete"><a href="#">X</a></div>
                Quote Text
                <div class="info">Created by <a href="">Louis</a> on ...</div>
            </article>
            Pagination
        </section>

        <section class="edit-quotes">
            <h1>Add Quotes</h1>
            <form action="{{route('create')}}"  method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="author"> Your Name</label>
                    <input type="text" name="author" id="author" class="form-control" placeholder="Your Name">
                </div>
                <div class="form-group">
                    <label for="quote"> Quote</label>
                    <textarea name="quote" id="quote" cols="20" rows="10" class="form-control">
            </textarea>
                </div>
                <button class="btn btn-primary" type="submit"> Submit Quote</button>
            </form>
        </section>

    </div>
@endsection