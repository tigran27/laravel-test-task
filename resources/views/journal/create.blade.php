@extends('layout.app')
@section('title','Create Journal')
@section('content')
    <div class="container">
          <div class="content journal-page">
            <div class="header">
                <h3 class="title text-center">Add new Journal</h3>
            </div>
                <form id="myForm" name="myForm" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="form-group col-md-12 required"><label for="titles">Title</label>
                                        <input type='text' name="titles" id="titles" class='form-control titles' required="required"/>
                                        <div class="error titles"></div>
                                    </div>

                                    <div class="form-group col-md-12"><label for="description">Description</label>
                                        <input type='text' id="description" name="description" class='form-control description'/>
                                    </div>
                                    <div class="form-group col-md-12"><label for="image">Image</label>
                                        <input type='file' name="image" id="image" class='form-control journal-image'/>
                                        <div class="error image files"></div>
                                    </div>
                                    <div class="form-group col-md-12"><label for="creation">Journal Creation Date</label>
                                        <input type='date' id="creation" name="created-date" class='form-control created-date'/>
                                    </div>
                                    <div class="form-group col-md-12"><label>Select author</label>
                                        @if($authors)
                                            <ul class="list-group authors-ul">
                                                @foreach($authors as $author)
                                                    <li class="text-center list-group-item">
                                                        <label for="author{{$author->id}}" class="cursor-pointer">{{$author->first_name}} {{$author->last_name}} {{$author->middle_name}}</label>
                                                        <input id="author{{$author->id}}" type="checkbox" name="author[]" class="author-id required" value="{{$author->id}}"/><br>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div class="error author"></div>
                                        @endif
                                    </div>
                                    <div class="sucess-save text-center"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <div class="text-center">
                <button class="btn btn-primary btn-md save-journal" type="button"><i class="glyphicon glyphicon-plus"></i> Save Journal</button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/ajaxCreateJournal.js')}}"></script>
@endsection
