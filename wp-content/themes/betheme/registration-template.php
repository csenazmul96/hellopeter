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
				            <input class="form-control" type="text" name="number" placeholder="User Name"> 
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
	
	
 

</section>
		
		<!-- .four-columns - sidebar -->
		<?php get_sidebar(); ?>

	</div>
</div>

<?php get_footer();

// Omit Closing PHP Tags
 