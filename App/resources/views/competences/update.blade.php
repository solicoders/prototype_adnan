@extends('layouts.app')
@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Pages-text.Modify Competence') }}</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
              <h3 class="card-title">{{ __('Pages-text.Edit Competence') }}</h3>
              </div>
              <!-- .card-header -->
              <!-- form start -->
              <form method="Post" action="{{route('competences.update', $competence->id)}}">
                @csrf 
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <label for="">title</label>
                        <input name="title" type="text" class="form-control"
                            id="" placeholder="Enter Name" value="{{$competence->Title}}">
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <input name="description" type="text" class="form-control"
                            id="" placeholder="Description" value="{{$competence->Description}}">
                    </div>

                    <label for="">Module</label>
                    <select name="module_id" class="form-control">
                        <option>-- Select module --</option>
                        <option selected value="{{ $selectedModule->id }}">{{$selectedModule->Name}}</option>
                        @foreach ($modules as $module)
                        @if ($module->id !== $selectedModule->id) 
                            <option value="{{ $module->id }}">{{ $module->Name }}</option>
                            @endif
                        @endforeach
                    </select>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-info">edit module</button>
                    <a href="{{route('competences.index')}}" class="btn btn-default">Cancel</a>
                </div>
            </form>
            </div>
        </div>
    </div>
    </section>


            <!-- /.card -->

@endsection
