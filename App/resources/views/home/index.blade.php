@extends('layouts.app')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Bienvenue</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-6">

                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$modules}}</h3>
                            <p>modules</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('modules.index')}}" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-6">

                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$competences}}</h3>
                            <p>Competences</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{route('competences.index')}}" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>


                @can('index-StagiairesController')
                <div class="col-lg-4 col-6">

                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$stagiaires}}</h3>
                            <p>Stagiaires</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{route('stagiaires.index')}}" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                @endcan

            </div>
        </div>
    </section>


@endsection