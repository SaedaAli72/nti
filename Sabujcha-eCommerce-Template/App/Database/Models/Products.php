<?php
namespace App\Database\Models;

use App\Database\Models\Model;

class  Products extends Model{

    private $id,$name_en,$name_ar,$price,$code,$details_en,$details_er,$quantity,$subcatigory_id,$catigory_id,$brand_id,$status,$image,$created_at,$updated_at;

    private const Active =1 ;
    private const NotActive =0;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name_en
     */ 
    public function getName_en()
    {
        return $this->name_en;
    }

    /**
     * Set the value of name_en
     *
     * @return  self
     */ 
    public function setName_en($name_en)
    {
        $this->name_en = $name_en;

        return $this;
    }

    /**
     * Get the value of name_ar
     */ 
    public function getName_ar()
    {
        return $this->name_ar;
    }

    /**
     * Set the value of name_ar
     *
     * @return  self
     */ 
    public function setName_ar($name_ar)
    {
        $this->name_ar = $name_ar;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of code
     */ 
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */ 
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of details_en
     */ 
    public function getDetails_en()
    {
        return $this->details_en;
    }

    /**
     * Set the value of details_en
     *
     * @return  self
     */ 
    public function setDetails_en($details_en)
    {
        $this->details_en = $details_en;

        return $this;
    }

    /**
     * Get the value of details_er
     */ 
    public function getDetails_er()
    {
        return $this->details_er;
    }

    /**
     * Set the value of details_er
     *
     * @return  self
     */ 
    public function setDetails_er($details_er)
    {
        $this->details_er = $details_er;

        return $this;
    }

    /**
     * Get the value of quantity
     */ 
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */ 
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get the value of subcatigory_id
     */ 
    public function getSubcatigory_id()
    {
        return $this->subcatigory_id;
    }

    /**
     * Set the value of subcatigory_id
     *
     * @return  self
     */ 
    public function setSubcatigory_id($subcatigory_id)
    {
        $this->subcatigory_id = $subcatigory_id;

        return $this;
    }

    /**
     * Get the value of brand_id
     */ 
    public function getBrand_id()
    {
        return $this->brand_id;
    }

    /**
     * Set the value of brand_id
     *
     * @return  self
     */ 
    public function setBrand_id($brand_id)
    {
        $this->brand_id = $brand_id;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */ 
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function get()
    {
    $query="SELECT id,name_en,image,price,details_en FROM products WHERE status = " . self::Active;
    $stmt =$this->connect->prepare($query);
    $stmt->execute();
    return $stmt->get_result();
     }

     public function getproductsInsubcatigory()
    {
    $query="SELECT id,name_en,image,price,details_en FROM products WHERE status = " . self::Active . 'AND subcatigory_id= ?';
    $stmt =$this->connect->prepare($query);
    $stmt->bind_param('i',$this->subcatigory_id);
    $stmt->execute();
    return $stmt->get_result();
     }

     public function getproductsIncatigory()
     {
        $query="SELECT id,name_en,image,price,details_en FROM product_details WHERE status = " . self::Active . 'AND catigory_id= ?';
        $stmt =$this->connect->prepare($query);
        $stmt->bind_param('i',$this->catigory_id);
        $stmt->execute();
        return $stmt->get_result();
      }
      public function getDetails()
     {
        $query="SELECT * FROM product_details WHERE status = " . self::Active . 'AND id=?';
        $stmt =$this->connect->prepare($query);
        $stmt->bind_param('i',$this->id);
        $stmt->execute();
        return $stmt->get_result();
      }
    /**
     * Get the value of catigory_id
     */ 
    public function getCatigory_id()
    {
        return $this->catigory_id;
    }

    /**
     * Set the value of catigory_id
     *
     * @return  self
     */ 
    public function setCatigory_id($catigory_id)
    {
        $this->catigory_id = $catigory_id;

        return $this;
    }
}




?>