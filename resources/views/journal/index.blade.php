@extends('layout.app')
<title>@section('title', 'Journal')</title>

@section('content')


    <div class="container">

        <div class="mail-box">
            <aside class="lg-side">
                    <a href="{{route('journal.create')}}">
                        <button class="btn btn-default pull-right" data-toggle="modal" data-target= "#item_add"><i class="glyphicon glyphicon-plus"></i> Add New Journal
                        </button>
                    </a>

                <div class="inbox-body">
                    <div class="mail-option">
                        <table id="table-journal" class="table table-inbox table-hover">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Authors</th>
                                    <th class="text-right">Buttons group</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($journals as $journal)
                                    <tr class="journal{{$journal->id}}">
                                        <td class="view-message  dont-show">
                                            <img src="{{asset('/images/'.$journal->image)}}" alt="journal Pic" class="img-class">
                                        </td>
                                        <td class="view-message" name="title">{{$journal->title}}</td>
                                        <td class="journal-description">{{$journal->description}}</td>
                                        <td class="view-message text-left">{{$journal->journal_creation_date ? $journal->journal_creation_date : 'no'}}</td>
                                        <td class="view-message text-left">
                                            <h5>
                                                @foreach($journal->authors as $key => $author)
                                                        <strong>{{$key+1}}. </strong>{{$author->first_name .' '. $author->last_name}}<br/>
                                                @endforeach
                                            </h5>
                                        </td>

                                        <td class="buttons">
                                            <span class="pull-right">
                                                <a href="{{ route('journal.edit', $journal->id)}}" class="btn btn-warning btn-md edit-journal" value="{{$journal->id}}">
                                                       <i class="glyphicon glyphicon-edit" ></i>Edit
                                                </a>
                                                <button class="btn btn-danger btn-md remove-journal" data-toggle="modal" data-id="{{$journal->id}}"><i class="glyphicon glyphicon-remove"></i>Remove</button>

                                               <div class="remove-div modal-body" data-id="{{$journal->id}}">
                                                    <p>Delete Journal ?</p>
                                                    <div class="row">
                                                        <div class="col-12-xs text-center">
                                                            <button class="btn btn-success btn-md col-3-xs remove-confirm">Yes</button>
                                                            <button class="btn btn-danger btn-md col-3-xs cancel-remove">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </span>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </aside>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('DataTables/datatables.min.js')}}"></script>
    <script src="{{asset('js/ajaxIndexJournal.js')}}"></script>
@endsection
