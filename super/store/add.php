<div class="head">
	<div class="tittle">
		<p>Add New Store</p>
	</div>
</div>
<div class="cont-add-store">
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
				<label for="contact">Number Phone</label>
				<input type="text" name="number_phone" id="contact" placeholder="type number phone here" required>
			</div>
			<div class="col">
				<label for="client_name">Client Name</label>
				<input type="text" name="client_name" id="client_name" placeholder="type client name here" required>
			</div>
			<div class="col2">
				<div class="tittle">
					<p>choose store status here</p>
				</div>
				<div class="radio">
					<input type="radio" name="status" value="active" id="active">
					<label for="active">Active</label>
				</div>
				<div class="radio">
					<input type="radio" name="status" value="deactive" id="deactive">
					<label for="deactive">Deactive</label>
				</div>
			</div>
		</div>
		<div class="button">
			<a href="">Cancel</a>
			<input type="submit" name="save" value="Save">
		</div>
	</form>
</div>

