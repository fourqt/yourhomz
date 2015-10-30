                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <div id="rootwizard">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#tab1" data-toggle="tab"><i class="fa fa-building m-r-xs"></i>Project Info</a></li>
                                            <li role="presentation"><a href="#tab2" data-toggle="tab"><span class="icon-settings m-r-xs"></span>Configuration</a></li>
                                            <li role="presentation"><a href="#tab3" data-toggle="tab"><i class="fa fa-credit-card m-r-xs"></i>Payment</a></li>
                                            <li role="presentation"><a href="#tab4" data-toggle="tab"><i class="fa fa-check m-r-xs"></i>Finish</a></li>
                                        </ul>
                          
                                    
                                        <div class="progress progress-sm m-t-sm">
                                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                            </div>
                                        </div>
                                        <form id="wizardForm">
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
                                                                    <label for="exampleInputName2">Project Type</label>
                                                                    <?php foreach($this->config->item('project.types') as $project_type){ ?>
                                                                    <div>
                                                                            <label><?=$project_type['name']?></label>
                                                                            <select class="form-control m-b-sm" name="project_type_<?=$project_type['id']?>" id="project_type_<?=$project_type['id']?>">
                                                                            <?php for($i=0;$i<10;$i++){ ?>
                                                                                <option value="<?=$i?>"><?=$i?></option>
                                                                            <?php } ?>
                                                                            </select>                                                                            
                                                                            <div id="detail_<?=$project_type['id']?>" class="form-group col-md-12 hidden"></div>
                                                                            </div>

                                                                    <?php } ?>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="exampleInputEmail">Overview</label>
                                                                    <textarea class="form-control" placeholder="Enter project detail here."></textarea>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row">

                                                            </div>
                                                            <h3>Project Info</h3>
                                                            <p>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus.</p>
                                                            <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                                        </div>
                                                    </div>
                                                </div>
<!-- Tab 2 Start-->
                                                <div class="tab-pane fade" id="tab2">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <img src="<?php echo img_path(); ?>/envato-logo.png" width="250" alt="">
                                                            <div class="m-t-md">
                                                                <address>
                                                                    <strong>Twitter, Inc.</strong><br>
                                                                    795 Folsom Ave, Suite 600<br>
                                                                    San Francisco, CA 94107<br>
                                                                    <abbr title="Phone">P:</abbr> (123) 456-7890
                                                                </address>
                                                                <address>
                                                                    <strong>Full Name</strong><br>
                                                                    <a href="mailto:#">first.last@example.com</a>
                                                                </address>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="form-group col-md-12">
                                                                <label for="exampleInputProductName">Product Name</label>
                                                                <input type="text" class="form-control" name="exampleInputProductName" id="exampleInputProductName" placeholder="Product Name" >
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label for="exampleInputProductId">Product ID</label>
                                                                <input type="text" class="form-control" name="exampleInputProductId" id="exampleInputProductId" placeholder="Product ID">
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label for="exampleInputQuantity">Quantity</label>
                                                                <input type="number" min="1" max="5" class="form-control" name="exampleInputQuantity" id="exampleInputQuantity" placeholder="Quantity">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tab3">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group col-md-12">
                                                                <label for="exampleInputCard">Card Number</label>
                                                                <div class="row">
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" name="exampleInputCard" id="exampleInputCard" placeholder="Card Number">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="text" class="form-control col-md-4" name="exampleInputSecurity" id="exampleInputSecurity" placeholder="Security Code">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label for="exampleInputHolder">Card Holders Name</label>
                                                                <input type="text" class="form-control" name="exampleInputHolder" id="exampleInputHolder" placeholder="Card Holders Name">
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label for="exampleInputExpiration">Expiration</label>
                                                                <input type="text" class="form-control date-picker" name="exampleInputExpiration" id="exampleInputExpiration" placeholder="Expiration">
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label for="exampleInputCsv">CSV</label>
                                                                <input type="text" class="form-control" name="exampleInputCsv" id="exampleInputCsv" placeholder="CSV">
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label class="f-s-12">By pressing Next You will Agree to the Payment <a href="#">Terms & Conditions</a></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tab4">
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
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->

<!-- Reusable Templates -->

<div class="hidden" id="template_apartment_0">
<div class="form-group col-md-6">
    <label for="exampleInputProductName">Apartment {$i}</label>
    <input type="text" class="form-control" name="exampleInputProductName" id="exampleInputProductName" placeholder="Apartment Name" >
</div>
<div class="form-group col-md-6">
    <label for="exampleInputProductName">Have</label>
    <select class="js-example-tokenizer js-states form-control" multiple="multiple" tabindex="-1" style="display: none; width: 100%">
    <?php foreach($this->config->item('unit.types') as $unit_type){ ?>
      <option value="<?=$unit_type['id']?>"><?=$unit_type['name']?></option>
      <?php } ?>
    </select>
</div>
</div>

<input type="hidden" name="gmaps-output-latitude" id="gmaps-output-latitude" value="" />
<input type="hidden" name="gmaps-output-latitude" id="gmaps-output-longitude" value="" />
<input type="hidden" name="gmaps-output" id="gmaps-output" value="" />