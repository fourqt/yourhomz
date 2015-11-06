var geocoder;
var map;
var marker;
//ToDo Make it availabe by key like aptUnit
var project_types = [1,2,3,4,5,6,7,8,9,10,11,12];

function init_gmap3(){
//$('#gmaps-input-address').val(address);
//$('#gmaps-output-latitude').val(latLng.lat());
//$('#gmaps-output-longitude').val(latLng.lng());
//$('#gmaps-output').val(JSON.stringify(rawData));

  $("#gmaps-canvas")
    .gmap3({
           map:{
              options:{
               center:[28.535516,77.391026],
               zoom:10,
               mapTypeId: google.maps.MapTypeId.TERRAIN,
               mapTypeControl: true,
               navigationControl: true,
               scrollwheel: true,
               streetViewControl: true
              }
           }
    });
            
  $("#gmaps-input-address").autocomplete({
      source: function( request, response ) {
          $("#gmaps-canvas").gmap3({
              getaddress: {
                  address: $("#gmaps-input-address").val(),
                  callback: function(results){
                      if (!results){
                        return;
                      }else{ 
                        console.log(results[0]);
                        alert(results[0].formatted_address);
                        response({
                          label: results[0].formatted_address, // appears in dropdown box
                          value: results[0].formatted_address, // inserted into input element when selected
                          geocode: results                  // all geocode data
                          });
                      }
                      
                  }
              }
          });
      },
      cb:{
          cast: function(item){
              return item.formatted_address;
          },
          select: function(item) {
              $("#gmaps-canvas").gmap3({
                  clear: "marker",
                  marker: {
                      latLng: item.geometry.location
                  },
                  map:{
                      options: {
                          center: item.geometry.location,
                      }
                  }
              });
          }
      }
  })
  .focus();
}

function update_map_city_select(){
$('#sel_city_select').change( function(){
    var selectedCity = $(this).find('option:selected');
    var latLng = new google.maps.LatLng(selectedCity.attr('data-latitude'), selectedCity.attr('data-longitude'));
    map.panTo(latLng);
});
}

function toggle_property_form(){
    $('#project_type_0').change(function(){
        if($('#project_type_0').val()>0){
            $('#rootwizard').bootstrapWizard('display', $(this).attr('data-id'));
        }else{
            $('#rootwizard').bootstrapWizard('display', $(this).attr('data-id'));
        }
    });
    $("input.property_type").click(function(){
      if($(this).attr('data-id') == '1'){
        if(this.checked){
            $('#rootwizard').bootstrapWizard('display', $(this).attr('data-id'));
        }else{
            $('#rootwizard').bootstrapWizard('hide', $(this).attr('data-id'));
        }
      }else{
        alert('Coming soon! Apt Only!');        
      }
    });
}
//$('#rootwizard').bootstrapWizard('show', 2);

function init_dropzone(div, data_unit_type, bhkType){
    var imgFor = '0';
    if(div.find('div.3d').length){ imgFor = '1'; }
    div.dropzone({ 
        url: js_base_url+"admin/content/projects/imageUpload/"+data_unit_type+'/'+imgFor,
        uploadMultiple: false,
        maxFilesize: 4,
        maxFiles: 1,
        params: {
                    ci_csrf_token: csrf_token_name,
                    bhkType: bhkType

                }
     });
}

function prepare_post_data(){

    var dataPost = {};

    dataPost['project_types'] = {};
    dataPost['projectsUnits'] = {};
    dataPost['project_name'] = $('input#InputProjectName').val();
    dataPost['builder_id'] = $('select#builderId').val();
    $('div#project_types select.selprojtype').each(function(i, ele){
        dataPost['project_types'][$(this).attr('data-id')] = $(this).val();
    });
    dataPost['apt_unit_type'] = $('select#apt_unit_type').val();
    dataPost['sel_city_select'] = $('select#sel_city_select').val();
    dataPost['address'] = $('input#gmaps-input-address').val();
    dataPost['latitude'] = $('input#gmaps-input-latitude').val();
    dataPost['longitude'] = $('input#gmaps-input-longitude').val();
    dataPost['project_overview'] = $('#project_overview').val();
    $('div.apt_units').each(function(i, ele){
        var unitsInfo = {};
        unitsInfo['interiors'] = {};
        unitsInfo['interiors']['floorings'] = {};
        unitsInfo['interiors']['fittings'] = {};
        unitsInfo['interiors']['Walls'] = {};
        unitsInfo['amenities'] = {};

        unitsInfo['unitText'] = $(this).attr('data-text');
        unitsInfo['builtupArea'] = $(this).find('input#builtupArea').val();
        unitsInfo['possessionStarts'] = $(this).find('input#possessionStarts').val();
        unitsInfo['minTotalPrice'] = $(this).find('input#minTotalPrice').val();
        
        unitsInfo['living_room'] = $(this).find('input#living_room').val();
        unitsInfo['kitchen'] = $(this).find('input#kitchen').val();
        unitsInfo['balconies'] = $(this).find('input#balconies').val();
        unitsInfo['toilets'] = $(this).find('input#toilets').val();
        $(this).find('div.amenities input').each(function(i, ele){
            unitsInfo['amenities'][$(this).attr('id')] = $(this).val();
        });


        $(this).find('div.floorings input').each(function(i, ele){
            unitsInfo['interiors']['floorings'][$(this).attr('id')] = $(this).val();
        });
        
        $(this).find('div.fittingsfittings input').each(function(i, ele){
            unitsInfo['interiors']['fittings'][$(this).attr('id')] = $(this).val();
        });
        
        $(this).find('div.floorings input').each(function(i, ele){
            unitsInfo['interiors']['Walls'][$(this).attr('id')] = $(this).val();
        });

        dataPost['projectsUnits'][$(this).attr('data-id')] = unitsInfo;
    });
return dataPost;
}


function submit_proj_form(){
    
    var postDataArray = prepare_post_data();

    $.ajax({
                url: js_base_url + "admin/content/projects/submitProject/",
                
                type: "post",

                data: postDataArray,
                
                dataType: "html",
                
                error: function(){
                },
                
                beforeSend: function(){
                },
                
                complete: function(){
                },
                success: function( strData ){
                    $('#rootwizard').bootstrapWizard('hide', 1);
                    $('#rootwizard').bootstrapWizard('show', 13);
                }
           });
}



function populate_apartment_form(tab, navigation, index){
    if(index == project_types[0]){
        var apt_unit_type = [];
        var cls = 'active';
        $('#apt_unit_type :selected').each(function(i, selected){

          if(i!=0) cls = '';

            $('#tabsleft ul').append('<li class="' + cls +
                '"><a data-toggle="tab" href="#tabsleft-tab' + i + 
                '">' + $( this ).text() + 
                '</a></li>');
            
            $('#tabsleft div.tab-content').append(
               '<div id="tabsleft-tab' + i + 
               '" class="tab-pane ' + cls + 
               ' fade in apt_units" data-id="' + $( this ).val() + 
               '" data-text="' + $( this ).text() + '">' + 
               $('div.apt_unit_frm').html() +'</div>'
               );
          init_dropzone($('#tabsleft div.tab-content div#tabsleft-tab' + i + ' div.dropZoneDyn'), project_types[0], $( this ).text());
          apt_unit_type[i] = $(selected).text();
        });
    $('.date-picker').datepicker({
        orientation: "top auto",
        autoclose: true,
        setDate: new Date()
      });
    // Initialize checkboxes
    $('.dynCheckbox').uniform();
    
    }else if(index == project_types[1]){
        submit_proj_form();
    }
}


$(document).ready(function() {
    
    if( $('#sel_city_select').length  ) {
        $('#sel_city_select').select2();
    }

     
   
    if( $('#gmaps-canvas').length  ) {
        init_gmap3();
    };
    

    var $validator = $("#wizardForm").validate({
        rules: {
            exampleInputName: {
                required: true
            },
            exampleInputName2: {
                required: true
            },
            exampleInputEmail: {
                required: true,
                email: true
            },
            exampleInputProductName: {
                required: true
            },
            exampleInputProductId: {
                required: true
            },
            exampleInputQuantity: {
                required: true
            },
            exampleInputCard: {
                required: true,
                number: true
            },
            exampleInputSecurity: {
                required: true,
                number: true
            },
            exampleInputHolder: {
                required: true
            },
            exampleInputExpiration: {
                required: true,
                date: true
            },
            exampleInputCsv: {
                required: true,
                number: true
            }
        }
    });
 
    $('#rootwizard').bootstrapWizard({
        'tabClass': 'nav nav-tabs',
        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;
            var $percent = ( $current/$total ) * 100;
            $('#rootwizard').find('.progress-bar').css({width:$percent+'%'});
            if(index == 1){
                $("#apt_unit_type").select2({
                  tags: true,
                  tokenSeparators: [',', ' ']
                });
              }else if( index == 2 && $('input.unit_type_tab ul.nav-tab li').length ){
                populate_apartment_form( tab, navigation, index );
              }
        },
        'onNext': function(tab, navigation, index) {
            //var $valid = $("#wizardForm").valid();
            var $valid = true;
            if(!$valid) {
                $validator.focusInvalid();
                return false;
            }            
        },
        'onTabClick': function(tab, navigation, index) {
            //var $valid = $("#wizardForm").valid();
            var $valid = true;
            if(!$valid) {
                $validator.focusInvalid();
                return false;
            }
        },
    });
    
    $('.date-picker').datepicker({
      orientation: "top auto",
      autoclose: true
    });

update_map_city_select();
toggle_property_form();
});
