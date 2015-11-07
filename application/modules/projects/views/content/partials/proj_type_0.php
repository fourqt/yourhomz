<div class="tab-pane fade" id="tab<?php echo $project_type['id']+2; ?>">
<form id="tabtwov">
    <div class="row">
        <div class="form-group col-md-6">
            <div class="form-group col-md-4">
                <label><?=$project_type['name']?></label>
                <select class="form-control m-b-sm selprojtype" name="project_type_<?=$project_type['id']?>" id="project_type_<?=$project_type['id']?>" data-id="<?=$project_type['id']+1?>">
                <option></option>
                   <?php for($i=0;$i<10;$i++){ ?>
                       <option value="<?=$i?>"><?=$i?></option>
                   <?php } ?>
                </select>
            </div>
            <div class="form-group col-md-8 clearfix" style="height:90px;">
                <label for="apt_unit_type">Have</label>
                <select name="apt_unit_type" multiple="multiple" class="form-control m-b-sm" id="apt_unit_type">
                   <?php foreach($this->config->item('unit.types') as $unit_type){ ?>
                        <option value="<?=$unit_type['id']?>"><?=$unit_type['name']?></option>
                   <?php } ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="">Total Units</label>
                <input type="text" class="form-control" name="total_units" id="total_units" placeholder="Total Units" />
            </div>
            <div class="form-group col-md-6">
                <label for="">Ownership Type</label>
                <select name="ownership_type" class="form-control m-b-sm" id="ownership_type">
                    <option value="Leased">Leased</option>
                    <option value="Full Ownership">Full Ownership</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="">Project Area</label>
                <input type="text" class="form-control" name="proj_area" id="proj_area" placeholder="Project Area Sq. Ft." />
            </div>
            <div class="form-group col-md-6">
                <label for="">Started</label>
                <input type="text" class="form-control date-picker" name="proj_started" id="proj_started" placeholder="Started" />
            </div>
            <div class="form-group col-md-6">
                <label for="">Completes On</label>
                <input type="text" class="form-control date-picker" name="completes_on" id="completes_on" placeholder="Completes On" />
            </div>
            <div class="form-group col-md-6">
                <label for="">Possession Starts</label>
                <input type="text" class="form-control date-picker" name="possession_starts" id="possession_starts" placeholder="Possession Starts" />
            </div>
        </div>
     
        <div class="form-group col-md-6">
            <div class="form-group col-md-12">
              <label for="exampleInputEmail">Overview</label>
              <textarea class="form-control" placeholder="Enter project detail here." id="project_overview" name="project_overview" style="height:130px;"></textarea>
            </div>
            <div class="form-group col-md-12">
              <label for="exampleInputEmail">Locality</label>
              <textarea class="form-control" placeholder="Enter project detail here." id="project_locality" name="project_locality" style="height:130px;"></textarea>
            </div>
        </div>
        <div class="form-group col-md-12">
            <div class="col-md-3">
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h3 class="panel-title 2d">Cover Images</h3>
                    </div>
                    <div class="panel-body dropZoneDyn" id="dropZoneDynCoverImage" imgFor="2">
                        <div class="fallback">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h3 class="panel-title 3d">Gallery Images</h3>
                    </div>
                    <div class="panel-body dropZoneDyn" id="dropZoneDynGalleryImage" imgFor="3">
                        <div class="fallback">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>    
</div>
<!--Reusable Form Templates -->
<?php $this->load->view('content/partials/proj_type_'.$project_type['id'].'_tpl', array('project_type'=>$project_type));
