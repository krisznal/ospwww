<div class="top-bar">
    <ul>
        <li><img src="images/home.png" alt="Address">Dewi Sri Street. 2891, Denpasar, Bali</li>
        <li><img src="images/phone.png" alt="Phone number">(+62) 8896-2220</li>
        <li><img src="images/clock.png" alt="Clock">Everyday 24 Hours</li>
    </ul>
</div>
<?php
$menu = getStructurizedNavigationItems();
?>
<nav>
    <div class="nav-left">
        <img src="images/logo.png" alt="Logo" class="logo">
    </div>
    <?php renderMenu(null, $menu); ?>
    <div class="nav-right">
        <div class="emergency-box">
            <img src="images/phone2.png" alt="Call icon" />
            <div class="emergency-text">
                <div class="phone-number">121-0000-200</div>
                <div class="tagline">For Emergency!</div>
            </div>
        </div>
    </div>
</nav>