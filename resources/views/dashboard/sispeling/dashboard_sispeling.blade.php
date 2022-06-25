@extends('layouts.main')

@section('container')
<section class="section">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Line Chart</h4>
                </div>
                <div class="card-body">
                    <div id="line"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Bar Chart</h4>
                </div>
                <div class="card-body">
                    <div id="bar"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection