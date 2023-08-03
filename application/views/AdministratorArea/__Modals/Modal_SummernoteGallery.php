<div class="modal fade" id="summernote-gallery" tabindex="-1" data-width="400">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-thunderbird" style="display: block;width: 100%;">
                        <div style="display: inline;">
                            <i class="fa fa-photo font-red-thunderbird"></i>
                            <span class="caption-subject bold uppercase"> Select image from gallery</span>
                        </div>
                        <div style="display: inline;float: right;margin-top: -15px;">
                            <input type="text" id="selected-path" style="display: none;"/>
                            <input type="text" id="selected-parent-path" style="display: none;"/>
                            <input type="text" class="form-control" id="folder-name" style="display: none;" placeholder="Folder name"/>
                            <input type="text" id="selected-summernote" style="display: none;"/>
                            <button type="button" class="btn" id="add-folder" style="margin-top: 5px;">Add Root Folder</button>
                            <button type="button" class="btn" id="add-sub-folder" style="margin-top: 5px;">Add Sub Folder</button>
                            <button type="button" class="btn" id="rename-folder" style="margin-top: 5px;">Rename Folder</button>
                            <button type="button" class="btn" id="delete-folder" style="margin-top: 5px;">Delete Folder</button>
                        </div>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div style="text-align: center;">
                        <div class="row">
                            <div class="col-md-3" style="text-align: left;">
                                <div id="directory-list"></div>
                            </div>
                            <div class="col-md-9">
                                <div id="image-list" class="dropzone">
                                    <p> Drop files here or click to upload</p>
                                </div>

                                <div id="image-uploaded-template">
                                    <div class="dz-preview dz-complete dz-image-preview">
                                        <div class="dz-image">
                                            <img data-dz-thumbnail />
                                        </div>
                                        <div class="dz-details">
                                            <div class="dz-size" style="display:none;">
                                                <div class="dz-size" data-dz-size></div>
                                            </div>
                                            <div class="dz-filename" style="display:none;">
                                                <span data-dz-name></span>
                                            </div>
                                        </div>
                                        <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                                        <div class="dz-success-mark"></div>
                                        <div class="dz-error-message"></div>
                                        <div class="dz-error-mark"></div>
                                        <div data-dz-remove></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="text-align: right;">
                        <button type="button" class="btn red-thunderbird" id="add-image">Add Selected Images</button>
                        <button type="button" class="btn red btn-outline" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .ui-widget-content,
    .ui-helper-hidden-accessible{
        border: 0;
        clip: rect(0 0 0 0);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px;
        display:none;
    }
    .dropzone {
        border:5px dashed lightslategray;
    }
    .dropzone p{
        font-size: 25px;
        font-weight: bold;
        color: #4bb5c1;
    }
    .note-group-select-from-files {
        display:none;
    }
    .dz-image img.dz-image-checked{
        -webkit-filter: blur(8px);
        filter: blur(8px);
    }
    .dz-selected-mark{
        display: none;
    }
    .dz-selected-mark.dz-selected-mark-checked{
        display: block;
        right: 30%;
        position: absolute;
        top: 25%;
        z-index: 100;
        color: white;
        font-size: 50px;
    }
    .dz-delete-button i{
        right: 0px;
        position: absolute;
        top: 100%;
    }
</style>

<script>
    $(document).ready(function() {
        /** =================================================================== **/
        /** GALLERY FUNCTION                                                    **/
        /** =================================================================== **/
        Dropzone.autoDiscover = false;

        var jstree_selector = "#summernote-gallery #directory-list";
        var jstree_selected_path_selector = "#summernote-gallery #selected-path";
        var jstree_selected_parent_path_selector = "#summernote-gallery #selected-parent-path";
        var dropzone_selector = "#summernote-gallery #image-list";
        var dropzone_preview_selector = "#summernote-gallery .dz-preview";
        var dropzone_template_selector = "#summernote-gallery #image-uploaded-template";

        var selected_summernote = "#summernote-gallery #selected-summernote";

        $(".open-gallery-modal").on("click",function(){
            $(selected_summernote).val($(this).data("summernote"));
            $($(selected_summernote).val()).summernote('editor.saveRange');
        });

        // INITIAL MODAL GALLERY DIRECTORY LIST
        var xhrRequestDirectoryList;
        var xhrRequestImageList;

        getDirectoryList();

        // INITIALIZE MODAL GALLERY IMAGE LIST
        var image_list = new Dropzone(dropzone_selector, {
            url: "<?php echo base_url("PluginArea/summernote_gallery/upload")?>?path="+encodeURI($(jstree_selected_path_selector).val()),
            method: "post",
            addRemoveLinks: false,
            dictDefaultMessage: "",
            previewTemplate: document.querySelector(dropzone_template_selector).innerHTML,
            init: function() {
                this.on("addedfile", function(file) {
                    $("#summernote-gallery .dz-preview:last-child").attr('data-url', file.url);

                    var check_input = Dropzone.createElement("<input type='checkbox' name='dropzone_selected_file[]' value='"+file.url+"' data-url='"+file.url+"' style='display:none;'>");
                    var check_mask = Dropzone.createElement("<div class='dz-selected-mark' data-url='"+file.url+"'><i class='glyphicon glyphicon-ok'></i></div>");
                    var delete_button = Dropzone.createElement("<div class='dz-delete-button'><i class='glyphicon glyphicon-trash'></i></div>");
                    var _this = this;

                    delete_button.addEventListener("click", function(e) {
                        _this.removeFile(file);
                    });

                    file.previewElement.appendChild(check_input);
                    file.previewElement.appendChild(check_mask);
                    file.previewElement.appendChild(delete_button);
                });
                this.on("thumbnail", function(file) {
                    file.previewElement.addEventListener("click", function() {
                        if($("#summernote-gallery input[data-url='"+file.url+"']").is(':checked')){
                            $("#summernote-gallery input[data-url='"+file.url+"']").prop("checked",false);
                            $("#summernote-gallery .dz-selected-mark[data-url='"+file.url+"']").removeClass("dz-selected-mark-checked");
                            $("#summernote-gallery .dz-preview[data-url='"+file.url+"'] img").removeClass("dz-image-checked");
                        }else{
                            $("#summernote-gallery input[data-url='"+file.url+"']").prop("checked",true);
                            $("#summernote-gallery .dz-selected-mark[data-url='"+file.url+"']").addClass("dz-selected-mark-checked");
                            $("#summernote-gallery .dz-preview[data-url='"+file.url+"'] img").addClass("dz-image-checked");
                        }
                    });
                });
                this.on("processing", function(file) {
                    this.options.url = "<?php echo base_url("PluginArea/summernote_gallery/upload")?>?path="+encodeURI($(jstree_selected_path_selector).val());
                });
                this.on("success", function(file) {
                    getImageList();
                });
                this.on("removedfile", function (file) {
                    $.ajax({
                        type: 'GET',
                        url: file.delete_url,
                        success: function(data){
                            getImageList();
                        }
                    });
                });
            }
        });

        function resetDirectoryList(){
            $(jstree_selector).jstree("destroy");
        }
        function resetImageList(){
            $(dropzone_preview_selector).remove();
        }

        function getDirectoryList(){
            resetDirectoryList();
            if(xhrRequestDirectoryList && xhrRequestDirectoryList.readyState != 4){
                xhrRequestDirectoryList.abort();
            }
            xhrRequestDirectoryList = $.ajax({
                async: true,
                type: "GET",
                url: "<?php echo base_url("PluginArea/summernote_gallery/getDirectory")?>",
                dataType: "json",
                success: function (response) {
                    $(jstree_selector).jstree({
                        'core': {
                            'data': response.data
                        }
                    });

                    $(jstree_selector).on('changed.jstree', function (e, data) {
                        $(jstree_selected_path_selector).val(data.instance.get_node(data.selected[0]).original.path);
                        $(jstree_selected_parent_path_selector).val(data.instance.get_node(data.selected[0]).original.parent_path);
                        getImageList();
                    });
                },
                error: function (xhr, ajaxOptions, thrownError) {

                }
            });
        }
        function getImageList(){
            resetImageList();
            if(xhrRequestImageList && xhrRequestImageList.readyState != 4){
                xhrRequestImageList.abort();
            }
            xhrRequestImageList = $.ajax({
                async: true,
                type: "GET",
                url: "<?php echo base_url("PluginArea/summernote_gallery/getImage")?>?path="+encodeURI($(jstree_selected_path_selector).val()),
                dataType: "json",
                success: function (response) {
                    var mockFile;
                    for(var i = 0;i < response.data.length;i++){
                        mockFile = {
                            name: response.data[i].name,
                            size: response.data[i].size,
                            accepted: true,
                            kind: 'image',
                            upload: {
                                filename: response.data[i].name
                            },
                            url: response.data[i].url,
                            delete_url: response.data[i].delete_url
                        };
                        image_list.files.push(mockFile);
                        image_list.emit("addedfile", mockFile);
                        image_list.createThumbnailFromUrl(mockFile, response.data[i].url);
                        image_list.emit("complete", mockFile);
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {

                }
            });
        }

        // BUTTON EVENT HANDLER
        $("#summernote-gallery #add-folder").on("click",function(){
            var target_folder_name = "#summernote-gallery #folder-name";
            if($(target_folder_name).val() != ""){
                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url("PluginArea/summernote_gallery/addFolder")?>?folder_name="+encodeURI($(target_folder_name).val()),
                    success: function (response) {
                        $(target_folder_name).fadeOut();
                        $(target_folder_name).val("");
                        getDirectoryList();
                        getImageList();
                    },
                    error: function (xhr, ajaxOptions, thrownError) {

                    }
                });
            }else{
                $(target_folder_name).fadeIn();
            }

        });

        $("#summernote-gallery #add-sub-folder").on("click",function(){
            var target_folder_name = "#summernote-gallery #folder-name";
            if($(target_folder_name).val() != ""){
                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url("PluginArea/summernote_gallery/addSubFolder")?>?folder_name="+encodeURI($(target_folder_name).val())+"&path="+encodeURI($(jstree_selected_path_selector).val()),
                    success: function (response) {
                        $(target_folder_name).fadeOut();
                        $(target_folder_name).val("");
                        getDirectoryList();
                        getImageList();
                    },
                    error: function (xhr, ajaxOptions, thrownError) {

                    }
                });
            }else{
                $(target_folder_name).fadeIn();
            }
        });

        $("#summernote-gallery #rename-folder").on("click",function(){
            var target_folder_name = "#summernote-gallery #folder-name";
            if($(target_folder_name).val() != ""){
                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url("PluginArea/summernote_gallery/renameFolder")?>?folder_name="+encodeURI($(target_folder_name).val())+"&path="+encodeURI($(jstree_selected_path_selector).val())+"&parent_path="+encodeURI($(jstree_selected_parent_path_selector).val()),
                    success: function (response) {
                        $(target_folder_name).fadeOut();
                        $(target_folder_name).val("");
                        getDirectoryList();
                        getImageList();
                    },
                    error: function (xhr, ajaxOptions, thrownError) {

                    }
                });
            }else{
                $(target_folder_name).fadeIn();
            }
        });

        $("#summernote-gallery #delete-folder").on("click",function(){
            $.ajax({
                type: "GET",
                url: "<?php echo base_url("PluginArea/summernote_gallery/deleteFolder")?>?path="+encodeURI($(jstree_selected_path_selector).val()),
                success: function (response) {
                    getDirectoryList();
                    getImageList();
                },
                error: function (xhr, ajaxOptions, thrownError) {

                }
            });
        });

        $("#summernote-gallery #add-image").on("click",function(){
            $("#summernote-gallery input[name='dropzone_selected_file[]']:checked").each(function () {
                $($(selected_summernote).val()).summernote('insertImage', $(this).val());

                $("#summernote-gallery input[data-url='"+$(this).data("url")+"']").prop("checked",false);
                $("#summernote-gallery .dz-selected-mark[data-url='"+$(this).data("url")+"']").removeClass("dz-selected-mark-checked");
                $("#summernote-gallery .dz-preview[data-url='"+$(this).data("url")+"'] img").removeClass("dz-image-checked");
            });

            $("#summernote-gallery").modal("toggle");
        });

        // DEFINE BUTTON EVENT HANDLE
        /*$(document).on("click", '#button-social', function (event) {
         var highlight = window.getSelection();
         var range = highlight.getRangeAt(0);

         var node = document.createElement('span');

         node.innerHTML = highlight;
         node.setAttribute("class", "social-group");
         node.setAttribute("style", "color:red;");

         range.deleteContents();
         range.insertNode(node);
         });*/
    });
</script>