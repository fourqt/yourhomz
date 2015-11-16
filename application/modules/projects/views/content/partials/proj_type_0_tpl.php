<!--Apartment Unit form Start -->
<div class="apt_unit_frm hidden">
<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <input type="hidden" class="form-control" name="builtupArea" id="builtupArea" placeholder="Builtup Area" >
                <div class="form-group">
                    <label for="exampleInputEmail">Possession Starts</label>
                    <input type="text" class="form-control date-picker" name="possessionStarts" id="possessionStarts" placeholder="Possession Starts" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail">Min. Total Price</label>
                    <input type="text" class="form-control" name="minTotalPrice" id="minTotalPrice" placeholder="Min. Total Price" >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4>Details</h4>
            </div>
            <div class="col-md-6">
                <label>Living Room</label>
                <select class="form-control" name="living_room" id="living_room">
                    <?php for($i=0;$i<5;$i++){ ?>
                        <option value="<?=$i?>"><?=$i?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-6">
                <label>Kitchen</label>
                <select class="form-control" name="kitchen" id="kitchen">
                    <?php for($i=0;$i<5;$i++){ ?>
                        <option value="<?=$i?>"><?=$i?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-6">
                <label>Balconies</label>
                <select class="form-control m-b-sm" name="balconies" id="balconies">
                    <?php for($i=0;$i<5;$i++){ ?>
                        <option value="<?=$i?>"><?=$i?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-6">
                <label>Toilets</label>
                <select class="form-control" name="toilets" id="toilets">
                    <?php for($i=0;$i<5;$i++){ ?>
                        <option value="<?=$i?>"><?=$i?></option>
                    <?php } ?>
                </select>
            </div>
        </div> 
    </div>
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title 2d">2 D</h3>
            </div>
            <div class="panel-body dropZoneDyn" imgFor="0">
                <div class="fallback"></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title 3d">3 D</h3>
            </div>
            <div class="panel-body dropZoneDyn" imgFor="1">
                    <div class="fallback"></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h4>Amenities</h4>
    </div>
    <div class="col-md-12 cuschk-group">
        <label class="cus_box_hidden btn-rounded">
            <input type="checkbox" class="cus_checkbox" name="intercom" id="intercom" />Intercom
        </label>
        <label class="cus_box_hidden btn-rounded">
            <input type="checkbox" class="cus_checkbox" name="gasLine" id="gasLine" />Gas Line
        </label>
        <label class="cus_box_hidden btn-rounded">
            <input type="checkbox" class="cus_checkbox" name="powerBackup" id="powerBackup" />Power Backup
        </label>
        <label class="cus_box_hidden btn-rounded">
            <input type="checkbox" class="cus_checkbox" name="fireplace" id="fireplace" />Fireplace
        </label>
        <label class="cus_box_hidden btn-rounded">
            <input type="checkbox" class="cus_checkbox" name="parking" id="parking" />Parking
        </label>
        <label class="cus_box_hidden btn-rounded">
            <input type="checkbox" class="cus_checkbox" name="terrace" id="terrace" />Terrace
        </label>
        <label class="cus_box_hidden btn-rounded">
            <input type="checkbox" class="cus_checkbox" name="videoDoorPhone" id="videoDoorPhone" />Video Door Phone
        </label>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h3>Interiors</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h4>Floorings</h4>
    </div>
    <div class="col-md-3">
        <label>Balcony</label>
        <input type="text" class="form-control" value="" name="balcony" id="balcony" />
    </div>
    <div class="col-md-3">
        <label>Kitchen</label>
        <input type="text" class="form-control" value="" name="kitchen" id="kitchen" />
    </div>
    <div class="col-md-3">
        <label>Living/Dining</label>
        <input type="text" class="form-control" value="" name="livingDining" id="livingDining" />
    </div>
    <div class="col-md-3">
        <label>Master Bedroom</label>
        <input type="text" class="form-control" value="" name="masterBedroom" id="masterBedroom" />
    </div>
    <div class="col-md-3">
        <label>Other Bedroom</label>
        <input type="text" class="form-control" value="" name="otherBedroom" id="otherBedroom" />                
    </div>
    <div class="col-md-3">
        <label>Toilets</label>
        <input type="text" class="form-control" value="" name="toilets" id="toilets" />
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h4>Fittings</h4>
    </div>
    <div class="col-md-3">
        <label>Doors</label>
        <input type="text" class="form-control" value="" name="Doors" id="Doors" />
    </div>
    <div class="col-md-3">
        <label>Electrical</label>
        <input type="text" class="form-control" value="" name="Electrical" id="Electrical" />
    </div>
    <div class="col-md-3">
        <label>Kitchen</label>
        <input type="text" class="form-control" value="" name="Kitchen" id="Kitchen" />
    </div>
    <div class="col-md-3">
        <label>Windows</label>
        <input type="text" class="form-control" value="" name="Windows" id="Windows" />
    </div>
    <div class="col-md-3">
        <label>Toilets</label>
        <input type="text" class="form-control" value="" name="Toilets" id="Toilets" />
    </div>
    <div class="col-md-3">
        <label>Others</label>
        <input type="text" class="form-control" value="" name="Others" id="Others" />
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h4>Walls</h4>
    </div>
    <div class="col-md-3">
        <label>Exterior</label>
        <input type="text" class="form-control" value="" name="Exterior" id="Exterior" />
    </div>
    <div class="col-md-3">
        <label>Interior</label>
        <input type="text" class="form-control" value="" name="Interior" id="Interior" />
    </div>
    <div class="col-md-3">
        <label>Kitchen</label>
        <input type="text" class="form-control" value="" name="Kitchen" id="Kitchen" />
    </div>
    <div class="col-md-3">
        <label>Toilets</label>
        <input type="text" class="form-control" value="" name="Toilets" id="Toilets" />
    </div>
</div>
</div>
<!--Apartment Unit form End -->