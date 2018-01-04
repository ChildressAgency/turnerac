jQuery(document).ready(function($){
  var partTypeSelect = $('.turnerac-part-type select');
  var partSelect = $('.turnerac-part-selector select');

  //add default option
  partTypeSelect.prepend('<option value="0" selected>Choose One</option>');
  partSelect.prop('disabled', true);

  $('.acf-table tbody').on('change', '.turnerac-part-type', function(){
    var selectedPartType = $('option:checked', this).val();
    //console.log(selectedPartType);
    var rowId = $(this).parent().attr('data-id');

    if(selectedPartType != 0){
      data = { 
        action: 'qs_add_parts',
        qs_nonce: qs_vars.qs_nonce,
        part_type: selectedPartType
      };

      $.post(ajaxurl, data, function(response){
        if(response){
          var partSelectField = $('[data-id="' + rowId + '"] .turnerac-part-selector select');

          //disabled select part until part type is selected
          partSelectField.html('<option value="0" selected disabled>Choose One</option>');

          $.each(response, function(val, text){
            partSelectField.append($('<option></option>').val(text).html(text));
            partSelectField.prop('disabled', false);
          });
        }
      });
    }
  });
});