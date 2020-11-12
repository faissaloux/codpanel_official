@extends('client/layout')
@section('content')
    <div class="container container-white container-settings">
        <div class="container-form account-settings">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-title d-flex justify-content-between align-items-center">
                    <div class="title-name">
                        <h2>Account settings</h2>
                    </div>
                </div>
                <div class="col-12 col-md-8">
                    <form   id="login-form"
                            action="{{ route('client.editSettings') }}"
                            method="post">
                        @csrf
                        <fieldset>
                            <div class="alert alert-danger error-text error-summary alert alert-danger hidden"></div>
                            <div class="form-group">
                                <div class="field-signupform-first_name required">
                                    <label class="control-label" for="settingsform-first_name">First name</label>
                                    <input  type="text"
                                            id="settingsform-first_name"
                                            class="input"
                                            name="firstName"
                                            value="brahim"
                                            placeholder="John"
                                            aria-required="true">
                                    <p class="help-block help-block-error"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="settingsform-last_name">Last name</label>
                                <input  type="text"
                                        id="settingsform-last_name"
                                        class="input"
                                        name="lastName"
                                        value="gallab"
                                        placeholder="Doe"
                                        aria-required="true">
                                <p class="help-block help-block-error"></p>
                            </div>
                            <div class="form-group disable-input">        
                                <label class="control-label" for="settingsform-email">Email</label>
                                <input  type="text"
                                        id="settingsform-email"
                                        class="input"
                                        name="email"
                                        value="gallab2k@gmail.com"
                                        placeholder="Email">

                                <p class="help-block help-block-error"></p>
                                <a href="#" id="changeEmailBtn">Change email</a>
                            </div>
                            <div class="form-group disable-input">
                                <label class="control-label" for="settingsform-password">Password</label>
                                <input  type="text"
                                        id="settingsform-password"
                                        class="input"
                                        name="password"
                                        placeholder="●●●●●●●●●●●●●●●">

                                <p class="help-block help-block-error"></p>
                                <a href="#" id="changePasswordBtn">Change password</a>
                            </div>
                            <div class="form-group">
                                <div>
                                    <div class="d-flex justify-content-between">
                                        <label for="select-timezone">Timezone</label>
                                    </div>
                                    <div class="select-wrapper">
                                        <select id="select-timezone"
                                                class="form-control no-radius"
                                                name="timezone"
                                                aria-required="true">
                                            <option value="-43200">(UTC -12:00) Baker/Howland Island</option>
                                            <option value="-39600">(UTC -11:00) Niue</option>
                                            <option value="-36000">(UTC -10:00) Hawaii-Aleutian Standard Time, Cook Islands, Tahiti</option>
                                            <option value="-34200">(UTC -9:30) Marquesas Islands</option>
                                            <option value="-32400">(UTC -9:00) Alaska Standard Time, Gambier Islands</option>
                                            <option value="-28800">(UTC -8:00) Pacific Standard Time, Clipperton Island</option>
                                            <option value="-25200">(UTC -7:00) Mountain Standard Time</option>
                                            <option value="-21600">(UTC -6:00) Central Standard Time</option>
                                            <option value="-18000">(UTC -5:00) Eastern Standard Time, Western Caribbean Standard Time</option>
                                            <option value="-16200">(UTC -4:30) Venezuelan Standard Time</option>
                                            <option value="-14400">(UTC -4:00) Atlantic Standard Time, Eastern Caribbean Standard Time</option>
                                            <option value="-12600">(UTC -3:30) Newfoundland Standard Time</option>
                                            <option value="-10800">(UTC -3:00) Argentina, Brazil, French Guiana, Uruguay</option>
                                            <option value="-7200">(UTC -2:00) South Georgia/South Sandwich Islands</option>
                                            <option value="-3600">(UTC -1:00) Azores, Cape Verde Islands</option>
                                            <option value="0" selected="">(UTC) Greenwich Mean Time, Western European Time</option>
                                            <option value="3600">(UTC +1:00) Central European Time, West Africa Time</option>
                                            <option value="7200">(UTC +2:00) Central Africa Time, Eastern European Time, Kaliningrad Time</option>
                                            <option value="10800">(UTC +3:00) Moscow Time, East Africa Time, Arabia Standard Time</option>
                                            <option value="12600">(UTC +3:30) Iran Standard Time</option>
                                            <option value="14400">(UTC +4:00) Azerbaijan Standard Time, Samara Time</option>
                                            <option value="16200">(UTC +4:30) Afghanistan</option>
                                            <option value="18000">(UTC +5:00) Pakistan Standard Time, Yekaterinburg Time</option>
                                            <option value="19800">(UTC +5:30) Indian Standard Time, Sri Lanka Time</option>
                                            <option value="20700">(UTC +5:45) Nepal Time</option>
                                            <option value="21600">(UTC +6:00) Bangladesh Standard Time, Bhutan Time, Omsk Time</option>
                                            <option value="23400">(UTC +6:30) Cocos Islands, Myanmar</option>
                                            <option value="25200">(UTC +7:00) Krasnoyarsk Time, Cambodia, Laos, Thailand, Vietnam</option>
                                            <option value="28800">(UTC +8:00) Australian Western Standard Time, Beijing Time, Irkutsk Time</option>
                                            <option value="31500">(UTC +8:45) Australian Central Western Standard Time</option>
                                            <option value="32400">(UTC +9:00) Japan Standard Time, Korea Standard Time, Yakutsk Time</option>
                                            <option value="34200">(UTC +9:30) Australian Central Standard Time</option>
                                            <option value="36000">(UTC +10:00) Australian Eastern Standard Time, Vladivostok Time</option>
                                            <option value="37800">(UTC +10:30) Lord Howe Island</option>
                                            <option value="39600">(UTC +11:00) Srednekolymsk Time, Solomon Islands, Vanuatu</option>
                                            <option value="41400">(UTC +11:30) Norfolk Island</option>
                                            <option value="43200">(UTC +12:00) Fiji, Gilbert Islands, Kamchatka Time, New Zealand Standard Time</option>
                                            <option value="45900">(UTC +12:45) Chatham Islands Standard Time</option>
                                            <option value="46800">(UTC +13:00) Samoa Time Zone, Phoenix Islands Time, Tonga</option>
                                            <option value="50400">(UTC +14:00) Line Island</option>
                                        </select>
                                        <p class="help-block help-block-error"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mb-2">
                                <button type="submit" class="btn purple-button save-changes btn-block">
                                    Save changes
                                </button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection