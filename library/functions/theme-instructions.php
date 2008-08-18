<?php

function thematic_add_instructions() {
    add_theme_page("Thematic Instructions", "Thematic Instructions", 'edit_themes', basename(__FILE__), 'thematic_instructions');
}

function thematic_instructions() { ?>
    <div class="wrap">
        <h2>Thematic Instructions</h2>
        <p>Donec euismod pharetra massa. Donec molestie dui a libero. Maecenas vel ante. Ut lacinia luctus nisi. Morbi at magna. Donec condimentum. Pellentesque sed leo. Praesent ante sem, feugiat at, commodo et, cursus a, nunc. Donec consectetuer tincidunt lectus. Sed iaculis. Nullam id orci. Donec interdum leo sodales elit. Nam eget magna.</p>
        <h3>Widget-Ready Areas</h3>
        <p>Nullam commodo lorem. Proin tempus cursus magna. Etiam vel lacus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam massa arcu, tincidunt a, malesuada et, feugiat nec, augue. Nullam condimentum. Ut neque. Integer tincidunt, erat et molestie interdum, odio erat egestas urna, non ultricies orci quam sed sem. Donec sollicitudin, nisl dictum tristique aliquam, ipsum sapien dignissim nunc, vel accumsan eros leo at nisl. Nullam non ipsum. Duis sed turpis ut nisi pulvinar aliquet. Nunc pellentesque ornare nulla. Sed mi. Donec et neque. Nulla a augue sit amet est posuere semper. Cras feugiat hendrerit orci. Nam eget libero sed mauris vehicula cursus. Nam dapibus justo non dolor. Nunc sodales leo eget lacus.</p>
        <h3>Contextual Body Classes</h3>
        <p>Duis lacinia. Ut in magna. Sed massa tellus, rhoncus eu, suscipit ut, volutpat et, dui. Sed tempus. Vivamus leo tellus, aliquam a, porttitor in, dictum at, urna. Donec varius dapibus massa. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse potenti. Donec luctus dui nec magna. Pellentesque ac urna a dui convallis pulvinar. Cras sit amet neque. Ut sollicitudin, dolor id fermentum pulvinar, magna odio convallis urna, vel consequat elit magna porttitor dui. Proin ullamcorper.</p>
        <h3>A Note About Child Themes</h3>        
        <p>Integer scelerisque euismod libero. Pellentesque feugiat volutpat elit. Suspendisse rhoncus, felis vel sollicitudin varius, eros libero venenatis tellus, quis viverra orci tortor ut pede. Vivamus quis magna quis urna bibendum pellentesque. Aliquam vestibulum leo in quam. Vestibulum pretium tincidunt mauris. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. In sem. Aenean nulla. Praesent vel elit. In congue adipiscing neque. Mauris in libero. Morbi scelerisque mi sit amet justo. Phasellus ipsum magna, vulputate non, tincidunt eget, commodo quis, tellus.</p>
    </div>
<?php }

add_action('admin_menu' , 'thematic_add_instructions'); 

?>