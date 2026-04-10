<?php


function priority($type)
{
    if ($type == "high") {
        return "danger";
    } elseif ($type == "medium") {
        return "warning";
    } else {

        return "success";
    }
}
