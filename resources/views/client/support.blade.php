@extends('client/layout')

@section('title')
   Support | Codpanel
@endsection

@section('content')
    <div class="container container-store container-top">
        <div class="row">
            <div class="col col-title">
                <div class="title-name title-table d-flex flex-sm-row flex-column justify-content-sm-between align-items-sm-center">
                    <h2 class="title-bottom">Support tickets</h2>
                    <button class="btn purple-button"
                            data-toggle="modal"
                            data-target="#submitTicket">
                            Create a ticket
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="alert alert-info alert-information alert-text">
                    Please send your message in English or Russian.<br>
                    Receiving answer from us can take up to 24 hours (excluding weekends).
                </div>
                <table class="table sommerce-modals__order-result-table">
                    <thead>
                        <tr class="table-borderless">
                            <th scope="col">Subject</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created</th>
                            <th scope="col">Last update</th>
                        </tr>
                    </thead>
                    <tbody class="support-links">
                        <tr>
                            <th data-label="Subject">
                                <a class="" href="ticketdetail.php" data-subject="STORE OWN MY DOMAIN URGENT" style="cursor:pointer;">
                                    STORE OWN MY DOMAIN URGENT
                                </a>
                            </th>
                            <td data-label="Status">
                                <span class="button-status-active">
                                    <span class="button-status-oval"></span>
                                    <span class="button-status-text">Solved</span>
                                </span>
                            </td>
                            <td data-label="Created">2020-07-11 19:58:59</td>
                            <td class="table-separator"></td>
                            <td data-label="Last updated">2020-07-13 09:31:57</td>
                        </tr>
                        <tr>
                            <th data-label="Subject">
                                <a class="" href="ticketdetail.php" data-subject="SUBDOMAIN" style="cursor:pointer;">
                                    SUBDOMAIN
                                </a>
                            </th>
                            <td data-label="Status">
                                <span class="button-status-active">
                                    <span class="button-status-oval"></span>
                                    <span class="button-status-text">Responded</span>
                                </span>
                            </td>
                            <td data-label="Created">2020-07-09 09:39:16</td>
                            <td class="table-separator"></td>
                            <td data-label="Last updated">2020-07-09 11:44:14</td>
                        </tr>
                        <tr>
                            <th data-label="Subject">
                                <a class="" href="ticketdetail.php" data-subject="OWN HOME PAGE" style="cursor:pointer;">
                                    OWN HOME PAGE
                                </a>
                            </th>
                            <td data-label="Status">
                                <span class="button-status-active">
                                    <span class="button-status-oval"></span>
                                    <span class="button-status-text">Solved</span>
                                </span>
                            </td>
                            <td data-label="Created">2020-02-04 17:28:58</td>
                            <td class="table-separator"></td>
                            <td data-label="Last updated">2020-02-24 09:23:05</td>
                        </tr>
                        <tr>
                            <th data-label="Subject">
                                <a class="" href="ticketdetail.php" data-subject="CHANGE DOMAIN NAME" style="cursor:pointer;">
                                    CHANGE DOMAIN NAME
                                </a>
                            </th>
                            <td data-label="Status">
                                <span class="button-status-active">
                                    <span class="button-status-oval"></span>
                                    <span class="button-status-text">Solved</span>
                                </span>
                            </td>
                            <td data-label="Created">2020-02-09 04:48:21</td>
                            <td class="table-separator"></td>
                            <td data-label="Last updated">2020-02-10 10:43:41</td>
                        </tr>
                        <tr>
                            <th data-label="Subject">
                                <a class="" href="ticketdetail.php" data-subject="MULTIPLE LANGUAGES" style="cursor:pointer;">
                                    MULTIPLE LANGUAGES
                                </a>
                            </th>
                            <td data-label="Status">
                                <span class="button-status-active">
                                    <span class="button-status-oval"></span>
                                    <span class="button-status-text">Responded</span>
                                </span>
                            </td>
                            <td data-label="Created">2020-02-02 22:34:40</td>
                            <td class="table-separator"></td>
                            <td data-label="Last updated">2020-02-05 09:25:05</td>
                        </tr>
                        <tr>
                            <th data-label="Subject">
                                <a class="" href="ticketdetail.php" data-subject="STORE DONT WORK" style="cursor:pointer;">
                                    STORE DONT WORK
                                </a>
                            </th>
                            <td data-label="Status">
                                <span class="button-status-active">
                                    <span class="button-status-oval"></span>
                                    <span class="button-status-text">Responded</span>
                                </span>
                            </td>
                            <td data-label="Created">2020-01-13 13:21:45</td>
                            <td class="table-separator"></td>
                            <td data-label="Last updated">2020-01-13 14:07:26</td>
                        </tr>
                        <tr>
                            <th data-label="Subject">
                                <a class="" href="ticketdetail.php" data-subject="ABOUT MY RENEW" style="cursor:pointer;">
                                    ABOUT MY RENEW
                                </a>
                            </th>
                            <td data-label="Status">
                                <span class="button-status-active">
                                    <span class="button-status-oval"></span>
                                    <span class="button-status-text">Responded</span>
                                </span>
                            </td>
                            <td data-label="Created">2020-01-12 15:17:49</td>
                            <td class="table-separator"></td>
                            <td data-label="Last updated">2020-01-12 16:00:56</td>
                        </tr>
                        <tr>
                            <th data-label="Subject">
                                <a class="" href="ticketdetail.php" data-subject="TEMPLATE HTML" style="cursor:pointer;">
                                    TEMPLATE HTML
                                </a>
                            </th>
                            <td data-label="Status">
                                <span class="button-status-active">
                                    <span class="button-status-oval"></span>
                                    <span class="button-status-text">Solved</span>
                                </span>
                            </td>
                            <td data-label="Created">2019-09-02 16:14:14</td>
                            <td data-label="Last updated">2019-09-02 16:32:48</td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="text-align-center"></div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="submitTicket" tabindex="-1" role="dialog" aria-labelledby="modal-support">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <div class="d-flex align-items-center">
                        <span>Create a new ticket</span>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <form   id="support-form"
                        action="{{ route('client.createTicket') }}"
                        method="post">
                    @csrf
                    <div class="modal-body">
                        <div id="createTicketError" class="alert alert-danger error-text error-summary alert alert-danger hidden"></div>
                        <div class="form-group required">
                            <label class="control-label" for="createticketform-subject">Subject</label>
                            <input  
                                type="text"
                                id="createticketform-subject"
                                class="input"
                                name="subject"
                                maxlength="300"
                                required
                                placeholder="Type your ticket subject"
                                aria-required="true"
                            >
                            <p class="help-block help-block-error"></p>
                        </div>
                        <div class="form-group">
                            <textarea   id="createticketform-message"
                                        class="form-control"
                                        name="problem"
                                        maxlength="1000"
                                        rows="5"
                                        required
                                        placeholder="Please type your problem here..."
                                        aria-required="true">
                            </textarea>
                            <p class="help-block help-block-error"></p>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <label class="attach d-flex align-items-center">
                                <svg height='24' width='24' class='svg-active'>
                                    <use xlink:href='/themes/img/sprite.svg#attach-file'>
                                    </use>
                                </svg>
                                <input  type="hidden"
                                        role="uploadcare-uploader"
                                        name="qs-file"
                                        data-upload-url-base=""
                                        data-integration=""
                                        id="file-uploader"
                                        data-multiple="1"
                                        data-multiple-max="3"
                                        data-max-size="5242880" />
                                <button type="button" class="close button-hidden" style="opacity: 1">
                                    <svg height='18' width='18' >
                                        <use xlink:href='/themes/img/sprite.svg#close-file'>
                                        </use>
                                    </svg>
                                </button>
                            </label>
                        </div>
                        <button type="submit"
                                class="btn send-button purple-button d-flex justify-content-center align-items-center"
                                id="ticketCreate">
                            <span class="text-before-load">Send</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>if (typeof setSize === 'function') {setSize();}if (typeof removeClass === 'function') {removeClass();}</script>
@endsection