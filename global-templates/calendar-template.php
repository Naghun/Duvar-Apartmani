<div class="row d-flex justify-content-center align-items-center calendar-container"><!-- .row -->
            <div class="reservation-overlay d-none col-7 d-flex flex-column justify-content-center align-items-center" id="calendar-container">
                <div class="calendars d-flex">
                    <div class="calendar1 d-flex flex-column justify-content-center align-items-center">
                        <div class="header-calendar d-flex align-items-center justify-content-between">
                            <!-- header -->
                            <button class="prev">Prev</button>
                            <select class="month-input">
                                <option>Januar</option>
                                <option>Februar</option>
                                <option>Mart</option>
                                <option>April</option>
                                <option>Maj</option>
                                <option>Juni</option>
                                <option>Juli</option>
                                <option>August</option>
                                <option>Septembar</option>
                                <option>Oktobar</option>
                                <option>Novembar</option>
                                <option>Decembar</option>
                            </select>
                            <input type="number" class="year-input">
                            <button class="next">Next</button>
                        </div>
                        <div class="days p-3">
                            <span>Mon</span>
                            <span>Tue</span>
                            <span>Wed</span>
                            <span>Thu</span>
                            <span>Fri</span>
                            <span>Sat</span>
                            <span>Sun</span>
                        </div>
                            <!-- header -->
                        <div class="dates"></div>
                    </div>

                    <!-- drugi -->

                    <div class="calendar2 d-flex flex-column justify-content-center align-items-center">
                        <div class="header-calendar2 d-flex align-items-center justify-content-between">
                            <!-- header -->
                            <button class="prev2">Prev</button>
                            <select class="month-input2">
                                <option>Januar</option>
                                <option>Februar</option>
                                <option>Mart</option>
                                <option>April</option>
                                <option>Maj</option>
                                <option>Juni</option>
                                <option>Juli</option>
                                <option>August</option>
                                <option>Septembar</option>
                                <option>Oktobar</option>
                                <option>Novembar</option>
                                <option>Decembar</option>
                            </select>
                            <input type="number" class="year-input2">
                            <button class="next2">Next</button>
                        </div>
                        <div class="days2 p-3">
                            <span>Mon</span>
                            <span>Tue</span>
                            <span>Wed</span>
                            <span>Thu</span>
                            <span>Fri</span>
                            <span>Sat</span>
                            <span>Sun</span>
                        </div>
                            <!-- header -->
                        <div class="dates2"></div>
                    </div>
                </div>
                <div class="footer-calendar">
                    <button class="cancel" id="close-calendar">Otkaži</button>
                    <button class="apply" id="apply-calendar">Potvrdi</button>
                </div>
            </div>
        </div><!-- .row -->