@extends('layouts.master')

@section('title')
    Acceuil
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-center mb-4">
        <!--<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>-->
        <a href="#" class="d-none d-sm-inline-block btn btn-danger shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Tableau de bord en conception...</a>
    </div>


    <!-- Content Row -->
    <div class="row">

        
    </div>

</div>
@endsection

@section('script')
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
@endsection