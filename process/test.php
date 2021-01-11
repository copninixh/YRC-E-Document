<?php
    $myString = 'เนื่องด้วยผู้อำนวยการ นาย';

    if ( strstr( $myString, 'นาย' ) ) {
      echo "Text found";
    } else {
      echo "Text not found";
    }
?>