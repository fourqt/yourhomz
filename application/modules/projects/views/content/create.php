                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <div id="rootwizard">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#tab1" data-toggle="tab"><i class="fa fa-building m-r-xs"></i>Project Info</a></li>
                                            <?php foreach($this->config->item('project.types') as $project_type){ ?>
                                            <li role="presentation"><a href="#tab<?php echo $project_type['id']+2; ?>" data-toggle="tab"><span class="icon-settings m-r-xs"></span><?php echo $project_type['name']; ?></a></li>
                                            <?php } ?>
                                            <li role="presentation"><a href="#tab13" data-toggle="tab"><i class="fa fa-credit-card m-r-xs"></i>Payment</a></li>
                                            <li role="presentation"><a href="#tab14" data-toggle="tab"><i class="fa fa-check m-r-xs"></i>Finish</a></li>
                                        </ul>
                          
                                    
                                        <div class="progress progress-sm m-t-sm">
                                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                            </div>
                                        </div>
                                            <div class="tab-content">
                                                <div class="tab-pane active fade in" id="tab1">
                                                    <div class="row m-b-lg">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="form-group col-md-12">
                                                                    <label for="exampleInputName">Select Builder</label>
                                                                    <select class="form-control m-b-sm" name="builder">
                                                                    <?php foreach($builders as $builder){ ?>
                                                                        <option value="<?=$builder->id?>"><?=$builder->display_name?></option>
                                                                    <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="exampleInputEmail">Project Name</label>
                                                                    <input type="texttext" class="form-control" name="ProjectName" id="InputProjectName" placeholder="Project name" >
                                                                </div>

                                                                <div class="form-group col-md-12">
                                                                    <?php foreach($this->config->item('project.types') as $project_type){ ?>
                                                                           <?php if($project_type['input_type'] == 'select'){ ?>
                                                                           <div class="row">
                                                                           <div class="form-group col-md-6">
                                                                           <label><?=$project_type['name']?></label>
                                                                            <select class="form-control m-b-sm" name="project_type_<?=$project_type['id']?>" id="project_type_<?=$project_type['id']?>" data-id="<?=$project_type['id']+1?>">
                                                                            <?php for($i=0;$i<10;$i++){ ?>
                                                                                <option value="<?=$i?>"><?=$i?></option>
                                                                            <?php } ?>
                                                                            </select>
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="exampleInputProductName">Have</label>
                                                                                <select class="js-example-tokenizer js-states form-control" multiple="multiple">
                                                                                <?php foreach($this->config->item('unit.types') as $unit_type){ ?>
                                                                                  <option value="<?=$unit_type['id']?>"><?=$unit_type['name']?></option>
                                                                                  <?php } ?>
                                                                                </select>
                                                                            </div>
                                                                            </div>
                                                                            <?php }else{ ?>
                                                                            <div class="checkbox col-md-6" style="margin-top:5px;">
                                                                                <label>
                                                                                    <input type="checkbox" id="property_type_<?php echo $project_type['id']; ?>" class="property_type" data-id="<?php echo $project_type['id']+1; ?>" /><?=$project_type['name']?>
                                                                                </label>
                                                                            </div>
                                                                            <?php } ?>
                                                                    <?php } ?>
                                                                </div>

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
                                                                    <input type="text" class="form-control" name="exampleInputPassword2" id="gmaps-input-address" placeholder="Location" disabled="disabled" />

                                                                </div>

                                                                <div class="form-group col-md-12">
                                                                    <label for="exampleInputEmail">Overview</label>
                                                                    <textarea class="form-control" placeholder="Enter project detail here."></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
<!-- Tab 2 Start-->
                                            <?php foreach($this->config->item('project.types') as $project_type){ ?>
                                                <?php if( $project_type['id']==0 ){ ?>
                                                <div class="tab-pane fade" id="tab<?php echo $project_type['id']+2; ?>">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="tabbable tabs-left" id="tabsleft">
                                                                <ul class="nav nav-tabs">
                                                                    <li class="active"><a data-toggle="tab" href="#tabsleft-tab1">2 BHK</a></li>
                                                                    <li class=""><a data-toggle="tab" href="#tabsleft-tab2">3 BHK</a></li>
                                                                    <li class=""><a data-toggle="tab" href="#tabsleft-tab3">Penthouse</a></li>
                                                                </ul>
                                                                <div class="progress progress-info progress-striped">
                                                                    <div class="bar" style="width: 14.2857%;"></div>
                                                                </div>
                                                                <div class="tab-content">
                                                                    <div id="tabsleft-tab1" class="tab-pane active">
                                                                        <div class="row">
                                                                            <div class="col-md-4"></div>
                                                                            <div class="col-md-3">
                                                                                <div class="panel panel-white">
                                                                                    <div class="panel-heading">
                                                                                        <h3 class="panel-title">2 D</h3>
                                                                                    </div>
                                                                                    <div class="panel-body">
                                                                                        <form action="http://lambdathemes.in/file-upload" class="dropzone">
                                                                                            <div class="fallback">
                                                                                                <input name="file" type="file" multiple />
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="panel panel-white">
                                                                                    <div class="panel-heading">
                                                                                        <h3 class="panel-title">3 D</h3>
                                                                                    </div>
                                                                                    <div class="panel-body">
                                                                                        <form action="http://lambdathemes.in/file-upload" class="dropzone">
                                                                                            <div class="fallback">
                                                                                                <input name="file" type="file" multiple />
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div id="tabsleft-tab2" class="tab-pane">
                                                                        <p>Howdy, I'm in Section 2.</p>
                                                                    </div>
                                                                    <div id="tabsleft-tab3" class="tab-pane">
                                                                        3
                                                                    </div>
                                                                    </div>  
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                                <?php }else{ ?>
                                                <div class="tab-pane fade" id="tab<?php echo $project_type['id']+2; ?>"></div>
                                                <?php } ?>
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
                                                <ul class="pager wizard">
                                                    <li class="previous"><a href="#" class="btn btn-default">Previous</a></li>
                                                    <li class="next"><a href="#" class="btn btn-default">Next</a></li>
                                                </ul>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->

<!-- Reusable Templates -->
<input type="hidden" name="gmaps-output-latitude" id="gmaps-output-latitude" value="" />
<input type="hidden" name="gmaps-output-latitude" id="gmaps-output-longitude" value="" />
<input type="hidden" name="gmaps-output" id="gmaps-output" value="" />