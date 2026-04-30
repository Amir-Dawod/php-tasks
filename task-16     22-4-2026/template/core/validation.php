

<?php


function validateRequired( string  $value, string $fieldName)
{
    return empty($value) ? "$fieldName is required" : null;
}





function validatePrice(int|float $price) :int|float
{
    return  is_numeric($price) ? null : 'invalid Price';
}



function validateImage(string $imageExtension,int  $imageSize,string $imageTmpName)
{

    $allowedExtensions = ['png', 'jpg', 'jpeg', 'svg'];
    $maxSize = 2 * 1024 * 1024;

    if (!in_array($imageExtension, $allowedExtensions)) {
        return "Image extension not supported. Please use: " . implode(' , ', $allowedExtensions);
    }
    if ($imageSize > $maxSize) {
        return "The image size is too large, maximum 2MB";
    }



    if (empty($imageTmpName) && !is_uploaded_file($imageTmpName)) {
        return "The file is invalid";
    }
}

function validateProduct(string $name, int $price, string $imageName,string $description, string $type,string $imageTmpName,string $imageExtension, int $imageSize)
{
    $fields = [
        "name" => $name,
        "price" => $price,
        "image" => $imageName,
        "description" => $description,
        "type" => $type


    ];
    foreach ($fields as $fieldName => $value) {
        if ($error = validateRequired($value, $fieldName)) {
            return $error;
        }
    }
    if ($error = validateImage($imageExtension, $imageSize, $imageTmpName)) {
        return $error;
    }
}


