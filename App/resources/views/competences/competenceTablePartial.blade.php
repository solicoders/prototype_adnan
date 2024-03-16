<div class="" id="tablecontainer">
    <div class="card-body p-0 table-data">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('Pages-text.Competence Title') }}</th>
                    <th>{{ __('Pages-text.Competence Description') }}</th>
                    <th>{{ __('Pages-text.Module Name') }}</th>
                    <th class="project-actions text-center">Actions</th>
                </tr>
            </thead>
            <tbody id="tbodyresults">
                @forelse($competences as $competence)
                    <tr>
                        <td>{{ $competence->Title }}</td>
                        <td>
                            @php
                                $words = explode(' ', $competence->Description);
                                $shortenedDescription = implode(' ', array_slice($words, 0, 4));
                                $remainingWords = count($words) - 4;
                            @endphp

                            {{ $shortenedDescription }} @if ($remainingWords > 0)
                                ...
                            @endif
                        </td>
                        {{-- relation --}}
                        <td>{{ $competence->ModuleRelation->Name }}</td>
                        <td class="project-actions text-center">





                            <a class="btn btn-default btn-sm" href="{{ route('competences.show', $competence->id) }}">
                                <i class="far fa-eye"></i>
                            </a>


                            @can('edit-CompetencesController')
                                {{-- edit --}}
                                <a class="btn btn-sm btn-default" href="{{ route('competences.edit', $competence->id) }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            @endcan

                            @can('destroy-CompetencesController')
                                <button type="button" class="btn btn-sm btn-danger delete-competence" data-toggle="modal"
                                    data-target="#modal-default" data-competence-id="{{ $competence->id }}"
                                    data-competence-title="{{ $competence->Title }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            @endcan

                        </td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="4">
                            {{ __('Pages-text.No Competences found') }}
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>






    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="deleteForm" style="display: inline-block;" action="" method="Post">
                    @csrf
                    @method('DELETE')

                    <div class="modal-header">
                        <h5 class="modal-title fs-5" id="exampleModalLabel">
                            {{ __('Pages-text.Are you sure you want to delete this competence') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body competences_modal">


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('Pages-text.Cancel') }}</button>
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
                @if ($competences->count() > 0)
                    <ul class="pagination m-0">
                        @if ($competences->onFirstPage())
                            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                <span class="page-link" aria-hidden="true">«</span>
                            </li>
                        @else
                            <li class="page-item">
                                <button class="page-link" page-number="{{ $competences->currentPage() - 1 }}"
                                    rel="prev" aria-label="@lang('pagination.previous')">«</button>
                            </li>
                        @endif

                        @for ($i = 1; $i <= $competences->lastPage(); $i++)
                            @if ($i == $competences->currentPage())
                                <li class="page-item active" aria-current="page"><span
                                        class="page-link">{{ $i }}</span></li>
                            @else
                                <li class="page-item"><button class="page-link"
                                        page-number="{{ $i }}">{{ $i }}</button></li>
                            @endif
                        @endfor

                        @if ($competences->hasMorePages())
                            <li class="page-item">
                                <button class="page-link" page-number="{{ $competences->currentPage() + 1 }}"
                                    rel="next" aria-label="@lang('pagination.next')">»</button>
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
            @can('export-CompetencesController')
                <a href="{{ route('competence.export') }}" style="height: 32px;" class="btn  btn-default btn-sm mt-0 mx-2">
                    <i class="fa-solid fa-file-export"></i>   {{ __('Pages-text.Export') }} 
                </a>
            @endcan
            @can('import-CompetencesController')
                <form action="{{ route('competence.import') }}" class="pl-1" method="post" enctype="multipart/form-data"
                    id="importForm">
                    @csrf
                    <input type="file" name="competences" id="formFileInputcompetences"
                        style="position: absolute; left: -9999px;">
                    <button type="button" id="importbutton"
                        class="btn  btn-default btn-sm"><i class="fa-solid fa-file-arrow-down"></i> {{ __('Pages-text.Import') }} </button>
                </form>
            @endcan

        </div>
        <script>
            $(document).ready(function() {
                $('#importbutton').click(function() {
                    $('#formFileInputcompetences').click();
                });

                $('#formFileInputcompetences').change(function() {
                    // Assuming you want to submit the form when a file is selected
                    $('#importForm').submit();
                });
            });
        </script>





    </div>
</div>
