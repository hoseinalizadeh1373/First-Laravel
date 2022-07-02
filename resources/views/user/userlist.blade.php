@extends('layouts.master')
@section('content')
{{$useridd}}
<div class="container rounded mt-2">
	<div class="row border rounded">
		<div class="col-lg-12">
			<div class="">
				<div class="table-responsive">
					<table class="table user-list rounded">
						<thead class="coloe text-center mb-1">
							<tr>
								<th><span>کاربر</span></th>
								<!-- <th><span>Created</span></th> -->
								<th class="text-center"><span>دسترسی</span></th>
								<th><span>پست الکترونیک</span></th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody class="text-center pt-1">
							@foreach($list_user as $item)
							<tr>
								<td>

									<a href="#" class="user-link">{{$item->name}}</a>
									<span class="user-subhead">
										@if(empty($item->email_verified_at))
										حساب کاربری تایید نشده
										@endif
									</span>
								</td>

								<td class="text-center">
									<span class="label label-default">{{$item->type}} </span>
								</td>
								<td>
									<a href="#">{{$item->email}}</a>
								</td>
								<td style="width: 20%;">
								
									<button value="{{$item->id}}" data-toggle="modal" data-target="#exampleModal" class="table-link warning bg-dark text-warning border positioner rounded bg-light px-1 cursor-pointer editpen">
										<i class="fas fa-pen-alt fa-sm cursor-pointer" ></i>
									</button>

									<button  class="table-link positioner text-warning  border myBtn  rounded bg-light px-1 bg-dark fa-sm cursor-pointer" value="{{$item->id}}">
										<i class="fas fa-trash-alt fa-sm cursor-pointer"  ></i>
									</button>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>

			</div>
		</div>
	</div>
</div>
<div class="d-flex justify-content-center mt-2">{{ $list_user -> links()}}</div>



<div id="myModal2" class="modal2">
  <!-- Modal content -->
  <div class="modal2-content">
    <span class="close"><i class="fas fa-times-circle"></i></span>
    <p> آیا از حذف این کاربر مطمئن هستید ؟</p>
	<form action="{{Route('users.destroy',['user' => $useridd])}}" method="post">
		@csrf
		@method('delete')
		<button  class="bg-dark text-warning btn btn-md border rounded" type="submit" name="idf" value="{{$useridd}}"> انجام بده {{$useridd}}</button>
	</form>
	
	<button class="btn btn-sm text-warning bg-dark" onclick="closedelete()">انصراف</button>
  </div>
</div>
<!-- Modal -->
@include('layouts.modal_edit')


</div>
@endsection('content')