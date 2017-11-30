@extends('...layouts.user_layout')
@section('title')
    <title>Add multiple images</title>
@endsection

@section('content')
    <form id="my-form">
        <input type="text" name="firstname" id="firstname" />
        <input type="text" name="lastname" id="lastname" />
        <div>
            <div id="my-awesome-dropzone" class="dropzone"></div>
        </div>
        <button type="submit">Submit data and files!</button>
    </form>
@endsection
