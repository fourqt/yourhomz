var geocoder;
var map;
var marker;
//ToDo Make it availabe by key like aptUnit
var project_types = [1,2,3,4,5,6,7,8,9,10,11,12];

// initialise the google maps objects, and add listeners
function gmaps_init(){

  // center of the universe
  var latlng = new google.maps.LatLng(28.535516,77.391026);

  var options = {
    zoom: 10,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };

  // create our map object
  map = new google.maps.Map(document.getElementById("gmaps-canvas"), options);

  // the geocoder object allows us to do latlng lookup based on address
  geocoder = new google.maps.Geocoder();

  // the marker shows us the position of the latest address
  marker = new google.maps.Marker({
    map: map,
    draggable: true
  });

  // event triggered when marker is dragged and dropped
  google.maps.event.addListener(marker, 'dragend', function() {
    geocode_lookup( 'latLng', marker.getPosition() );
  });

  // event triggered when map is clicked
  google.maps.event.addListener(map, 'click', function(event) {
    marker.setPosition(event.latLng)
    geocode_lookup( 'latLng', event.latLng  );
  });

  $('#gmaps-error').hide();
}

// move the marker to a new position, and center the map on it
function update_map( geometry ) {
  map.fitBounds( geometry.viewport )
  marker.setPosition( geometry.location )
}

// fill in the UI elements with new position data
function update_ui( address, latLng, rawData ) {
  $('#gmaps-input-address').autocomplete("close");
  $('#gmaps-input-address').val(address);
  $('#gmaps-output-latitude').val(latLng.lat());
  $('#gmaps-output-longitude').val(latLng.lng());
  $('#gmaps-output').val(JSON.stringify(rawData));
}

// Query the Google geocode object
//
// type: 'address' for search by address
//       'latLng'  for search by latLng (reverse lookup)
//
// value: search query
//
// update: should we update the map (center map and position marker)?
function geocode_lookup( type, value, update ) {
  // default value: update = false
  update = typeof update !== 'undefined' ? update : false;

  request = {};
  request[type] = value;

  geocoder.geocode(request, function(results, status) {
    $('#gmaps-error').html('');
    $('#gmaps-error').hide();
    if (status == google.maps.GeocoderStatus.OK) {
      // Google geocoding has succeeded!
      if (results[0]) {
        // Always update the UI elements with new location data
        update_ui( results[0].formatted_address,
                   results[0].geometry.location, results[0] )

        // Only update the map (position marker and center map) if requested
        if( update ) { update_map( results[0].geometry ) }
      } else {
        // Geocoder status ok but no results!?
        $('#gmaps-error').html("Sorry, something went wrong. Try again!");
        $('#gmaps-error').show();
      }
    } else {
      // Google Geocoding has failed. Two common reasons:
      //   * Address not recognised (e.g. search for 'zxxzcxczxcx')
      //   * Location doesn't map to address (e.g. click in middle of Atlantic)

      if( type == 'address' ) {
        // User has typed in an address which we can't geocode to a location
        $('#gmaps-error').html("Sorry! We couldn't find " + value + ". Try a different search term, or click the map." );
        $('#gmaps-error').show();
      } else {
        // User has clicked or dragged marker to somewhere that Google can't do a reverse lookup for
        // In this case we display a warning, clear the address box, but fill in LatLng
        $('#gmaps-error').html("No address." );
        $('#gmaps-error').show();
        update_ui('', value, '')
      }
    };
  });
};

// initialise the jqueryUI autocomplete element
function autocomplete_init() {
  $("#gmaps-input-address").autocomplete({

    // source is the list of input options shown in the autocomplete dropdown.
    // see documentation: http://jqueryui.com/demos/autocomplete/
    source: function(request,response) {

      // the geocode method takes an address or LatLng to search for
      // and a callback function which should process the results into
      // a format accepted by jqueryUI autocomplete
      geocoder.geocode( {'address': request.term }, function(results, status) {
        response($.map(results, function(item) {
          return {
            label: item.formatted_address, // appears in dropdown box
            value: item.formatted_address, // inserted into input element when selected
            geocode: item                  // all geocode data: used in select callback event
          }
        }));
      })
    },

    // event triggered when drop-down option selected
    select: function(event,ui){
      update_ui(  ui.item.value, ui.item.geocode.geometry.location )
      update_map( ui.item.geocode.geometry )
    }
  });

  // triggered when user presses a key in the address box
  $("#gmaps-input-address").bind('keydown', function(event) {
    if(event.keyCode == 13) {
      geocode_lookup( 'address', $('#gmaps-input-address').val(), true );

      // ensures dropdown disappears when enter is pressed
      $('#gmaps-input-address').autocomplete("disable")
    } else {
      // re-enable if previously disabled above
      $('#gmaps-input-address').autocomplete("enable")
    }
  });
}; // autocomplete_init

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
        if(this.checked){
            $('#rootwizard').bootstrapWizard('display', $(this).attr('data-id'));
        }else{
            $('#rootwizard').bootstrapWizard('hide', $(this).attr('data-id'));
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
        autoclose: true
      }); 
    $('.dynCheckbox').uniform();
    
    }else if(index == project_types[1]){
        submit_proj_form();
    }
}



$(document).ready(function() {
    
    if( $('#sel_city_select').length  ) {
        $('#sel_city_select').select2();
    }

     $(".js-example-tokenizer").select2({
            tags: true,
            tokenSeparators: [',', ' ']
        });
   
    if( $('#gmaps-canvas').length  ) {
        gmaps_init();
        autocomplete_init();
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
            var $percent = ($current/$total) * 100;
            $('#rootwizard').find('.progress-bar').css({width:$percent+'%'});
        },
        'onNext': function(tab, navigation, index) {
            //var $valid = $("#wizardForm").valid();
            var $valid = true;
            if(!$valid) {
                $validator.focusInvalid();
                return false;
            }
            populate_apartment_form(tab, navigation, index);
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
