$(document).ready(function(){
    $('.nav').html(`
    <div class="navRow">
        <div class="navColumn">
            <div class="toggle">
                <i class="fas fa-bars mobileMenu" area-hidden="true"></i>
            </div>
            <ul>
                <li><a href = "index.html">Home</a></li>
                <li><a href = "about.html">About</a></li>
                <li><a href = "floorPlans.html">Floor Plans</a></li>
                <li><a href = "gallery.html">Gallery</a></li>
                <li><a href = "contact.php">Contact</a></li>
            </ul>
        </div>
    </div>
    `);

         // COLLAPSEABLE MENU
     $('.mobileMenu').click(function(){
        $('ul').toggleClass('active');
    });
})
