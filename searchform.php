<form role="search" method="get" id="searchform" class="searchform navbar-form navbar-right" action="<?php echo home_url('/'); ?>" style="margin-top: 10px;">
	<div class="form-group">
        <input type="text" value="" class="form-control" name="s" id="s" placeholder="<?php the_search_query(); ?>">
		<input type="submit" id="searchsubmit" class="btn btn-default" value="Search" >
	</div>
</form>