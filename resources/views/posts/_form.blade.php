<div class="form-horizontal">
    {!! Form::label('title','Title :') !!}
    {!! Form::text('title') !!}
</div>
<div class="form-horizontal">
    {!! Form::label('content','Content:') !!}
    {!! Form::textarea('content') !!}
</div>
<div class="form-horizontal">
    {!! Form::label('tags', 'Tags') !!}
    {!! Form::text('tags') !!}
</div>
{!! Form::hidden('user_id',\Illuminate\Support\Facades\Auth::user()->id) !!}
<div class="form-horizontal">
    {!! Form::submit('submit',[ 'class' => 'btn btn-primary']) !!}
</div>
