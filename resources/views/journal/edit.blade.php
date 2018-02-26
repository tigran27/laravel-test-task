@extends('layout.app')
    <title>@section('title', 'Edit Journal')</title>

@section('content')
<div class="container">
        <div class="box">

        <div class="content journal-page">
            <div class="header">
                <h3 class="title text-center">Edit Journal</h3>
            </div>
            <div class="row">
                    <span class="container col-md-5 item_content">
                        <form id="myForm" method="POST" name="myForm" enctype="multipart/form-data">
                            <div class="container">
								<div class="row">
									<div class="col-md-8">
										<div class="panel">
											<div class="panel-body">
                                                <div class="form-group col-md-12 required"><label for="titles">Title</label>
                                                    <input type='text' id="titles" name="titles" class='form-control titles' placeholder="Title" value="{{$oldData->title}}" required="required" />
                                                        <div class="error titles"></div>
                                                </div>
                                                <div class="form-group col-md-12"><label for="description">Description</label><input id="description" type='text' name="description" placeholder="Description" value="{{$oldData->description}}" class='form-control description' /></div>

                                                <div class="form-group col-md-12"><label for="image">Image</label>

                                                    <input id="image" type='file' name="image" class='form-control journal-image' />
                                                    <div>
                                                        <p>current image</p>
                                                        <img src="{{asset('images/'.$oldData->image)}}" class="img-class2" alt="">

                                                    </div>

                                                    <div class="error image"></div>
                                                </div>

                                                <div class="form-group col-md-12"><label for="creation">Creation Date</label>
                                                    <input type='date' id="creation" name="created-date" value="{{$oldData->journal_creation_date}}" class='form-control created-date' />
                                                </div>

												<div class="form-group col-md-12"><label>Select author</label>


                                                    @if($authors)
                                                        <ul class="list-group authors-ul">
                                                            @foreach($authors as $author)
                                                                <li class="text-center list-group-item"><label for="author{{$author->id}}" class="cursor-pointer">{{$author->first_name}} {{$author->last_name}} {{$author->middle_name}}</label>
                                                                        <input type="checkbox" id="author{{$author->id}}" <?php echo in_array($author->id, $id_array) ? 'checked' : ''  ?> name="author-id.{{$author->id}}" class="author-id required" value="{{$author->id}}" required="true" /><br>

                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                        <div class="error authors"></div>
                                                    @endif
                                                </div>
                                                <div class="sucess-save text-center"></div>
											</div>
										</div>
									</div>
								</div>
                            </div>
                            <input name="_method" type="hidden" value="PUT">
                        </form>
                    </span>
            </div>
            <div class="text-center">
                <button class="btn btn-primary btn-sx update-journal" value="{{$oldData->id}}" type="button">
                    <i class="glyphicon glyphicon-plus"></i>Update Journal
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{asset('js/ajaxEditJournal.js')}}"></script>
@endsection

