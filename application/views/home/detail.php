<?php
$id = $this->uri->segment(3);

$rawData = json_decode($this->db->query("select raw_data from rf_projects where id=".$id)->row()->raw_data);
$builder = $this->db->query("select username from rf_users where id=".$rawData->builder_id)->row()->username;

$images_query = $this->db->query("select  * from rf_images_uploaded where project_id=".$id."");

$images = array();
foreach ($images_query->result() as $row){
$images[$row->bhkType][] = $row->image_name;
}

$unit_types = $this->config->item('unit.types');

$projectsUnits = array();
$projectPrices = array();
$pricePerSqft = array();
foreach($rawData->projectsUnits as $Units){
	$unitsTypes = explode('#', $Units->unitText);
	$projectsUnits[$unitsTypes[0]][] = $Units;
	$projectPrices[] = $Units->minTotalPrice;
	$pricePerSqft[] = $Units->minTotalPrice/$Units->builtupArea;
}
?>
<header id="big-detail" style="background-image:url(<?=base_url();?>assets/uploads/0/<?=$images['cover'][0]?>);">
<div id="innerhead">
	<div id="project-nav">
		<div class="container">
			<ul class="nav nav-pills nav-pills-banner nav-justified">
			   <li><a href="#pdoverview" class="scrollhash">Overview</a></li>
			   <li><a href="#pdconfig" class="scrollhash">Configuration</a></li>
			   <li><a href="javascript:void(0);">Payment Plans</a></li>
			   <li><a href="#pdlocal" class="scrollhash">Locality</a></li>
			   <li><a href="javascript:void(0);">Construction Updates</a></li>
			   <li><a href="javascript:void(0);">Discussion</a></li>
			</ul>
		</div>
	</div>
    
</div>
</header>
<div ng-app="projApp" ng-controller="projCtrl">
<section id="project-head">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-9 col-sm-9">
				<div class="row">
					<div class="col-lg-8 project-headline">
						<h2><?=$rawData->project_name?></h2>
						<h4>by <?=$builder?></h4>
						<p><?=$rawData->address?></p>
					</div>
					<div class="col-lg-4">
						<h2><?=formatInIndianStyle(min($projectPrices))?></h2>
						<ul class="fa-ul">
							<li><span>&bull;</span><?=formatInIndianStyle(min($pricePerSqft))?>/sq.ft+</li>
							<li><span>&bull;</span>EMI starting 34.9 k</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 btn-right">
				<div class="btns">
				<a href="" class="btn btn-default btn-lg">
					<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
					ShortList
				</a>
				<a href="" class="btn btn-default btn-success btn-lg hidden-xs hidden-sm hidden-md">Book Via Floor Plan</a>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="container m-t-lg">
	<div class="row">
		<div class="col-lg-9 col-md-9">
			<div id="proarticle">
				<div class="bgwhite p clearfix">
				<div class="swipe-gallery">
				<?php 
				if( count($images['gallery']) ){
					$imageCount = count($images['gallery']);
					$initCount = 0;
					foreach($images['gallery'] as $galleryImage){
						$imageSize = getimagesize ( base_url().'assets/uploads/0/'.$galleryImage );
						$initCount++;
						$imageCount--;
				?>
				<?php if( $initCount == 1 ){ ?>
					<figure class="size1 m-r-xxs m-b-xxs morebig">
						<a href="<?=base_url();?>assets/uploads/0/<?=$galleryImage?>" data-size="<?=$imageSize[0].'x'.$imageSize[1]?>">
							<img src="<?=base_url();?>assets/uploads/0/<?=$galleryImage?>" alt="<?=$galleryImage?>" />
						</a>
						<figcaption></figcaption>
						<div class="moreimg hidden-sm hidden-md hidden-lg"><?=$imageCount?>+<span>More</span></div>
					</figure>
					<?php }elseif( $initCount == 2 ){ ?>
					<figure class="size1 m-r-xxs m-b-xxs hidden-xs">
						<a href="<?=base_url();?>assets/uploads/0/<?=$galleryImage?>" data-size="<?=$imageSize[0].'x'.$imageSize[1]?>">
							<img src="<?=base_url();?>assets/uploads/0/<?=$galleryImage?>" alt="<?=$galleryImage?>" />
						</a>
						<figcaption></figcaption>
					</figure>
					<?php }elseif( $initCount == 3 ){ ?>
					<figure class="size1 m-b-xxs hidden-xs">
						<a href="<?=base_url();?>assets/uploads/0/<?=$galleryImage?>" data-size="<?=$imageSize[0].'x'.$imageSize[1]?>">
							<img src="<?=base_url();?>assets/uploads/0/<?=$galleryImage?>" alt="<?=$galleryImage?>" />
						</a>
						<figcaption></figcaption>
					</figure>
					<?php }elseif( $initCount == 4 ){ ?>
					<figure class="size2 m-r-xxs hidden-xs">
						<a href="<?=base_url();?>assets/uploads/0/<?=$galleryImage?>" data-size="<?=$imageSize[0].'x'.$imageSize[1]?>">
							<img src="<?=base_url();?>assets/uploads/0/<?=$galleryImage?>" alt="<?=$galleryImage?>" />
						</a>
						<figcaption></figcaption>
					</figure>
					<?php }elseif( $initCount == 5 ){ ?>
					<figure class="size2 m-r-xxs hidden-xs">
						<a href="<?=base_url();?>assets/uploads/0/<?=$galleryImage?>" data-size="<?=$imageSize[0].'x'.$imageSize[1]?>">
							<img src="<?=base_url();?>assets/uploads/0/<?=$galleryImage?>" alt="<?=$galleryImage?>" />
						</a>
						<figcaption></figcaption>
					</figure>
					<?php }elseif( $initCount == 6 ){ ?>
					<figure class="size2 m-r-xxs hidden-xs">
						<a href="<?=base_url();?>assets/uploads/0/<?=$galleryImage?>" data-size="<?=$imageSize[0].'x'.$imageSize[1]?>">
							<img src="<?=base_url();?>assets/uploads/0/<?=$galleryImage?>" alt="<?=$galleryImage?>" />
						</a>
						<figcaption></figcaption>
					</figure>
					<?php }elseif( $initCount == 7 ){ ?>
					<figure class="size2 moresmall hidden-xs">
						<a href="<?=base_url();?>assets/uploads/0/<?=$galleryImage?>" data-size="<?=$imageSize[0].'x'.$imageSize[1]?>">
							<img src="<?=base_url();?>assets/uploads/0/<?=$galleryImage?>" alt="<?=$galleryImage?>" />
						</a>
						<figcaption></figcaption>
						<div class="moreimg hidden-sm hidden-md hidden-lg"><?=$imageCount?>+<span>More</span></div>
					</figure>
					<?php }else{ ?>
					<figure class="size2 moresmall hidden-xs">
						<a href="<?=base_url();?>assets/uploads/0/<?=$galleryImage?>" data-size="<?=$imageSize[0].'x'.$imageSize[1]?>">
							<img src="<?=base_url();?>assets/uploads/0/<?=$galleryImage?>" alt="<?=$galleryImage?>" />
						</a>
						<figcaption></figcaption>
					</figure>
					<?php } ?>
				<?php 
					}
				}
				?>

				</div>
				</div>
				<div id="pdoverview" class="overview bgwhite p m-t-md">
					<h2 class="no-s">Overview</h2>
					<hr class="m-t-sm m-b-sm">
					<ul class="fa-ul clearfix">
					  <li><i class="fa-li fa fa-2x fa-building-o"></i>Ownership Type<b><?=$rawData->ownership_type?></b></li>
					  <li><i class="fa-li fa fa-2x fa-calendar"></i>Year of Construction<b><?=$rawData->proj_started?></b></li>
					  <li><i class="fa-li fa fa-2x fa-arrows-alt"></i>Project Size<b><?=$rawData->building_count?> Buildings - <?=$rawData->total_units?> units</b></li>
					  <li><i class="fa-li fa fa-2x fa-calendar-plus-o"></i>Completed<b><?=$rawData->completes_on?></b></li>
					  <li><i class="fa-li fa fa-2x fa-square-o"></i>Project Area<b><?=$rawData->proj_area?> Acres ( 20% open)</b></li>
					  <li><i class="fa-li fa fa-2x fa-calendar-check-o"></i>Possession Starts<b><?=$rawData->possession_starts?></b></li>
					  <li><i class="fa-li fa fa-2x fa-th"></i>Configurations<b><?php foreach($projectsUnits as $key=>$val){ echo $key.',';  } ?> Apartment</b></li>
					  <li><i class="fa-li fa fa-2x fa-object-group"></i>Total Apartments<b><?=$rawData->building_count?></b></li>
					</ul>
					<p><?=$rawData->project_overview?></p>
				</div>
				<div id="pdconfig" class="npconfig bgwhite p m-t-md">
					<h2 class="no-s">Configuration</h2>
					<hr class="m-t-sm no-m">
					<div class="row">
						<div class="col-lg-3 no-p-h npcl b-r">
							<ul class="nav nav-pills onenav m-l-sm m-r-sm">
							<?php foreach($projectsUnits as $key=>$val){ 
								echo '<li class=""><a href="">'.$key.'</a></li>';  
									} 
							?>
							</ul>
							<div class="p-h-md p-v-xs bg-gray body"><b>1 BHK</b> - <small> Apartments</small></div>
							<?php
								$i=0; 
								foreach($projectsUnits as $key=>$val){ 
									foreach($val as $ukey=>$unitVal){
									$i++; 
							?>
							<div class="list-group twonav">
							  <a href="javascript:void(0);" class="list-group-item <?=($i==1)?'active':''?>" onclick="$('div.npcr').hide(); $('div#c<?=str_replace('#', '', str_replace(' ', '', $unitVal->unitText))?>').show(); $('.twonav .list-group-item').removeClass('active'); $(this).addClass('active');"><?=$unitVal->builtupArea?> sq. ft.<br><i class="fa fa-inr"></i><b><?=formatInIndianStyle($unitVal->minTotalPrice)?></b> <small>onwards</small></a>
							</div>
							<?php 
								}
							} 
							?>
						</div>
						<?php 
							$i=0;
							foreach($projectsUnits as $key=>$val){ 
								foreach($val as $ukey=>$unitVal){
								$i++; 
						?>
						<div class="col-lg-9 npcr b-l" style="<?=($i!=1)?'display:none;':''?>" id="c<?=str_replace('#', '', str_replace(' ', '', $unitVal->unitText))?>">
							<div class="panel-group configtab" id="configtab<?=$i?>" role="tablist" aria-multiselectable="true">
						  		<div class="panel panel-default">
						    		<div class="panel-heading no-s bg-n no-b" role="tab" id="headingOne<?=$i?>">
						      		<h3 class="panel-title">
						        		<a role="button" data-toggle="collapse" data-parent="#configtab<?=$i?>" href="#collapseOne<?=$i?>" aria-expanded="true" aria-controls="collapseOne<?=$i?>">
							          		<i class="fa fa-plus-square-o fa-lg fa-fw"></i>
							          		<i class="fa fa-minus-square-o fa-lg fa-fw"></i>
							          		Overview
						        		</a>
						      		</h3>
						    		</div>
						    		<div id="collapseOne<?=$i?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne<?=$i?>">
						      		<div class="panel-body">
						        		<div class="imgd">
						        			<a class="magnific-imgpop 3d" ng-show="tabActive == 1" href="<?=base_url();?>assets/uploads/0/<?=$images[$unitVal->unitText][0]?>"><img src="<?=base_url();?>assets/uploads/0/<?=$images[$unitVal->unitText][0]?>"></a>
						        			<a class="magnific-imgpop 2d" ng-show="tabActive == 2" href="<?=base_url();?>assets/uploads/0/<?=$images[$unitVal->unitText][1]?>"><img src="<?=base_url();?>assets/uploads/0/<?=$images[$unitVal->unitText][1]?>"></a>
						        			<div class="btn-group" role="group" aria-label="apartment-image-button">
						        				<button type="button" class="btn btn-default active" ng-class="{'active':tabActive == 1}" ng-click="tabActive = 1">3D</button>
						        				<button type="button" class="btn btn-default" ng-class="{'active':tabActive == 2}" ng-click="tabActive = 2">2D</button>
											</div>
						        		</div>
						        		<div class="row">
						        			<div class="col-sm-9 col-xs-12">
						        				<h2 class="no-m m-t-sm">3 Bed 3 Bath Apartment</h2>
						        				<div class="row">
						        					<div class="col-xs-6"><h4><small class="text-uppercase">Builtup Area</small><br>1640 sqft.</h4></div>
						        					<div class="col-xs-6"><h4><small>POSSESSION STARTS</small><br>Jun, 2017</h4></div>
						        				</div>
						        			</div>
						        			<div class="col-sm-3 col-xs-12">
						        				<div class="m-t-sm p-h-xs p-v-xs bg-gray body">
						        					<small class="text-uppercase"><b>min. total price</b></small><h3 class="no-m"><i class="fa fa-rupee"></i>&nbsp;<?=formatInIndianStyle($unitVal->minTotalPrice)?></h3><small>(onwards)</small>
						        				</div>
						        			</div>
						        		</div>
						      		</div>
						    		</div>
						  		</div>
						  <div class="panel panel-default">
						    <div class="panel-heading no-s bg-n no-b" role="tab" id="headingTwo<?=$i?>">
						      <h3 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#configtab<?=$i?>" href="#collapseTwo<?=$i?>" aria-expanded="false" aria-controls="collapseTwo<?=$i?>">
									<i class="fa fa-plus-square-o fa-lg fa-fw"></i>
					          		<i class="fa fa-minus-square-o fa-lg fa-fw"></i>
					          		Details
			        			</a>
						      </h3>
						    </div>
						    <div id="collapseTwo<?=$i?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo<?=$i?>">
						      <div class="panel-body">
						        <ul class="clearfix clist row no-s">

									  <li class="col-xs-6 col-sm-4 p-v-xs p-h-xxs"><i class="ico sm room"></i>Living Room</li>
									  <li class="col-xs-6 col-sm-4 p-v-xs p-h-xxs"><i class="ico sm kitchen"></i>Kitchen</li>
									  <li class="col-xs-6 col-sm-4 p-v-xs p-h-xxs"><i class="ico sm balcony"></i>2 Balconies</li>
									  <li class="col-xs-6 col-sm-4 p-v-xs p-h-xxs"><i class="ico sm toilet"></i>3 Toilets</li>
									</ul>
						      </div>
						    </div>
						  </div>
						  <div class="panel panel-default">
						    <div class="panel-heading no-s bg-n no-b" role="tab" id="headingThree<?=$i?>">
						      <h3 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#configtab<?=$i?>" href="#collapseThree<?=$i?>" aria-expanded="false" aria-controls="collapseThree<?=$i?>">
									<i class="fa fa-plus-square-o fa-lg fa-fw"></i>
					          		<i class="fa fa-minus-square-o fa-lg fa-fw"></i>
					          		Amenities
			        			</a>
						      </h3>
						    </div>
						    <div id="collapseThree<?=$i?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree<?=$i?>">
						      <div class="panel-body">
						        <ul class="clearfix clist row no-s">
									  <li class="col-xs-6 col-sm-4 p-v-xs p-h-xxs"><i class="ico sm room"></i>Living Room</li>
									  <li class="col-xs-6 col-sm-4 p-v-xs p-h-xxs"><i class="ico sm kitchen"></i>Kitchen</li>
									  <li class="col-xs-6 col-sm-4 p-v-xs p-h-xxs"><i class="ico sm balcony"></i>2 Balconies</li>
									  <li class="col-xs-6 col-sm-4 p-v-xs p-h-xxs"><i class="ico sm toilet"></i>3 Toilets</li>
									</ul>
						      </div>
						    </div>
						  </div>
						  <div class="panel panel-default">
						    <div class="panel-heading no-s bg-n no-b" role="tab" id="headingFour<?=$i?>">
						      <h3 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#configtab<?=$i?>" href="#collapseFour<?=$i?>" aria-expanded="false" aria-controls="collapseFour<?=$i?>">
									<i class="fa fa-plus-square-o fa-lg fa-fw"></i>
					          		<i class="fa fa-minus-square-o fa-lg fa-fw"></i>
					          		Interiors
			        			</a>
						      </h3>
						    </div>
						    <div id="collapseFour<?=$i?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour<?=$i?>">
						      <div class="panel-body">
						        	<h3 class="m-t-xs p-h-xxs">Flooring</h3>
						        	<ul class="clearfix clist row no-s">
									  	<li class="col-sm-6 p-v-xxs"><b>Balcony:</b> Anti Skid Vitrified Tiles</li>
									  	<li class="col-sm-6 p-v-xxs"><b>Kitchen:</b> Vitrified Tiles</li>
									  	<li class="col-sm-6 p-v-xxs"><b>Living/Dining:</b> Vitrified Tiles</li>
									  	<li class="col-sm-6 p-v-xxs"><b>Master Bedroom:</b> Vitrified Tiles</li>
									  	<li class="col-sm-6 p-v-xxs"><b>Other Bedroom:</b> Vitrified Tiles</li>
									  	<li class="col-sm-6 p-v-xxs"><b>Toilets:</b> Anti Skid Ceramic Tiles</li>
									</ul>
						        	<h3 class="m-t-xs p-h-xxs">Fitting</h3>
						        		<ul class="clearfix clist row no-s">
						        			<li class="col-sm-6 p-v-xxs"><b>Doors:</b> Teak Wood Flush Door</li>
						        			<li class="col-sm-6 p-v-xxs"><b>Electrical:</b> Concealed Copper Wirings with Modular Switches</li>
						        			<li class="col-sm-6 p-v-xxs"><b>Kitchen:</b> Black Granite Platform with SS Sink</li>
						        			<li class="col-sm-6 p-v-xxs"><b>Windows:</b> UPVC Aluminium Windows</li>
						        			<li class="col-sm-6 p-v-xxs"><b>Toilets:</b> Designer Roca or Equivalent Fittings</li>
						        		</ul>
						        	<h3 class="m-t-xs p-h-xxs">Walls</h3>
						        		<ul class="clearfix clist row no-s">
						        			<li class="col-sm-6 p-v-xxs"><b>Exterior:</b> Emulsion Paints</li>
						        			<li class="col-sm-6 p-v-xxs"><b>Interior:</b> Emulsion Paints</li>
						        			<li class="col-sm-6 p-v-xxs"><b>Kitchen:</b> Glazed Ceramic Tiles</li>
						        			<li class="col-sm-6 p-v-xxs"><b>Toilets:</b> Glazed Ceramic Tiles</li>
						        		</ul>
						      </div>
						    </div>
						  </div>
						  <div class="panel panel-default">
						    <div class="panel-heading no-s bg-n no-b" role="tab" id="headingFive<?=$i?>">
						      <h3 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#configtab<?=$i?>" href="#collapseFive<?=$i?>" aria-expanded="false" aria-controls="collapseFive<?=$i?>">
									<i class="fa fa-plus-square-o fa-lg fa-fw"></i>
					          		<i class="fa fa-minus-square-o fa-lg fa-fw"></i>
					          		EMI Calculator
			        			</a>
						      </h3>
						    </div>
						    <div id="collapseFive<?=$i?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive<?=$i?>">
						      <div class="panel-body">
						        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
						      </div>
						    </div>
						  </div>
						</div>
						</div>
					<?php 
						} 
					}
					?>
					</div>
				</div>
				<div id="pdlocal" class="locality bgwhite p m-t-md">
					<h2 class="no-s">Locality</h2>
					<hr class="m-t-sm no-m">
					<p><?=$rawData->project_locality?></p>
					<section class="map hidden-xs">
						<h3 class="text-uppercase">Explore Neighbourhood - Map View</h3>
						<div class="npmapbox">
							<div class="map-controls">
								<span class="map-btn plus"><i class="fa fa-plus"></i></span>
								<span class="map-btn minus"><i class="fa fa-minus"></i></span>
							</div>
							<div class="map-list">
								<div class="panel-group" id="maptab" role="tablist" aria-multiselectable="true">
							  		<div class="panel panel-default p-h-xxs">
							    		<div class="panel-heading no-s bg-n no-b" role="tab" id="mh1">
							      		<h3 class="panel-title">
							        		<a role="button" data-toggle="collapse" data-parent="#maptab" href="#mapc1" aria-expanded="true" aria-controls="mapc1">
								          		<i class="fa fa-plus-square-o fa-fw"></i>
								          		<i class="fa fa-minus-square-o fa-fw"></i>
								          		Bus Stations
							        		</a>
							      		</h3>
							    		</div>
							    		<div id="mapc1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="mh1">
							      		<div class="panel-body no-s">
							        			<ul class="clearfix clist row no-s">
												  	<li><a href="" class="p-v-xxs"><span class="textwrap">Rayasandra</span><span class="badge">1.3 km</span></a></li>
												  	<li><a href="" class="p-v-xxs"><span class="textwrap">Chikkanagamangala</span><span class="badge">1.9 km</span></a></li>
												  	<li><a href="" class="p-v-xxs"><span class="textwrap">Gattahalli</span><span class="badge">2.3 km</span></a></li>
												  	<li><a href="" class="p-v-xxs"><span class="textwrap">Dodda Nag Mangala Bus</span><span class="badge">2.3 km</span></a></li>
												  	<li><a href="" class="p-v-xxs"><span class="textwrap">Rayasandra New Layo</span><span class="badge">12.7 km</span></a></li>
												</ul>
							      		</div>
							    		</div>
							  		</div>
							  		<div class="panel panel-default p-h-xxs">
							    		<div class="panel-heading no-s bg-n no-b" role="tab" id="mh2">
							      		<h3 class="panel-title">
							        		<a role="button" data-toggle="collapse" data-parent="#maptab" href="#mapc2" aria-expanded="true" aria-controls="mapc2">
								          		<i class="fa fa-plus-square-o fa-fw"></i>
								          		<i class="fa fa-minus-square-o fa-fw"></i>
								          		Train Stations
							        		</a>
							      		</h3>
							    		</div>
							    		<div id="mapc2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="mh2">
							      		<div class="panel-body no-s">
							        			<ul class="clearfix clist row no-s">
												  	<li><a href="" class="p-v-xxs"><span class="textwrap">Karmelaram</span><span class="badge">8.5 km</span></a></li>
												  	<li><a href="" class="p-v-xxs"><span class="textwrap">Heelalige</span><span class="badge">8.8 km</span></a></li>
												  	<li><a href="" class="p-v-xxs"><span class="textwrap">Belandur Road</span><span class="badge">12.1 km</span></a></li>
												  	<li><a href="" class="p-v-xxs"><span class="textwrap">Rashtreeya Vidyalaya</span><span class="badge">16.2 km</span></a></li>
												  	<li><a href="" class="p-v-xxs"><span class="textwrap">Jayaprakash Nagar</span><span class="badge">17.3 km</span></a></li>
												</ul>
							      		</div>
							    		</div>
							  		</div>
							  		<div class="panel panel-default p-h-xxs">
							    		<div class="panel-heading no-s bg-n no-b" role="tab" id="mh3">
							      		<h3 class="panel-title">
							        		<a role="button" data-toggle="collapse" data-parent="#maptab" href="#mapc3" aria-expanded="true" aria-controls="mapc3">
								          		<i class="fa fa-plus-square-o fa-fw"></i>
								          		<i class="fa fa-minus-square-o fa-fw"></i>
								          		Airports
							        		</a>
							      		</h3>
							    		</div>
							    		<div id="mapc3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="mh3">
							      		<div class="panel-body no-s">
							        			<ul class="clearfix clist row no-s">
												  	<li><a href="" class="p-v-xxs"><span class="textwrap">Indira Gandhi Domestic</span><span class="badge">22.5 km</span></a></li>
												  	<li><a href="" class="p-v-xxs"><span class="textwrap">Indira Gandhi International</span><span class="badge">25.8 km</span></a></li>
												</ul>
							      		</div>
							    		</div>
							  		</div>
							  		<div class="panel panel-default p-h-xxs">
							    		<div class="panel-heading no-s bg-n no-b" role="tab" id="mh4">
							      		<h3 class="panel-title">
							        		<a role="button" data-toggle="collapse" data-parent="#maptab" href="#mapc4" aria-expanded="true" aria-controls="mapc4">
								          		<i class="fa fa-plus-square-o fa-fw"></i>
								          		<i class="fa fa-minus-square-o fa-fw"></i>
								          		Schools
							        		</a>
							      		</h3>
							    		</div>
							    		<div id="mapc4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="mh4">
							      		<div class="panel-body no-s">
							        			<ul class="clearfix clist row no-s">
												  	<li><a href="" class="p-v-xxs"><span class="textwrap">St Gasper School</span><span class="badge">1.9 km</span></a></li>
												  	<li><a href="" class="p-v-xxs"><span class="textwrap">ACTS School</span><span class="badge">1.4 km</span></a></li>
												  	<li><a href="" class="p-v-xxs"><span class="textwrap">Delhi Puplic School</span><span class="badge">2.5 km</span></a></li>
												</ul>
							      		</div>
							    		</div>
							  		</div>
							  		<div class="panel panel-default p-h-xxs">
							    		<div class="panel-heading no-s bg-n no-b" role="tab" id="mh5">
							      		<h3 class="panel-title">
							        		<a role="button" data-toggle="collapse" data-parent="#maptab" href="#mapc5" aria-expanded="true" aria-controls="mapc5">
								          		<i class="fa fa-plus-square-o fa-fw"></i>
								          		<i class="fa fa-minus-square-o fa-fw"></i>
								          		Grocery Stores
							        		</a>
							      		</h3>
							    		</div>
							    		<div id="mapc5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="mh5">
							      		<div class="panel-body no-s">
							        			<ul class="clearfix clist row no-s">
												  	<li><a href="" class="p-v-xxs"><span class="textwrap">Shabari Bakery & Provision</span><span class="badge">1.7 km</span></a></li>
												</ul>
							      		</div>
							    		</div>
							  		</div>
						  		</div>
							</div>
							<div class="map-container" style="background-color: rgb(229, 227, 223);"></div>
						</div>
					</section>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-3">
			<div id="proaside">
				<div class="project-contact-form bgwhite">
					<div class="detail text-center p">
						<div class="logo">
							<img src="<?=base_url();?>assets/images/logos/logotemp.jpg" class="img-responsive">
						</div>
						<h3 class="m-t-xs m-b-xxs">Project Group</h3>
						<h4 class="m-t-xxs">Developer<br>011-3034-5412</h4>
					</div>
					<hr class="no-m">
					<div class="form p">
						<form>
							<div class="form-group">
                            	<label for="name" class="iefall-show">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                            	<label for="phone" class="iefall-show">Phone</label>
                                <input type="text" class="form-control" id="phone" placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <label for="email" class="iefall-show">Email address</label>
                                <input type="email" class="form-control" id="email" placeholder="Email">
                            </div>
                            <button type="submit" class="btn btn-default btn-block">Request Callback</button>
                        </form>
					</div>
					<div class="btn-social-block clearfix">
	  					<button type="button" class="btn btn-default half pull-left"><i class="fa fa-share-alt"></i>&nbsp;Share</button>
	  					<button type="button" class="btn btn-default half"><i class="fa fa-flag-o"></i>&nbsp;Report</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
	<!-- Background of PhotoSwipe. 
		It's a separate element as animating opacity is faster than rgba(). -->
	<div class="pswp__bg"></div>
	<!-- Slides wrapper with overflow:hidden. -->
	<div class="pswp__scroll-wrap">
		<!-- Container that holds slides. 
		PhotoSwipe keeps only 3 of them in the DOM to save memory.
		Don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>
        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <!--  Controls are self-explanatory. Order can be changed. -->
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                <button class="pswp__button pswp__button--share" title="Share"></button>
                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div> 
            </div>
            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>
            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>
	</div>
</div>
<div>
Show debug
<div  style="border:1px;">
<?php
echo "<pre>";
print_r($projectsUnits);
echo "</pre>";
?>
</div>
</div>