<h1>Cadastro de ambiente</h1>
<?=form_open(current_url(), array('autocomplete' => 'off'))?>
    <div>
    	<label>Nome:</label>
    	<input type="text" name="nom">
    </div>
    <br>
    <div>
    	<label>Bloco:</label>
    	<select name="slc_bloco" id="slc_bloco">
    		<option>---</option>
    	</select>
    </div>
<?=form_close()?>



