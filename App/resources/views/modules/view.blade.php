@extends('layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Pages-text.Module Details') }}</h1>
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
                <h3 class="card-title">{{ __('Pages-text.View Module Details') }}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

                <div class="card-body">

                  <div class="card card-secondary card-outline">
                    <div class="card-header">
                      <h5 class="card-title m-0">{{ __('Pages-text.Module Name') }}</h5>
                    </div>
                    <div class="card-body">


                      <p class="card-text">{{$module->Name}}</p>

                    </div>
                  </div>
                  <div class="card card-secondary card-outline">
                    <div class="card-header">
                      <h5 class="card-title m-0">{{ __('Pages-text.Module Description') }}</h5>
                    </div>
                    <div class="card-body">


                      <p class="card-text">{{$module->Description}}</p>

                    </div>
                  </div>
                  <div class="card card-secondary card-outline">
                    <div class="card-header">
                      <h5 class="card-title m-0">{{ __('Pages-text.Start date') }}</h5>
                    </div>
                    <div class="card-body">


                      <p class="card-text">{{$module->Start_Date}}</p>

                    </div>
                  </div>
                  <div class="card card-secondary card-outline">
                    <div class="card-header">
                      <h5 class="card-title m-0">{{ __('Pages-text.End date') }}</h5>
                    </div>
                    <div class="card-body">
                      <p class="card-text">{{$module->End_Date}}</p>
                    </div>
                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <div class="d-flex">
                        <div class="p-2">

                            <a href="{{route('modules.edit', $module->id)}}" class="btn btn-warning">{{ __('Pages-text.Edit Module') }}</a>

                        </div>

                        <div class="ml-auto p-2">
                            <a href="{{route('modules.index')}}" class="btn btn-secondary">{{ __('Pages-text.Cancel') }}</a>
                        </div>
                      </div>

                </div>
            </div>
            <!-- /.card -->

          </div>


      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>




@endsection