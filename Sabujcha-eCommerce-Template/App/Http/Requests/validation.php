<?php

namespace App\Http\Requests;

use App\Database\Models\Model;

class validation
{
    private $X;
    private $Xname;
    private $errors = [];
    public function required(): self
    {
        if (empty($this->X)) {
            $this->errors[$this->Xname][__FUNCTION__] = "{$this->Xname}is required";
        }
        return $this;
    }
    public function str(): self
    {
        if (!is_string($this->X)) {
            $this->errors[$this->Xname][__FUNCTION__] = "{$this->Xname}is not string";
        }
        return $this;
    }
    public function range(int $min, int $max): self
    {
        if (!(strlen($this->X) >= $min && strlen($this->X) <= $max)) {
            $this->errors[$this->Xname][__FUNCTION__] = "{$this->Xname} is not between {$min} , {$max}";
        }
        return $this;

    }
    public function digits(int $digits): self
    {
        if (strlen($this->X) !== $digits) {
            $this->errors[$this->Xname][__FUNCTION__] = "{$this->Xname} is not {$digits} digits";
        }
        return $this;

    }
    public function numaric(): self
    {
        if (! is_numeric($this->X)) {
            $this->errors[$this->Xname][__FUNCTION__] = "{$this->Xname} is not a number";
        }
        return $this;

    }
    public function regex(string $pattern, $massage = null): self
    {
        "{-*-*--**-}";
        if (!preg_match($pattern, $this->X)) {
            $this->errors[$this->Xname][__FUNCTION__] = $massage ?? "{$this->Xname} is wrong";
        }
        return $this;
    }
    public function confirmation($pass_conferm): self
    {
        if ($this->X !== $pass_conferm) {
            $this->errors[$this->Xname][__FUNCTION__] = "{$this->Xname} is not conferm to password";
        }
        return $this;
    }
    public function in(array $inputs): self
    {
        if (!in_array($this->X, $inputs)) {
            $this->errors[$this->Xname][__FUNCTION__] = "{$this->Xname} want " . implode(',', $inputs);
        }
        return $this;
    }
    public function uniqe($table, $column): self
    {
        $query = "SELECT * FROM {$table} WHERE {$column} = ?";
        $model = new Model;
        $stmt = $model->connect->prepare($query);
        if (!$stmt) {
            // return $stmt;
            $this->errors[$this->Xname][__FUNCTION__] = "Wrong";
        }
        $stmt->bind_param('s', $this->X);
        $stmt->execute();
        if ($stmt->get_result()->num_rows == 1) {
            $this->errors[$this->Xname][__FUNCTION__] = "{$this->Xname} Already Exists";
        }
        return $this;
    }
    public function exist($table, $column): self
    {
        $query = "SELECT * FROM {$table} WHERE {$column} = ?";
        $model = new Model;
        $stmt = $model->connect->prepare($query);
        if (!$stmt) {
            // return $stmt;
            $this->errors[$this->Xname][__FUNCTION__] = "Wrong";
        }
        $stmt->bind_param('s', $this->X);
        $stmt->execute();
        if ($stmt->get_result()->num_rows == 0) {
            $this->errors[$this->Xname][__FUNCTION__] = "{$this->Xname} Not Exists";
        }
        return $this;
    }



    /**
     * Set the value of X
     *
     * @return  self
     */
    public function setX($X)
    {
        $this->X = $X;

        return $this;
    }

    /**
     * Set the value of Xname
     *
     * @return  self
     */
    public function setXname($Xname)
    {
        $this->Xname = $Xname;

        return $this;
    }

    /**
     * Get the value of errors
     */
    public function getErrors()
    {
        return $this->errors;
    }
    public function getError(string $Xname)
    {
        if (isset($this->errors[$Xname])) {
            foreach ($this->errors[$Xname] as $error) {
                return $error;
            }
        }
        return null;
    }
    public function getErrorstyle(string $Xname)
    {
        return  "<p class='text-danger font-weight-bold '>" . $this->getError($Xname) . "</p>";
    }
}
