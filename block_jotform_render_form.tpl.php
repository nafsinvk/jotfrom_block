<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="jotFeedbackWholeWrap">
<div class="jotFormWidgetWrap"><a class="close" title="Close the form">X</a>
    <?php if($JOTFormIntro):?>
   <div class="intro"> <?php echo $JOTFormIntro['value'];
    ?>
   </div>
    <div class="control_button">
		<div class="form-group  control_button ">
                    <button id="input_2" type="button" class="btn btn-primary form-next-button">Next</button>
                </div>
    </div>
    <?php endif;?>
</div>
<div class="jotFormWidgetWrap hide">
    <a class="close" title="Close the form">X</a>
			<form   data-toggle="validator" class="jotform-form" action="https://submit.jotform.me/submit/<?php echo $block_jotform_form_id ?>/" method="post" name="form_<?php echo $block_jotform_form_id?>" id="<?php echo $block_jotform_form_id ?>" accept-charset="utf-8">
			<input type="hidden" name="formID" value="<?php echo $block_jotform_form_id?>" />
			<div class="row form-elements">
			<div class="col-md-12 thElements">
                        <style>.control_hidden{display:none !important}.form-group.control_button label {
    display: none !important;
}</style>
<?php

foreach ($block_jotform_form as $element):
    
    $star = $required = $validclass ='';
    if($element->required == 'Yes')
    {
        $validclass = 'validate[required]';
        $star = '*';
        $required = 'required';
    }
            
?>

	<?php  if ($element->type == "control_button" and  $tAndC):   ?>  
   <div class="form-group">
    <div class="checkbox">
    <label>
        <input name="terms" value="iAgree" type="checkbox" required data-error="<?php  trans ?> Please agree to the terms and conditions <?php  endtrans ?>" > <?php  trans ?>I agree to the <?php  endtrans ?> <a href="#terms" title="Click to read the terms and conditions"><?php  trans ?> terms and conditions.<?php  endtrans ?></a>*
    </label>
    <div class="help-block with-errors"></div>
  </div>
  </div>
<?php  endif; ?>	
		<div class="<?php  echo  $element->type?>">
		<div class="form-group  <?php  echo  $element->type?> ">
                <label for="input_<?php  echo $element->q_val?>"><?php  echo $element->text?> <?php echo $star ?></label>
<?php  if ($element->type == "control_textbox" or $element->type == "control_hidden"): ?>    
       
                <input type="text" 
		placeholder="<?php  echo $element->hint?>" 
		class="<?php echo $validclass ?> form-control <?php  echo $element->type?> form-textbox " 
		id="input_<?php  echo $element->q_val?>" 
		name="q<?php  echo  $element->q_val?>_<?php echo $element->name ?>" data-error="<?php  echo $element->text?> <?php  trans ?> is required <?php  endtrans ?>" size="<?php  echo $element->size?>" value="<?php  echo  $get[$element->name] ?>" <?php echo $required ?>>
<?php  endif; ?> 
<?php  if($element->type == "control_email"): ?>    
                <input type="email" 
		placeholder="<?php  echo $element->hint?>" 
		class="<?php echo $validclass ?> form-control <?php  echo $element->type?> form-textbox " 
		id="input_<?php  echo $element->q_val?>" 
		name="q<?php  echo  $element->q_val?>_<?php echo $element->name ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" data-required-error="<?php  echo $element->text?> <?php  trans ?> is required <?php  endtrans ?>" data-pattern-error="<?php  echo $element->text?> <?php  trans ?> should be in a valid format <?php  endtrans ?>" size="<?php  echo $element->size?>" <?php echo $required ?> value="<?php  echo  $get[$element->name] ?>">
<?php  endif; ?> 
<?php  if($element->type == "control_phone"): ?>    
                <input type="tel" 
		placeholder="<?php  echo $element->hint?>" 
		class="<?php echo $validclass ?> form-control <?php  echo $element->type?> form-textbox " pattern="^[0-9-+\s()]{8,16}$" data-pattern-error="<?php  echo $element->text?> <?php  trans ?> should be in a valid format. <?php  endtrans ?>" data-error="<?php  echo $element->text?> <?php  trans ?> is required <?php  endtrans ?>"
		id="input_<?php  echo $element->q_val?>" 
		name="q<?php  echo  $element->q_val?>_<?php echo $element->name ?>"  size="<?php  echo $element->size?>" <?php echo $required ?> value="<?php  echo  $get[$element->name] ?>">
<?php  endif; ?> 
<?php  if($element->type == "control_checkbox"): ?>    
  <?php  $options = explode('|', $element->options) ?> 
  <?php  $counter = 0 ?> 
  <?php  foreach($options as $option): ?>
    <div class="form-check">
          <label class="form-check-label">
            <input class="<?php echo $validclass ?> form-check-input" data-error="<?php  echo $element->text?>  is required " type="checkbox" name="q<?php echo $element->q_val ?>_<?php echo $element->name?>[]" 
			id="input_<?php echo $element->q_val?>_<?php echo $counter?>"  value="<?php echo $option?>" <?php echo $required ?>>
            <?php  echo option?>
          </label>
        </div>
  <?php  endforeach; ?>
<?php  endif; ?> 

<?php  if($element->type == "control_dropdown"): ?> 
<select class="form-control" id="input_<?php  echo $element->q_val?>" name="q<?php  echo  $element->q_val?>_<?php echo $element->name ?>">
    <?php  $options = explode('|', $element->options) ?> 
     
     <?php  foreach($options as $option): ?>
         
         <option value="<?php  echo option?>"?>  <?php if(isset($get[$element->name]) && $option == $get[$element->name]): ?>   selected="selected"   <?php endif;?>><?php  echo option?></option>
         <?php  endforeach; ?>
</select>

<?php  endif; ?> 

<?php  if($element->type == "control_textarea"): ?>    
    
    <textarea id="input_<?php  echo $element->q_val?>"  
		class="<?php echo $validclass ?> form-control  form-textarea"  
		placeholder="<?php  echo $element->hint?>" name="q<?php  echo $element->q_val?>_<?php  echo $element->q_val?>" 
		cols="<?php  echo $element->cols?>" rows="<?php  echo $element->rows?>" <?php echo $required ?>></textarea>
                
<?php  endif; ?> 

<?php  if($element->type == "control_button"): ?>    
    <button id="input_<?php  echo $element->q_val?>" type="submit" class="btn btn-primary form-submit-button"><?php  echo $element->text?></button>
                
<?php  endif; ?> 
<div class="help-block with-errors"></div>

                </div>
                </div>
<?php endforeach;?>
                            
                        </div>
                        </div>
				<span style="display:none">
				Should be Empty:
				<input type="text" name="website" value="" />
			  </span>
			  <input type="hidden" id="simple_spc" name="simple_spc" value="<?php echo $block_jotform_form_id ?>" />
			  <script type="text/javascript">
			  document.getElementById("si" + "mple" + "_spc").value = "<?php echo $block_jotform_form_id ?>-<?php echo $block_jotform_form_id ?>";
			  </script>
			</form>
</div>         
<div class="feedBackBtn">    
    <?php if($JOTFormPhone):?>
    <button class="jfFeedbackButton u-phone u-bottomRight jFisDesktop jFisWindows phone" id="phone" ><a href="tel:<?php echo $JOTFormPhone;?>"><span class="jfFeedbackButton-icon u-phone"></span><span class="jfFeedbackButton-text"><?php echo $JOTFormPhone;?></span></a></button>
    <?php endif;?>
    <button class="jotFeedback"><span class="jfFeedbackButton-icon u-envelope"></span><span class="jfFeedbackButton-text">Get a Quote</span></button></div>

</div>
