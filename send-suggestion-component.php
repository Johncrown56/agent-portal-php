<!-- Article -->
<div class="card card-bordered mt-5 p-4 p-md-7">
    <!-- Suggestion Form Section -->
    <form class="row js-validate" id="suggestionForm" method="POST" action="" enctype="multipart/form-data">
        <!-- Title -->
        <div class="w-md-80 w-lg-80 text-center mx-md-auto mb-5 mb-md-5">
            <h5>Send a Suggestion</h5>
            <p>Please enter a short name and optional description for your suggestion.</p>
        </div>
        <!-- End Title -->
        <div class="col-lg-12">
            <!-- Input -->
            <div class="js-form-message mb-4 mb-md-6">
                <label class="input-label">Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="fullName" placeholder="John Doe" aria-label="John Doe" required data-msg="Please enter your full name.">
            </div>
            <!-- End Input -->

            <!-- Input -->
            <div class="js-form-message mb-4 mb-md-6">
                <label class="input-label">Description <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="description" placeholder="" aria-label="description" required data-msg="Please enter description.">
            </div>
            <!-- End Input -->


            <!-- Input -->
            <div class="js-form-message mb-4 mb-md-6">
                <label class="input-label">Please type your suggestion below <span class="text-danger">*</span></label>
                <!-- Quill -->
                <div class="quill-custom">
                    <div class="js-quill" id="quillArea" style="min-height: 15rem;" data-hs-quill-options='{
       "placeholder": "Type your message...",
        "modules": {
          "toolbar": [
            ["bold", "italic", "underline", "strike", "link", "image", "blockquote", {"list": "bullet"}]
          ]
        }
       }'>
                    </div>
                </div>
                <!-- End Quill -->
                <textarea name="comment" style="display:none" id="textArea"></textarea>


            </div>
            <!-- End Input -->


            <div class="js-form-message mb-4 mb-md-6">
            <label class="input-label">Add Attachment </label>
                <div class="custom-file">
                    <input type="file" name="file" class="js-file-attach custom-file-input" id="fileAttachment" data-hs-file-attach-options='{
              "textTarget": "[for=\"fileAttachment\"]"
           }'>
           <label class="custom-file-label" for="fileAttachment">Add Attachment</label>
                </div>
            </div>



            <div class="text-center">
                <div class="mb-2">
                    <button type="submit" name="sendSuggestion" class="btn btn-sm btn-soft-primary btn-wide">Suggest</button>
                </div>
            </div>
        </div>
    </form>
    <!-- End suggestion Form Section -->


</div>
<!-- End Article -->