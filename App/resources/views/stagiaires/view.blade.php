@extends('layouts.app')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Pages-text.stagiaire Details') }}</h1>
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
                <h3 class="card-title">{{ __('Pages-text.Show stagiaire Details') }}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

                <div class="card-body">

                  <div class="card card-secondary card-outline">
                    <div class="card-header">
                      <h5 class="card-title m-0">{{ __('Pages-text.stagiaire Name') }}</h5>
                    </div>
                    <div class="card-body">


                      <p class="card-text">{{$stagiaire->name}}</p>

                    </div>
                  </div>
                  <div class="card card-secondary card-outline">
                    <div class="card-header">
                      <h5 class="card-title m-0">{{ __('Pages-text.stagiaire Email') }}</h5>
                    </div>
                    <div class="card-body">


                      <p class="card-text">{{$stagiaire->email}}</p>

                    </div>
                  </div>  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <div class="d-flex">
              

                        <div class="ml-auto p-2">
                            <a href="{{route('stagiaires.index')}}" class="btn btn-secondary">{{ __('Pages-text.Cancel') }}</a>
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