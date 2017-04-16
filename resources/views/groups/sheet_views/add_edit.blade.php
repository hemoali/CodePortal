@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$action}}
                        Sheet
                    </div>

                    <div class="panel-body">
                        {{--Alerts Part--}}
                        @include('components.alert')
                        <form class="form-horizontal" role="form" method="POST" action="{{ url($url) }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ (isset($sheetName))?$sheetName:old('name') }}" placeholder="Name"
                                           required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('problems') ? ' has-error' : '' }} has-feedback">
                                <label for="problems" class="col-md-4 control-label">Problems</label>

                                <div class="col-md-6">
                                    <input id="problems" type="text" class="form-control" name="problems"
                                           value="{{ (isset($problemsIDs))?$problemsIDs:old('problems') }}"
                                           placeholder="IDs comma separated" required>

                                    @if ($errors->has('problems'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('problems') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{$action}}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection