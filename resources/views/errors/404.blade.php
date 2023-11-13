@extends('website.master')

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h4>Sorry ... the page you are looking that could not found.Please go <a href="{{route('home')}}" class="text-success">Home</a></h4>
                </div>
            </div>
        </div>
    </section>
@endsection
