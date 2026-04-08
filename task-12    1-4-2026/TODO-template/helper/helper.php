<?php

function priorityBadge($p)
{
    return match ($p) {
        "high" => "danger",
        "medium" => "warning",
        "low" => "success"
    };
}
