@extends('layout.app')
<title>@section('title', 'Author')</title>

@section('content')
    <div class="container">
        <div class="mail-box">
            <aside class="lg-side">
                <a href="{{route('author.create')}}">
                    <button class="btn btn-default pull-right" data-toggle="modal" data-target= "#item_add"><i class="glyphicon glyphicon-plus"></i> Add New Author
                    </button>
                </a>

                <div class="inbox-body">
                    <div class="mail-option">
                        <table id="table-author" class="table table-inbox table-hover">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Middle Name</th>
                                    <th>Journal Name</th>
                                    <th>Journal Description</th>
                                    <th class="text-right">Buttons group</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($authors as $author)
                                <tr class="author{{$author->id}}">

                                    <td class="view-message">
                                        <h4>{{$author->first_name}}</h4>
                                    </td>
                                    <td class="view-message">
                                        <h4>{{$author->last_name}}</h4>
                                    </td>
                                    <td class="view-message">
                                        @if($author->middle_name)
                                            <h4>{{$author->middle_name}}</h4>
                                        @else
                                            <p class="text-center text-danger">-</p>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="journal-title">
                                            @if(count($author->journals))
                                                @foreach($author->journals as $key => $journal)
                                                    <strong>{{$key+1}}. </strong>{{$journal->title}} <br/><br/>
                                                @endforeach
                                            @else
                                                <p class="text-danger">-</p>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="view-message">
                                        @if(count($author->journals))
                                            @foreach($author->journals as $key => $journal)
                                                <strong>{{$key+1}}. </strong>{{$journal->description}}<br/><br/>
                                            @endforeach
                                        @else
                                            <p><span class="text-danger">-</span></p>
                                        @endif
                                    </td>

                                    <td class="buttons">
                                       <span class="pull-right" >
                                           <a href="{{ route('author.edit', $author->id)}}" class="btn btn-warning btn-md edit-journal" value="{{$author->id}}">
                                                  <i class="glyphicon glyphicon-edit" ></i>Edit
                                           </a>
                                           <button class="btn btn-danger btn-md remove-author" data-toggle="modal" value="{{$author->id}}"><i class="glyphicon glyphicon-remove"></i>Remove</button>

                                            <div class="remove-div modal-body" id="author-{{$author->id}}">
                                               <p>Delete Author ?</p>
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
    <script type="text/javascript" src="{{asset('js/ajaxIndexAuthor.js')}}"></script>
@endsection
