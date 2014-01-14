<form class="form-inline" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	<div class="form-group">
		<select class="form-control" ID="criteria" name="criteria">
			<option value="titile">Tên Sách</option>
	  		<option value="editor">Tác Giả</option>
	  		<option value="all">Tất Cả</option>
		</select>
	</div>

 	<div class="form-group">
	    <input type="text" class="form-control" name="s" id="s" placeholder="Nhập từ khoá cần tìm">
  	</div>

  	<button type="submit" id="searchsubmit" class="btn btn-primary">Tìm Kiếm</button>
</form>