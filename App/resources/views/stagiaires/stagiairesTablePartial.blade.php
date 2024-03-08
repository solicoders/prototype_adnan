<div class="" id="tablecontainer">
    <div class="card-body p-0 table-data">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('Pages-text.stagiaire Name') }}</th>
                    <th>{{ __('Pages-text.stagiaire Email') }}</th>             
                   <th class="text-center" >Actions</th>

                </tr>
            </thead>
    

            <tbody id="tbodyresults">
          
                @foreach($stagiaires as $stagiaire)
                    <tr>
                        <td>{{ $stagiaire->name }}</td>
                        <td>{{ $stagiaire->email }}</td>
            
                        <td class="text-center">
                            <a class="btn btn-primary btn-sm" href="{{ route('stagiaires.show', $stagiaire->id) }}">
                                <i class="fas fa-folder"></i>
                            </a>
            
                            <button type="button" class="btn btn-danger delete-stagiaire" data-toggle="modal" data-target="#modal-default" data-stagiaire-id="{{ $stagiaire->id }}" data-stagiaire-name="{{ $stagiaire->name }}">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>

          
             @endforeach
          
            
            
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
                    <h3 class="modal-title fs-5" id="exampleModalLabel">{{ __('Pages-text.Are you sure you want to delete this stagiaire?') }}</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                <div class="modal-body">
                
                    <!-- Modal body content here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete projet</button>
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
                @if ($stagiaires->count() > 0)
                <ul class="pagination m-0">
                    @if ($stagiaires->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="page-link" aria-hidden="true">«</span>
                        </li>
                    @else
                        <li class="page-item">
                            <button class="page-link" page-number="{{ $stagiaires->currentPage() - 1 }}" rel="prev"
                                aria-label="@lang('pagination.previous')">«</button>
                        </li>
                    @endif
        
                    @for ($i = 1; $i <= $stagiaires->lastPage(); $i++)
                        @if ($i == $stagiaires->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $i }}</span></li>
                        @else
                            <li class="page-item"><button class="page-link" page-number="{{ $i }}">{{ $i }}</button></li>
                        @endif
                    @endfor
        
                    @if ($stagiaires->hasMorePages())
                        <li class="page-item">
                            <button class="page-link" page-number="{{ $stagiaires->currentPage() + 1 }}" rel="next"
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
        
         <div class="float-left d-flex">
            <a href="{{route('export.stagiaires')}}" style="height: 38px;" class="btn text-black border border-dark">
                {{ __('Pages-text.Export') }} <i class="fa-solid fa-upload pl-2"></i>
            </a>
            
            <form action="{{ route('import.stagiaires') }}" class="pl-1" method="post" enctype="multipart/form-data" id="importForm">
                @csrf 
                <input type="file" name="stagiaires" id="formFileInputstagiaires" style="position: absolute; left: -9999px;">
                <button type="button" id="fileButtonstagiaires" class="btn text-black border border-dark">{{ __('Pages-text.Import') }} <i class="fa-solid fa-download pl-2"></i></button>
            </form>

            
        </div>

        <script>
        $(document).ready(function() {
            $('#fileButtonstagiaires').click(function() {
                $('#formFileInputstagiaires').click();
            });
        
            $('#formFileInputstagiaires').change(function() {
              
                $('#importForm').submit();
            });
        });
        </script> 
                                            
           
    </div>

</div>



