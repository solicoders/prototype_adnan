<div class="" id="tablecontainer">
    <div class="card-body p-0 table-data">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('Pages-text.Project Name') }}</th>
                    <th>{{ __('Pages-text.Project Description') }}</th>
                    <th>{{ __('Pages-text.Start date') }}</th>
                    <th>{{ __('Pages-text.End date') }}</th>
                   <th class="text-center" >Actions</th>

                </tr>
            </thead>
            <tbody id="tbodyresults">
                @forelse($projects->items() as $project)
<tr>
    <td>{{ $project->Name }}</td>
    <td>
        @php
            $words = explode(' ', $project->Description);
            $shortenedDescription = implode(' ', array_slice($words, 0, 4));
            $remainingWords = count($words) - 4;
        @endphp
    
        {{ $shortenedDescription }} @if ($remainingWords > 0) ... @endif
    </td>
    <td>{{ $project->Start_Date }}</td>
    <td>{{ $project->End_Date }}</td>

        <td class="text-center">
            @can('edit-ProjectController')
            <a href="{{route('projects.edit', $project->id)}}" class="btn btn-sm btn-default"><i
                    class="fa-solid fa-pen-to-square"></i></a>
            @endif


            <a href="{{route('tasks.index', ['query' => $project->Name])}}"
                class="btn btn-sm btn-default mx-2">{{ __('Pages-text.See Tasks')}}</a>
          

                



                 
                @can('destroy-ProjectController')
                    <button type="button" class="btn btn-danger delete-project" data-toggle="modal" data-target="#modal-default" data-project-id="{{ $project->id }}" data-project-name="{{ $project->Name }}" >
                <i class="fa-solid fa-trash-can"></i>
                    </button>
                @endif

                <a class="btn btn-primary btn-sm" href="{{route('projects.show', $project->id)}}">
                    <i class="fas fa-folder"></i>          
                </a> 

        </td>

 
</tr>

@empty
<tr class="text-center">
    <td colspan="5">
        {{ __('Pages-text.No Products found') }}
    </td>
</tr>
@endforelse
            </tbody>
        </table>
    </div>







<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteForm" style="display: inline-block;" action="" method="post">
                @csrf
                @method("DELETE")

                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">{{ __('Pages-text.Are you sure you want to delete this Project?') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                <div class="modal-body">
                   
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Pages-text.Cancel') }}</button>
                    <button type="submit" class="btn btn-danger">{{ __('Pages-text.Delete') }}</button>
                </div>
            </form>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>




    <div class="card-footer clearfix">
            <div class="float-right">
            <div id="paginationContainer">                 
                @if ($projects->count() > 0)
                <ul class="pagination m-0">
                    @if ($projects->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="page-link" aria-hidden="true">«</span>
                        </li>
                    @else
                        <li class="page-item">
                            <button class="page-link" page-number="{{ $projects->currentPage() - 1 }}" rel="prev"
                                aria-label="@lang('pagination.previous')">«</button>
                        </li>
                    @endif
        
                    @for ($i = 1; $i <= $projects->lastPage(); $i++)
                        @if ($i == $projects->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $i }}</span></li>
                        @else
                            <li class="page-item"><button class="page-link" page-number="{{ $i }}">{{ $i }}</button></li>
                        @endif
                    @endfor
        
                    @if ($projects->hasMorePages())
                        <li class="page-item">
                            <button class="page-link" page-number="{{ $projects->currentPage() + 1 }}" rel="next"
                                aria-label="@lang('pagination.next')">»</button>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="page-link" aria-hidden="true">»</span>
                        </li>
                    @endif
                </ul>
            @endif              
            </div>
        </div>
        @can('export-ProjectController')
        
        <div class="float-left d-flex">
            <a href="{{route('export.project')}}" style="height: 38px;" class="btn text-black border border-dark">
                {{ __('Pages-text.Export') }} <i class="fa-solid fa-upload pl-2"></i>
            </a>
@endcan
            
  
        @can('import-ProjectController')
            
            <form action="{{ route('import.project') }}" class="pl-1" method="post" enctype="multipart/form-data" id="importForm">
                @csrf 
                <input type="file" name="projects" id="formFileInput" style="position: absolute; left: -9999px;">
                <button type="button" id="fileButton" class="btn text-black border border-dark">{{ __('Pages-text.Import') }} <i class="fa-solid fa-download pl-2"></i></button>
            </form>
@endcan
            
        </div>

        <script>
        $(document).ready(function() {
            $('#fileButton').click(function() {
                $('#formFileInput').click();
            });
        
            $('#formFileInput').change(function() {
                // Assuming you want to submit the form when a file is selected
                $('#importForm').submit();
            });
        });
        </script>
   
 
        
    </div>
  
</div>



