<?php

echo " هل تقصد هذا :  " .htmlspecialchars( htmlentities(filter_var($MA_Params,FILTER_SANITIZE_STRING,FILTER_SANITIZE_STRING)));