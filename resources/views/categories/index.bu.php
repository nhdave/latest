@extends('layouts.app')
@section('header')
<h1 align="center">Categories</h1>
<hr>
@stop
@section('content')
@include('error')
<div class="row">
	@foreach($categories as $root)
		<div class="col-md-4">
			<ul>
				<li class="list-group-item">{{$root->name}}
				
                <form action="{{ route('categories.destroy', $root->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                	<input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-xs btn-danger pull-right"><i class="glyphicon glyphicon-xs glyphicon-remove "></i></button>
                </form>
                <span class="pull-right"> | </span>
          		<a href="{{url('categories/createSub', $root->id)}}" class="btn btn-xs btn-success pull-right"> <span class="glyphicon glyphicon-plus"></span></a>

                
                </li>
	
				@if ($root->children()->count())
					@foreach($root->children() as $child)
					<ul>
						<li class="list-group-item">{{$child->name}}  
                        
                        <form action="{{ route('categories.destroy', $child->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                        	<input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-xs btn-danger pull-right"><i class="glyphicon glyphicon-xs glyphicon-remove "></i></button>
                        </form>
                        <span class="pull-right"> | </span>
                        <a href="{{url('categories/createSub', $child->id)}}" class="btn btn-xs btn-success pull-right"><span class="glyphicon glyphicon-plus"></span></a>
                        </li>
					
						@if ($child->children()->count())
							@foreach($child->children() as $grandchild)
							<ul>
								<li class="list-group-item"><a href="{{route('categories.show', $grandchild->id)}}">{{$grandchild->name}}</a>  
                                
                                <form action="{{ route('categories.destroy', $grandchild->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                					<input type="hidden" name="_method" value="DELETE">
                    				<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    				<button type="submit" class="btn btn-xs btn-danger pull-right"><i class="glyphicon glyphicon-xs glyphicon-remove"></i></button>
                				</form>
                                <span class="pull-right"> | </span>
                                <a href="{{url('categories/createSub', $grandchild->id)}}" class="btn btn-xs btn-success pull-right"><span class="glyphicon glyphicon-plus"></span></a>
                                </li>
								
								@if ($grandchild->children()->count())
									@foreach($grandchild->children() as $greatgrandchild)
									<ul>
										<li class="list-group-item"><a href="{{route('categories.show', $greatgrandchild->id)}}">{{$greatgrandchild->name}}</a>  
                                        
                                        <form action="{{ route('categories.destroy', $greatgrandchild->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                							<input type="hidden" name="_method" value="DELETE">
                    						<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    						<button type="submit" class="btn btn-xs btn-danger pull-right"><i class="glyphicon glyphicon-xs glyphicon-remove"></i></button>
                						</form>
                                        <span class="pull-right"> | </span>
                                        <a href="{{url('categories/createSub', $greatgrandchild->id)}}" class="btn btn-xs btn-success pull-right"><span class="glyphicon glyphicon-plus"></span></a>
                                        </li>
											
										@if ($greatgrandchild->children()->count())
											@foreach($greatgrandchild->children() as $greatgreatgrandchild)
											<ul>
												<li class="list-group-item"><a href="{{route('categories.show', $greatgreatgrandchild->id)}}">{{$greatgreatgrandchild->name}}</a>
                                                <form action="{{ route('categories.destroy', $greatgreatgrandchild->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                									<input type="hidden" name="_method" value="DELETE">
                    								<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    								<button type="submit" class="btn btn-xs btn-danger pull-right"><i class="glyphicon glyphicon-xs glyphicon-remove"></i></button>
                								</form>
                                                </li>
														
											</ul>
											@endforeach
										@endif
									</ul>
									@endforeach
								@endif
							</ul>
							@endforeach
						@endif
					</ul>
					@endforeach
				@endif
            </ul>
            
        </div>
	@endforeach
	
</div>
<hr>
            
		<div align="center"><a class="btn btn-primary" href="{{ route('categories.create') }}"><i class="glyphicon glyphicon-plus"></i> New Root Category</a><br>
		<a class="btn btn-link" href="{{ url('/home') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
		</div>
		<br>
	
@stop