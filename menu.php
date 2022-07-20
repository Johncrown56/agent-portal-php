<div class="text-left">
    <a class="btn btn-link text-dark p-0" data-toggle="collapse" href="#menu" role="button" aria-expanded="false" aria-controls="menu">
        <i class="fas fa-bars text-dark"></i> <span class="text-hover-primary"> Menu</span>
    </a>
    <div class="collapse w-lg-100" id="menu">
        <div class="card card-body card-body-height shadow-none">
            <?php
            $api = 'topic';
            $method = 'GET';
            $params = array(
                //'$level' => -1,
                '$rangesize' => 7
            );
            $resp = CallAPI($method, $api, $params);
            //echo count($resp->topicTree);
            //var_dump($resp);
            //if (count($resp->topicTree->topic) > 0 || !empty($resp->topicTree->topic))
            ?>

            <!-- Basics Accordion -->
            <div id="basicsAccordion">
                <?php
                $c = 0;
                foreach ($resp->topicTree as $ke => $val) {
                    $c = ++$c;
                ?>
                    <!-- Card -->
                    <div class="overflow-hidden mb-1">
                        <div class="card-header p-0"  id="basicsHeading<?php echo $val->topic->id; ?>">
                            <button type="button" id="menu_button" style="font-size:16px" class="close_menu btn btn-link  btn-block font-size-40 card-btn d-flex justify-content-between collapsed p-0" data-toggle="collapse" data-target="#collapse<?php echo $val->topic->id; ?>" aria-expanded="false" aria-controls="collapse<?php echo $val->topic->id; ?>">
                                <?php echo $val->topic->name; ?>
                                <span class="card-btn-toggle">
                                    <span class="card-btn-toggle-default text-dark">+</span>
                                    <span class="card-btn-toggle-active text-dark">−</span>
                                </span>
                            </button>
                        </div>
                        <div id="collapse<?php echo $val->topic->id; ?>" class="collapse pl-3" aria-labelledby="basicsHeadingOne" data-parent="#basicsAccordion">
                            <div class="card-body p-1">
                                <?php
                                $ap = 'article';
                                $met = 'GET';
                                $par = array(
                                    'topicId' => $val->topic->id,
                                    '$rangesize' => 8,
                                    '$level' => 0
                                );
                                $rest = CallAPI($met, $ap, $par);
                                ?>
                                <ul class="list-unstyled">
                                    <?php
                                    $c = 0;
                                    foreach ($rest->article as $ka => $vl) {
                                        $c = ++$c;
                                    ?>
                                        <li class="pt-1"><a class="text-dark font-weight-light font-size-40" href="<?php echo $articleDir.'/'.$vl->id.'/'.clean_and_hyphenate($vl->name) ?>"><?php echo $vl->name; ?></a></li>
                                    <?php } ?>
                                </ul>
                                <button type="button" onclick="window.open('./topic/<?php echo $val->topic->id; ?>','_self')" id="view-more-<?php echo $val->topic->id;?>"
                                class="btn btn-primary btn-block font-size-35 justify-content-between p-0">
                                View More
                            </button>
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->
                <?php } ?>

            </div>
            <!-- End Basics Accordion -->

        </div>
    </div>

</div>