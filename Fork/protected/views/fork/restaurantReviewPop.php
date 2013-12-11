<div class="widget-content">
	<form class="form uniformForm validateForm">
		<div class="field-group">
			<label for="required">Restaurant Name:</label>
			<div class="field">
				<select name="cardtype" id="cardtype">
					<option>Steak holy cow</option>
					<option>Pepper lunch</option>
				</select>
			</div>	
		</div>
		<div class="field-group">
			<label for="required">Restaurant Location:</label>
			<div class="field">
				<select name="cardtype" id="cardtype">
					<option>Jakarta</option>
					<option>Surabaya</option>
				</select>
			</div>	
		</div>
		<div class="field-group">
			<label for="required">Score:</label>
			<div class="field">
				<input type="text" name="name" id="name" size="20" class="validate[required]" />	
			</div>
		</div>
		<div class="field-group">
			<label for="required">Review:</label>
			<div class="field">
				<textarea name="message" id="message" rows="5" cols="50"></textarea>
			</div>	
		</div>
		<div class="actions">						
			<button type="submit" class="btn btn-primary">Submit</button>
			<button type="reset" class="btn btn-error">Reset</button>
		</div>
	</form>
</div>