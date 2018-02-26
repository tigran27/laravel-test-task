@extends('layout.app')
<title>@section('title', 'Author Edit')</title>

@section('content')
    <div class="container">
        <div class="box">
            <div class="content edit-content author-page">
                <div class="header">
                    <h3 class="title text-center">Edit Author</h3>
                </div>
                <div class="row">
                    <span class="container col-md-5 item_content">
                        <form id="myForm" method="POST" name="myForm" enctype="multipart/form-data">
                            <div class="container">
								<div class="row">
									<div class="col-md-8">
										<div class="panel">
											<div class="panel-body">
                                                <div class="form-group col-md-12 required"><label for="name">Name</label>
                                                    <input type='text' id="name" name="first_name" class='form-control first' placeholder="Name" value="{{$author->first_name}}" />
                                                        <div class="error first"></div>
                                                </div>

                                                <div class="form-group col-md-12"><label for="lastName">Last Name</label>
                                                    <input type='text' id="lastName" name="last_name" placeholder="Last Name" value="{{$author->last_name}}" class='form-control last' />
                                                    <div class="error last"></div>
                                                </div>

                                                <div class="form-group col-md-12"><label for="middleName">Middle Name</label>
                                                    <input type='text' id="middleName" name="middle_name" placeholder="Middle Name" value="{{$author->middle_name}}" class='form-control middle' />
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
                    <button class="btn btn-primary btn-md update-author" value="{{$author->id}}" type="button">
                        <i class="glyphicon glyphicon-plus"></i>Update Author
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/ajaxEditAuthor.js')}}"></script>
@endsection
