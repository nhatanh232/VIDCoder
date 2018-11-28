<div class="container-fluid">
	<form action="postImport" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="Import">Import</label>
			<input type="file" name="file" class="form-control">
		</div>
		<button>Import</button>
	</form>
</div>