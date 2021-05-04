<link rel="stylesheet" type="text/css" href="./super/stores/add.css">
<div class="head">
	<div class="tittle">
		<p>Add New Store</p>
	</div>
</div>
<div class="cont">
	<form>
		<div class="input">
			<div class="col">
				<label for="name">Name</label>
				<input type="text" name="name" id="name" placeholder="type name here" required>
			</div>
			<div class="col">
				<label for="address">Address</label>
				<textarea id="address" placeholder="type address here" required></textarea>
			</div>
			<div class="col">
				<label for="client_name">Client Name</label>
				<input type="text" name="client_name" id="client_name" placeholder="type client name here" required>
			</div>
			<div class="col">
				<label for="contact">Contact</label>
				<input type="text" name="contact" id="contact" placeholder="type contact here" required>
			</div>
			<div class="col">
				<label for="email">E-mail</label>
				<input type="text" name="email" id="email" placeholder="type e-mail here" required>
			</div>
			<div class="col2">
				<label for="image">Upload store image here</label>
				<input type="file" name="image">
			</div>
		</div>
		<div class="button">
			<a href="">Cancel</a>
			<input type="submit" name="save" value="Save">
		</div>
	</form>
</div>