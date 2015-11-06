<div class="tab-pane fade" id="tab<?php echo $project_type['id']+2; ?>">
    <div class="row">
        <div class="form-group col-md-6">
            <div class="form-group col-md-4">
                <label><?=$project_type['name']?></label>
                <select class="form-control m-b-sm selprojtype" name="project_type_<?=$project_type['id']?>" id="project_type_<?=$project_type['id']?>" data-id="<?=$project_type['id']+1?>">
                   <?php for($i=0;$i<10;$i++){ ?>
                       <option value="<?=$i?>"><?=$i?></option>
                   <?php } ?>
                </select>
            </div>
            <div class="form-group col-md-8">
                <label for="apt_unit_type">Have</label>
                <select name="apt_unit_type" multiple="multiple" class="form-control m-b-sm" id="apt_unit_type">
                   <?php foreach($this->config->item('unit.types') as $unit_type){ ?>
                        <option value="<?=$unit_type['id']?>"><?=$unit_type['name']?></option>
                   <?php } ?>
                </select>
            </div>    
        </div>
     
        <div class="form-group col-md-6">
            <div class="form-group col-md-12">
              <label for="exampleInputEmail">Overview</label>
              <textarea class="form-control" placeholder="Enter project detail here." id="project_overview"></textarea>
            </div>
        </div>
    </div>
</div>
<!--Reusable Form Templates -->
<?php $this->load->view('content/partials/proj_type_'.$project_type['id'].'_tpl', array('project_type'=>$project_type));
