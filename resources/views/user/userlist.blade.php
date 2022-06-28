@extends('layouts.master')
@section('content')





<div class="container rounded mt-2">
<div class="row border rounded">
	<div class="col-lg-12">
		<div class="">
			<div class="table-responsive">
				<table class="table user-list rounded">
					<thead class="bg-warning text-center mb-1">
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
								<a href="#" class="table-link">
									<span class="fa-stack">
										<i class="fa fa-square fa-stack-2x"></i>
										<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
									</span>
								</a>
								<a data-toggle="modal" data-target="#exampleModal" class="table-link warning border  rounded bg-light px-1">
                              <i class="fas fa-pen-alt" onclick="a='{{$item->id}}'"></i>
							  {{$userid = $item->id;}}
								</a>
							
								<a href="#"  class="table-link positioner warning  border  rounded bg-light px-1">
									
								<i class="fas fa-trash-alt"></i>
								</a>
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">تغییر سطح دسترسی</h5>
        <button type="button" class="close ml-2" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<div class="d-flex justify-content-between">
			{{$userid}}
			<!-- <form action="{{Route('users.update',['user'=>$item->id])}}" method="post">
				@csrf
				@method('put')
			<button class="btn-sm bg-light  border rounded ">
				تغییر وضعیت به ادمین
			</button>
			<button class="btn-sm bg-light border rounded">
            تغییر وضعیت به کاربر عادی
			</button>
			</form> -->
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection('content')