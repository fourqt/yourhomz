<!--Apartment Unit form Start -->
<div class="apt_unit_frm hidden">
<div class="row" id="">
    <div class="col-md-4">
      <input type="hidden" class="form-control" name="builtupArea" id="builtupArea" placeholder="Builtup Area" >
      <label for="exampleInputEmail">Possession Starts</label>
      <input type="text" class="form-control date-picker" name="possessionStarts" id="possessionStarts" placeholder="Possession Starts" >  
      <label for="exampleInputEmail">Min. Total Price</label>
      <input type="text" class="form-control" name="minTotalPrice" id="minTotalPrice" placeholder="Min. Total Price" >  
    </div>
    <div class="col-md-3">
        <div class="panel panel-white">
            <div class="panel-heading">
                <h3 class="panel-title 2d">2 D</h3>
            </div>
            <div class="panel-body dropZoneDyn" imgFor="0">
                <div class="fallback">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-white">
            <div class="panel-heading">
                <h3 class="panel-title 3d">3 D</h3>
            </div>
        <div class="panel-body dropZoneDyn" imgFor="1">
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
    <select class="form-control m-b-sm" name="living_room" id="living_room">
        <?php for($i=0;$i<5;$i++){ ?>
            <option value="<?=$i?>"><?=$i?></option>
        <?php } ?>
    </select>
    </label>
    </div>
    <div class="col-md-2">
    <label>Kitchen
    <select class="form-control m-b-sm" name="kitchen" id="kitchen">
        <?php for($i=0;$i<5;$i++){ ?>
            <option value="<?=$i?>"><?=$i?></option>
        <?php } ?>
    </select>
    </label>
    </div>
    <div class="col-md-2">
    <label>Balconies
    <select class="form-control m-b-sm" name="balconies" id="balconies">
        <?php for($i=0;$i<5;$i++){ ?>
            <option value="<?=$i?>"><?=$i?></option>
        <?php } ?>
    </select>
    </label>
    </div>
    <div class="col-md-2">
    <label>Toilets
    <select class="form-control m-b-sm" name="toilets" id="toilets">
        <?php for($i=0;$i<5;$i++){ ?>
            <option value="<?=$i?>"><?=$i?></option>
        <?php } ?>
    </select>
    </label>
    </div>
    </div>

    <div class="row amenities" style="padding-left: 10%">
        <div class="col-md-12">
            <h4 for="exampleInputEmail">Amenities</h4>
            <div class="col-md-3">
            <label>
              <input type="checkbox" class="dynCheckbox" name="intercom" id="intercom" />Intercom
            </label>
            </div>
            <div class="col-md-3">
            <label>
              <input type="checkbox" class="dynCheckbox" class="dynCheckbox" name="gasLine" id="gasLine" />Gas Line
            </label>
            </div>
            <div class="col-md-3">
            <label>
               <input type="checkbox" class="dynCheckbox" name="powerBackup" id="powerBackup" />Power Backup
            </label>
            </div>
            <div class="col-md-3">
            <label>
                <input type="checkbox" class="dynCheckbox" name="fireplace" id="fireplace" />Fireplace
            </label>
            </div>
            <div class="col-md-3">
            <label>
                <input type="checkbox" class="dynCheckbox" name="parking" id="parking" />Parking
            </label>
            </div>
            <div class="col-md-3">
            <label>
                <input type="checkbox" class="dynCheckbox" name="terrace" id="terrace" />Terrace
            </label>
            </div>
            <div class="col-md-3">
            <label>
                <input type="checkbox" class="dynCheckbox" name="videoDoorPhone" id="videoDoorPhone" />Video Door Phone
            </label>
            </div>
        </div>
    </div>
    <div class="row interiors" style="padding-left: 10%">
        <div class="col-md-12">
            <h4 for="exampleInputEmail">Interiors</h4>
        </div>
            <div class="floorings">
                <div class="col-md-12">
                    <h5 for="exampleInputEmail">Floorings</h5>
                </div>
                <div class="col-md-4">
                    <label>
                      <input type="text" value="" name="balcony" id="balcony" />Balcony
                    </label>
                </div>
                <div class="col-md-4">
                    <label>
                      <input type="text" value="" name="kitchen" id="kitchen" />Kitchen
                    </label>
                </div>
                <div class="col-md-4">
                    <label>
                       <input type="text" value="" name="livingDining" id="livingDining" />Living/Dining
                    </label>
                </div>
                <div class="col-md-4">
                    <label>
                        <input type="text" value="" name="masterBedroom" id="masterBedroom" />Master Bedroom
                    </label>
                </div>
                <div class="col-md-4">
                    <label>
                        <input type="text" value="" name="otherBedroom" id="otherBedroom" />Other Bedroom
                    </label>
                </div>
                <div class="col-md-4">
                    <label>
                        <input type="text" value="" name="toilets" id="toilets" />Toilets
                    </label>
                </div>                            
        </div>
    </div>
    <div class="row" style="padding-left: 10%">
        <div class="col-md-12">
            <h5 for="exampleInputEmail">Fittings</h5>
        </div>
        <div class="fittings">
            <div class="col-md-4">
                <label>
                  <input type="text" value="" name="Doors" id="Doors" />Doors
                </label>
            </div>
            <div class="col-md-4">
                <label>
                  <input type="text" value="" name="Electrical" id="Electrical" />Electrical
                </label>
            </div>
            <div class="col-md-4">
                <label>
                   <input type="text" value="" name="Kitchen" id="Kitchen" />Kitchen
                </label>
            </div>
            <div class="col-md-4">
                <label>
                    <input type="text" value="" name="Windows" id="Windows" />Windows
                </label>
            </div>
            <div class="col-md-4">
                <label>
                    <input type="text" value="" name="Toilets" id="Toilets" />Toilets
                </label>
            </div>
            <div class="col-md-4">
                <label>
                    <input type="text" value="" name="Others" id="Others" />Others
                </label>
            </div>
        </div>                            
    </div>
    <div class="row" style="padding-left: 10%">
        <div class="col-md-12">
            <h5 for="exampleInputEmail">Walls</h5>
        </div>
        <div class="walls">
            <div class="col-md-4">
                <label>
                  <input type="text" value="" name="Exterior" id="Exterior" />Exterior
                </label>
            </div>
            <div class="col-md-4">
                <label>
                  <input type="text" value="" name="Interior" id="Interior" />Interior
                </label>
            </div>
            <div class="col-md-4">
                <label>
                   <input type="text" value="" name="Kitchen" id="Kitchen" />Kitchen
                </label>
            </div>
            <div class="col-md-4">
                <label>
                    <input type="text" value="" name="Toilets" id="Toilets" />Toilets
                </label>
            </div>
        </div>                                                        
    </div>
</div>
</div>
<!--Apartment Unit form End -->
