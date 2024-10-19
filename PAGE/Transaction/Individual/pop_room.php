<div class="individual-pop indiv-pop-container room-pop-up">
    <div class="pop-room">
        <div class="content">
            <p class="record-subheading">
                <i class="fa-solid fa-door-closed"></i>
                <span>Room Details</span>
                <button type="button" class="close-button">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </p>

            <div class="room-pop-options">
                <button class="room-option">
                    <i class="fa-solid fa-door-open"></i>
                    <p>Update Room Selected</p>
                </button>
                <button class="check-date-option">
                    <i class="fa-solid fa-calendar-days"></i>
                    <p>Update Check-in and Check-out dates</p>
                </button>
            </div>

            <form class="room-content-1" action="">
                <div class="calendar-form">
                    <div class="calendar" id="currentMonthCalendar">
                        <div class="calendar-header">
                            <div class="calendar-btn prev">
                                <i class="fa-solid fa-angle-left"></i>
                            </div>
                            <div class="calendar-month"></div>

                            <div class="calendar-btn today">
                                <i class="fa-solid fa-calendar-day"></i>
                            </div>
                        </div>
                        <div class="weekdays">
                            <div>Sun</div>
                            <div>Mon</div>
                            <div>Tue</div>
                            <div>Wed</div>
                            <div>Thu</div>
                            <div>Fri</div>
                            <div>Sat</div>
                        </div>
                        <div class="days">

                        </div>
                    </div>


                    <div class="calendar" id="nextMonthCalendar">
                        <div class="calendar-header">
                            <div class="calendar-btn btn-disabled">
                                <i class="fa-solid fa-calendar-day"></i>
                            </div>
                            <div class="calendar-month"></div>
                            <div class="calendar-btn">
                                <div class="btn next">
                                    <i class="fa-solid fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="weekdays">
                            <div>Sun</div>
                            <div>Mon</div>
                            <div>Tue</div>
                            <div>Wed</div>
                            <div>Thu</div>
                            <div>Fri</div>
                            <div>Sat</div>
                        </div>
                        <div class="days">
                        </div>
                    </div>

                    <input type="hidden" name="price" value="<?php echo $_POST['price'] ?? ''; ?>">
                    <input type="hidden" name="startDate" id="startDate"
                        value="<?php echo $_GET['startDate'] ?? ''; ?>">
                    <input type="hidden" name="endDate" id="endDate" value="<?php echo $_GET['endDate'] ?? ''; ?>">
                </div>
                <div class="individual-pop-button">
                    <button type="button" class="cancel">cancel</button>
                    <button type="button" class="update-date">save</button>
                </div>
            </form>


            <form class="room-content-2" action="">
                <div class="form-navigation">
                    <a href="#" class="active-room" data-filter="all">All</a>
                    <a href="#" data-filter="small">Small</a>
                    <a href="#" data-filter="big">Big</a>
                    <a href="#" data-filter="sweet">Sweet</a>
                </div>
                <div class="room-list">
                    <div class="room">
                        <label for="room-1">
                            <div class="room-IMAGES">
                                <img class="actual-IMAGES" src="../../../IMAGES/prec.jpg" />
                            </div>
                            <div class="room-text">
                                <div class="room-details">
                                    <div class="room-heading">
                                        <p class="pax-number">Precious Room</p>
                                        <p class="room-type">SMALL ROOM</p>
                                    </div>
                                </div>
                                <p class="room-price">₱ 1,200<span>.00</span></p>
                            </div>
                        </label>
                        <input class="room-selection" type="checkbox" id="room-1" name="room-selection" value="room-1">
                    </div>
                    <div class="room">
                        <label for="room-2">
                            <div class="room-IMAGES">
                                <img class="actual-IMAGES" src="../../../IMAGES/hao.jpg" />
                            </div>
                            <div class="room-text">
                                <div class="room-details">
                                    <div class="room-heading">
                                        <p class="pax-number">Haooo Room</p>
                                        <p class="room-type">SMALL ROOM</p>
                                    </div>
                                </div>
                                <p class="room-price">₱ 1,200<span>.00</span></p>
                            </div>
                        </label>
                        <input class="room-selection" type="checkbox" id="room-2" name="room-selection" value="room-2">
                    </div>

                    <div class="room">
                        <label for="room-3">
                            <div class="room-IMAGES">
                                <img class="actual-IMAGES" src="../../../IMAGES/shayne.jpeg" />
                            </div>
                            <div class="room-text">
                                <div class="room-details">
                                    <div class="room-heading">
                                        <p class="pax-number">Shayne Room</p>
                                        <p class="room-type">SMALL ROOM</p>
                                    </div>
                                </div>
                                <p class="room-price">₱ 1,200<span>.00</span></p>
                            </div>
                        </label>
                        <input class="room-selection" type="checkbox" id="room-3" name="room-selection" value="room-3">
                    </div>
                    <div class="room">
                        <label for="room-4">
                            <div class="room-IMAGES">
                                <img class="actual-IMAGES" src="../../../IMAGES/nab.jpg" />
                            </div>
                            <div class="room-text">
                                <div class="room-details">
                                    <div class="room-heading">
                                        <p class="pax-number">Adriane Room</p>
                                        <p class="room-type">BIG ROOM</p>
                                    </div>
                                </div>
                                <p class="room-price">₱ 1,200<span>.00</span></p>
                            </div>
                        </label>
                        <input class="room-selection" type="checkbox" id="room-4" name="room-selection" value="room-4">
                    </div>
                    <div class="room">
                        <label for="room-5">
                            <div class="room-IMAGES">
                                <img class="actual-IMAGES" src="../../../IMAGES/jeff.jpg" />
                            </div>
                            <div class="room-text">
                                <div class="room-details">
                                    <div class="room-heading">
                                        <p class="pax-number">Jeff Room</p>
                                        <p class="room-type">SWEET ROOM</p>
                                    </div>
                                </div>
                                <p class="room-price">₱ 1,200<span>.00</span></p>
                            </div>
                        </label>
                        <input class="room-selection" type="checkbox" id="room-5" name="room-selection" value="room-5">
                    </div>
                </div>
                <div class="individual-pop-button">
                    <button type="button" class="cancel">cancel</button>
                    <button type="button" class="update-room">save</button>
                </div>
            </form>
        </div>
    </div>
</div>