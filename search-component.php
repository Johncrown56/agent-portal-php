<!-- Input Group -->
<?php 
// if(isset($_POST['query'])){
//     $query = $_POST['query'];
//     header('location: search/'.$query);
// }
//action="search/<?php if(isset($_GET['query'])){echo $_GET['query'];}
?>
<div class="d-none d-md-block">
<form action="search-page" method="GET" class="position-relative">
<div class="input-group input-group-pill input-group-merge">
    <div class="input-group-append">
        <span class="input-group-text">
            <button type="submit" class="img-button">
                <!--<i class="fas fa-search"></i>-->
                </button>
            <!--<i class="mtn-icon mtn-icon-search"></i>-->
        </span>
    </div>
    <!--<input type="hidden" name="a" value="search">-->
    <!--<input type="text" class="form-control search-height-1" id="search-boxx" name="query" placeholder="Search Portal" aria-label="Search Portal">-->
    <!--<div id="suggestion-boxx"></div>-->
    <input type="search" class="js-form-search form-control search-height-1" name="query" id="search-box" placeholder="Search Portal" autocomplete="off"
            aria-label="Search in front" data-hs-form-search-options='{
                           "clearIcon": "#clearSearchResultsIcon",
                           "dropMenuElement": "#searchDropdownMenu",
                           "dropMenuOffset": 20,
                           "toggleIconOnFocus": true,
                           "activeClass": "focus"
                         }'>
</div>


<div id="searchDropdownMenu" class=" card dropdown-menu dropdown-card overflow-hidden" style="display:none;">
    <div class="card-body-height py-3" id="autocomplete-result">
        
    </div>
</div>



</form>
<!-- End Input Group -->
</div>