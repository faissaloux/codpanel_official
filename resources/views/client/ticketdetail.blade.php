@extends('client/layout')
@section('content')
@endsection

<div id="chat-ticket" class="container container-white container-store container-ticket position-relative">
    <div class="container-form chat-form position-relative">
        <div class="chat-window d-flex flex-column justify-content-between">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-title">
                    <div class="title-name d-flex">
                        <a href="/support" class="arrow-left-button svg-button d-flex justify-content-center ticket-button">
                            <svg height="24" width="24" class="svg-active">
                                <use xlink:href="/themes/img/sprite.svg#arrow-left">
                                </use>
                            </svg>
                            TEMPLATE HTML
                        </a>
                    </div>
                </div>
            </div>
            <div class="row new justify-content-center">
                <div class="col-12 col-md-8 d-flex flex-column justify-content-end">
                    <div class="chat-left d-flex">
                        <div>
                            <div class="avatar-left d-flex justify-content-center align-items-center">
                                BG
                            </div>
                        </div>
                        <div class="chat-text">
                            <div class="chat-message d-flex flex-column">
                                <span>Hi Support<br>
                                    <br>
                                    I would like to make some costume adjustment on the template of my store <br>
                                    <br>
                                    but I can see that there is no page so I can access to HTML or code page <br>
                                    <br>
                                    thank you
                                </span>
                            </div>
                            <div class="chat-information">
                                <span>brahim gallab</span>
                                <span>●</span>
                                <span>2019-09-02 16:14:14</span>
                            </div>
                        </div>
                    </div>
                    <div class="chat-right d-flex justify-content-end">
                        <div>
                            <div class="avatar-right d-flex justify-content-center align-items-center">
                                DO
                            </div>
                        </div>
                        <div class="chat-text">
                            <div class="chat-message d-flex justify-content-center flex-column">
                                <span>Hello Brahim, <br>
                                <br>
                                Yes, it's not allowed to edit source code of pages now. Just curious, what do you want to edit and why? </span>
                            </div>
                            <div class="chat-information">
                                <span>Dmitry O.</span>
                                <span>●</span>
                                <span>2019-09-02 16:19:06</span>
                            </div>
                        </div>
                    </div>
                    <div class="chat-left d-flex">
                        <div>
                            <div class="avatar-left d-flex justify-content-center align-items-center">
                                BG
                            </div>
                        </div>
                        <div class="chat-text">
                            <div class="chat-message d-flex flex-column">
                                <span>I just would like to change the HOME PAGE and make my own template style <br>
                                    <br>
                                    For example like this : https://www.stormlikes.net/<br>
                                    <br>
                                    i don't want to get access to all code only the HTML just wanted to have my own style <br>
                                    <br>
                                    thank you
                                </span>
                            </div>
                            <div class="chat-information">
                                <span>brahim gallab</span>
                                <span>●</span>
                                <span>2019-09-02 16:23:52</span>
                            </div>
                        </div>
                    </div>
                    <div class="chat-right d-flex justify-content-end">
                        <div>
                            <div class="avatar-right d-flex justify-content-center align-items-center">
                                DO
                            </div>
                        </div>
                        <div class="chat-text">
                            <div class="chat-message d-flex justify-content-center flex-column">
                                <span>What do you mean by "style"? <br>
                                    <br>
                                    Our visual website builder is deeply customizable, so you can easy to do good website. You can add your own backgrounds, images, change colors, icons and their styles and much more. <br>
                                    <br>
                                    Have you checked our demo?
                                </span>
                            </div>
                            <div class="chat-information">
                                <span>Dmitry O.</span>
                                <span>●</span>
                                <span>2019-09-02 16:32:47</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-chat fixed-bottom justify-content-center">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="container-footer-ticket">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-8">
                                    <div class="container">
                                        <form id="ticketForm" action="/message/278" method="post">
                                            @csrf
                                            <div id="ticketMessageError" class="alert alert-danger error-text ticket-error error-summary alert alert-danger hidden"></div>
                                            <div class="form-group">
                                                <div class="form-group field-message required">
                                                    <textarea   id="message"
                                                                class="form-control"
                                                                name="CreateMessageForm[message]"
                                                                rows="5"
                                                                placeholder="Write a reply..."
                                                                aria-required="true">
                                                    </textarea>
                                                </div>
                                            </div>

                                            <div class="chat-buttons d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <label class="attach d-flex align-items-center">
                                                        <svg height="24" width="24" class="svg-active">
                                                            <use xlink:href="/themes/img/sprite.svg#attach-file">
                                                            </use>
                                                        </svg>
                                                        <input  
                                                            type="hidden"
                                                            role="uploadcare-uploader"
                                                            name="qs-file"
                                                            id="file-uploader"
                                                            data-multiple="1"
                                                            data-multiple-max="3"
                                                            data-max-size="5242880"
                                                        >
                                                        <div class="uploadcare--widget uploadcare--widget_option_clearable uploadcare--widget_status_ready" aria-describedby="uploadcare--widget__text uploadcare--widget__progress" data-status="ready" aria-busy="false">
                                                            <div class="uploadcare--widget__dragndrop-area">Drop a file here</div>
                                                            <div id="uploadcare--widget__progress" class="uploadcare--progress uploadcare--progress_type_canvas uploadcare--widget__progress" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="">
                                                                <canvas class="uploadcare--progress__canvas" width="42" height="42"></canvas>
                                                            </div>
                                                            <div id="uploadcare--widget__text" class="uploadcare--widget__text" aria-live="polite"></div>
                                                            <button type="button" class="uploadcare--widget__button_type_open needsclick attach-button">Attach files</button>
                                                            <button type="button" class="uploadcare--widget__button_type_cancel attach-button">Cancel</button>
                                                            <button type="button" class="uploadcare--widget__button_type_remove attach-button">
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="18" viewBox="0 0 24 24">
                                                                    <defs>
                                                                        <path id="close" d="M13.816 12l3.933 3.934a.856.856 0 0 1 0 1.21l-.605.605a.856.856 0 0 1-1.21 0L12 13.816l-3.934 3.933a.856.856 0 0 1-1.21 0l-.605-.605a.856.856 0 0 1 0-1.21L10.184 12 6.251 8.066a.856.856 0 0 1 0-1.21l.605-.605a.856.856 0 0 1 1.21 0L12 10.184l3.934-3.933a.856.856 0 0 1 1.21 0l.605.605a.856.856 0 0 1 0 1.21L13.816 12z"></path>
                                                                    </defs>
                                                                    <g fill="none" fill-rule="evenodd">
                                                                        <use fill="#E94D4D" xlink:href="#close"></use>
                                                                    </g>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        <button type="button" class="close button-hidden attach-button" style="opacity: 1">
                                                            <svg height="18" width="18">
                                                                <use xlink:href="/themes/img/sprite.svg#close-file">
                                                                </use>
                                                            </svg>
                                                        </button>
                                                    </label>
                                                </div>

                                                <button type="submit" class="btn send-button purple-button d-flex justify-content-center align-items-center" id="ticketSend">
                                                    Send
                                                </button>
                                            </div>
                                        </form>                         
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>if (typeof setSize === 'function') {setSize();}if (typeof removeClass === 'function') {removeClass();}</script>  

<script src="https://ucarecdn.com/libs/widget/3.x/uploadcare.full.min.js"></script>
<script src="/themes/js/jquery.min.js?v=1597828398"></script>
<script src="/assets/7605697a/yii.js?v=1591776044"></script>
<script src="/assets/7605697a/yii.activeForm.js?v=1591776044"></script>
<script src="/assets/defb517b/underscore-min.js?v=1591776044"></script>
<script src="/assets/ecd6379e/js/libs/bootstrap_select/bootstrap-select.js?v=1597828583"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="/assets/ecd6379e/js/bootstrap.min.js?v=1597828583"></script>
<script src="/assets/d4d8e1e8/clipboard.min.js?v=1591776044"></script>
<script src="/assets/ecd6379e/js/script.js?v=1597828583"></script>
<script src="/assets/ecd6379e/js/main.js?v=1597828583"></script>
<script>
    UPLOADCARE_PUBLIC_KEY = "f723a3f13d2073d80ccb";
    UPLOADCARE_CLEARABLE = true;
    UPLOADCARE_LOCALE_TRANSLATIONS = {errors: {"fileMaximumSize": "File is too large (limit 5 Mb)"}, buttons: {choose: {files: {other: 'Attach files'}}, remove: 'X' } };
    UPLOADCARE_SYSTEM_DIALOG = true;
    function fileSizeLimit(max) {
    return function(fileInfo) {
        if (fileInfo.size === null) {
        return;
        }
        if (max && fileInfo.size > max) {
        throw new Error("fileMaximumSize");
        }
    };
    }
    function setSize() {
    $('[role=uploadcare-uploader]').each(function() {
        var input = $(this);
        if (!input.data('maxSize')) {
        return;
        }
        var widget = uploadcare.Widget(input);
        widget.validators.push(fileSizeLimit(input.data('maxSize')));
    });
    }
    function removeClass() {
    $('button[type=button]').removeClass('uploadcare--widget__button');
    $('button[type=button]').addClass('attach-button');
    $('.uploadcare--widget__button_type_remove').html('<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="18" viewBox="0 0 24 24"><defs><path id="close" d="M13.816 12l3.933 3.934a.856.856 0 0 1 0 1.21l-.605.605a.856.856 0 0 1-1.21 0L12 13.816l-3.934 3.933a.856.856 0 0 1-1.21 0l-.605-.605a.856.856 0 0 1 0-1.21L10.184 12 6.251 8.066a.856.856 0 0 1 0-1.21l.605-.605a.856.856 0 0 1 1.21 0L12 10.184l3.934-3.933a.856.856 0 0 1 1.21 0l.605.605a.856.856 0 0 1 0 1.21L13.816 12z" /></defs><g fill="none" fill-rule="evenodd"><use fill="#E94D4D" xlink:href="#close" /></g></svg>');
    }
    setSize();
    removeClass();
    window.modules.indexController = [];
</script>
<script>
    jQuery(function ($) {
        jQuery('#ticketForm').yiiActiveForm([], {"errorSummary":".error-summary.alert.alert-danger","errorCssClass":""});
    });
</script>

