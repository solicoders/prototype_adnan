@extends('layouts.app')
@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Pages-text.Modify Task') }}</h1>
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
              <h3 class="card-title">{{ __('Pages-text.Edit Task') }}</h3>
              </div>
              <!-- .card-header -->
              <!-- form start -->
              <form method="Post" action="{{route('tasks.update', $task->id)}}">
                @csrf 
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <label for="">title</label>
                        <input name="title" type="text" class="form-control"
                            id="" placeholder="Enter Name" value="{{$task->Title}}">
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <input name="description" type="text" class="form-control"
                            id="" placeholder="Description" value="{{$task->Description}}">
                    </div>

                    <label for="">Project</label>
                    <select name="project_id" class="form-control">
                        <option>-- Select Project --</option>
                        <option selected value="{{ $selectedproject->id }}">{{$selectedproject->Name}}</option>
                        @foreach ($projects as $project)
                        @if ($project->id !== $selectedproject->id) 
                            <option value="{{ $project->id }}">{{ $project->Name }}</option>
                            @endif
                        @endforeach
                    </select>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-info">edit project</button>
                    <a href="{{route('tasks.index')}}" class="btn btn-default">Cancel</a>
                </div>
            </form>
            </div>
        </div>
    </div>
    </section>


            <!-- /.card -->

@endsection
