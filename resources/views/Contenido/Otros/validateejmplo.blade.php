 <form id="register-form" novalidate>
                <div class="col-lg-8 col-sm-10 center-block">
                    <label>Full Name</label><span class="status" id="name-status"></span>
                    <input type="text" name="name" placeholder="Full Name" data-validation="req len:0-45 regex:name">

                    <label>Username</label><span class="status" id="username-status"></span>
                    <input type="text" name="username" placeholder="Username" data-validation="req len:3-15 regex:username">

                    <div class="col-xs-12 no-padding">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Gender</label><span class="status" id="gender-status"></span>
                            </div>
                            <div class="col-xs-4 radio-buttons">
                                <label>Female</label>
                                <input type="radio" name="gender" value="female" data-validation="radio:gender">
                            </div>
                            <div class="col-xs-4 radio-buttons">
                                <label>Male</label>
                                <input type="radio" name="gender" value="male" data-validation="radio:gender">
                            </div>
                            <div class="col-xs-4 radio-buttons">
                                <label>Other</label>
                                <input type="radio" name="gender" value="other" data-validation="radio:gender">
                            </div>
                        </div>
                    </div>

                    <label>Email</label><span class="status" id="email-status"></span>
                    <input type="email" name="email" placeholder="Email" data-validation="len:0-50 regex:email or:phone:Phone">

                    <label>Phone</label><span class="status" id="phone-status"></span>
                    <input type="tel" name="phone" placeholder="Phone" data-validation="len:0-15 regex:phone or:email:Email"/>

                    <label>Add a Message</label><span class="status" id="message-status"></span>
                    <textarea name="message" placeholder="Message" data-validation="len:0-500"></textarea>

                    <div class="col-xs-12 no-padding">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Contact Me Via</label><span class="status" id="contact-status"></span>
                            </div>
                            <div class="col-xs-4 checkboxes">
                                <label>Phone</label>
                                <input type="checkbox" name="contact" value="phone" data-validation="checkbox:contact:1-2">
                            </div>
                            <div class="col-xs-4 checkboxes">
                                <label>Email</label>
                                <input type="checkbox" name="contact" value="email" data-validation="checkbox:contact:1-2">
                            </div>
                            <div class="col-xs-4 checkboxes">
                                <label>Owl Post</label>
                                <input type="checkbox" name="contact" value="owl-post" data-validation="checkbox:contact:1-2">
                            </div>
                        </div>
                    </div>

                    <label>State</label><span class="status" id="state-status"></span>
                    <select name="state" data-validation="select-req">
                        <option value="def">Select a State...</option>
                        <option value="QLD">Queensland</option>
                        <option value="NSW">New South Wales</option>
                        <option value="ACT">Australian Capital Territory</option>
                        <option value="VIC">Victoria</option>
                        <option value="TAS">Tasmania</option>
                        <option value="SA">South Australia</option>
                        <option value="NT">Northern Territory</option>
                        <option value="WA">Western Australia</option>
                    </select>

                    <label>Password</label><span class="status" id="password-status"></span>
                    <input type="password" name="password" placeholder="Password" data-validation="req len:8-25">

                    <label>Confirm Password</label><span class="status" id="confirmpassword-status"></span>
                    <input type="password" name="confirmpassword" placeholder="Confirm Password" data-validation="req len:8-25 match:password">

                    <div class="center">
                        <button class="submit" type="submit" id="register-submit">Submit</button>
                    </div>
                </div>
            </form>