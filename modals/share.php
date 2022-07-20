<form class="js-validate" method="POST" action="" >
    <div id="shareModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="shareModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-top-cover bg-primary text-center">
                    <figure class="position-absolute right-0 bottom-0 left-0">
                        <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1920 100.1">
                            <path fill="#fff" d="M0,0c0,0,934.4,93.4,1920,0v100.1H0L0,0z" />
                        </svg>
                    </figure>

                    <div class="modal-close">
                        <button type="button" class="btn btn-icon btn-sm btn-ghost-light" data-dismiss="modal" aria-label="Close">
                            <svg width="16" height="16" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="text-center">
                    <h5 class="modal-title">Share Article to a Friend</h5>
                </div>
                <!-- End Header -->

                <!-- <div class="modal-top-cover-avatar">
                          <img class="avatar avatar-lg avatar-circle avatar-border-lg avatar-centered shadow-soft" src="./assets/svg/logos/mtn_logo.svg" alt="Logo">
                        </div> -->

                <div class="modal-body">
                    <div class="form-group">
                        <div class="">
                            <label class="input-label" for="nameId">Your Name <span class="text-danger">*</span></label>
                            <input type="text" id="nameId" name="shareName" class="form-control" placeholder="John Doe" required data-msg="Please enter your name.">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="js-form-message">
                            <label class="input-label" for="emailId">Your Email <span class="text-danger">*</span></label>
                            <input type="email" id="emailId" name="shareEmail" class="form-control" placeholder="name@example.com" required data-msg="Please enter your email.">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="js-form-message">
                            <label class="input-label" for="FriendNameId">Your Friend's Name <span class="text-danger">*</span></label>
                            <input type="text" for="FriendNameId" class="form-control" name="shareFriendName" required data-msg="Please enter your friend's name.">
                            <!-- <span class="text-muted font-size-1">The name of your friend</span> -->
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="js-form-message">
                            <label class="input-label" for="FriendEmailId">Your Friend's Email <span class="text-danger">*</span></label>
                            <input type="email" id="FriendEmailId" name="shareFriendEmail" class="form-control" required data-msg="Please enter your friend's email.">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="js-form-message">
                            <label class="input-label" for="commentId">Comment</label>
                            <textarea id="commentId" name="shareComment" class="form-control" placeholder="Additional comments" rows="4"></textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="shareArticle">Share</button>
                </div>

            </div>
        </div>
    </div>
</form>