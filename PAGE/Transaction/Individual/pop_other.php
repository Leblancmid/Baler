<?php
include 'edit_booking_form.php';
?>

<!-- pop pop pop -->
<div class="individual-pop indiv-pop-container other-pop-up">
<input type="hidden" name="booking_id" value="<?php echo $bookingId; ?>">
    <div class="pop-other">
        <div class="content">
            <p class="record-subheading">
                <i class="fa-solid fa-door-closed"></i>
                <span>Other</span>
                <button type="button" class="close-button">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </p>
            <div class="other-pop-options">
                <button class="pax-option">
                    <i class="fa-solid fa-person-circle-plus"></i>
                    <p>Update Additional Pax</p>
                </button>
                <button class="amenities-option">
                    <i class="fa-solid fa-layer-group"></i>
                    <p>Update Amenities Selected</p>
                </button>
                <button class="id-option">
                    <i class="fa-solid fa-id-card"></i>
                    <p>Update PWD/Senior ID Record</p>
                </button>
                <button class="penalty-option">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <p>Update Penalty Record</p>
                </button>
            </div>

            <form class="other-content-1">
                <div class="selected-room-list">
                    <div class="selected-room">
                        <div class="selected-room-info">
                            <div class="room-IMAGES">
                                <img src="../../../IMAGES/nab.jpg" alt="" class="actual-IMAGES">
                            </div>
                            <div class="room-text">
                                <div class="room-details">
                                    <div class="room-heading">
                                        <p class="pax-number">Adriane Room</p>
                                        <p class="room-type">[BIG ROOM]</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="add-pax-container">
                            <label for="add-pax">Additional Pax:</label>
                            <div class="add-pax-input">
                                <button type="button" class="minus">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                                <input type="text" class="add-pax" value="0">
                                <button type="button" class="add">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="selected-room">
                        <div class="selected-room-info">
                            <div class="room-IMAGES">
                                <img src="../../../IMAGES/hao.jpg" alt="" class="actual-IMAGES">
                            </div>
                            <div class="room-text">
                                <div class="room-details">
                                    <div class="room-heading">
                                        <p class="pax-number">Hao Room</p>
                                        <p class="room-type">[BIG ROOM]</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="add-pax-container">
                            <label for="add-pax">Additional Pax:</label>
                            <div class="add-pax-input">
                                <button type="button" class="minus">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                                <input type="text" class="add-pax" value="0">
                                <button type="button" class="add">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <p class="note"><span>Note:</span> max of 2 addtional pax per room only</p>
                </div>
                <div class="individual-pop-button">
                    <button type="button" class="cancel">cancel</button>
                    <button type="button" class="update-room">save</button>
                </div>
            </form>

            <form class="other-content-2">
                <div class="details-input">
                    <p>Amenities:</p>
                    <div class="input-container">
                        <div class="amenities-option">
                            <input type="radio" name="choice" value="none" id="noneAmenities" checked>
                            <label for="noneAmenities">No</label>
                            <input type="radio" name="choice" value="yes" id="yesAmenities">
                            <label for="yesAmenities">Add</label>
                        </div>
                        <div class="checkbox-container">
                            <div class="flex">
                                <input type="checkbox" name="option" id="gasul" value="gasul">
                                <label for="gasul">
                                    <span class="checked-amenities">✔</span>
                                    Gasul
                                </label>
                                <span>₱ 300</span>
                            </div>
                            <div class="flex">
                                <input type="checkbox" name="option" id="karaoke" value="karaoke">
                                <label for="karaoke">
                                    <span class="checked-amenities">✔</span>
                                    Karaoke
                                </label>
                                <span>₱ 500</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="individual-pop-button">
                    <button type="button" class="cancel">cancel</button>
                    <button type="button" class="update-room">save</button>
                </div>
            </form>

            <form action="" class="other-content-3">
                <div class="details-input">
                    <p>Senior Citizen/PWDs:</p>
                    <div id="input-container">
                        <!-- for id -->
                        <!-- <div class="id-container">
                                    <input type="text" placeholder="ID Number">
                                    <select name="idType">
                                        <option value="idPWD">PWD</option>
                                        <option value="idSenior">Senior</option>
                                    </select>
                                    <button type="button" class="id-remove">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </div> -->
                    </div>
                    <div class="id-count">
                        <button type="button" id="add-id">Add ID</button>
                    </div>
                </div>
                <div class="individual-pop-button">
                    <button type="button" class="cancel">cancel</button>
                    <button type="button" class="update-room">save</button>
                </div>
            </form>

            <form action="" class="other-content-4">
                <div class="penalty-record-list">
                    <div class="penalty-record">
                        <div class="main-record">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <div class="penalty-info">
                                <p class="penalty-name">Damage Bed</p>
                                <p class="penalty-category">[PROPERY]</p>
                            </div>
                            <p class="penalty-price">₱ 0,000.00</p>
                        </div>
                        <button class="remove">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <div class="penalty-record">
                        <div class="main-record">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <div class="penalty-info">
                                <p class="penalty-name">Damage Bed</p>
                                <p class="penalty-category">[PROPERY]</p>
                            </div>
                            <p class="penalty-price">₱ 0,000.00</p>
                        </div>
                        <button class="remove">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <div class="penalty-record">
                        <div class="main-record">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <div class="penalty-info">
                                <p class="penalty-name">Damage Bed</p>
                                <p class="penalty-category">[PROPERY]</p>
                            </div>
                            <p class="penalty-price">₱ 0,000.00</p>
                        </div>
                        <button class="remove">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <div class="penalty-record">
                        <div class="main-record">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <div class="penalty-info">
                                <p class="penalty-name">Damage Bed</p>
                                <p class="penalty-category">[PROPERY]</p>
                            </div>
                            <p class="penalty-price">₱ 0,000.00</p>
                        </div>
                        <button class="remove">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <div class="penalty-record">
                        <div class="main-record">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <div class="penalty-info">
                                <p class="penalty-name">Damage Bed</p>
                                <p class="penalty-category">[PROPERY]</p>
                            </div>
                            <p class="penalty-price">₱ 0,000.00</p>
                        </div>
                        <button class="remove">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <p>click here to add penalty to the record <button class="penalty">ADD PENALTY</button> </p>
                </div>
                <div class="individual-pop-button">
                    <button type="button" class="cancel">cancel</button>
                    <button type="button" class="update-room">save</button>
                </div>
            </form>
        </div>
    </div>
</div>