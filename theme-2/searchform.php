<form role="search" method="get" class="form-inline my-2 my-lg-0" action="<?php echo home_url('/'); ?>">
    <label>

        <input type="search" class="form-control mr-sm-2" placeholder="Search &hellip;" value="<?php echo get_search_query();   ?>" name="s" aria-label="Search"/>
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
    </label>
    <!-- <input type="submit" class="search-submit" value="Search" /> -->
</form> <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->