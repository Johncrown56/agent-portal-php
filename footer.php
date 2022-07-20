<!-- ========== FOOTER ========== -->
<footer class="text-center space-top-md-1 space-bottom-md-1 bg-dark">
  <p class="small text-white font-weight-bold mt-0 mb-0">Copyright © Research & Digital Media <?php echo date('Y'); ?>.</p>
</footer>
<!-- ========== END FOOTER ========== -->

<input type="hidden" id="portalId" value="<?php if (isset($portalId)) {
                                            echo $portalId;
                                          } ?>">
<input type="hidden" id="userType" value="<?php if (isset($userType)) {
                                            echo $userType;
                                          } ?>">
<input type="hidden" id="xEgainSession" value="<?php if (!empty(XEGAINSESSIONID)) {
                                                  echo XEGAINSESSIONID;
                                                } else {
                                                  echo '';
                                                } ?>">


<!-- Go to Top -->
<a class="js-go-to go-to position-fixed" href="javascript:;" style="visibility: hidden;" data-hs-go-to-options='{
       "offsetTop": 700,
       "position": {
         "init": {
           "right": 15
         },
         "show": {
           "bottom": 15
         },
         "hide": {
           "bottom": -15
         }
       }
     }'>
  <i class="fas fa-angle-up"></i>
</a>
<!-- End Go to Top -->

<!-- JS Global Compulsory  -->
<script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="./assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
<script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- JS Implementing Plugins -->
<script src="./assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="./assets/vendor/hs-header/dist/hs-header.min.js"></script>
<script src="./assets/vendor/hs-go-to/dist/hs-go-to.min.js"></script>
<script src="./assets/vendor/hs-unfold/dist/hs-unfold.min.js"></script>
<script src="./assets/vendor/hs-sticky-block/dist/hs-sticky-block.min.js"></script>
<!-- <script src="./assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.js"></script> -->
<script src="./assets/vendor/hs-toggle-switch/dist/hs-toggle-switch.min.js"></script>
<script src="./assets/vendor/aos/dist/aos.js"></script>

<script src="./assets/vendor/hs-navbar-vertical-aside/hs-navbar-vertical-aside.min.js"></script>
<script src="./assets/vendor/slick-carousel/slick/slick.js"></script>
<script src="./assets/vendor/hs-video-player/dist/hs-video-player.min.js"></script>
<script src="./assets/vendor/quill/dist/quill.min.js"></script>
<script src="./assets/vendor/hs-file-attach/dist/hs-file-attach.min.js"></script>
<script src="./assets/vendor/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
<script src="assets/vendor/hs-form-search/dist/hs-form-search.min.js"></script>

<!-- JS Front -->
<script src="./assets/js/theme.min.js"></script>

<script>
  grecaptcha.ready(function() {
    grecaptcha.execute('<?php echo $siteKey; ?>', {
      action: 'submit'
    }).then(function(token) {
      // Let's add the logic to submit to your backend server here.
      console.log(token);
      document.getElementById("token").value = token;
    });
  });

  // update the token generated every 120 Seconds (2 minutes)
  setInterval(function() {
    grecaptcha.ready(function() {
      grecaptcha.execute('<?php echo $siteKey; ?>', {
        action: 'request_call_back'
      }).then(function(token) {
        console.log(token);
        document.getElementById("token").value = token;
      });
    });
  }, 120 * 1000);
</script>


<?php if (basename($_SERVER['PHP_SELF']) == 'e_centre-search.php') { ?>
  <script src="./assets/js/jquery.twbsPagination.min.js"></script>
  <script src="https://unpkg.com/json5@^2.0.0/dist/index.min.js"></script>
  <script src="./assets/js/script2.js"></script>
<?php } ?>


<!-- JS Plugins Init. -->
<script>
  function printDiv(divName) {
    console.log(divName);
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
  }
  jQuery(document).on('ready', function() {

    $('.showToast').toast({
      autohide: false
    });

    $('.showToast').toast('show');

    // $('#showToast').toast({
    //   delay: 10000
    // });  

    var portalId = $('#portalId').val();
    var userType = $('#userType').val();
    var xEgainSession = $('#xEgainSession').val();
    console.log(xEgainSession);


    // INITIALIZATION OF HEADER
    // =======================================================
    var header = new HSHeader($('#header')).init();

    // INITIALIZATION OF QUILLJS EDITOR
    // =======================================================
    var quill = $.HSCore.components.HSQuill.init('.js-quill');
    //quill.getLength();

    $("#suggestionForm").on("submit", function() {
      $("#textArea").val($("#quillArea .ql-editor").html());
    });

    // INITIALIZATION OF UNFOLD
    // =======================================================
    $('.js-hs-unfold-invoker').each(function() {
      var unfold = new HSUnfold($(this)).init();
    });

    // INITIALIZATION OF NAVBAR VERTICAL NAVIGATION
    // =======================================================
    var sidebar = $('.js-navbar-vertical-aside').hsSideNav();



    // INITIALIZATION OF SLICK CAROUSEL
    // =======================================================
    $('.js-slick-carousel').each(function() {
      var slickCarousel = $.HSCore.components.HSSlickCarousel.init($(this));
    });

    // INITIALIZATION OF VIDEO PLAYER
    // =======================================================
    $('.js-inline-video-player').each(function() {
      var videoPlayer = new HSVideoPlayer($(this)).init();
    });

    // INITIALIZATION OF FORM VALIDATION
    // =======================================================
    $('.js-validate').each(function() {
      var validation = $.HSCore.components.HSValidation.init($(this));
    });

    // INITIALIZATION OF CUSTOM FILE
    // =======================================================
    $('.js-file-attach').each(function() {
      var customFile = new HSFileAttach($(this)).init();
    });


    // $('.close_menu').click(function () {
    <?php if (basename($_SERVER['PHP_SELF']) != 'index.php') { ?>
      $(document).on('click', '.close_menu', function() {
        $(this).addClass('btn-primary');
        $(this).addClass('open_menu');
        $(this).removeClass('btn-link');
        $(this).addClass('pl-1');
        $(this).addClass('text-dark');
        $(this).removeClass('close_menu');
      });

      $(document).on('click', '.open_menu', function() {
        $(this).addClass('close_menu');
        $(this).addClass('btn-link');
        $(this).removeClass('btn-primary');
        $(this).removeClass('open_menu');
      });
    <?php } ?>

    $('#tool_button').click(function() {
      $(this).toggleClass('btn-primary');
    });

    // INITIALIZATION OF TOGGLE SWITCH
    // =======================================================
    $('.js-toggle-switch').each(function() {
      var toggleSwitch = new HSToggleSwitch($(this)).init();
    });

    $('.js-sticky-block').each(function() {
      var stickyBlock = new HSStickyBlock($(this)).init();
    });


    // INITIALIZATION OF AOS
    // =======================================================
    AOS.init({
      duration: 650,
      once: true
    });

    $(document).on('click', '.rateArticle', function() {
      var artId = $(this).attr("id");
      var artScore = $(this).attr("name");
      console.log(artId);
      console.log(artScore);
      console.log(portalId);
      console.log(userType);
      var param = {
        portalId: portalId,
        score: artScore,
        usertype: userType
      }
      var params = JSON.stringify(param);
      console.log(params);
      //console.log(sfg.serialize());       
      if (artId != '' && artScore != '') {
        $.ajax({
          url: "<?php echo SITEURL; ?>article/rating/" + artId + "?portalId=" + portalId + "&usertype=" + userType + "&score=" + artScore,
          method: "PUT",
          contentType: "application/json",
          data: params,
          dataType: "json",
          headers: {
            'Accept-Language': 'en-US',
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-egain-session': xEgainSession
          },
          success: function(data) {
            console.log(data);
            if (data.callInfo.status === "success") {
              $('#rating_resp').html('<span class="text-success"><span class="text-capitalize">' + data.callInfo.status + '</span>: Thanks for the rating!</span>');
              $(this).addClass('text-success');
            } else {
              $('#rating_resp').html('<span class="text-danger"><span class="text-capitalize">' + data.callInfo.status + '</span>: The rating could not be submitted.!</span>');
              $(this).addClass('text-danger');
            }
          },
          error: function(error) {
            console.log(error);
            $('#rating_resp').html('<span class="text-danger"><span class="text-capitalize">' + data.callInfo.status + '</span>: Rating could not be submitted. Please try later.</span>');
            $(this).addClass('text-danger');
            //$('#alert_message').html('<div class="alert alert-danger">' + 'Error fetching Data' + '</div>');
          }
        });
      } else {
        console.log("No article id or no rating score");
      }

    })

    $(document).on('click', '.bookmarkArticle', function() {
      var artId = $(this).attr("id");
      console.log(artId);
      var params = {
        portalId: portalId,
        usertype: userType,
        resourceId: artId
      }
      console.log(params);
      if (artId != '') {
        $.ajax({
          url: "<?php echo SITEURL; ?>bookmark",
          method: "POST",
          contentType: "application/json",
          data: params,
          dataType: "json",
          headers: {
            'Accept-Language': 'en-US',
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-egain-session': xEgainSession
          },
          success: function(data) {
            console.log(data);
            if (data.callInfo.status === "success") {
              $('#bookmark_resp').html('Article added to bookmarks successfully!');
              $(this).addClass('text-success');
            } else {
              $('#bookmark_resp').html('Article could not be added to bookmarks. Please try later.');
              $(this).addClass('text-danger');
            }
          },
          error: function(error) {
            console.log(error);
            $('#bookmark_resp').html('Article could not be added to bookmarks. Please try later.');
            $(this).addClass('text-danger');
            //$('#alert_message').html('<div class="alert alert-danger">' + 'Error fetching Data' + '</div>');
          }
        });
      } else {
        console.log("No article Id");
      }

    })

    $(document).on('click', '.deletebookmark', function() {
      var bookmarkId = $(this).attr("id");
      console.log(bookmarkId);
      var params = {
        portalId: portalId,
        usertype: userType,
      }
      console.log(params);
      if (artId != '') {
        $.ajax({
          url: "<?php echo SITEURL; ?>bookmark/" + bookmarkId,
          method: "DELETE",
          contentType: "application/json",
          data: params,
          dataType: "json",
          headers: {
            'Accept-Language': 'en-US',
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-egain-session': xEgainSession
          },
          success: function(data) {
            console.log(data);
            if (data.callInfo.status === "success") {
              $('#bookmark_resp').html('Success: Article deleted from bookmarks successfully!');
              $(this).addClass('text-success');
            } else {
              $('#bookmark_resp').html('Error: Article could not be deleted from bookmarks.');
              $(this).addClass('text-danger');
            }

          },
          error: function(error) {
            console.log(error);
            $('#bookmark_resp').html('Article could not be deleted from bookmarks. Please try later.');
            $(this).addClass('text-danger');
          }
        });
      } else {
        console.log("No article Id");
      }

    });

    (function($) {
      $(document).on('click', '.getGuidedHelp', function() {
        var id = $(this).attr("id");
        var name = $(this).attr("name");
        var val = $(this).val();
        var args = $(this).attr("data-arg");
        console.log(id);
        console.log(name);
        console.log(args);
        var params = {
          portalId: portalId,
          usertype: userType,
          $lang: 'en-us'
        };
        var siteUrl = "<?php $api = 'search';
                        echo $siteUrl = $api == 'search' ? str_replace("/ss/", "/gh/", SITEURL) : SITEURL; ?>";
        console.log(siteUrl);
        var url = siteUrl + "search?portalId=" + portalId + "&casebaseId=" + args + "&Q1-1-" + name + "=" + id + "&usertype=" + userType;
        console.log(url);
        if (id != '' && name != '') {
          $.ajax({
            url: url,
            method: "POST",
            contentType: "application/json",
            data: params,
            dataType: "json",
            headers: {
              'Accept-Language': 'en-US',
              'Accept': 'application/json',
              'Content-Type': 'application/json',
              'X-egain-session': xEgainSession
            },
            beforeSend: function() {
              //$('#loader').show();
              $("#overlay").fadeIn(100);
            },
            complete: function() {
              //$('#loader').hide();
              $("#overlay").fadeOut(100);
            },
            success: function(data) {
              console.log(data);
              if (data.callInfo.status === "success") {
                var question = data.unansweredQuestion[0];
                if (typeof data.unansweredQuestion !== 'undefined' && data.unansweredQuestion.length == 0) {
                  $('.nextQuestion').html('<span class="text-dark">The guided help has ended<span>');
                  $('.nextAnswer').html('');
                  //$('#completeGh').removeClass('d-none');
                  $('#completeGh').css("display", "");
                } else {
                  var note = '<h6 class="card-title mb-3"><i class="fas fa-question-circle"></i>' + ' ' + question.title + '</h6>';
                  $('.nextQuestion').html(note);
                  $('.nextAnswer').html('');
                  $.each(question.validAnswer, function(key, vl) {
                    var text = '<div class="form-group mb-2"><div class="custom-control custom-radio text-dark">' +
                      '<input type="radio" data-arg="' + data.casebase.id + '" name="' + question.id + '" id="' + vl.id + '"  value="' + vl.id + '" ' +
                      'class="custom-control-input getGuidedHelp">' +
                      '<label class="custom-control-label" for="' + vl.id + '">' + vl.text + '</label>' +
                      '</div> </div>';
                    // $('.nextAnswer').empty();
                    $('.nextAnswer').append(text);
                    //
                  });
                }

              } else {
                $('#alert_message').html('<div class="alert alert-danger"><span class="text-capitalize">' + data.callInfo.status + ': </span> ' + data.callInfo.message + '</div>');
              }

            },
            error: function(error) {
              console.log(error);
              $('#alert_message').html('<div class="alert alert-danger">' + 'Error fetching Data' + '</div>');
            }
          });
        } else {
          var err = "No question id or previous answer id";
          console.log(err);
          $('#alert_message').html('<div class="alert alert-danger">' + err + '</div>');
        }
      });
    }(jQuery || window.jQuery));

    //     let count = 0;
    // const button = document.getElementById("increment");
    // const button2 = document.getElementById("decrement");
    // const textHolder = document.getElementById("count");
    // textHolder.innerHTML = count;

    var count = 1;
    var button = $('.search_more');
    var textHolder = $('#count');
    textHolder.html = count;
    //console.log(count);

    $(document).on('click', '.search_more', function() {
      textHolder.html = ++count;
      console.log(textHolder.html);
      var searchParam = $(this).attr("id");
      console.log(searchParam);
      if (searchParam != '') {
        $.ajax({
          url: "<?php echo SITEURL . 'search' . PORTALPARAMS; ?>q=" + searchParam + "&$pagenum=" + textHolder.html + "$pagesize=5&$attribute=all",
          method: "GET",
          contentType: "application/json",
          dataType: "json",
          headers: {
            'Accept-Language': 'en-US',
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-egain-session': xEgainSession
          },
          success: function(data) {
            console.log(data);
            if (data.callInfo.status === "success") {
              $.each(data.article, function(key, value) {
                var el = $("#search_article");
                var maxWords = 30;
                var string = value.contentText;
                length = string.split(' ').length;
                if (length > maxWords) {
                  var lastWord = string.split(' ')[maxWords];
                  var lastWordIndex = string.indexOf(lastWord);
                  var content = string.substr(0, lastWordIndex) + '...';
                } else {
                  var content = value.contentText;
                }

                //var dataName = value.name.replace(/[\s/]+/g, "-").toLowerCase();
                var dataName = value.name.replace(/\W+/g, '-').toLowerCase();
                // dataName = value.name.replace(/\s+/g, '-').toLowerCase();
                console.log(dataName);
                var text = '<a href="<?php echo $articleDir . "/"; ?>' + value.id + '/' + dataName + '">' +
                  '<b class="card-title font-size-40 text-dark">' + value.name + '</b></a>' +
                  '<span class="font-family-light text-dark font-size-sm">' + content + '</span>' +
                  '<div class="row align-items-md-center mt-2">' +
                  '<div class="col-md-6 mb-4 mb-md-0">' +
                  '</div>' +
                  '<div class="col-md-6 text-md-right">' +
                  '<a class="font-weight-bold text-dark font-size-35" target="self"' +
                  'href="<?php echo $articleDir . "/"; ?>' + value.id + '/' + dataName + '">' +
                  'Learn More <i class="fas fa-angle-right fa-sm ml-1 ml-1"></i></a>' +
                  '</div>' +
                  '</div>';
                el.append($(text));
              });
            } else {
              $('#alert_message').html('<div class="alert alert-danger">' + ' ' + data.callInfo.status + ': Articles could not be fetched.' + '</div>');
            }
            //
          },
          error: function(error) {
            console.log(error);
            $('#alert_message').html('<div class="alert alert-danger">' + 'Error fetching articles' + '</div>');
          }
        });
      } else {
        console.log("No search Parameter");
      }
    });


    // AJAX call for autocomplete 
    $(document).ready(function() {
      var params = {
        portalId: portalId,
        usertype: userType,
        $lang: 'en-us'
      };
      var maxCount = 10;
      $("#search-box").keyup(function() {
        if (this.value.length > 2) {
          var text = $(this).val();
          var url = "<?php echo SITEURL; ?>search/autocomplete?portalId=" + portalId + "&usertype=" + userType + "&q=" + text + "&maxCount=" + maxCount + "&expanded=true";
          console.log(url);
          $.ajax({
            url: url,
            method: "GET",
            data: params,
            dataType: "json",
            contentType: "application/json",
            headers: {
              'Accept-Language': 'en-US',
              'Accept': 'application/json',
              'Content-Type': 'application/json',
              'X-egain-session': xEgainSession
            },
            beforeSend: function() {
              $("#search-box").css("background", "#FFF url(./assets/images/pics/loaderIcon.gif) no-repeat 165px");
              $("#search-box").css("background-position", "right 40px top 10px");
            },
            success: function(data) {
              console.log(data);
              if (data.callInfo.status === "success") {
                if (data.suggestion.length > 0) {
                  var list = $('<div>');
                  $.each(data.suggestion, function(key, value) {
                    var hyphenateName = value.suggestion.replace(/\W+/g, '-').toLowerCase();
                    var oldHref = value.suggestion.replace(/\<B>/g, '');
                    var newHref = oldHref.replace(/\<\/B>/g, "");
                    if (value.suggestionType === "GENERAL") {
                      var href = 'search/' + newHref;
                      var init = 'G';
                    } else if (value.suggestionType === "TOPIC") {
                      var href = 'topic/' + value.entityId;
                      var init = 'T';
                    } else if (value.suggestionType === "ARTICLE") {
                      var href = '<?php echo $articleDir . "/"; ?>' + value.entityId + '/' + hyphenateName;
                      var init = 'A';
                    }
                    var text = '<a class="dropdown-item my-2 pl-4 pr-4" href="' + href + '">' +
                      '<div class="media align-items-center">' +
                      '<div class="avatar avatar-xs avatar-soft-warning avatar-circle mr-2">' +
                      '<span class="avatar-initials">' + init + '</span>' +
                      '</div>' +
                      '<div class="media-body text-truncate">' +
                      '<span>' + value.suggestion + '</span>' +
                      '</div>' +
                      '</div>' +
                      '</a>';

                    var item = $('<div class="egain-response-body">').html(text);
                    list.append(item);
                  });
                  //$("#suggestion-box").show();
                  $("#searchDropdownMenu").css("display", "block");
                  $("#searchDropdownMenu").addClass('hs-form-search-menu-content');
                  $("#autocomplete-result").html(list);
                  $("#search-box").css("background", "#FFF");

                } else {
                  var text = '<div class="media align-items-center">' +
                    '<div class="media-body text-truncate">' +
                    '<span class="dropdown-item my-2 pr-4 pl-4">No suggestions</span>' +
                    '</div>' +
                    '</div>';
                  $("#searchDropdownMenu").css("display", "block");
                  $("#searchDropdownMenu").addClass('hs-form-search-menu-content');
                  $("#autocomplete-result").html(text);
                  $("#search-box").css("background", "#FFF");
                }

              } else {
                console.log('Error response from API');
              }

            }
          });
        }
      });
    });


    // INITIALIZATION OF GO TO
    // =======================================================
    $('.js-go-to').each(function() {
      var goTo = new HSGoTo($(this)).init();
    });

    // INITIALIZATION OF FORM SEARCH
    // =======================================================
    $('.js-form-search').each(function() {
      new HSFormSearch($(this)).init()
    });
  });
</script>
<script>
  $(document).on('ready', function() {
    // INITIALIZATION OF FANCYBOX
    // =======================================================
    $('.js-fancybox').each(function() {
      var fancybox = $.HSCore.components.HSFancyBox.init($(this));
    });
  })
</script>
<!-- IE Support -->
<script>
  if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="./assets/vendor/babel-polyfill/dist/polyfill.js"><\/script>');
</script>
</body>

</html>