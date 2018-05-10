<div class="col-sm-4">
    <a href="#" class="pull-right btn btn-info btn-sm"><i class="demo-pli-pencil "> </i></a>
    <h4 class="text-main">Attachments</h4>
    <p class="text-muted text-sm"></p>
    <hr>
    <ul id="demo-tasklist-upcoming" class="sortable-list tasklist list-unstyled">
        <li id="demo-tasklist-3" class="task-success">
            <p class="text-bold">Attachments</p>
            @if($files)
                @foreach($files as $file)
                    <div>
                        <div><i class="fa fa-check-square-o"></i>
                            <span>
                                <a href="/uploads/attachments/{{ $file->file_url }}" target="_blank">{{$file->file_name }}</a>
                            </span>
                        </div>
                    </div>
                    <hr/>
                @endforeach
            @else
                <p>There are no attachments or files in this casefile.</p>
            @endif
            <form action="{{ route('casefiles.files',['casefiles' => $casefile->id ]) }}" class="form-vertical" role="form" method="post" enctype="multipart/form-data">
                <div class="form-group{{ $errors->has('file_name') ? ' has-error' : '' }}">
                    <input type="file" name="file_name" class="form-control" id="file_name">
                    @if($errors->has('file_name'))
                        <span class="help-block">{{ $errors->first('file_name') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('notes') ? ' has-error' : '' }}">
                    <textarea name="notes" id="notes" cols="30" rows="10" placeholder="Insert Short Notes here" class="form-control"></textarea>
                    @if($errors->has('notes'))
                        <span class="help-block">{{ $errors->first('notes') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Add Files</button>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </li>
    </ul>
</div>