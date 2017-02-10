<form role="search" action="<?php echo home_url('/'); ?>" method="get" class="search__form">
    <input type="search"
           name="s"
           id="search"
           value="<?php the_search_query(); ?>"
           placeholder="Search..."
           class="search__form__input"
    autofocus/>
    <button type="submit" class="search__form__button alt="Search"><i class="fa fa-search"></i></button>
</form>