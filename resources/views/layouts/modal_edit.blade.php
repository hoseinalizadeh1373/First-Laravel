
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

					<!-- <form action="{{Route('users.update',['user' => $useridd])}}" id="formusers" method="post">
						@csrf
						@method('put') -->
						<button class="btn-sm bg-light  border rounded " name="toAdmin" value="1" onclick="setupdate(1)" type="submit" >
							تغییر وضعیت به ادمین
						</button>
						<button class="btn-sm bg-light border rounded " name="toUser" value="2"  onclick="setupdate(2)" type="submit">
							تغییر وضعیت به کاربر عادی
						</button>
					<!-- </form> -->
					
				</div>
			</div>
			<div class="modal-footer">

				<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
			</div>
		</div>
	</div>