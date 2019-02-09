<?php
/**
 * Template Name: User Registration
 *
 * @package Betheme
 * @author Muffin Group
 */

get_header();
?>
<!-- #Content -->
<div id="Content">
	<div class="content_wrapper clearfix">

		<!-- .sections_group -->
<section class="Registration_section wd_ft_full"> 
	<div class="col-sm-12 col-md-6 col-lg-6 registration_column">
		<div class="row">
			<div class="container">
				<div class="reg_container">
					<div class="logo">
						<a href="#"><img src="http://localhost/wpbetheme/wp-content/uploads/2019/02/logo2.png"></a>
					</div>
				<form role="form" action="functions.php"  method="POST">   
				    <div class="form-group row">
				        <div class="col-sm-10">
				            <input class="form-control" type="text" name="name" placeholder="First Name"> 
				        </div>
				    </div> 

				    <div class="form-group row">
				        <div class="col-sm-10">
				            <input class="form-control" type="text" name="l_name" placeholder="Last Name"> 
				        </div>
				    </div>

				    <div class="form-group row">
				        <div class="col-sm-10">
				            <input class="form-control" type="email" name="email" placeholder="Email"> 
				        </div>
				    </div>

				    <div class="form-group row">
				        <div class="col-sm-10">
				            <input class="form-control" type="number" name="number" placeholder="Mobail Number"> 
				        </div>
				    </div>

				    <div class="form-group row">
				        <div class="col-sm-10">
				            <input class="form-control" type="text" name="user_name" placeholder="User Name"> 
				        </div>
				    </div>

				    <div class="form-group row">
				        <div class="col-sm-10">
				            <input class="form-control" type="password" name="password" placeholder="Password"> 
				        </div>
				    </div>

				    <div class="form-group row">
				        <div class="col-sm-10">
				            <input class="form-control" type="submit" value="submit" name="submit"> 
				        </div>
				    </div> 

				</form>
				</div>
			</div>
		</div>
	</div>


<div class="col-sm-12 col-md-12 col-lg-12">
	<div class="row">
		<main>
   <script type="text/javascript"><!--
google_ad_client = "ca-pub-2783044520727903";
/* jQuery_demo */
google_ad_slot = "2780937993";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
  <div class="arrow down"></div> <img src="" alt="image">
  <section class="row"> 
  	<svg class="radial-progress" data-percentage="82" viewBox="0 0 80 80">
    <circle class="incomplete" cx="40" cy="40" r="35"></circle>
    <circle class="complete" cx="40" cy="40" r="35" style="stroke-dashoffset: 39.58406743523136;"></circle>
    <text class="percentage" x="50%" y="57%" transform="matrix(0, 1, -1, 0, 80, 0)">82%</text>
    </svg> 
    <svg class="radial-progress" data-percentage="33" viewBox="0 0 80 80">
    <circle class="incomplete" cx="40" cy="40" r="35"></circle>
    <circle class="complete" cx="40" cy="40" r="35" style="stroke-dashoffset: 147.3406954533613;"></circle>
    <text class="percentage" x="50%" y="57%" transform="matrix(0, 1, -1, 0, 80, 0)">33%</text>
    </svg> 
    <svg class="radial-progress" data-percentage="71" viewBox="0 0 80 80">
    <circle class="incomplete" cx="40" cy="40" r="35"></circle>
    <circle class="complete" cx="40" cy="40" r="35" style="stroke-dashoffset: 63.774330867872806;"></circle>
    <text class="percentage" x="50%" y="57%" transform="matrix(0, 1, -1, 0, 80, 0)">71%</text>
    </svg> 
    <svg class="radial-progress" data-percentage="24" viewBox="0 0 80 80">
    <circle class="incomplete" cx="40" cy="40" r="35"></circle>
    <circle class="complete" cx="40" cy="40" r="35" style="stroke-dashoffset: 167.13272917097697;"></circle>
    <text class="percentage" x="50%" y="57%" transform="matrix(0, 1, -1, 0, 80, 0)">24%</text>
    </svg> 
    <svg class="radial-progress" data-percentage="100" viewBox="0 0 80 80">
    <circle class="incomplete" cx="40" cy="40" r="35"></circle>
    <circle class="complete" cx="40" cy="40" r="35" style="stroke-dashoffset: 0;"></circle>
    <text class="percentage" x="50%" y="57%" transform="matrix(0, 1, -1, 0, 80, 0)">100%</text>
    </svg> 
    <svg class="radial-progress" data-percentage="0" viewBox="0 0 80 80">
    <circle class="incomplete" cx="40" cy="40" r="35"></circle>
    <circle class="complete" cx="40" cy="40" r="35" style="stroke-dashoffset: 219.91148575129;"></circle>
    <text class="percentage" x="50%" y="57%" transform="matrix(0, 1, -1, 0, 80, 0)">0%</text>
    </svg> 
</section>
    <div class="arrow up"></div>
</main>
 
	</div>
</div>



	<div class="col-sm-12 col-md-6 col-lg-6 registration_column">
		<div class="row">
			<?php 
		while ( have_posts() ){
			the_post();							// Post Loop
			mfn_builder_print( get_the_ID() );	// Content Builder & WordPress Editor Content
		}
	?>
	
	 
		</div>
	</div>
	
		<?php 

		echo get_current_user_id();
		$user = wp_get_current_user();
    // echo  $user->roles;
 
?>
 

</section>
		
		<!-- .four-columns - sidebar -->
		<?php get_sidebar(); ?>

	</div>
</div>

<?php get_footer();

// Omit Closing PHP Tags
 