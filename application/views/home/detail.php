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
						<h2><?=$rawData->projectsUnits->{'0'}->minTotalPrice?> Lacs +</h2>
						<ul class="fa-ul">
							<li><span>&bull;</span><?=$rawData->projectsUnits->{'0'}->builtupArea?>/sq.ft+</li>
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
					<figure class="size1 m-r-xxs m-b-xxs morebig">
						<a href="<?=base_url();?>assets/images/projectgallery/img1.jpg" data-size="1547x870">
							<img src="<?=base_url();?>assets/images/projectgallery/small/img1.jpg" alt="Image description" />
						</a>
						<figcaption>Image caption  1</figcaption>
						<div class="moreimg hidden-sm hidden-md hidden-lg">10+<span>More</span></div>
					</figure>
					<figure class="size1 m-r-xxs m-b-xxs hidden-xs">
						<a href="<?=base_url();?>assets/images/projectgallery/img2.jpg" data-size="1547x870">
							<img src="<?=base_url();?>assets/images/projectgallery/small/img2.jpg" alt="Image description" />
						</a>
						<figcaption>Image caption  2</figcaption>
					</figure>
					<figure class="size1 m-b-xxs hidden-xs">
						<a href="<?=base_url();?>assets/images/projectgallery/img3.jpg" data-size="1547x870">
							<img src="<?=base_url();?>assets/images/projectgallery/small/img3.jpg" alt="Image description" />
						</a>
						<figcaption>Image caption  3</figcaption>
					</figure>
					<figure class="size2 m-r-xxs hidden-xs">
						<a href="<?=base_url();?>assets/images/projectgallery/img4.jpg" data-size="1547x870">
							<img src="<?=base_url();?>assets/images/projectgallery/small/img4.jpg" alt="Image description" />
						</a>
						<figcaption>Image caption  4</figcaption>
					</figure>
					<figure class="size2 m-r-xxs hidden-xs">
						<a href="<?=base_url();?>assets/images/projectgallery/img1.jpg" data-size="1547x870">
							<img src="<?=base_url();?>assets/images/projectgallery/small/img1.jpg" alt="Image description" />
						</a>
						<figcaption>Image caption  5</figcaption>
					</figure>
					<figure class="size2 m-r-xxs hidden-xs">
						<a href="<?=base_url();?>assets/images/projectgallery/img2.jpg" data-size="1547x870">
							<img src="<?=base_url();?>assets/images/projectgallery/small/img2.jpg" alt="Image description" />
						</a>
						<figcaption>Image caption  6</figcaption>
					</figure>
					<figure class="size2 moresmall hidden-xs">
						<a href="<?=base_url();?>assets/images/projectgallery/img3.jpg" class="more" data-size="1547x870">
							<img src="<?=base_url();?>assets/images/projectgallery/small/img3.jpg" alt="Image description" />
						</a>
						<figcaption>Image caption  7</figcaption>
						<div class="moreimg">4+<span>More</span></div>
					</figure>
				</div>
				</div>
				<div id="pdoverview" class="overview bgwhite p m-t-md">
					<h2 class="no-s">Overview</h2>
					<hr class="m-t-sm m-b-sm">
					<ul class="fa-ul clearfix">
					  <li><i class="fa-li fa fa-2x fa-building-o"></i>Ownership Type<b>Freehold</b></li>
					  <li><i class="fa-li fa fa-2x fa-calendar"></i>Year of Construction<b>2015</b></li>
					  <li><i class="fa-li fa fa-2x fa-arrows-alt"></i>Project Size<b>16 Buildings - 1632 units</b></li>
					  <li><i class="fa-li fa fa-2x fa-calendar-plus-o"></i>Completed<b>15 January 2017</b></li>
					  <li><i class="fa-li fa fa-2x fa-square-o"></i>Project Area<b>10 Acres ( 20% open)</b></li>
					  <li><i class="fa-li fa fa-2x fa-calendar-check-o"></i>Possession Starts<b>15 March 2017</b></li>
					  <li><i class="fa-li fa fa-2x fa-th"></i>Configurations<b><?php foreach($rawData->apt_unit_type as $utype){ echo $unit_types[$utype]['name'].',';  } ?> Apartment</b></li>
					  <li><i class="fa-li fa fa-2x fa-object-group"></i>Total Apartments<b><?=$rawData->project_types->{'1'}?></b></li>
					</ul>
					<p>An exclusively designed residential haven, Manjiri Greenwoods, offers a new perspective to lifestyle living. The project comprises of exquisite buildings, each of 12 storeys and finely crafted to offer you with a royal living. It is the ideal combination of intelligent planning and a design that invokes a sense of community. Each apartment here is a pool of fresh ideas molded into living spaces. From leisure to entertainment to daily activities, it will bring you a splendid array of services.</p>
					<ul>
						<li>Convenient Store within the Premises</li>
						<li>Transition Plaza with Water Feature</li>
						<li>Grand Entrance Plaza with Focal Water Feature</li>
						<li>85% Landscaped Arena</li>
						<li>Fire Security Sprinklers</li>
					</ul>
				</div>
				<div id="pdconfig" class="npconfig bgwhite p m-t-md">
					<h2 class="no-s">Configuration</h2>
					<hr class="m-t-sm no-m">
					<div class="row">
						<div class="col-lg-3 no-p-h npcl b-r">
							<ul class="nav nav-pills onenav m-l-sm m-r-sm">
							<?php foreach($rawData->apt_unit_type as $utype){ 
								echo '<li class=""><a href="">'.$unit_types[$utype]['name'].'</a></li>';  
									} 
							?>
							</ul>
							<div class="p-h-md p-v-xs bg-gray body"><b>1 BHK</b> - <small><?=$rawData->project_types->{'1'}?> Apartments</small></div>
							<div class="list-group twonav">
							  <a href="javascript:void(0);" class="list-group-item active"><?=$rawData->projectsUnits->{'0'}->builtupArea?> sq. ft.<br><i class="fa fa-inr"></i><b><?=$rawData->projectsUnits->{'0'}->minTotalPrice?> Lacs</b> <small>onwards</small></a>
							</div>
						</div>
						<div class="col-lg-9 npcr b-l">
							<div class="panel-group" id="configtab" role="tablist" aria-multiselectable="true">
						  		<div class="panel panel-default">
						    		<div class="panel-heading no-s bg-n no-b" role="tab" id="headingOne">
						      		<h3 class="panel-title">
						        		<a role="button" data-toggle="collapse" data-parent="#configtab" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							          		<i class="fa fa-plus-square-o fa-lg fa-fw"></i>
							          		<i class="fa fa-minus-square-o fa-lg fa-fw"></i>
							          		Overview
						        		</a>
						      		</h3>
						    		</div>
						    		<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						      		<div class="panel-body">
						        		<div class="imgd">
						        			<a class="magnific-imgpop 3d" ng-show="tabActive == 1" href="<?=base_url();?>assets/images/projectgallery/img1.jpg"><img src="<?=base_url();?>assets/uploads/0/<?=$img2d?>"></a>
						        			<a class="magnific-imgpop 2d" ng-show="tabActive == 2" href="<?=base_url();?>assets/images/projectgallery/img2.jpg"><img src="<?=base_url();?>assets/uploads/0/<?=$img3d?>"></a>
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
						        					<small class="text-uppercase"><b>min. total price</b></small><h3 class="no-m"><i class="fa fa-rupee"></i>&nbsp;65.44 Lacs</h3><small>(onwards)</small>
						        				</div>
						        			</div>
						        		</div>
						      		</div>
						    		</div>
						  		</div>
						  <div class="panel panel-default">
						    <div class="panel-heading no-s bg-n no-b" role="tab" id="headingTwo">
						      <h3 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#configtab" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									<i class="fa fa-plus-square-o fa-lg fa-fw"></i>
					          		<i class="fa fa-minus-square-o fa-lg fa-fw"></i>
					          		Details
			        			</a>
						      </h3>
						    </div>
						    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
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
						    <div class="panel-heading no-s bg-n no-b" role="tab" id="headingThree">
						      <h3 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#configtab" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									<i class="fa fa-plus-square-o fa-lg fa-fw"></i>
					          		<i class="fa fa-minus-square-o fa-lg fa-fw"></i>
					          		Amenities
			        			</a>
						      </h3>
						    </div>
						    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
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
						    <div class="panel-heading no-s bg-n no-b" role="tab" id="headingFour">
						      <h3 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#configtab" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
									<i class="fa fa-plus-square-o fa-lg fa-fw"></i>
					          		<i class="fa fa-minus-square-o fa-lg fa-fw"></i>
					          		Interiors
			        			</a>
						      </h3>
						    </div>
						    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
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
						    <div class="panel-heading no-s bg-n no-b" role="tab" id="headingFive">
						      <h3 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#configtab" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
									<i class="fa fa-plus-square-o fa-lg fa-fw"></i>
					          		<i class="fa fa-minus-square-o fa-lg fa-fw"></i>
					          		EMI Calculator
			        			</a>
						      </h3>
						    </div>
						    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
						      <div class="panel-body">
						        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
						      </div>
						    </div>
						  </div>
						</div>
						</div>
					</div>
				</div>
				<div id="pdlocal" class="locality bgwhite p m-t-md">
					<h2 class="no-s">Locality</h2>
					<hr class="m-t-sm no-m">
					<h4>Insights into Electronic City</h4>
					<p>Located off the NH-VII (Bangalore-Hosur Road), Phase I of the Electronic City is the important segment among other two phases. Divided into three phases, Electronic City is the largest technology hub of Bangalore. Popularly known as ECity, it is the Silicon Valley of India, which houses around 300 companies with a very large work force of employees. This industrial estate boasts an oasis of large, medium and small industries spanning software services, hardware; high end telecommunications; manufacture of indigenous components; electronic musical instruments, just to name a few. Infosys, Wipro, Biocon, HP, Siemens, Mahindra Satyam are some of the renowned industries located over here. NH-VII, the 10 lane stretch between Silk Board Junction and Electronic is the longest elevated highway in India. Also, the NICE Road(Bangalore-Mysore Structure Corridor) that further connects NH-VII and Bannerghatta Road also passes through the vicinity. To boost the connectivity for the people, the BMRCL (Bangalore Metro Rail Corporation Ltd) has started working on the Metro Line starting from R.V. Road to Bommasandra. This new line will be an added advantage for the inhabitants and the working professionals to travel to their destinations with ease. In addition to excellent location,Electronic City is at a close proximity from places like Koramangala, JP Nagar, etc. Also within the vicinity, you can find various shopping malls and convenient stores. This is the perfect place for the residents wherein they have an option to live in a pollution free environment away from the city buzz, yet connected to the main Bangalore City.</p>
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
<div onclick="$(this).find('div').toggle()">
Show debug
<div  style="display:none;">
<?php
echo "<pre>";
print_r($rawData);
echo "</pre>";
?>
</div>
</div>