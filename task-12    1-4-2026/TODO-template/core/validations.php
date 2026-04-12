<?php



function validateRequired($value, $fieldName)
{
    return empty($value) ? "$fieldName is required" : null;
}


function fieldSanitization($value)
{
    return htmlspecialchars(trim($value));
}
function validate_title_length($value)
{
    if (strlen($value) < 10 || strlen($value) > 30) {
        return 'Title must be between 10 and 30 characters.';
    }
}
function validate_priority($value)
{
    $allowed_priority = ['low', 'medium', 'high'];
    if (!in_array($value, $allowed_priority)) {
        return 'Priority must be one of: low, medium, high';
    }
}

function validate_task($title, $priority)
{
    $fields = [
        "title" => $title,
        "priority" => $priority
    ];
    $error = [];
    foreach ($fields as $fieldName => $value) {
        if ($msg = validateRequired($value, $fieldName)) {
            $error = [
                'fieldName' => $fieldName,
                'msg' => $msg
            ];
            return $error;
        }
    }

    if ($msg = validate_title_length($title)) {
        $error = [
            'fieldName' => 'title',
            'msg' => $msg
        ];
        return $error;
    }

    if ($msg = validate_priority($priority)) {
        $error = [
            'fieldName' => 'priority',
            'msg' => $msg
        ];
        return $error;
    }
}
