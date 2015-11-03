<div class="tab-pane fade" id="tab<?php echo $project_type['id']+2; ?>">
    <div class="row">
        <div class="col-md-12">
            <div class="tabbable tabs-left" id="tabsleft">
                <ul class="nav nav-tabs">
                </ul>
                
                <div class="tab-content">
                </div>  
            </div>
        </div>
    </div>
</div>


<!--Reusable Form Templates -->

<!--Apartment Unit form Start -->
<div class="apt_unit_frm hidden">
<div class="row" id="">
    <div class="col-md-4">
      <label for="exampleInputEmail">Builtup Area (Sq. Ft.)</label>
      <input type="texttext" class="form-control" name="ProjectName" id="InputProjectName" placeholder="Project name" >  
      <label for="exampleInputEmail">Possession Starts</label>
      <input type="texttext" class="form-control date-picker" name="ProjectName" id="InputProjectName" placeholder="Project name" >  
      <label for="exampleInputEmail">Min. Total Price</label>
      <input type="texttext" class="form-control" name="ProjectName" id="InputProjectName" placeholder="Project name" >  
    </div>
    <div class="col-md-3">
        <div class="panel panel-white">
            <div class="panel-heading">
                <h3 class="panel-title">2 D</h3>
            </div>
            <div class="panel-body dropZoneDyn">
                <div class="fallback">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-white">
            <div class="panel-heading">
                <h3 class="panel-title dropZoneDyn">3 D</h3>
            </div>
        <div class="panel-body dropZoneDyn">
                <div class="fallback">
                </div>
        </div>
    </div>
</div>
    <div class="row" style="padding-left: 10%">
    <div class="col-md-12">
        <h4 for="exampleInputEmail">Details</h4>
    </div>
    <div class="col-md-2">
    <label>Living Room
    <select class="form-control m-b-sm" name="living_room">
        <?php for($i=0;$i<5;$i++){ ?>
            <option value="<?=$i?>"><?=$i?></option>
        <?php } ?>
    </select>
    </label>
    </div>
    <div class="col-md-2">
    <label>Kitchen
    <select class="form-control m-b-sm" name="living_room">
        <?php for($i=0;$i<5;$i++){ ?>
            <option value="<?=$i?>"><?=$i?></option>
        <?php } ?>
    </select>
    </label>
    </div>
    <div class="col-md-2">
    <label>Balconies
    <select class="form-control m-b-sm" name="living_room">
        <?php for($i=0;$i<5;$i++){ ?>
            <option value="<?=$i?>"><?=$i?></option>
        <?php } ?>
    </select>
    </label>
    </div>
    <div class="col-md-2">
    <label>Toilets
    <select class="form-control m-b-sm" name="living_room">
        <?php for($i=0;$i<5;$i++){ ?>
            <option value="<?=$i?>"><?=$i?></option>
        <?php } ?>
    </select>
    </label>
    </div>
    </div>

    <div class="row" style="padding-left: 10%">
        <div class="col-md-12">
            <h4 for="exampleInputEmail">Amenities</h4>
            <div class="col-md-3">
            <label>
              <input type="checkbox" class="dynCheckbox" />Intercom
            </label>
            </div>
            <div class="col-md-3">
            <label>
              <input type="checkbox" class="dynCheckbox" class="dynCheckbox" />Gas Line
            </label>
            </div>
            <div class="col-md-3">
            <label>
               <input type="checkbox" class="dynCheckbox" />Power Backup
            </label>
            </div>
            <div class="col-md-3">
            <label>
                <input type="checkbox" class="dynCheckbox" />Fireplace
            </label>
            </div>
            <div class="col-md-3">
            <label>
                <input type="checkbox" class="dynCheckbox" />Parking
            </label>
            </div>
            <div class="col-md-3">
            <label>
                <input type="checkbox" class="dynCheckbox" />Terrace
            </label>
            </div>
            <div class="col-md-3">
            <label>
                <input type="checkbox" class="dynCheckbox" />Video Door Phone
            </label>
            </div>
        </div>
    </div>
    <div class="row" style="padding-left: 10%">
        <div class="col-md-12">
            <h4 for="exampleInputEmail">Interiors</h4>
        </div>
        <div class="col-md-12">
            <h5 for="exampleInputEmail">Floorings</h5>
        </div>
        <div class="col-md-4">
            <label>
              <input type="text" value="" />Balcony
            </label>
        </div>
        <div class="col-md-4">
            <label>
              <input type="text" value="" />Kitchen
            </label>
        </div>
        <div class="col-md-4">
            <label>
               <input type="text" value="" />Living/Dining
            </label>
        </div>
        <div class="col-md-4">
            <label>
                <input type="text" value="" />Master Bedroom
            </label>
        </div>
        <div class="col-md-4">
            <label>
                <input type="text" value="" />Other Bedroom
            </label>
        </div>
        <div class="col-md-4">
            <label>
                <input type="text" value="" />Toilets
            </label>
        </div>                            
    </div>
    <div class="row" style="padding-left: 10%">
        <div class="col-md-12">
            <h5 for="exampleInputEmail">Fittings</h5>
        </div>
        <div class="col-md-4">
            <label>
              <input type="text" value="" />Doors
            </label>
        </div>
        <div class="col-md-4">
            <label>
              <input type="text" value="" />Electrical
            </label>
        </div>
        <div class="col-md-4">
            <label>
               <input type="text" value="" />Kitchen
            </label>
        </div>
        <div class="col-md-4">
            <label>
                <input type="text" value="" />Windows
            </label>
        </div>
        <div class="col-md-4">
            <label>
                <input type="text" value="" />Toilets
            </label>
        </div>
        <div class="col-md-4">
            <label>
                <input type="text" value="" />Others
            </label>
        </div>                            
    </div>
    <div class="row" style="padding-left: 10%">
        <div class="col-md-12">
            <h5 for="exampleInputEmail">Walls</h5>
        </div>
        <div class="col-md-4">
            <label>
              <input type="text" value="" />Exterior
            </label>
        </div>
        <div class="col-md-4">
            <label>
              <input type="text" value="" />Interior
            </label>
        </div>
        <div class="col-md-4">
            <label>
               <input type="text" value="" />Kitchen
            </label>
        </div>
        <div class="col-md-4">
            <label>
                <input type="text" value="" />Toilets
            </label>
        </div>                                                        
    </div>
</div>
</div>
<!--Apartment Unit form End -->
