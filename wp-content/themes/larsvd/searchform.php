<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <input type="search" class="search-field" placeholder="Zoeken..." value="<?php echo get_search_query() ?>" name="s" title="Zoeken naar:"/>
    <input type="submit" class="search-submit" value="Zoek" />
</form>