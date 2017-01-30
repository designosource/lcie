<form role="search" action="<?php echo home_url('/'); ?>" method="get">
    <input type="search"
           name="s"
           id="search"
           value="<?php the_search_query(); ?>"
           placeholder="Search..."
    autofocus/>
    <button type="submit" alt="Search"><i class="fa fa-search"></i></button>
</form>