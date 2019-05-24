@extends('layouts.app')

@section('content')
    <div class="container" style="height: 100%;padding: 5%">
        <h1>Specilazation</h1>
        <table class="table table-borderless table-responsive-sm">
            @if (count($specializations)>1)
                @foreach ($specializations as $specialization)
                    <tr>
                        <td style="width: 20em">
                            <h4 style="color: gray">{{$specialization->title}}</h4>
                        </td>
                        <td style="width: 1em">
                            <a href="expertise/{{$specialization->id}}/edit" class="btn btn-outline-info btn-sm">Edit</a>
                        </td>
                        <td>
                            {!!Form::open(['action'=>['SpecializationController@destroy',$specialization->id],'method'=>'POST','class'=>'pull-right'])!!}
                                {{Form::hidden('_method','DELETE')}}
                                {{Form::submit('Remove',['class'=>'btn btn-outline-danger btn-sm'])}}
                            {!!Form::close()!!}
                        </td>
                    </tr>
                @endforeach
            @else        
                <p>No expertise records found.</p>    
            @endif
        </table>  
    </div>
                
@endsection