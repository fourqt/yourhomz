<div class="tab-pane fade" id="tab<?php echo $project_type['id']+2; ?>">
<form id="tabtwov">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label><? //=$project_type['name']?>Select Building Count</label>
                        <select class="form-control m-b-sm selprojtype" name="project_type_<?=$project_type['id']?>" id="project_type_<?=$project_type['id']?>" data-id="<?=$project_type['id']+1?>">
                        <option></option>
                        <?php for($i=0;$i<10;$i++){ ?>
                           <option value="<?=$i?>"><?=$i?></option>
                        <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4 class="no-m m-b-xs">Add Apartments</h4>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="apt_unit_type">Select BHK</label>
                        <select name="apt_unit_type" class="form-control" id="apt_unit_type">
                           <?php foreach($this->config->item('unit.types') as $unit_type){ ?>
                                <option value="<?=$unit_type['id']?>"><?=$unit_type['name']?></option>
                           <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="apt_unit_type">Add Area(in sq. ft.)</label>
                        <input type="text" class="form-control" name="unit_area" id="unit_area" placeholder="" />
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>&nbsp;</label>
                        <input type="button" class="btn btn-primary btn-block" name="unit_type_area" id="unit_type_area" value="Add"  />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul id="listUnitsWithArea"></ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Total Units</label>
                        <input type="text" class="form-control" name="total_units" id="total_units" placeholder="Total Units" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Ownership Type</label>
                        <select name="ownership_type" class="form-control" id="ownership_type">
                            <option value="Leased">Leased</option>
                            <option value="Full Ownership">Full Ownership</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Project Area</label>
                        <input type="text" class="form-control" name="proj_area" id="proj_area" placeholder="Project Area Sq. Ft." />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Started</label>
                        <input type="text" class="form-control date-picker" name="proj_started" id="proj_started" placeholder="Started" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Completes On</label>
                        <input type="text" class="form-control date-picker" name="completes_on" id="completes_on" placeholder="Completes On" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Possession Starts</label>
                        <input type="text" class="form-control date-picker" name="possession_starts" id="possession_starts" placeholder="Possession Starts" />
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail">Overview</label>
              <textarea class="form-control" placeholder="Enter project detail here." id="project_overview" name="project_overview" style="height:130px;"></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail">Locality</label>
              <textarea class="form-control" placeholder="Enter project detail here." id="project_locality" name="project_locality" style="height:130px;"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title 2d">Cover Images</h3>
                </div>
                <div class="panel-body apt-cimg dropZoneDyn" id="dropZoneDynCoverImage" imgFor="2">
                    <div class="fallback">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title 3d">Gallery Images</h3>
                </div>
                <div class="panel-body apt-gimg dropZoneDyn" id="dropZoneDynGalleryImage" imgFor="3">
                    <div class="fallback">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>    
</div>
<!--Reusable Form Templates -->
<?php $this->load->view('content/partials/proj_type_'.$project_type['id'].'_tpl', array('project_type'=>$project_type));
