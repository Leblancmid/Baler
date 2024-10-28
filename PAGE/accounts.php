<?php
include 'accounts_form.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard | Baler Nina</title>
    <script src="https://kit.fontawesome.com/d8f0503c9b.js" crossorigin="anonymous"></script>
    <script src="../JS/script.js"></script>
    <script src="../JS/accounts.js"></script>
    <link rel="icon" href="../IMAGES/Asset 7 (2)@4x.png"><!--icon tab-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script><!--chart-->
    <link rel="stylesheet" href="../CSS/newstyle.css" />
</head>

<body>
    <div class="main-container">
        <div class="side-nav">
            <div class="side-banner">
                <img src="../IMAGES/Asset 7 (2)@4x.png" />
                <img src="../IMAGES/Asset 10@4x.png" />
            </div>
            <div class="side-nav-content">
                <div class="navigation">
                    <a href="Index/dashboard.php">
                        <i class="fa-solid fa-chart-line"></i>
                        <p>Dashboard</p>
                    </a>
                    <a href="Transaction/booking.php">
                        <i class="fa-solid fa-bars-progress"></i>
                        <p>Transaction</p>
                    </a>
                    <a class="active-nav" href="accounts.php">
                        <i class="fa-solid fa-user"></i>
                        <p>Accounts</p>
                    </a>
                    <a href="#">
                        <i class="fa-solid fa-window-restore"></i>
                        <p>Content Control</p>
                    </a>
                    <a href="#">
                        <i class="fa-solid fa-file-lines"></i>
                        <p>Reports</p>
                    </a>
                    <a href="#">
                        <i class="fa-brands fa-font-awesome"></i>
                        <p>Logs</p>
                    </a>
                </div>
                <button type="button" class="navsize-button">
                    <i class="fa-solid fa-arrow-left"></i>
                </button>
            </div>
        </div>
        <div class="container">
            <div class="header">
                <div class="main-header">
                    <p class="heading-1">
                        <i class="fa-regular fa-user"></i>
                        Account Management
                    </p>
                    <button class="user-icon">
                        <img src="../IMAGES/nab.jpg" />
                        <i class="fa-solid fa-chevron-down"></i>
                    </button>
                    <div class="drop-down drop-animate">
                        <p class="user-name">Adriane Nabong</p>
                        <div class="button">
                            <a href="#">
                                <i class="fa-solid fa-user-gear"></i>
                                ACCOUNT
                            </a>
                            <a href="#">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                SIGN OUT
                            </a>
                        </div>
                    </div>
                </div>
                <div class="sub-header">
                    <p class="weekdays">MON</p>
                    <p class="date">June 10, 2024</p>
                    <p class="time">2:00</p>
                    <p class="am-pm">PM</p>
                </div>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                <div class="user-account-container">
                    <div class="user-info image-pop-up">
                        <p class="label">Profile Picture</p>
                        <div class="main-image-container">
                            <div class="user-image">
                                <img src="../IMAGES/<?php echo htmlspecialchars($user['profile_picture']); ?>" alt="Profile Picture">
                                <input type="file" name="profile_picture">
                                <input type="hidden" name="existing_profile_picture" value="<?php echo htmlspecialchars($user['profile_picture']); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="user-info name-pop-up">
                        <div class="info-content">
                            <p class="label">Name:</p>
                            <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
                        </div>
                    </div>

                    <div class="user-info username-pop-up">
                        <div class="info-content">
                            <p class="label">Username:</p>
                            <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
                        </div>
                    </div>

                    <div class="user-info email-pop-up">
                        <div class="info-content">
                            <p class="label">Email:</p>
                            <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                        </div>
                    </div>

                    <div class="user-info password-pop-up">
                        <div class="info-content">
                            <p class="label">Password:</p>
                            <input type="password" name="password" placeholder="Leave blank to keep current password">
                            <input type="hidden" name="existing_password" value="<?php echo htmlspecialchars($user['password']); ?>">
                        </div>
                    </div>

                    <button type="submit">Update</button>
                </div>
            </form>

            <!-- pop ups -->
            <!-- for image -->
            <div class="pop-up-container pop-up-image">
                <div class="pop-image">
                    <p class="heading">Update profile picture</p>
                    <label id="image-input" class="main-image-container">
                        <div class="user-image">
                            <img id="image-preview" src="../IMAGES/.jpeg" alt="Image preview">
                            <input type="file" id="image-input" accept="image/*">
                            <span>
                                <i class="fa-solid fa-camera"></i>
                                upload image
                            </span>
                        </div>
                    </label>
                    <div class="account-button">
                        <button class="change-cancel">
                            <i class="fa-solid fa-xmark"></i>
                            cancel
                        </button>
                        <button class="change-save">
                            <i class="fa-solid fa-check"></i>
                            save
                        </button>
                    </div>
                </div>
            </div>
            <!-- for name -->
            <div class="pop-up-container pop-up-name">
                <div class="pop-name">
                    <p class="heading">Update name</p>
                    <div class="name-container">
                        <div class="user-info">
                            <label for="firstName">First Name</label>
                            <input type="text" id="firstName" placeholder="michael">
                            <span class="warning">warning</span>
                        </div>
                        <div class="user-info">
                            <label for="middleName">Middle Name <span>(optional)</span></label>
                            <input type="text" id="middleName" placeholder="adriane">
                        </div>
                        <div class="user-info">
                            <label for="lastName">Last Name</label>
                            <input type="text" id="lastName" placeholder="nabong">
                            <span class="warning">warning</span>
                        </div>
                    </div>
                    <div class="account-button">
                        <button class="change-cancel">
                            <i class="fa-solid fa-xmark"></i>
                            cancel
                        </button>
                        <button class="change-save">
                            <i class="fa-solid fa-check"></i>
                            save
                        </button>
                    </div>
                </div>
            </div>
            <!-- for username -->
            <div class="pop-up-container pop-up-username">
                <div class="pop-username">
                    <p class="heading">Update username</p>
                    <div class="user-info">
                        <label for="userName">Username</label>
                        <input type="text" id="userName" placeholder="michael123">
                        <span class="warning">warning</span>
                    </div>
                    <div class="account-button">
                        <button class="change-cancel">
                            <i class="fa-solid fa-xmark"></i>
                            cancel
                        </button>
                        <button class="change-save">
                            <i class="fa-solid fa-check"></i>
                            save
                        </button>
                    </div>
                </div>
            </div>
            <!-- for email -->
            <div class="pop-up-container pop-up-email">
                <div class="pop-email">
                    <p class="heading">Update email</p>
                    <div class="user-info">
                        <label for="userEmail">Email</label>
                        <input type="text" id="userEmail" placeholder="michael@gmail.com">
                        <span class="warning">warning</span>
                    </div>
                    <div class="account-button">
                        <button class="change-cancel">
                            <i class="fa-solid fa-xmark"></i>
                            cancel
                        </button>
                        <button class="change-save">
                            <i class="fa-solid fa-check"></i>
                            save
                        </button>
                    </div>
                </div>
            </div>
            <!-- for password -->
            <!-- password attempt pop up -->
            <div class="pop-up-container pop-up-password-one">
                <div class="pop-password-one">
                    <p class="heading">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        Account Verification
                    </p>
                    <div class="user-info">
                        <label for="userPassword">Password</label>
                        <input type="text" id="userPassword" placeholder="Enter password">
                        <span class="warning">warning</span>
                    </div>
                    <div class="account-button">
                        <button class="change-cancel">
                            <i class="fa-solid fa-xmark"></i>
                            cancel
                        </button>
                        <button class="change-save password pass-proceed">
                            <i class="fa-solid fa-arrow-right"></i>
                            proceed
                        </button>
                    </div>
                </div>
            </div>

            <div class="pop-up-container pop-up-password-two">
                <div class="pop-password-two">
                    <p class="heading">Update password</p>
                    <div class="name-container">
                        <div class="user-info">
                            <label for="newPassword">New Password</label>
                            <input type="text" id="newPassword" placeholder="enter new password">
                            <span class="warning">warning</span>
                        </div>
                        <div class="user-info">
                            <label for="reNewPass">Re-enter New Password</label>
                            <input type="text" id="reNewPass" placeholder="re enter new password">
                            <span class="warning">warning</span>
                        </div>
                    </div>
                    <div class="account-button">
                        <button class="change-cancel">
                            <i class="fa-solid fa-xmark"></i>
                            cancel
                        </button>
                        <button class="change-save">
                            <i class="fa-solid fa-check"></i>
                            save
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>