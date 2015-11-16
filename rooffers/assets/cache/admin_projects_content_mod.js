var geocoder;
var map;
var marker;
//ToDo Make it availabe by key like aptUnit
var project_types = [1,2,3,4,5,6,7,8,9,10,11,12];


function toaster_init(type, title, desc){

    toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  };

  toastr[type](desc, title);

}

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
  $('#gmaps_input_address').autocomplete("close");
  $('#gmaps_input_address').val(address);
  $('#gmaps_output_latitude').val(latLng.lat());
  $('#gmaps_output_longitude').val(latLng.lng());
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
  $("#gmaps_input_address").autocomplete({

    // source is the list of input options shown in the autocomplete dropdown.
    // see documentation: http://jqueryui.com/demos/autocomplete/
    source: function(request,response) {

      // the geocode method takes an address or LatLng to search for
      // and a callback function which should process the results into
      // a format accepted by jqueryUI autocomplete
      geocoder.geocode( {'address': request.term, componentRestrictions: {country: "in"} }, function(results, status) {
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
  $("#gmaps_input_address").bind('keydown', function(event) {
    if(event.keyCode == 13) {
      geocode_lookup( 'address', $('#gmaps_input_address').val(), true );
      // ensures dropdown disappears when enter is pressed
      $('#gmaps_input_address').autocomplete("disable")

    } else {

      // re-enable if previously disabled above
      $('#gmaps_input_address').autocomplete("enable")

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
    $("input.property_type").click(function(){
      if($(this).attr('data-id') == '1'){
        if(this.checked){
            $('#rootwizard').bootstrapWizard('display', $(this).attr('data-id'));
            init_dropzone($('#dropZoneDynCoverImage'), 2, 'cover', 1);
            init_dropzone($('#dropZoneDynGalleryImage'), 3, 'gallery', 10);
        }else{
            //$('#rootwizard').bootstrapWizard('hide', $(this).attr('data-id'));
        }
      }else{
        alert('Coming soon! Apt Only!');        
      }
    });
}
//$('#rootwizard').bootstrapWizard('show', 2);

function init_dropzone(div, data_unit_type, bhkType, multi){
    var imgFor = '0';
    var uploadMultiple = false;
    if(multi>1) uploadMultiple = true;
    imgFor = div.attr('imgFor');
    div.dropzone({ 
      url: js_base_url+"admin/content/projects/imageUpload/"+data_unit_type+'/'+imgFor,
      uploadMultiple: uploadMultiple,
      maxFilesize: 4,
      maxFiles: multi,
      params: {
                bhkType: bhkType
              }
     }).on('sending', function(file, xhr, formData){
            formData.append('project_id', $('input#proj_id').val());
        });
}

function prepare_post_data(){

    var dataPost = {};

    dataPost['project_types'] = {};
    dataPost['projectsUnits'] = {};
    dataPost['project_id'] = $('input#proj_id').val();
    dataPost['project_name'] = $('input#ProjectName').val();
    dataPost['builder_id'] = $('select#builderId').val();
    $('div#project_types select.selprojtype').each(function(i, ele){
        dataPost['project_types'][$(this).attr('data-id')] = $(this).val();
    });
    dataPost['apt_unit_type'] = $('select#apt_unit_type').val();
    dataPost['sel_city_select'] = $('select#sel_city_select').val();
    dataPost['address'] = $('input#gmaps_input_address').val();
    dataPost['latitude'] = $('input#gmaps_input_latitude').val();
    dataPost['longitude'] = $('input#gmaps_input_longitude').val();
    dataPost['project_overview'] = $('#project_overview').val();
    dataPost['project_locality'] = $('#project_locality').val();
    
    dataPost['total_units'] = $('input#total_units').val();
    dataPost['ownership_type'] = $('select#ownership_type').val();
    dataPost['proj_area'] = $('input#proj_area').val();
    dataPost['proj_started'] = $('input#proj_started').val();
    dataPost['completes_on'] = $('input#completes_on').val();
    dataPost['possession_starts'] = $('input#possession_starts').val();
    dataPost['building_count'] = $('select#project_type_0').val();
    
    $('div.apt_units').each(function(i, ele){
        var unitsInfo = {};
        unitsInfo['interiors'] = {};
        unitsInfo['interiors']['floorings'] = {};
        unitsInfo['interiors']['fittings'] = {};
        unitsInfo['interiors']['Walls'] = {};
        unitsInfo['amenities'] = {};

        unitsInfo['unitText'] = $(this).attr('data-text') + '#' + $(this).attr('data-area');
        unitsInfo['builtupArea'] = $(this).attr('data-area');
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
console.log(dataPost);
  return dataPost;
}


function submit_proj_form(){
    
    var postDataArray = prepare_post_data();

    $.ajax({
            url: js_base_url + "admin/content/projects/submitProject/",
            
            type: "post",

            data: postDataArray,
            
            dataType: "json",
            
            error: function(){
            },
            
            beforeSend: function(){
            },
            
            complete: function(){
            },
            success: function( strData ){
                //$('#rootwizard').bootstrapWizard('show', 13);
                if(strData.project_id){
                  $('input#proj_id').val(strData.project_id);
                  $('a#preview_link').attr('href','http://localhost/4qt/rooffers/home/detail/' + $('input#proj_id').val());
                }
            }
  });
}

function insert_project(){
  submit_proj_form();
  toaster_init('info', 'Never Mind', 'Saving Data');
}

function populate_apartment_form(tab, navigation, index){

  if(index == 2){
    var apt_unit_type = [];
    var cls = 'active';
    $('#listUnitsWithArea li').each(function(i, selected){
      if(!$('#tabsleft ul li#'+$( this ).attr('data-unit_type') + $( this ).attr('data-area')).length){
        if(i!=0) cls = '';
        $('#tabsleft ul').append(
          '<li class="' + cls +
          '" id="' + $( this ).attr('data-unit_type') + $( this ).attr('data-area') + 
          '"><a data-toggle="tab" href="#tabsleft-tab' + i + 
          '">' + 
          $( this ).attr('data-unit_type_text') + 
          '(' + 
          $( this ).attr('data-area') +
          ')' + 
          '</a></li>');
        
        $('#tabsleft div.tab-content').append(
           '<div id="tabsleft-tab' + i + 
           '" class="tab-pane ' + cls + 
           ' fade in apt_units" data-id="' + $( this ).attr('data-unit_type') + 
           '" data-area="' + $( this ).attr('data-area') + 
           '" data-text="' + $( this ).attr('data-unit_type_text') + '">' + 
           $('div.apt_unit_frm').html() +'</div>'
          );
        init_dropzone($('#tabsleft div.tab-content div#tabsleft-tab' + i + ' div.dropZoneDyn'), project_types[0], $( this ).attr('data-unit_type_text') +'#'+ $( this ).attr('data-area'), 1);
        apt_unit_type[i] = $(selected).text();
      }
    });
    var setDate = new Date();
    $('.date-picker').val(setDate.getDate()+'/'+setDate.getMonth()+'/'+setDate.getFullYear()).datepicker({
        orientation: "top auto",
        autoclose: true,
        setDate: new Date()
      });
    // Initialize checkboxes
    $('.dynCheckbox').uniform();
  }else if(index == 4){
      submit_proj_form();
  }

}

function add_unit_type_area(){
  $('input#unit_type_area').click(function(){
    if( $.isNumeric($('input#unit_area').val()) ){
      if(!$('ul#listUnitsWithArea li[data-area="' + $('input#unit_area').val() +'"][data-unit_type="' + $('select#apt_unit_type').val() +'"]').length){
      $('ul#listUnitsWithArea').append(
          '<li data-area="' + 
          $('input#unit_area').val() +
          '" ' +
          'data-unit_type="' +
          $('select#apt_unit_type').val() +
          '" data-unit_type_text="' +
          $('select#apt_unit_type option:selected').text() +
          '""><a href="javascript:void(0);" class="">' + 
          $('select#apt_unit_type option:selected').text() + 
          '(' + 
          $('input#unit_area').val() + ')' + 
          '</a></li>'
        );
      }else{
      toaster_init('error', 'Error', 'Unit Type already added.');
      }
    }else{
      toaster_init('error', 'Error', 'Enter the area. Area must be numeric.');
    }
  });
}

function validate_project_form_tabwise(index){
  var $validator_tab1 = $("#tabonev").validate({
      rules: {
          ProjectName: {
              required: true
          },
          gmaps_input_address: {
              required: true
          },
          property_type_0: {
              required: true
          }
      },
      messages: {
        property_type_0: "*"
      }
  });
  var $validator_tab2 = $("#tabtwov").validate({

      rules: {
          project_type_0: {
              required: true
          },
          apt_unit_type: {
              required: true
          },
          total_units: {
              required: true,
              number: true
          },
          ownership_type: {
              required: true
          },
          proj_area: {
              required: true,
              number: true
          },
          proj_started: {
              required: true
          },
          completes_on: {
              required: true
          },
          possession_starts: {
              required: true
          },
          project_overview: {
              required: true
          },
          project_locality: {
              required: true
          }
      },
      messages: {
        property_type_0: "*"
      }
  });

  if(index == 1){
  
    var $valid_tab1 = $("#tabonev").valid();
    
    if(!$valid_tab1) {

        toaster_init('error', 'Error', 'Please fill the required fields.');
        $validator_tab1.focusInvalid();
        return false;
    
    }else{
      insert_project();
    }

  }else if(index == 2){

    var $valid_tab2 = $("#tabtwov").valid();
    if(!$valid_tab2) {

      toaster_init('error', 'Error', 'Please fill the required fields.');
      $validator_tab2.focusInvalid();
      return false;

  }else{
  insert_project();
  }

}else{
  insert_project();
  return true;
}
}


$(document).ready(function() {
    
    if( $('#sel_city_select').length  ) {
        $('#sel_city_select').select2();
    }

    if( $('#gmaps-canvas').length  ) {
        gmaps_init();
        autocomplete_init();
    };

    $('#rootwizard').bootstrapWizard({
        'tabClass': 'nav nav-tabs',
        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;
            var $percent = ( $current/$total ) * 100;
            $('#rootwizard').find('.progress-bar').css({width:$percent+'%'});
            if(index == 1){
                //$("#apt_unit_type").select2();
              }else if( index == 2 ){
                populate_apartment_form( tab, navigation, index );
              }
        },
        'onNext': function(tab, navigation, index) {
          return validate_project_form_tabwise(index);          
        },
        'onTabClick': function(tab, navigation, index) {
         return false;
        },
    });
    var setDate = new Date();
    $('.date-picker').val(setDate.getDate()+'/'+setDate.getMonth()+'/'+setDate.getFullYear()).datepicker({
      orientation: "top auto",
      autoclose: true
    });

  $('#project_type_0').change(function(){
    $('#rootwizard').bootstrapWizard('display', 2);
  });

update_map_city_select();
toggle_property_form();
add_unit_type_area(); //Adds unit types with area
});
$(document).ready( function() {
   
   // create project page fix menu on scroll
   var stickyOffset = $('#stickypnav-outer .stickypnav').offset().top;
   var stickyOffsetz = $('#stickypnav-outer .stickypnav').offset().top - 60;
   
   $(window).scroll(function(){
   var sticky = $('#stickypnav-outer .stickypnav'),
       scroll = $(window).scrollTop();

   if (scroll >= stickyOffset) sticky.addClass('sticky');
   else sticky.removeClass('sticky');

   if (scroll >= stickyOffsetz) sticky.addClass('highz');
   else sticky.removeClass('highz');
   });
   
   $(window).load(function(){
   var sticky = $('#stickypnav-outer .stickypnav'),
       scroll = $(window).scrollTop();

   if (scroll >= stickyOffset) sticky.addClass('sticky');
   else sticky.removeClass('sticky');

   if (scroll >= stickyOffsetz) sticky.addClass('highz');
   else sticky.removeClass('highz');
   });


   // create project page fix footer button on scroll
   var bottom = $(window).height() - $('#ppager').offset().top - $('#ppager').height();
   var stickyfOffset = $('#ppager').offset().top ;
   
   $(window).scroll(function(){
   var stickyf = $('#ppager'),
       scrollf = $(window).scrollTop() + $(window).height();
       //alert(scrollf);

   if (scrollf <= stickyfOffset) stickyf.addClass('sticky');
   else stickyf.removeClass('sticky');
   });

})
