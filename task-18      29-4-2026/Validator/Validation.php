<?php




class  Validation
{

    private array $errors = [];

    public function validate(array $data, array $ruleFields)
    {


        foreach ($ruleFields as $field => $rules) {

            $value = $data[$field] ?? '';

            foreach ($rules as $rule) {

                $ruleParts = explode(":", $rule);

                $ruleName  = $ruleParts[0];
                $ruleValue = $ruleParts[1] ?? null;

                switch ($ruleName) {
                    case "required":
                        $this->required($field, $value);
                        break;
                    case "string":
                        $this->validateString($field, $value);
                        break;
                    case "email":
                        $this->validateEmail($field, $value);
                        break;
                    case "phone":
                        $this->validatePhone($field, $value);
                        break;
                    case "min":
                        $this->min($field, $value, $ruleValue);
                        break;
                    case "max":
                        $this->max($field, $value, $ruleValue);
                        break;

                    case "password":
                        $this->validatePassword($field, $value);
                        break;
                    case "password_match":
                        $this->checkPassword($field, $data['password'], $value);
                        break;
                }
                if (!empty($this->errors[$field])) {
                    continue 2;  // Exit Current Rules Loop And Move To Next Field

                }
            }
        }
    }

    public function required(string $fieldName, string $value)
    {
        if (empty($value)) {
            $this->errors[$fieldName][] = "$fieldName is required";
        }
    }



    public function validateString(string $field, string $value)
    {
        if (!preg_match("/^[a-zA-Z 0-9]+$/", $value)) {
            $this->errors[$field][] = "invalid Name";
        }
    }


    public function validateEmail(string $field, string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field][] = "invalid Email";
        }
    }



    public function validatePhone(string $fieldName, string $value)
    {
        if (!preg_match("/^\+[0-9 ( ) -]+$/", $value)) {
            $this->errors[$fieldName][] = "invalid Phone";
        }
    }




    public function min(string $fieldName, string $value, string $minValue)
    {
        if (strlen($value) < $minValue) {
            $this->errors[$fieldName][] = "$fieldName must contain at least $minValue characters";
        }
    }
    public function max(string $fieldName, string $value, string $maxValue)
    {
        if (strlen($value) > $maxValue) {
            $this->errors[$fieldName][] = "$fieldName must not exceed $maxValue characters";
        }
    }

    public function validatePassword(string $fieldName, string $password)
    {

        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/", $password)) {
            $this->errors[$fieldName][] = "Password must contain uppercase, lowercase, number and special character.";
        }
    }
    public function checkPassword(string $fieldName, string $password, string $confirm_password)
    {
        if ($password != $confirm_password) {
            $this->errors[$fieldName][] = "Password do not match ";
        }
    }
    public function getErrors()
    {
        return $this->errors;
    }
}




 // if ($rule == "required") {
                //     $this->required($field, $value);
                // } elseif ($rule == "string") {
                //     $this->validateString($field, $value);
                // } elseif ($rule == "email") {
                //     $this->validateEmail($field, $value);
                // } elseif ($rule == "numeric") {
                //     $this->validatePhone($field, $value);
                // } elseif (str_contains($rule, "min")) {
                //     $min = explode(":", $rule)[1];

                //     $this->min($field, $value, $min);
                // } elseif ($rule == "password") {
                //     $this->validatePassword($field, $value);
                // } elseif ($rule == "password_match") {
                //     $this->checkPassword($field, $value, $data['password']);
                // }