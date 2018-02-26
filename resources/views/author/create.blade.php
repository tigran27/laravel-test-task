@extends('layout.app')
@section('title','Create Author')
@section('content')
    <div class="container">
        <div class="content author-page">
            <div class="header">
                <h3 class="title text-center">Add new Author</h3>
            </div>
            <form id="myForm" name="myForm" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-body">
                                <div class="form-group col-md-12">
                                    <label for="name">Name</label>
                                    <input type='text' id="name" name="first_name" class='form-control first' />
                                    <div class="error first"></div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="lastName">Last Name</label>
                                    <input id="lastName" type='text' name="last_name" class='form-control last'/>
                                    <div class="error last"></div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="middleName">MIddle Name</label>
                                    <input id="middleName" type='text' name="middle_name" class='form-control middle'/>
                                </div>

                                <div class="sucess-save text-center"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="text-center">
                <button class="btn btn-primary btn-md save-author" type="button"><i
                            class="glyphicon glyphicon-plus"></i> Save Author
                </button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/ajaxCreateAuthor.js')}}"></script>
@endsection
