@extends('layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Pages-text.Competence Details') }}</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header   -->

    <!-- Main content -->
   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <div class="d-flex justify-content-center" >
            <!-- general form elements -->
            <div class="col-md-12 card card-secondary card-create">
              <div class="card-header">
                <h3 class="card-title">{{ __('Pages-text.Show Competence') }}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

                <div class="card-body">

                  <div class="card card-secondary card-outline">
                    <div class="card-header">
                      <h5 class="card-title m-0">{{ __('Pages-text.Competence Title') }}</h5>
                    </div>
                    <div class="card-body">


                      <p class="card-text">{{$competence->Title}}</p>

                    </div>
                  </div>
                  <div class="card card-secondary card-outline">
                    <div class="card-header">
                      <h5 class="card-title m-0">{{ __('Pages-text.Competence Description') }}</h5>
                    </div>
                    <div class="card-body">


                      <p class="card-text">{{$competence->Description}}</p>

                    </div>
                  </div>
                  <div class="card card-secondary card-outline">
                    <div class="card-header">
                      <h5 class="card-title m-0">{{ __('Pages-text.Competence Name') }}</h5>
                    </div>
                    <div class="card-body">


                      <p class="card-text">{{$moduleName}}</p>

                    </div>
                  </div>    
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <div class="d-flex">
                         @can('edit-TasksController')
                        <div class="p-2">
                            <a href="{{route('competences.edit', $competences->id)}}" class="btn btn-warning">{{ __('Pages-text.Modify') }}</a>
                        </div>
                        @endcan

                        <div class="ml-auto p-2">
                            <a href="{{route('competences.index')}}" class="btn btn-secondary">{{ __('Pages-text.Cancel') }}</a>
                        </div>
                      </div>

                </div>
            </div>
            <!-- /.card -->

          </div>


      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->




@endsection