<?php 

add_shortcode( 'wpshout_sample_shortcode', 'wpshout_sample_shortcode' );
function wpshout_sample_shortcode() {
    return '<div class="homepage_tab_panel">
				 
	    <ul id="myTabs" class="nav nav-tabs" role="tablist">
	      <li role="presentation" class="active"><a href="#most_view" id="most_view-tab" role="tab" data-toggle="tab" aria-controls="most_view" aria-expanded="false">Most viewed reviews</a></li> 
	      <li role="presentation" ><a href="#supercharged" role="tab" id="supercharged-tab" data-toggle="tab" aria-controls="supercharged" aria-expanded="false">Supercharged reviews</a></li> 
	      <li role="presentation" ><a href="#responding" role="tab" id="responding-tab" data-toggle="tab" aria-controls="responding" aria-expanded="false">Top responding businesses</a></li> 
	      <li role="presentation" ><a href="#businesses" role="tab" id="businesses-tab" data-toggle="tab" aria-controls="businesses" aria-expanded="false">Businesses yet to respond</a></li>  
	    </ul> 
	    <div id="myTabContent" class="tab-content">
	      <div role="tabpanel" class="tab-pane fade in active show" id="most_view" aria-labelledby="most_view-tab">
	        <p>Most viewed reviews Raw denim you probably haven'."'".'t heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
	      </div>
	      <div role="tabpanel" class="tab-pane fade" id="supercharged" aria-labelledby="supercharged-tab">
	        <p>Supercharged reviews Food truck fixie locavore, accusamus mcsweeney'."'".'s marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
	      </div> 
	      <div role="tabpanel" class="tab-pane fade" id="responding" aria-labelledby="responding-tab">
	        <p>Top responding businesses Food truck fixie locavore, accusamus mcsweeney'."'".'s marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
	      </div> 
	      <div role="tabpanel" class="tab-pane fade" id="businesses" aria-labelledby="businesses-tab">
	        <p>Businesses yet to respond Food truck fixie locavore, accusamus mcsweeney'."'".'s marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
	      </div> 

	    </div>
	    </div>';
}