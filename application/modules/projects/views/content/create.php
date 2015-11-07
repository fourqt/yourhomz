<div class="panel panel-white">
   <div class="panel-body">
      <div id="rootwizard">
         <ul class="nav nav-tabs" role="tablist">
             <li class="active"><a href="#tab1" data-toggle="tab"><i class="fa fa-building m-r-xs"></i>Project Info</a></li>
             <?php foreach($this->config->item('project.types') as $project_type){ 
                    if($project_type['id'] == 0){
              ?>
             <li style="display:none;"><a href="#tab<?php echo $project_type['id']+2; ?>" data-toggle="tab"><span class="icon-settings m-r-xs"></span><?php echo $project_type['name']; ?></a></li>
             <?php foreach($this->config->item('unit.types') as $key => $unit_type){ if($key==0){ ?>
             <li style="display:none;"><a href="#tab<?php echo $unit_type['id']+3; ?>" data-toggle="tab"><span class="icon-settings m-r-xs"></span>Configuration<?php //echo $unit_type['name']; ?></a></li>
             <?php } ?>
             <?php } ?>
             <?php } ?>
             <?php } ?>
             <li><a href="#tab4" data-toggle="tab"><i class="fa fa-check m-r-xs"></i>Finish</a></li>
         </ul>

         <div class="progress progress-sm m-t-sm">
             <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
             </div>
         </div>
         
         <div class="tab-content">
            <div class="tab-pane active fade in" id="tab1">
              <div id="tabone" class="row">
              <form id="tabonev">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="exampleInputName">Select Builder</label>
                        <select class="form-control m-b-sm" name="builder" id="builderId">
                           <?php foreach($builders as $builder){ ?>
                            <option value="<?=$builder->id?>"><?=$builder->display_name?></option>
                           <?php } ?>
                        </select>
                     </div>
                  <div class="form-group clearfix">
                    <label for="exampleInputEmail">Project Name</label>
                    <input type="texttext" class="form-control" name="ProjectName" id="ProjectName" placeholder="Project name" >
                  </div>

                  <div class="form-group" id="project_types">
                  <?php foreach($this->config->item('project.types') as $project_type){ ?>
                       <div class="checkbox col-md-6" style="margin-top:5px;">
                           <label>
                               <input type="checkbox" name="property_type_<?php echo $project_type['id']; ?>" id="property_type_<?php echo $project_type['id']; ?>" class="property_type" data-id="<?php echo $project_type['id']+1; ?>" /><?=$project_type['name']?>
                           </label>
                       </div>
                  <?php } ?>
                  </div>


                  </div>
                  <div class="col-md-6">
                      <div class="row">
                          <div class="form-group col-md-12">
                              <label for="exampleInputPassword1">City</label>
                              <select class="js-states form-control" id="sel_city_select" tabindex="-1" style="display: none; width: 100%">
                                  <?php if($cities){
                                      foreach($cities as $city){
                                  ?>
                                          <option value="<?=$city->id?>" data-latitude="<?=$city->latitude?>" data-longitude="<?=$city->longitude?>"><?=$city->city_name?></option>
                                  <?php
                                      }
                                  }
                                  ?>
                              </select>   
                          </div>
                          <div class="form-group col-md-12">
                              <label for="exampleInputPassword2">Click and move the marker to exact project location</label>
                              <div id='gmaps-canvas' style="width:100%; height:200px;"></div>
                              <label for="exampleInputPassword2">Address</label>
                              <input type="text" class="form-control" name="gmaps_input_address" id="gmaps_input_address" placeholder="Location" />
                          </div>

                      </div>
                  </div>
              </form>
              </div>
            </div>
      <!-- Tab 2 Start-->
         <?php foreach($this->config->item('project.types') as $project_type){ ?>
             <?php if( $project_type['id'] == 0 ){ 
                     $this->load->view('content/partials/proj_type_'.$project_type['id'], array('project_type'=>$project_type));
                        //foreach($this->config->item('unit.types') as $unit_type){
                          $this->load->view('content/partials/proj_type_0_1', array('unit_type'=>$unit_type));
                        //}
                    }else{ 
                      //$this->load->view('content/partials/proj_type_1', array('project_type'=>$project_type));
                    } 
              ?>
         <?php } ?>
             <div class="tab-pane fade" id="tab4">
                 <h2 class="no-s">Thank You !</h2>
                 <div class="alert alert-info m-t-sm m-b-lg" role="alert">
                     Congratulations ! You got the last step.
                 </div>
             </div>
             <ul class="pager wizard no-m m-t-md">
                 <li class="previous"><a href="javascript:void(0);" class="btn btn-default">Previous</a></li>
                 <li class="next"><a href="javascript:void(0);" class="btn btn-default">Next</a></li>
             </ul>
         </div>
      </div>
   </div>
</div>

<!-- Reusable Templates -->
<input type="hidden" name="gmaps_output_latitude" id="gmaps_output_latitude" value="" />
<input type="hidden" name="gmaps_output_latitude" id="gmaps_output_longitude" value="" />
<input type="hidden" name="gmaps-output" id="gmaps-output" value="" />
<input type="hidden" name="proj_id" id="proj_id" value="" />