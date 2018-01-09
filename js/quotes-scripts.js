jQuery(document).ready(function($){
  var partTypeSelect = $('.turnerac-part-type select');
  var partSelect = $('.turnerac-part-selector select');

  $('.acf-table tbody').on('change', '.turnerac-part-type', function(){
    var selectedPartType = $('option:checked', this).val();
    var partTypeSelectID = $('option:checked', this).parent().attr('id');
    var partTypeSelectIDa = partTypeSelectID.split('-');
    //var rowId = partTypeSelectIDa[2];
    partTypeSelectIDa.pop();
    partTypeSelectIDa.push('field_5a53ac2c87acf');

    var partSelectFieldID = partTypeSelectIDa.join("-");

    if(selectedPartType != 0){
      data = {
        action: 'qs_filter_parts', 
        qs_nonce: qs_vars.qs_nonce,
        part_type: selectedPartType
      };

      $.post(ajaxurl, data, function(response){
        if(response){
          $('#' + partSelectFieldID).html(response);
        }
      });
    }

  });

  $('.acf-table tbody').on('change', '.turnerac-part-selector', function(){
    var selectedPart = $('option:checked', this);
    var selectedPartPrice = selectedPart.data('price');

    var partSelectID = $('option:checked', this).parent().attr('id');
    var partSelectIDa = partSelectID.split('-');
    partSelectIDa.pop();
    partSelectIDa.push('field_5a53ac2c8b965');

    var priceFieldID = partSelectIDa.join('-');
    if(selectedPartPrice){
      $('#' + priceFieldID).val(selectedPartPrice);
    }
  });
});