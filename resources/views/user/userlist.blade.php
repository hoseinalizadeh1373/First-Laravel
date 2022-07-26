@extends('layouts.master')
@section('content')

<div class="container rounded mt-2" id='tbody'>
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
								<th><span>عملیات</span></th>
							</tr>
						</thead>
						<tbody class="text-center pt-1" >
							@foreach($list_user as $item)
							<tr id='tr_{{$item->id}}'>
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
								
									<button value="{{$item->id}}" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick='setid("{{$item->id}}","update")' class="table-link warning bg-dark text-warning border positioner rounded bg-light px-1 cursor-pointer editpen">
										<i class="fas fa-pen-alt fa-sm cursor-pointer" ></i>
									</button>

									<button  class="table-link positioner text-warning  border myBtn  rounded bg-light px-1 bg-dark cursor-pointer deletepen" value="{{$item->id}}" onclick='setid("{{$item->id}}","del")'>
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

<div class="d-flex justify-content-center mt-2  " id="pagination">{{ $list_user -> links()}}</div>

<hr class='d-block'>
<div id="myModal2" class="modal2 ">

  <!-- Modal content -->
  <div class="modal2-content row">
    <span class="close col-sm-1 d-flex align-items-center my-2 "><i class="fas fa-times-circle"></i></span>
    <p class="col-sm-6 my-3"> آیا از حذف این کاربر مطمئن هستید ؟</p>
	<div class="col-md-4 d-flex align-items-center  my-2">
	<!-- action="{{Route('users.destroy',['user' => $useridd])}}" -->
 <!-- <form id="formdelete" action="{{Route('users.index')}}" method="post" >
		@csrf
		<button  class="bg-dark text-warning btn btn-md border rounded" type="submit" name="idf" > انجام بده </button> -->
		<button  class="bg-dark text-warning btn btn-md border rounded" onclick="deleteaxios()" type="submit" > انجام بده </button>
	<!-- </form> -->

	
	<!-- <button class="btn btn-sm text-warning bg-dark" onclick="closedelete()">انصراف</button> -->

	<button class="btn btn-md text-warning bg-dark border rounded" onclick="closedelete()" type="cancel">انصراف</button>
	</div>

  </div>
</div>
<!-- <form action="{{Route('todos.show',['todo' =>1])}}" method='get'> -->

<!-- </form> -->
<!-- Modal -->
@include('layouts.modal_edit')


</div>
@endsection('content')