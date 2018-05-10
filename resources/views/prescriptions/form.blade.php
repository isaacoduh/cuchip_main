<div class="col-sm-4">
    <div>
        <a href="#" class="pull-right btn btn-info btn-sm"><i class="demo-pli-pencil"> </i></a>
        <h4 class="text-main">Prescriptions:</h4>
        <hr>
        <ul id="demo-tasklist-upcoming" class="sortable-list tasklist list-unstyled">
            <li id="demo-tasklist-2" class="task-info">
                <p class="text-bold">Prescriptions</p>
                @if(count($prescriptions))
                    @foreach($prescriptions as $prescription)
                        <div>
                            <p><span>{{$prescription->name}}</span> | {{$prescription->dosage}} | {{$prescription->notes}} | <a href="/casefile/{{ $casefile->id }}/prescriptions/{{ $prescription->id }}/edit"><i class="demo-pli-pencil"></i></a> | <button class="btn btn-danger delete  btn-xs" data-action="/casefile/{{ $casefile->id }}/prescriptions/{{ $prescription->id }}" data-token="{{ csrf_token()}}"><i class="icon-sm icon-fw demo-pli-recycling"></i></button> </p>
                            <br>
                        </div>
                    @endforeach
                @else
                    <p>There are no prescriptions</p>
                @endif
                
                <form action="{{route('casefiles.prescriptions.create',$casefile->id)}}" class="form-horizontal" role="form" method="post">
                    <div class=""></div>
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name') ?: '' }}" placeholder="Medication Name">
                        @if($errors->has('name'))
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('dosage') ? ' has-error' : ''}}">
                        <input type="text" name="dosage" class="form-control" id="dosage" value="{{ old('dosage') ?: '' }}" placeholder="Dosage Details">
                        @if($errors->has('dosage'))
                            <span class="help-block">{{ $errors->first('dosage') }}</span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('notes') ? ' has-error' : ''}}">
                        <textarea name="notes" id="notes" cols="30" rows="10" class="form-control" placeholder="Notes on Usage">
                            {{ old('notes') }}
                        </textarea>
                        @if($errors->has('notes'))
                            <span class="help-block">{{ $errors->first('notes') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info"><span class="fa fa-plus"> Add Prescription</span></button>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </li>
        </ul>
    </div>
</div>