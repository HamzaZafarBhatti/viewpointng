@extends('layout')
@section('css')

@stop
@section('content')
<section data-settings="particles-1" class="main-section crumina-flying-balls particles-js bg-1 medium-padding120">
    <div class="container">
        <div class="row align-center">
            <div class="col-lg-8 col-lg-offset-2 col-md-12 col-sm-12 col-xs-12">
                <header class="crumina-module crumina-heading heading--h2 heading--with-decoration">
                    <h2 class="heading-title heading--half-colored">Top Earners</h2>     
                </header>
            </div>
        </div>
    </div>
</section>
<section class="medium-padding120 responsive-align-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <header class="crumina-module crumina-heading heading--h2 heading--with-decoration">
                    <div class="heading-sup-title">{{$set->site_name}}</div>
                </header>
                <table>
                    <tr>
                    <thead>
                        <td>Name</td>
                        <td>Amount</td>
                        <td>Status</td>
                    </thead>
                    <tr>
                        @foreach($earners as $object)
                        <td>{!!$object->name!!}</td>
                        <td>{!!$object->amount!!}</td>
                        <td>{!!$object->status!!}</td>

                       
                    </tr>@endforeach
                </table>
              
            </div>
        </div>
    </div>
</section>
@stop