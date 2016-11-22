<script>
$.validator.setDefaults({
		submitHandler: function() {
			alert("submitted!");
		}
	});
$(document).ready( function()
	{
		$('#myform').validate
			(
				{
					rules:
						{
							qns:
								{
									required:true,
								},
							optionA:
								{
								     required:true,
							
								 },
								 optionB:
								 {
								 required:true,
								  
								 },
							optionC:
								{
									required:true,
									 
								},
							 optionD:
							{
							required:true,
							
							
							}
							 
							
						}
				}
			);
	}
);
</script>