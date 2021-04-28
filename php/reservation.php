        <!-- Flat make resvervation -->
        <section class="flat-row flat-make-res index-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="reservation-page-right">
                            <img src="images/maketrevation/1.png" class="img-responsive" alt="reservation-banner">
                        </div>
                    </div>
                    <!--col-md-5-->

                    <div class="col-md-7">
                        <div class="reservation-page-left">

                            <div class="reservation-page-form">

                                <div class="title-section">
                                    <div class="top-section">
                                        <p>Karavan Restaurant</p>
                                    </div>
                                    <h1 class="title">Business Hours</h1>
                                </div>

                                <?php 
                                require_once "admin/Database/MenuConnection.php";
                                $con = MenuConnection::getInstance();
                                $businessHours = $con->getBusinessHours();
                                ?>
                                <ul style="margin-top: 10px; margin-bottom: 25px">
                                    <li>Monday to Friday <span><?php echo $businessHours[0]["Hours"]; ?></span> </li>
                                    <li style="padding-left: 10px;">Saturday to Sunday <span><?php echo $businessHours[1]["Hours"]; ?></span></li>
                                </ul>

                                <h1 class="phone">+603 3678 910</h1>

                                <h3 style="margin-bottom: 20px;"><span>Order Online</span></h3>
                                <div class="foodpanda-button">
                                    <button type="submit" class="book-now-btn">Find us on FoodPanda</button>
                                </div>
                                <div class="grabfood-button">
                                    <button type="submit" class="book-now-btn">Find us on GrabFood</button>
                                </div>

                                <style>
                                    .foodpanda-button {
                                        padding-bottom: 6px;
                                    }
                                    .foodpanda-button button,
                                    .grabfood-button button {
                                        width: 100%;
                                    }
                                    .foodpanda-button button {
                                        background: #D60265;
                                        border-color: #D60265;
                                    }
                                    .foodpanda-button button:hover {
                                        background: #e9026e;
                                        border-color: #e9026e;
                                    }
                                    .grabfood-button button {
                                        background: #1AAE48;
                                        border-color: #1AAE48;
                                    }
                                    .grabfood-button button:hover {
                                        background: #1dc451;
                                        border-color: #1dc451;
                                    }
                                </style>
                                <!--<form id="reservation-form" action="http://corpthemes.com/html/sumi/contact/contact-process.php">
                                    <div class="reservation-page-input-box">
                                        <label>Your name</label>
                                        <input type="text" class="form-control" placeholder="Full name" name="name" id="form-name" data-error="Subject field is required" required="">
                                    </div>
                                    <div class="reservation-page-input-box">
                                        <label>Time</label>
                                        <span class="fa fa-calendar date_picker" aria-hidden="true">
                                            <input type="text" placeholder="03/09/2017" name="datepicker" id="date-picker" data-error="Subject field is required" required="">
                                        </span>
                                        <span class="fa fa-clock-o time_picker" aria-hidden="true">
                                            <input type="text" placeholder="06:00" name="timepicker" id="time-picker" data-error="Subject field is required" required="">
                                        </span>
                                    </div>
                                    <div class="reservation-page-input-box">
                                        <label>Phone number</label>
                                        <input type="text" class="form-control" placeholder="Your phone" name="phone" id="form-phone" data-error="Subject field is required" required="">
                                    </div>
                                    <div class="reservation-page-input-box">
                                        <label>Seats</label>
                                        <input type="text" class="form-control rt-date" placeholder="6 persons" name="date" id="form-date" data-error="Subject field is required" required="">
                                    </div>

                                    <div class="reservation-booking">
                                        <button type="submit" class="book-now-btn">Booking now</button>
                                    </div>

                                </form>-->
                            </div>

                        </div>
                    </div>
                    <!--col-md-7-->
                </div>
                <!--row-->
            </div>
            <!--container -->
        </section>