<div class="panel panel-white">
   <div class="panel-body">
      <div id="rootwizard">
         <div id="fixporjecttab">
         <ul class="nav nav-tabs" role="tablist">
             <li class="active"><a href="#tab1" data-toggle="tab"><i class="fa fa-building m-r-xs"></i>Project Info</a></li>
             <?php foreach($this->config->item('project.types') as $project_type){ ?>
             <li style="display:none;"><a href="#tab<?php echo $project_type['id']+2; ?>" data-toggle="tab"><span class="icon-settings m-r-xs"></span><?php echo $project_type['name']; ?></a></li>
             <?php } ?>
             <li><a href="#tab13" data-toggle="tab"><i class="fa fa-credit-card m-r-xs"></i>Payment</a></li>
             <li><a href="#tab14" data-toggle="tab"><i class="fa fa-check m-r-xs"></i>Finish</a></li>
         </ul>

         <div class="progress progress-sm m-t-sm">
             <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
             </div>
         </div>
         </div>
         
         <div class="tab-content">
            <div class="tab-pane active fade in" id="tab1">
               <div id="tabone" class="row">
                  <div class="col-lg-6">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="exampleInputEmail">Project Name</label>
                              <input type="texttext" class="form-control" name="ProjectName" id="InputProjectName" placeholder="Project name" >
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="exampleInputName">Select Builder</label>
                              <select class="form-control m-b-sm" name="builder" id="builderId">
                                 <?php foreach($builders as $builder){ ?>
                                  <option value="<?=$builder->id?>"><?=$builder->display_name?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="row" id="project_types">
                     <?php foreach($this->config->item('project.types') as $project_type){ ?>
                     <?php if($project_type['input_type'] == 'select'){ ?>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label><?=$project_type['name']?></label>
                              <select class="form-control m-b-sm selprojtype" name="project_type_<?=$project_type['id']?>" id="project_type_<?=$project_type['id']?>" data-id="<?=$project_type['id']+1?>">
                                 <?php for($i=0;$i<10;$i++){ ?>
                                 <option value="<?=$i?>"><?=$i?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="exampleInputProductName">Have</label>
                              <select class="js-example-tokenizer js-states form-control fix-height" multiple="multiple" id="apt_unit_type">
                                 <?php foreach($this->config->item('unit.types') as $unit_type){ ?>
                                 <option value="<?=$unit_type['id']?>"><?=$unit_type['name']?></option>
                                 <?php } ?>
                              </select>
                          </div>
                        </div>
                     <?php }else{ ?>
                        <div class="col-lg-6 col-md-4 col-sm-4">
                           <div class="checkbox">
                              <label>
                                 <input type="checkbox" id="property_type_<?php echo $project_type['id']; ?>" class="property_type" data-id="<?php echo $project_type['id']+1; ?>" /><?=$project_type['name']?>
                              </label>
                           </div>
                        </div>
                     <?php } ?>
                     <?php } ?>
                        <div class="form-group col-sm-12 m-t-sm">
                           <label for="exampleInputEmail">Overview</label>
                           <textarea class="form-control" placeholder="Enter project detail here." id="project_overview"></textarea>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label for="exampleInputPassword1">City</label>
                        <div class="form-control-min-height">
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
                     </div>
                     <div class="form-group">
                        <label for="exampleInputPassword2">Address</label>
                        <input type="text" class="form-control" name="exampleInputPassword2" id="gmaps-input-address" placeholder="Location" disabled="disabled" />
                        <label for="exampleInputPassword2" class="m-t-md">Click and move the marker to exact project location</label>
                        <div class="gmapbg">
                        <div id='gmaps-canvas' style="width:100%; height:280px;"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
      <!-- Tab 2 Start-->
         <?php foreach($this->config->item('project.types') as $project_type){ ?>
             <?php if( $project_type['id']==0 ){ 
             $this->load->view('content/partials/proj_type_'.$project_type['id'], array('project_type'=>$project_type));
              }else{ 
             $this->load->view('content/partials/proj_type_1', array('project_type'=>$project_type));
              } ?>
         <?php } ?>
             <div class="tab-pane fade" id="tab13">
                 <div class="row">
                </div>
             </div>
             <div class="tab-pane fade" id="tab14">
                 <h2 class="no-s">Thank You !</h2>
                 <div class="alert alert-info m-t-sm m-b-lg" role="alert">
                     Congratulations ! You got the last step.
                 </div>
             </div>
             <ul class="pager wizard no-m m-t-md">
                 <li class="previous"><a href="#" class="btn btn-default">Previous</a></li>
                 <li class="next"><a href="#" class="btn btn-default">Next</a></li>
             </ul>
         </div>
      </div>
   </div>
</div>

<!-- Reusable Templates -->
<input type="hidden" name="gmaps-output-latitude" id="gmaps-output-latitude" value="" />
<input type="hidden" name="gmaps-output-latitude" id="gmaps-output-longitude" value="" />
<input type="hidden" name="gmaps-output" id="gmaps-output" value="" />